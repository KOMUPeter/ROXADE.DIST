<!--begin::Head-->
<?php
include 'config/config.inc.php';
include 'config/login.inc.php';


include('include/html.inc.php')
	?>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true"
	data-kt-app-sidebar-fixed="false" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
	data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
	<!--begin::Theme mode setup on page load-->
	<script>var defaultThemeMode = "light"; var themeMode; if (document.documentElement) { if (document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if (localStorage.getItem("data-bs-theme") !== null) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
	<!--end::Theme mode setup on page load-->
	<!--begin::App-->
	<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
		<!--begin::Page-->
		<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
			<!--begin::Header-->
			<?php include('include/header.inc.php') ?>
			<!--end::Header-->

			<!--begin::wrapper-->
			<div class="app-wrapper d-flex" id="kt_app_wrapper">
				<!--begin::wrapper container-->
				<div class="app-container container-fluid d-flex">
					<!--begin::Sidebar-->
					<?php include('include/sidebar.inc.php') ?>
					<!--end::Sidebar-->

					<!--begin::Main-->
					<div class="container">
						<div class="row">
							<div id="kt_app_content" class="app-content flex-column-fluid">

								<div id="kt_app_content" class="app-content  flex-column-fluid ">
									<!--begin::Content container-->
									<div id="kt_app_content_container" class="app-container  container-fluid ">

										<?php
										if (isset($userConnected)) {
											$sql = __QUERY('SELECT ticid FROM tickets WHERE ticpec = 0');
											if (__ROWS($sql) > 0) {
												?>
												<h3>Liste des tickets non pris en charge</h3>
												<table class="table table-bordered table-striped table-hover">
													<thead>
														<tr>
															<th class="text-center">
																Type
															</th>
															<th>
																Niveau
															</th>
															<th>
																Client
															</th>
															<th>
																Titre
															</th>
															<th>
																Descriptif
															</th>
														</tr>
													</thead>

													<tbody>

														<?php while ($row = __ARRAY($sql)) {
															$ticket = new Tickets($row['ticid']);

															?>
															<tr>
																<td class="text-center">
																	<?= $ticket->getBadgeType() ?>
																</td>
																<td class="font-weight-bold text-center">
																	<?= $ticket->getBagdeNiveau() ?>
																</td>
																<td class="text-nowrap">
																	<div><a href="client.php?n=<?= $ticket->getTiccli() ?>">
																			<?= $ticket->getClientNom() ?>
																		</a></div>
																	<div class="text-muted">
																		<?= $ticket->getContactNom() ?>
																	</div>
																</td>
																<td>
																	<?= $ticket->getTictitre() ?>
																</td>
																<td>
																	<?= nl2br($ticket->getTicdescriptif()); ?>
																</td>
															</tr>
															<?php
														}
														?>
													</tbody>
												</table>

												<?php
											}
										}
										?>
										<?php
										if (isset($clientConnected)) {
											$result = __QUERY('SELECT ticid FROM tickets WHERE ticcli = ' . $clientConnected->getTiccli());

											if (__ROWS($result) > 0) { ?>
												<table class="table table-bordered table-striped table-hover">
													<thead>
														<tr>
															<th class="text-center">
																Type
															</th>
															<th>
																Niveau
															</th>
															<th>
																Titre
															</th>
															<th>
																Descriptif
															</th>
														</tr>
													</thead>
													<tbody>
														<?php
														while ($row = __ARRAY($result)) {
															$ticket = new Tickets($row['ticid']);
															?>

															<tr>
																<td class="text-center">
																	<?= $ticket->getBadgeType() ?>
																</td>
																<td class="font-weight-bold text-center">
																	<?= $ticket->getBagdeNiveau() ?>
																</td>
																<td>
																	<?= $ticket->getTictitre() ?>
																</td>
																<td>
																	<?= nl2br($ticket->getTicdescriptif()); ?>
																</td>
															</tr>
															<?php
															}
														?>
													</tbody>
												</table>
											<?php
											}
										}
										?>
									</div>
									<!--end::Content container-->
								</div>


								<!-- Your content goes here -->
							</div>
						</div>
					</div>
					<!--end:::Main-->

				</div>

			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
		<!--end::App-->
	</div>

	<!--begin::Scrolltop-->
	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<i class="ki-outline ki-arrow-up"></i>
	</div>
	<!--end::Scrolltop-->

	<!--begin::Javascript-->
	<?php include('include/javascript.inc.php') ?>
	<!--end::Javascript-->

</body>
<!--end::Body-->

</html>