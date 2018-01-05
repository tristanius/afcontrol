<!DOCTYPE html>
<html>
<?php $this->load->view("init/head",array()); ?>
<body>
	<?= $html ?>
	<script src="<?= base_url('assets/foundation6/js/vendor/jquery.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery-ui/jquery-ui.min.js') ?>"></script>

    <script src="<?= base_url('assets/foundation6/js/vendor/what-input.js') ?>"></script>
    <script src="<?= base_url('assets/foundation6/js/vendor/foundation.js') ?>"></script>
    <script src="<?= base_url('assets/js/datatables/datatables.min.js') ?>"></script>

    <script src="<?= base_url('assets/js/angular.min.js') ?>"></script>

    <script src="<?= base_url('assets/js/main/afiliado.js?v='.rand()) ?>"></script>
    <script src="<?= base_url('assets/js/main/sesion.js?v='.rand()) ?>"></script>
    <script src="<?= base_url('assets/js/main/crud.js?v='.rand()) ?>"></script>
    <script src="<?= base_url('assets/js/main/main.js?v='.rand()) ?>"></script>

    
    <script src="<?= base_url('assets/foundation6/js/app.js') ?>"></script>

</body>
</html>