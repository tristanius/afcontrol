
			<?= isset($button)?$button:''; ?>
			<?php
			foreach($css_files as $file): ?>
				<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
			<?php endforeach; ?>

			<?php foreach($js_files as $file): ?>
				<script src="<?php echo $file; ?>"></script>
			<?php endforeach; ?>

			<style media="screen">
				.crud input[type="text"], .crud select{
					width: auto;
					height: auto;
					margin: 0px;
					padding: 0px;
					display: inline-block;
				}
			</style>

			<div style='height:10px;'></div>
		    <div class="crud">
				<?php echo $output; ?>
		    </div>

		    <br>
