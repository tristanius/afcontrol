	<div>

		<?php $this->load->view('init/header'); ?>
		
		<section id="content" class="expanded row skin2">
			
			<?php $this->load->view('init/menu'); ?>

			<div class="columns large-10">
				<section>

					<?= $view ?>
					
				</section>
				
				<?php $this->load->view('init/footer'); ?>
			</div>

		</section>

	</div>