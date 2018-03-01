				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?= base_url() ?>">Home</a>
							</li>
							<li class="active">Api</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">

									<div class="col-sm-12">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Api</h4>
												<span class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</span>
											</div>
											<div class="widget-body">
												<div class="widget-main">

													<div class="table-responsive">
														<table id="dataTable" class="table table-bordered table-striped table-hover" >
															<thead>
																<tr>
																	<th>Endpoint</th>
																	<th>Method</th>
																	<th>Params</th>
																	<th>Description</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>
																		http://localhost/kasir/api/v1/menu
																	</td>
																	<td>
																		GET
																	</td>
																	<td></td>
																	<td>Melihat semua daftar menu</td>
																</tr>
																<tr>
																	<td>
																		http://localhost/kasir/api/v1/menu?id=1
																	</td>
																	<td>
																		GET
																	</td>
																	<td>id</td>
																	<td>Melihat detail menu berdasarkan Id</td>
																</tr>
																<tr>
																	<td>
																		http://localhost/kasir/api/v1/menu/login
																	</td>
																	<td>
																		POST
																	</td>
																	<td>email, password</td>
																	<td>Login </td>
																</tr>
																<tr>
																	<td>
																		http://localhost/kasir/api/v1/menu/logout
																	</td>
																	<td>
																		GET
																	</td>
																	<td></td>
																	<td>Logout </td>
																</tr>
															</tbody>
														</table>
													</div>

												</div>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>