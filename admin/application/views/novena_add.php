<html>
<body>
<link rel="stylesheet" href="<?php echo base_url() ; ?>resources/css/jquery-ui.css"/> 
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="container-fluid" >
		<div id="content">
			<div class="page-header">
				<div class="container-fluid">
					<h1>Add Novena</h1>
					<div class="row">
				      	<?php if(isset($success)){ ?>
							<div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?></div>
						<?php }?>
				      </div>
				</div>
				<div class="container-fluid">
					<div class="panel panel-default">
						<div class="panel-body">
			      			<?php echo form_open_multipart('novena/addNovena');?>
								
								<div class="form-group">
								    <label for="">Audio</label>
								    <input type="file" name="audio_file" value="" class="form-control" id="" placeholder="audio file">
								</div>
								    <label for="">Saint</label>
								    <!-- <input type="text" name="saint" value="" class="form-control" id="" placeholder="saint"> -->

								    <select name="saint" class="form-control">
								        <option value="1" > St.Anthony</option>
								        <option value="2" > St.Alphonsa</option>
								        <option value="3" > Mother Mary</option>
								        <option value="4" > John Paul 2</option>
								        <option value="5" > Chavarayachan</option>
								        <option value="6" > St.Joseph </option>
    								</select>
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

