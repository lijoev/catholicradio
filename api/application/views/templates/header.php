<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <title>Sookoon Publisher - Dashboard</title> -->

<link href="<?php echo base_url(); ?>resources/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>resources/css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>resources/css/styles.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ; ?>resources/css/w2ui-1.4.2.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url(); ?>resources/js/w2ui-1.4.2.min.js"></script>

<!--Icons-->
<script src="<?php echo base_url(); ?>resources/js/lumino.glyphs.js"></script>
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top  " role="navigation" style="background-color: white; border-bottom: #a99d9d solid 1px;">
		<div class="container-fluid">
			<div class="navbar-header" >
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a  class="navbar-brand" href="#"><img src ="<?php //echo base_url(); ?>resources/images/logo.png">
					<li class="dropdown pull-right" style="    margin-top: 4px;list-style: none;">
						<?php $user = $this->session->userdata('logged_in'); ?>
		                	<?php if ($user['logintype'] == "admin") { ?>
								<a class="navbar-brand" href="#"><span><i class="fa fa-user" aria-hidden="true">
								ADMIN</i></span></a>
							<?php }else{ ?>
								<a class="navbar-brand" href="#"><span><i class="fa fa-user" aria-hidden="true"><?php echo $user['name'] ?></i></span></a>
							<?php } ?>
						<ul class="user-menu" style="color:blue;">
							<a href="<?php echo base_url();?>index.php/Home/logout" >Logout <i class="fa fa-sign-out fa-md"> </i> </a>
					</li>
			</div>
	</nav>
</body>
</html>
