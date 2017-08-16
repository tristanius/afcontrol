	<div ng-app="afcontrol" ng-controller="main">

		<?php $this->load->view('init/nav'); ?>

		<section id="content" class="expanded row" ng-init="site_url = '<?= site_url('/') ?>' ">
			<?php $this->load->view('init/menu'); ?>

			<div id="panel-content" class="columns large-10" ng-init="initTabs()">

				<div id="pestanas">
					<div class="pestana {{ tab.active?'active':'' }}" ng-repeat="tab in tabs">
						<span ng-bind="tab.title" ng-click="selectedTab(tab)"></span>
						<small>(<span ng-bind="(1+tab.id)"></span>)</small>
						&nbsp;
						<span class="fa fa-times-circle" ng-if="tab.rm" ng-click="closeTab(tab)" style="color: #FC4747; margin:0; padding: 0; line-height: 5px;" ></span>
					</div>
				</div>

				<div class="pestana_view" ng-repeat="tab in tabs" ng-if="tab.active">
					<div ng-include="( site_url + tab.lnk )"></div>					
				</div>

			</div>
		</section>
				
		<?php $this->load->view('init/footer'); ?>

	</div>