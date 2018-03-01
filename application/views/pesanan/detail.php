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

									<div class="col-sm-8">
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
																	<th>Nama Menu</th>
																	<th>Harga</th>
																	<th>Pelayan</th>
																</tr>
															</thead>
															<tbody>
																<?php 
																	foreach ($pesanan as $key => $p){
																?>
																<tr>
																	<td><?= $p->id ?></td>
																	<td><?= $p->no_meja ?></td>
																	<td><?= $p->nama_menu ?></td>
																	<td><?= $p->harga ?></td>
																	<td><?= $p->nama ?></td>
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

									<div class="col-sm-4">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Tambah Pesanan</h4>
												<span class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</span>
											</div>
											<div class="widget-body">
												<div class="widget-main">
													
													<font color="red">
														<?php echo validation_errors(); ?>
													</font>

													<?php
													    if($this->session->flashdata('success')==TRUE):
														    echo'<div class="alert alert-success" role="alert">';
														    echo $this->session->flashdata('success');
														    echo "</div>";
													    endif;
												    ?>

													<form method="POST" action="<?= base_url('pesanan/save') ?>">
													<div class="space-4"></div>

														<div class="form-group">
															<label>Kode Pesanan</label>

															<div>
																<input type="text" value="<?= $kode ?>" name="id" style="width:100%;"  readonly="" />
															</div>
														</div>
													<div class="space-4"></div>

														<div class="form-group">
															<label>No Meja</label>

															<div>
																<input type="text" name="no_meja" placeholder="No Meja" style="width:100%;"  />
															</div>
														</div>
													<div class="space-4"></div>

														<div class="form-group">
															<label>Nama Menu</label>

															<div>
																<input type="text" name="nama_menu" placeholder="Nama Menu" style="width:100%;"  />
															</div>
														</div>
													<div class="space-4"></div>

														<div class="form-group">
															<button type="submit" class="btn btn-primary">
																Simpan
										                    </button>
														</div>
													</form>

												</div>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>