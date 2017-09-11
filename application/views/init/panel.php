	<div ng-app="afcontrol" ng-controller="main">

		<?php $this->load->view('init/nav'); ?>

		<section id="content" class="off-canvas-wrapper" ng-init="site_url = '<?= site_url('/') ?>' ">
			
			<div class="off-canvas position-left" id="offCanvas" data-off-canvas>
				<!-- Menu -->	
				<?php $this->load->view('init/menu'); ?>
			</div>

			<div id="panel-content" class="grid-x off-canvas-content" data-off-canvas-content ng-init="initTabs()" style="margin: 1ex;">

				<div id="pestanas" class="cell">
					<div class="pestana {{ tab.active?'active':'' }}" ng-repeat="tab in tabs">
						<span ng-bind="tab.title" ng-click="selectedTab(tab)"></span>
						<small>(<span ng-bind="(1+tab.id)"></span>)</small>
						&nbsp;
						<span class="fa fa-times-circle" ng-if="tab.rm" ng-click="closeTab(tab)" style="color: #FC4747; margin:0; padding: 0; line-height: 5px;" ></span>
					</div>
				</div>

				<div id="pestana_view" class="cell" ng-repeat="tab in tabs" ng-show="tab.active" ng-include="tab.lnk">
					<img src="<?= base_url('assets/img/loader.gif') ?>">
				</div>
			</div>
		</section>
				
		<?php $this->load->view('init/footer'); ?>

	</div>