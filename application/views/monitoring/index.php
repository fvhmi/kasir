				<script type="text/javascript">
			    
			    function get_data_monitor(){
			        $.ajax({
			            type: "POST",
			            url: "<?= base_url('monitoring/get_data_monitoring'); ?>",
			            success: function(resp){
			                    $("#rmonitoringuser").html(resp);
			            },
			            error:function(event, textStatus, errorThrown) {
			                $("#rmonitoringuser").html('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
			            },
			            timeout: 4000
			        });
			    }
			    
			    get_data_monitor();
			</script> 
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?= base_url() ?>">Home</a>
							</li>
							<li class="active">Monitoring</li>
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
												<h4 class="widget-title">Monitoring</h4>
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
																	<th>Last Login</th>
														            <th>Email</th>
														            <th>IP Address</th>
														            <th>Browser</th>
														            <th>Platform</th>
																</tr>
															</thead>
															<tbody id="rmonitoringuser">
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