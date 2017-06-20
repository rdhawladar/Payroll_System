<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>TMSS Payroll</title>

   
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap/css/logo-nav.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css')?>" rel="stylesheet">

   
  </head>

  <body>
<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-success">
  			<div class="panel-heading">
                               
				<h4>Login</h4></div>
  				<div class="panel-body">
				<?php $get_error = validation_errors();
				if($get_error==true){
				echo "<div class='alert alert-danger text-center'>";
				echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times";
				echo "</span></button>";
				echo $get_error;
				echo "</div>";


				}	?>

				<?php $new_pass = $this->session->flashdata('message');
				if($new_pass==true){
				echo "<div class='alert alert-info text-center'>";
				echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times";
				echo "</span></button>";
				echo $new_pass;
				echo "</div>";


				}	?>
				<?php echo form_open('',array('class' => 'form-horizontal' ));?>
					<div class="form-group">
					<label class="col-sm-3 control-label">E-mail:</label>
						<div class="col-xs-12 col-md-8">
						<input type="text"  name="email" placeholder="E-mail"class="form-control"/>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Password:</label>
						<div class="col-xs-12 col-md-8">
						<input type="password" name="password" placeholder="Password" class="form-control"/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12 col-xs-offset-7">
						<input type="submit" name="log-in" value="log-in" class="btn btn-success"/> 
						<a href="#myModal" data-toggle="modal" >Forgot Password!</a> 
						 </div>
					</div>
				<?php echo form_close();?>
				</div>
				<div class="panel-footer panel-success"><h5 style="">TMSS ICT</h5></div>
			</div>    
		</div>
	</div>
</div>


<script src="<?php echo base_url('assets/bootstrap/js/jquery.js');?>"></script>
 	<script src="<?php echo base_url('assets/bootstrap/js/site.js');?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
</body>
</html>