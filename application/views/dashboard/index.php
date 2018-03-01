<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Kasir App</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fullcalendar.min.css" />

		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-timepicker.min.css" />

		<link  rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2.min.css">

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?php echo base_url(); ?>assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?php echo base_url(); ?>assets/js/html5shiv.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/respond.min.js"></script>
		<![endif]-->
		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
			<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url(); ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url(); ?>assets/js/jquery-ui.custom.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/fullcalendar.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootbox.js"></script>

		<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/dataTables.buttons.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/buttons.flash.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/buttons.html5.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/buttons.print.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/buttons.colVis.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/dataTables.select.min.js"></script>

		<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.min.js"></script>

		<script src="<?php echo base_url(); ?>assets/js/select2.full.js"></script>

		<script src="<?php echo base_url(); ?>assets/js/bootbox.js"></script>

		<!--[if lte IE 8]>
		  <script src="<?php echo base_url(); ?>assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="<?php echo base_url(); ?>assets/js/jquery-ui.custom.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.easypiechart.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.sparkline.index.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.flot.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.flot.pie.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->
		<script src="<?php echo base_url(); ?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace.min.js"></script>
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="<?= base_url(); ?>" class="navbar-brand">
						<small>
							Kasir App
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo base_url(); ?>assets/images/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?= ucwords($this->session->userdata('nama')); ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

								<li>
									<a href="<?= base_url("pesanan/my") ?>">
										<i class="ace-icon fa fa-user"></i>
										My Activity
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?= base_url("auth/logout") ?>">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<?php echo $sidebar; ?>

			<div class="main-content">
				
				<?php echo $content; ?>

			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Kasir</span>
							Application &copy; 2018
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="https://twitter.com/fahmipotlot/" target="_blank">
								<i class="ace-icon fa fa-twitter bigger-150"></i>
							</a>

							<a href="https://facebook.com/fahmi.potlot/" target="_blank">
								<i class="ace-icon fa fa-facebook-square bigger-150"></i>
							</a>

							<a href="https://instagram.com/fahmipotlot" target="_blank">
								<i class="ace-icon fa fa-instagram bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
		
	</body>
</html>
