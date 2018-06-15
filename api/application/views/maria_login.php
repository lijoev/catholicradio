
<!DOCTYPE HTML>
<html>
<head>
<title>Radio Maria | Login</title>
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

<!--web-fonts-->
<link href='//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
<!--web-fonts-->
</head>
<body>
      <div class="main">
        <div class="login">
          <div class="">
            <!-- <img src="<?php //Secho base_url(); ?>assets/images/logo.png"> -->
          </div>
          
           

          <div class="login-bottom">

           <?php
            $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");

            echo form_open("login/index", $attributes);

            ?>
            <div style="    margin-bottom: 10px;">
              <input type="text" id="txt_username" name="txt_username" placeholder="Username" type="text" value="<?php echo set_value('txt_username'); ?>">
             <span class="text-danger"><?php echo form_error('txt_username'); ?></span>    
            </div>
            <div style="    margin-bottom: 10px;">
               <input class="form-control" id="txt_password" name="txt_password" placeholder="Password" type="password" value="<?php echo set_value('txt_password'); ?>" />
              <span class="text-danger"><?php echo form_error('txt_password'); ?></span>      
            </div>     
               
            <input id="btn_login" name="btn_login" type="submit" class="btn btn-default" value="Login">
          <?php echo form_close(); ?>
          <?php echo $this->session->flashdata('msg'); ?>
          <!-- <a href="#"><p>Forgot your password? Click Here</p></a> -->
          </div>
        </div>
      </div>
    

</body>
</html>

