 <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
 <link rel="stylesheet" href="<?php //echo base_url()?>resources/css/buttons.dataTables.min.css">
 
 -->
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<title>Program List</title>
<style type="text/css">
	a.buttons-colvis{
			position: relative;
    display: inline-block;
    box-sizing: border-box;
    margin-right: 0.333em;
    padding: 0;
    border: none;
    border-radius: 2px;
    cursor: pointer;
    font-size: 0.88em;
    white-space: nowrap;
    overflow: hidden;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    text-decoration: none;
    outline: none;
        background: #609ad4 ;
    border-color: #609ad4;
        padding: 5px 10px;
    font-size: 12px;
    line-height: 1.5;
    border-radius: 3px;
    color: #fff;
	}
	a.buttons-colvis:hover{
		background-color: #609ad4;
    border-color: #609ad4;
	}
	#table{
		background-color: #dae6f3;
	}
	.btn-danger {
    color: #fff !important;
    background-color: #f56b6b !important;
    border-color: #f24545 !important;
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
    margin: 0 5px;
    padding: 13px 1px 7px 3px!important;
    color: #666;
    font-size: 12px!important;
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
    min-width: 42px;
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
	  	<h2></h2>
		<div class="panel panel-default">
			<div class="pull-right"><a href="<?php echo base_url(); ?>/index.php/Programlist/addProgram" data-toggle="tooltip" title="add" class="btn btn-primary"><i class="fa fa-plus"></i></a>
            <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('are you sure') ? $('#form-product').submit() : false;"><i class="fa fa-trash"></i></button>
            
            

      </div>
		</div> 
	</div>
	<div class="panel-body">
		<div class="row">
			<form action="<?php echo base_url(); ?>/index.php/Programlist/deleteProgram" method="post" enctype="multipart/form-data" id="form-product">
				<div class="table-responsiv">
				    <table class="table table-bordered" id="booklist" class="" cellspacing="0" width="100%">
					    <thead>
						  <tr id = "table">
	 						<td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
					          <td>Program Name</td>
					          <td>Program Time</td>
					          <td>Program Details</td>
					          <td>Action</td>         
						  </tr>
					    </thead>
					    <tbody>
							<tr>
						    	<?php $i = 1; ?>
						    	<?php foreach ($program_lists as  $program_list) { ?>
						    	
						        <td class="text-center"><?php if (isset($selected) && in_array($program_list['id'], $selected)) { ?>
				                    <input type="checkbox" name="selected[]" value="<?php echo $program_list['id']; ?>" checked="checked" />
				                    <?php } else { ?>
				                    <input type="checkbox" name="selected[]" value="<?php echo $program_list['id']; ?>" />
				                    <?php } ?>
			                    </td>
						        
						        <td><?php echo $program_list['program_name'] ?></td>
								<td><?php echo $program_list['program_time'] ; ?></td>
						        <td><?php echo $program_list['details'] ; ?></td>
						        <td class="text-right"><a href="<?php echo base_url(); ?>/index.php/Programlist/editProgram?id=<?php echo $program_list['id'];?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
							</tr>
							  
							<?php } ?>
					    </tbody>
				  	</table>
				</div>
			</form>
		</div>
	</div>
</div>

 	<!-- <script src="<?php //echo base_url(); ?>resources/js/jquery-1.11.1.min.js"></script>
	<script src="<?php //echo base_url(); ?>resources/js/bootstrap.min.js"></script>
	<script src="<?php //echo base_url(); ?>resources/js/jquery.dataTables.js"></script>
	<script src="<?php //echo base_url(); ?>resources/js/jquery.nicescroll.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
	<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
	<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"></script> -->
					

</body>	
</html>


