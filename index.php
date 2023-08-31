
<html>
	<head>
		<title>Reserva del SUM de la Biblioteca</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
		<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
		<link href="css/bootstrap-slider.min.css" rel="stylesheet" media="screen">
		<link href='custom.css' rel='stylesheet' type='text/css'>
	</head>
	<body>


		<div class="col-xl-8 offset-xl-2">
			<div class="jumbotron">
				<div class="container">
					<h2>Solicitud de reserva del Salón de Usos Múltiples / Auditorio de nuestra Biblioteca.</h2>
					<p>
					<ul>
					<li>El espacio podr&aacute; ser reservado para las actividades acad&eacute;micas de los miembros de la comunidad FADU.</br></li>
					<li>La Biblioteca funciona de lunes a viernes de 9 a 21.</br></li>
					<li>La sala dispone de pantalla y retroproyector.</br></li>
					<li>El sistema de audio desde el retroproyector no se encuentra disponible moment&aacute;neamente (en reparaci&oacute;n).</br></li>
					<li>Por reglamento, no se permite el ingreso con alimentos y/o bebidas.</br></li>
					<li>Al finalizar la actividad el espacio debe mantenerse limpio y ordenado.</br></li>
					<li>La reserva se deber&aacute; realizar con al menos 48 horas h&aacute;biles de anticipaci&oacute;n a la fecha requerida.</br></li>
					<li>La Biblioteca enviar&aacute; una respuesta acerca de la disponibilidad del espacio en la fecha y horario solicitado.</br></li>
					<li>En caso de modificaciones de horario o suspensi&oacute;n del uso del espacio se solicita avisar de inmediato a <a href="mailto:biblio@fadu.uba.ar">biblio@fadu.uba.ar</a></br></li>
					</ul>
					</p>
				</div>
			</div>
		</div>
		<div class="container">

			<div class="row">

				<div class="col-lg-8 col-lg-offset-2">

					<h1>Ingreso de la solicitud de reserva.</h1>
					<hr></hr>
					<form id="contact-form" method="POST" action="contact.php" role="form" enctype="multipart/form-data">

						<div class="messages"></div>

						<div class="controls">

							<div class="row">

								<div class="col-lg-6">
									<div class="form-group required">
										<label for="fini">Fecha y Hora de Inicio *</label>
										<div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="fini">
											<input id="fini" type="text" name="fini" class="form-control" placeholder="Fecha y Hora de Inicio *" required="required" data-validate="true" value="" readonly="true">
											<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
											<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
											<div class="help-block with-errors"></div>
										</div>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group required">
										<label for="ffin">Fecha y Hora de Finalizaci&oacute;n *</label>
										<div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="ffin">
											<input id="ffin" type="text" name="ffin" class="form-control" placeholder="Fecha y Hora de Finalizaci&oacute;n *" required="required" data-validate="true" value="" readonly="true">
											<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
											<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
											<div class="help-block with-errors"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="actividad">Actividad a Desarrollar *</label>
								<textarea id="actividad" name="actividad" class="form-control" placeholder="Descripción de la actividad *" rows="4" required="required" data-error="La actividad no puede estar vacía."></textarea>
								<div class="help-block with-errors"></div>
							</div>

							<div class="row">

								<div class="col-lg-6">
									<div class="form-group required">
										<label for="asis">Cantidad de asistentes *</label>
										<input id="asis" type="text" data-slider-min="0" data-slider-max="50" data-slider-step="1" data-slider-value="10" name="asis" required="required" data-error="Los asistentes no pueden estar vacíos">
						<span id="asis_label">Asistentes: <span id="asisVal">10</span></span>
	  				</d
										<div class="help-block with-errors"></div>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group">
										<label for="archivo">Bibliograf&iacute;a</label>
										<input id="archivo" type="file" name="archivo" >
										<p class="help-block">Para solicitar material de nuestra colección, se debe enviar el archivo de la bibliografía requerida con al menos 72 h de antelación. En el caso de libros, se deberá incluir el número de inventario.</p>
									</div>
								</div>

							</div>

							<div class="row">

								<div class="col-lg-6">
									<div class="form-group">
										<label for="solicitante">Nombre y apellido del solicitante *</label>
										<input id="solicitante" type="text" name="solicitante" class="form-control" placeholder="Nombre y apellido del solicitante *" required="required" data-error="El solicitante no puede estar vacío.">
										<div class="help-block with-errors"></div>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group">
										<label for="cargo">Cargo del solicitante *</label>
										<input id="cargo" type="text" name="cargo" class="form-control" placeholder="Cargo del solicitante *" required="required" data-error="El cargo del solicitante no puede estar vacío.">
										<div class="help-block with-errors"></div>
									</div>
								</div>

							</div>

							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="carrera">Carrera, asignatura y cátedra o dependencia FADU solicitante *</label>
										<input id="carrera" type="text" name="carrera" class="form-control" placeholder="Cátedra y/o carrera *" required="required" data-error="La carrera y/o cátedra no puede estar vacía.">
										<div class="help-block with-errors"></div>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group">
										<label for="email">Correo electrónico del contacto *</label>
										<input id="email" type="email" name="email" class="form-control" placeholder="Mail *" required="required" data-error="El email debe ser válido.">
										<div class="help-block with-errors"></div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="telefono">Tel&eacute;fono de contacto *</label>
										<input id="telefono" type="text" name="telefono" class="form-control" placeholder="Tel&eacute;fono de contacto *" required="required" data-error="El tel&eacute;fono no puede estar vac&iacute;o.">
										<div class="help-block with-errors"></div>
									</div>
								</div>
							</div>

							<div class="form-group">
							<img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" />
      					<a href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false" class="btn btn-success btn-sm">Cambiar imágen</a><br/>
      							<div class="form-group" style="margin-top: 10px;">
        								<input type="text" class="form-control" name="captcha_code" id="captcha_code" placeholder="Por seguridad, ingrese el código mostrado en la caja." />
        								<span class="help-block" style="display: none;">Por favor ingrese el codigo mostrado en la imagen.</span>
      							</div>
      					</div>
      					<span class="help-block" style="display: none;">Please enter a the security code.</span>	

							<input type="submit" class="btn btn-success btn-send" value="Solicitar Reserva">

							<p class="text-muted">
								<strong>*</strong> Estos campos son obligatorios
							</p>

						</div>

					</form>

				</div>
				<!-- /.8 -->

			</div>
			<!-- /.row-->

		</div>
		<!-- /.container-->

		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/vendor/bootstrap-datetimepicker.js" charset="UTF-8"></script>
		<script type="text/javascript" src="js/vendor/locales/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
		<script type="text/javascript" src="js/vendor/bootstrap-slider.js" charset="UTF-8"></script>
		<script src="validator.js"></script>
		<script src="contact.js"></script>
		<script type="text/javascript">
			$('.form_datetime').datetimepicker({
			        language:  'es',
			        weekStart: 1,
			        todayBtn:  1,
					  autoclose: 1,
					  todayHighlight: 1,
					  startView: 2,
					  forceParse: 0,
					  daysOfWeekDisabled: [0,6],
					  hoursDisabled: [0, 1, 2, 3, 4, 5, 6, 7, 8, 21, 22, 23],
			        showMeridian: 1,
			        
			    });
			 
			 	$("#asis").slider();
				$("#asis").on("slide", function(slideEvt) {
				$("#asisVal").text(slideEvt.value);
				});
			
			
		</script>
	</body>
</html>