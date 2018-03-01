				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?= base_url() ?>">Home</a>
							</li>
							<li class="active">Pembayaran</li>
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
												<h4 class="widget-title">Pembayaran</h4>
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
																	<th>ID Pesanan</th>
																	<th>Total Harga</th>
																	<th>Uang Bayar</th>
																	<th>Uang Kembali</th>
																	<th>Kasir</th>
																</tr>
															</thead>
															<tbody>
																<?php 
																	foreach ($pembayaran as $key => $p){
																?>
																<tr>
																	<td>
																		<a href="<?= base_url('pembayaran/detail') ?>/<?= $p->id ?>">
																			<?= $p->id ?>
																		</a>
																	</td>
																	<td><?= $p->id_pesanan ?></td>
																	<td><?= $p->total_harga ?></td>
																	<td><?= $p->uang_bayar ?></td>
																	<td><?= $p->uang_kembali ?></td>
																	<td><?= $p->id_kasir ?></td>
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