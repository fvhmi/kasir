				<script type="text/javascript">
			        $(document).ready(function(){
			            $('#nama_menu').select2();
			        });
			    </script>
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?= base_url() ?>">Home</a>
							</li>
							<li class="active">Pesanan</li>
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
												<h4 class="widget-title">Pesanan</h4>
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
																	<th>ID</th>
																	<th>No Meja</th>
																	<th>Status</th>
																	<th>Pelayan</th>
																	<th>Option</th>
																</tr>
															</thead>
															<tbody>
																<?php 
																	foreach ($pesanan as $key => $p){
																?>
																<tr>
																	<td>
																		<a href="<?= base_url('pesanan/detail') ?>/<?= $p->id ?>">
																			<?= $p->id ?>
																		</a>
																	</td>
																	<td><?= $p->no_meja ?></td>
																	<td><?= $p->status ?></td>
																	<td><?= $p->nama ?></td>
																	<td>
																		<a href="<?= base_url('pesanan/cetak') ?>/<?= $p->id ?>" target="_blank">
																			Cetak
																		</a>
																	</td>
																</tr>
																<?php 
																	// endforeach;
																	}
																?>
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