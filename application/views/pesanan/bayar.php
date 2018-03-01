				<script type="text/javascript">
			        $(document).ready(function(){
			            $('#nama_menu').select2();
			        });
			    </script>
			    <script type="text/javascript">
			    	function bayar(){
			    		var a = parseInt($("#total_bayar").val());
			    		var b = parseInt($("#uang_bayar").val());
			    		// var a = $("#uang_kembali");
			    		z = b-a;

			    		$("#uang_kembali").val(z);
			    	}
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

									<div class="col-sm-8">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Bayar</h4>
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
																	<th>No</th>
																	<th>Nama Menu</th>
																	<th>Harga</th>
																</tr>
															</thead>
															<tbody>
																<?php 
																	$no =1;
																	foreach ($detail as $key => $d){
																?>
																<tr>
																	<td><?= $no ?></td>
																	<td><?= $d->nama_menu ?></td>
																	<td><?= $d->harga ?></td>
																</tr>
																<?php 
																	$no++;
																	}
																?>
																<tr>
																	<td colspan=2>Sub Total</td>
																	<?php 
																		foreach ($bayar as $key => $b){
																	?>
																	<td><?= $b->amount_paid ?></td>
																	<?php } ?>
																</tr>
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
												<h4 class="widget-title">Bayar Pesanan</h4>
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

													<form method="POST" action="<?= base_url('pesanan/bayarken') ?>/<?= $this->uri->segment(3) ?>">
													<div class="space-4"></div>

														<div class="form-group">
															<label>Kode Pesanan</label>

															<div>
																<input type="text" value="<?= $this->uri->segment(3) ?>" name="id" style="width:100%;"  readonly="" />
															</div>
														</div>
													<div class="space-4"></div>

														<div class="form-group">
															<label>Total Bayar</label>

															<div>
																<input type="text" id="total_bayar" name="total_bayar" 
																<?php 
																	foreach ($bayar as $key => $b){
																?>
																value="<?= $b->amount_paid ?>"
																<?php } ?> style="width:100%;"  readonly=""/>
															</div>
														</div>
													<div class="space-4"></div>

														<div class="form-group">
															<label>Uang Bayar</label>

															<div>
																<input type="text" id="uang_bayar" name="uang_bayar" placeholder="Uang Bayar" style="width:100%;"  onkeyup="bayar()"/>
															</div>
														</div>
													<div class="space-4"></div>

														<div class="form-group">
															<label>Uang Kembali</label>

															<div>
																<input type="text" id="uang_kembali" name="uang_kembali" style="width:100%;" placeholder="Uang Kembali"  readonly="" />
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