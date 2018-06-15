<html>
<body>
<link rel="stylesheet" href="<?php echo base_url() ; ?>resources/css/jquery-ui.css"/> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<style>
.fa{
	color: white;
}

.btn {
    display: inline-block !important;
    margin-bottom: 0 !important;
    font-weight: normal !important;
    text-align: center !important;
    vertical-align: middle !important;
    touch-action: manipulation !important;
    cursor: pointer !important;
    background-image: none !important;
    border: 1px solid transparent !important;
    white-space: nowrap!important;
    padding: 8px 13px !important;
    font-size: 12px !important;
    line-height: 1.42857 !important;
    border-radius: 3px !important;
    -webkit-user-select: none !important;
    -moz-user-select: none !important;
    -ms-user-select: none !important;
    user-select: none !important;
}
button.btn {
    display: inline-block;
    border-radius: 4px;
    margin: 2px 4px;
    padding: 8px 1px 12px 0px!important;
    color: #666;
    font-size: 15px!important;
    border: 1px solid #B6B6B6;
    background-image: -webkit-linear-gradient(#fff 0,#e7e7e7 100%);
    background-image: -moz-linear-gradient(#fff 0,#e7e7e7 100%);
    background-image: -ms-linear-gradient(#fff 0,#e7e7e7 100%);
    background-image: -o-linear-gradient(#fff 0,#e7e7e7 100%);
    background-image: linear-gradient(#fff 0,#e7e7e7 100%);
    filter: progid:dximagetransform.microsoft.gradient(startColorstr='#ffe7e7e7', endColorstr='#ffffffff', GradientType=0);
    outline: 0;
    box-shadow: 0 1px 0 #fff;
    cursor: default;
    min-width: 83px;
    line-height: 100%!important;
    user-select: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    -o-user-select: none;
    -webkit-tap-highlight-color: rgba(0,0,0,0);
}
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

	<div class="container-fluid" >
		<div id="content">
			<div class="page-header">
			
				<div class="container-fluid">
					<h1>Edit About Us</h1>
					<div class="row">
				      	<?php //if(isset($success)){ ?>
							<!-- <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php //echo $success; ?></div> -->
						<?php //}?>
				      </div>
				</div>
				<div class="container-fluid">
					<div class="panel panel-default">
						<div class="panel-body">
			      			<form action="<?php echo base_url(); ?>/index.php/Homescroll/editHomescroll" enctype="multipart/form-data" method="post" name = "homescroll_text">
								
								<div class="form-group">
								    <label for="">Home Scroll</label>
								    <input type="text" name="homescroll" value="<?php echo $homescroll ?>" class="form-control" id="" placeholder="Home Scroll text">
								</div>
								<button type="submit" data-toggle="tooltip" title="Save" class="btn btn-primary pull-right"><i class="fa fa-save"></i></button>
							</form>
						</div>
			    	</div>
		    	</div>
			</div>
		</div>
	</div>
</div>
	<script src="<?php echo base_url(); ?>resources/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url(); ?>resources/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>resources/js/jquery-1.9.1.js"></script> 
	<script src="<?php echo base_url(); ?>resources/js/jquery-ui.js"></script>

<script type="text/javascript">
            $(function() {
                $("#datepicker").datepicker({
                    minDate : 0,
                    dateFormat: 'yy-mm-dd'
                });
                
            });
</script>
</body>
</html>

