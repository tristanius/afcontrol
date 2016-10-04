
<head>
	<!-- Icons -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/fontastic/styles.css') ?>">

	<!-- foundation css -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/foundation/css/foundation.min.css') ?>">

	<!-- Estilo propio -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/principal.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/utilidades.css') ?>">

	<!-- jquery -->
	<script src="<?= base_url('assets/js/jquery-1.11.3.min.js') ?>"></script>

	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/js/jquery-ui/jquery-ui.min.css') ?>">
	<script src="<?= base_url('assets/js/jquery-ui/jquery-ui.min.js') ?>"></script>

	<!-- uploader -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/js/uploader/uploadfile.css') ?>">
	<script type="text/javascript" src="<?= base_url('assets/js/uploader/jquery.uploadfile.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/uploader/jquery.form.js') ?>"></script>

	<!-- datatables -->
	<script type="text/javascript" src="<?= base_url('assets/js/datatables/datatables.min.js') ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/js/datatables/datatables.min.css') ?>">

	<!-- pdfmake -->
	<script type="text/javascript" src="<?= base_url('assets/js/pdfmake/build/pdfmake.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/pdfmake/build/vfs_fonts.js') ?>"></script>

	<!-- Angular -->
	<script type="text/javascript" src="<?= base_url('assets/js/angular.min.js') ?>"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$( ".datepicker" ).datepicker({
				changeYear: true,
				dateFormat: 'yy-mm-dd',
				defaultDate: "-1y"
			});
		})
	</script>

	<title>Aplicacion para el manejo de afiliados</title>
</head>
