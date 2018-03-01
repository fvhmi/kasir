				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?= base_url() ?>">Home</a>
							</li>
							<li class="active">Menu Makanan</li>
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
												<h4 class="widget-title">Daftar Menu</h4>
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
																	<th>Nama Menu</th>
																	<th>Harga</th>
																	<th>Status</th>
																	<th>Options</th>
																</tr>
															</thead>
															<tbody>
																<?php 
																	foreach ($menus as $key => $menu){
																?>
																<tr>
																	<td><?= $menu->id ?></td>
																	<td><?= $menu->nama_menu ?></td>
																	<td>Rp.<?= $menu->harga ?></td>
																	<td><?= $menu->status ?></td>
																	<td>
																		<a class="btn btn-success" href="<?= base_url('menu/edit') ?>/<?= $menu->id ?>">
																			<i class="ace-icon fa fa-pencil-square-o"></i>
																		</a>

																		<a class="btn btn-danger" href="<?= base_url('menu/delete') ?>/<?= $menu->id ?>">
																			<i class="ace-icon fa fa-trash-o"></i>
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

									<div class="col-sm-4">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Tambah Menu</h4>
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

													<form method="POST" action="<?= base_url('menu/save') ?>">
													<div class="space-4"></div>

														<div class="form-group">
															<label>Nama Menu</label>

															<div>
																<input type="text" id="nama_menu" name="nama_menu" placeholder="Nama Menu" style="width:100%;"  />
															</div>
														</div>
													<div class="space-4"></div>

														<div class="form-group">
															<label>Harga Menu</label>

															<div>
																<input type="text" id="harga" name="harga" placeholder="Harga Menu" style="width:100%;"  />
															</div>
														</div>
													<div class="space-4"></div>

														<div class="form-group">
															<label>Status</label>

															<div>
																<select name="status" style="width:100%;">
																	<option value="Tidak Ready">Pilih Status</option>
																	<option value="Tidak Ready">Tidak Ready</option>
																	<option value="Ready">Ready</option>
																</select>
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