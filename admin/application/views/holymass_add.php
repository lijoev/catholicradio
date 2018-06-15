<html>
<body>
<link rel="stylesheet" href="<?php echo base_url() ; ?>resources/css/jquery-ui.css"/> 
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="container-fluid" >
		<div id="content">
			<div class="page-header">
				<div class="container-fluid">
					<h1>Add Holymass</h1>
					<div class="row">
				      	<?php if(isset($success)){ ?>
							<div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?></div>
						<?php }?>
				      </div>
				</div>
				<div class="container-fluid">
					<div class="panel panel-default">
						<div class="panel-body">
			      			<?php echo form_open_multipart('holymass/addHolymass');?>
								<div class="form-group">
									<label for="">Holymass Rite</label>
								    <!-- <input type="text" name="holymass_rite" value="<?php echo $program_name ?>"  class="form-control" id="" placeholder="Holymass Rite"> -->

								    <select name="holymass_rite" class="form-control">
								        <option value="malankara" > Malankara</option>
								        <option value="lattin" > Lattin</option>
								        <option value="roman catholic" > Roman Catholic</option>
    								</select>


								</div>
								<div class="form-group">
								    <label for="">Audio</label>
								    <input type="file" name="audio_file" value="<?php echo $program_time ?>" class="form-control" id="" placeholder="Program Time">
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

