<html>
<body>
<link rel="stylesheet" href="<?php echo base_url() ; ?>resources/css/jquery-ui.css"/> 
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="container-fluid" >
		<div id="content">
			<div class="page-header">
				<div class="container-fluid">
					<h1>Add Program</h1>
					<div class="row">
				      	<?php if(isset($success)){ ?>
							<div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?></div>
						<?php }?>
				      </div>
				</div>
				<div class="container-fluid">
					<div class="panel panel-default">
						<div class="panel-body">
			      			<form action="<?php echo $action ; ?>" enctype="multipart/form-data" method="post" name = "payment">
								<div class="form-group">
									<label for="">Program Name</label>
								    <input type="text" name="program_name" value="<?php echo $program_name ?>"  class="form-control" id="" placeholder="Program Name">
								</div>
								<div class="form-group">
								    <label for="">Program Time</label>
								    <input type="text" name="program_time" value="<?php echo $program_time ?>" class="form-control" id="" placeholder="Program Time">
								</div>
								<div class="form-group">
								    <label for="">Program Details</label>
								    <input type="text" name="details" value="<?php echo $details ?>" class="form-control" id="" placeholder="Program Details">
								</div>
								<button type="submit" class="btn btn-default" value="upload" >Submit</button>
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

