	<div ng-app="afcontrol" ng-controller="main">

		<?php $this->load->view('init/nav'); ?>

		<br>
		
		<section id="content" class="expanded row" ng-init="site_url = '<?= site_url('/') ?>' ">
			<?php $this->load->view('init/menu'); ?>

			<div id="panel-content" class="columns large-10">

				<div id="pestanas">
					<div class="pestana {{ tab.active?'active':'' }}" ng-repeat="tab in tabs" ng-click="selectedTab(tab)">{{tab.title}}</div>
				</div>

				<div id="pestana_view" ng-include="( site_url + selected_tab.lnk )" ng-init="initTabs()">
					
				</div>
			</div>
		</section>
				
		<?php $this->load->view('init/footer'); ?>

	</div>