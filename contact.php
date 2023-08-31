<?php
// require ReCaptcha class
//require('recaptcha-master/src/autoload.php');
require('js/vendor/PHPMailerAutoload.php');

function logToFile($filename, $msg)
{
    // open file
    $fd = fopen($filename, 'a');
    // append date/time to message
    $str = '[' . date('Y/m/d h:i:s', mktime()) . '] ' . $msg;
    // write string
    fwrite($fd, $str);
    // close file
    fclose($fd);
}

function getRealIP()
    {
	if (isset($_SERVER["HTTP_CLIENT_IP"]))
	{
	    return $_SERVER["HTTP_CLIENT_IP"];
	}
	elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
	{
	    return $_SERVER["HTTP_X_FORWARDED_FOR"];
	}
	elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
	{
	    return $_SERVER["HTTP_X_FORWARDED"];
	}
	elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
	{
	    return $_SERVER["HTTP_FORWARDED_FOR"];
	}
	elseif (isset($_SERVER["HTTP_FORWARDED"]))
	{
	    return $_SERVER["HTTP_FORWARDED"];
	}
	else
	{
	    return $_SERVER["REMOTE_ADDR"];
	}
    }

if (isset($_FILES['archivo']['name'])){
	$bibliografia = $_FILES['archivo']['name'];
	$destino='upload/'.$bibliografia;
	move_uploaded_file($_FILES['archivo']['tmp_name'],$destino);
}

//Leer datos de archivo ini
$credenciales = parse_ini_file(".credenciales/mail.ini");

//print_r($_FILES);
//print_r($_POST);
//die();

// configure
// an email address that will be in the From field of the email.
//$from = 'biblio@fadu.uba.ar';

// an email address that will receive the email with the output of the form
//$sendTo = 'biblio@fadu.uba.ar';

// subject of the email
//$subject = 'Reserva SUM';

// form field names and their translations.
// array variable name => Text to appear in the email
//$fields = array('name' => 'Name', 'surname' => 'Surname', 'phone' => 'Phone', 'email' => 'Email', 'message' => 'Message');

// message that will be displayed when everything is OK :)
$okMessage = 'El pedido de reserva ha sido enviado. Pronto nos contactaremos con Ud.';

// If something goes wrong, we will display this message.
$errorMessage = 'Hubo un error al enviar el pedido.Por favor intente mas tarde';

// let's do the sending

// if you are not debugging and don't need error reporting, turn this off by error_reporting(0);
error_reporting(E_ALL & ~E_NOTICE);

try {
    if (!empty($_POST)) {

        if (!isset($_POST['captcha_code'])) {
            throw new \Exception('Captcha is not set.');
        }

		//do Captcha check, make sure the submitter is not a robot:)...
  		include_once 'securimage/securimage.php';
  		$securimage = new Securimage();
  		if (!$securimage->check($_POST['captcha_code'])) {
				throw new \Exception('Invalid Captcha Code.');    			
  		}

        // everything went well, we can compose the message, as usually
        
         $inicio = $_POST['fini'];
			$fin = $_POST['ffin'];
			$actividad = $_POST['actividad'];
			$asistentes = $_POST['asis'];
			$carrera = $_POST['carrera'];
			$solicitante = $_POST['solicitante'];
			$cargo = $_POST['cargo'];
			$mail = $_POST['email'];
			$telefono = $_POST['telefono'];
			$subject = 'Reserva SUM de '.$_POST['solicitante'];
			$content = "Pedido de reserva \nInicio: $inicio \nFinalizacion: $fin \nActividad : $actividad \nAsistentes : $asistentes \nBibliografia : $bibliografia \nCatedra : $carrera \nSolicitante : $solicitante \nCargo : $cargo \nMail de Contacto : $mail \nTelefono de contacto :$telefono \n ";
			$contenth = "
			        <html>
			            <body>
			            	<h2>Pedido de Reserva</h2>
			                <table style='width:600px;'>
			                    <tbody>
			                        <tr>
			                            <td style='width:150px'><strong>Fecha de Inicio: </strong></td>
			                            <td style='width:400px'>$inicio</td>
			                        </tr>
			                        <tr>
			                            <td style='width:150px'><strong>Fecha de Finalizaci&oacute;n: </strong></td>
			                            <td style='width:400px'>$fin</td>
			                        </tr>
			                        <tr>
			                            <td style='width:150px'><strong>Actividad a realizar: </strong></td>
			                            <td style='width:400px'>$actividad</td>
			                        </tr>
			                        <tr>
			                            <td style='width:150px'><strong>Nro de asistentes: </strong></td>
			                            <td style='width:400px'>$asistentes</td>
			                        </tr>
			                        <tr>
			                            <td style='width:150px'><strong>Archivo de Bibliograf&iacute;a: </strong></td>
			                            <td style='width:400px'>$bibliografia</td>
			                        </tr>
			                        <tr>
			                            <td style='width:150px'><strong>C&aacute;tedra: </strong></td>
			                            <td style='width:400px'>$carrera</td>
			                        </tr>
			                        <tr>
			                            <td style='width:150px'><strong>Solicitante: </strong></td>
			                            <td style='width:400px'>$solicitante</td>
			                        </tr>
			                        <tr>
			                            <td style='width:150px'><strong>Cargo: </strong></td>
			                            <td style='width:400px'>$cargo</td>
			                        </tr>
			                        <tr>
			                            <td style='width:150px'><strong>Mail de Contacto: </strong></td>
			                            <td style='width:400px'>$mail</td>
			                        </tr>
			                        <tr>
			                            <td style='width:150px'><strong>Tel&eacute;fono de Contacto: </strong></td>
			                            <td style='width:400px'>$telefono</td>
			                        </tr>
			                    </tbody>
			                </table>
			            </body>
			        </html>
			        ";
					$email = new PHPMailer;
					$email->isSMTP();
					$email->SMTPDebug = 0;
					$email->Debugoutput = 'html';
					$email->Host = $credenciales["host"];
					$email->Port = $credenciales["port"];
					$email->SMTPSecure = 'tls';
					$email->SMTPAuth = true;
					$email->Username = $credenciales["username"];
					$email->Password = $credenciales["password"];
					$email->setFrom('biblio@fadu.uba.ar', 'Sistema de reserva Biblioteca FADU');
					$email->addAddress('biblio@fadu.uba.ar', 'Biblioteca FADU');
					$email->Subject = $subject;
					$email->Body = $contenth;
					$email->AltBody = $content;
					$email->addAttachment('upload/'.$bibliografia);
					$email->send();

					//Loguear actividad del usuario
		    
					logToFile('sum.log', 'Pedido de '.$solicitante.' para el dia '.$inicio.' desde la IP '.getRealIP()."\n"); 

        			$responseArray = array('type' => 'success', 'message' => $okMessage);
    }
} catch (\Exception $e) {
    $responseArray = array('type' => 'danger', 'message' => $e->getMessage());
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
} else {
    echo $responseArray['message'];
}
