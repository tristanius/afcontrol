	<div>

		<?php $this->load->view('init/nav'); ?>
		
		<section id="content" class="expanded row">
			<?php $this->load->view('init/menu'); ?>

			<div id="panel" class="columns large-10" >
				<div>
					<?= $view ?>
				</div>
			</div>
		</section>


				
		<?php $this->load->view('init/footer'); ?>

	</div>