<div class="container">
<div class="well">
	<?php if(validation_errors()==TRUE){?>
		<div class="alert alert-warning alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<?php echo validation_errors();?>
		</div>
		<?php }?>
		<?php 
			foreach($records as $data){
				?>
		<?php echo form_open('account/edit',array('class'=>'form-horizontal'));?>
		
			<input type="text" name="did" id="hide" value="<?php echo $data->empid;?>">
			<div class="form-group">
				<label class="control-label col-sm-2">First Name</label>
					<div class="col-lg-8">
						<input type="text" name="fname" class="form-control" placeholder="First Name" value="<?php echo $data->F_name;?>">
					</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">Middle Name</label>
					<div class="col-lg-8">
						<input type="text" name="mname" class="form-control" placeholder="Middle Name" value="<?php echo $data->M_name;?>">
					</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">Last Name</label>
					<div class="col-lg-8">
						<input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?php echo $data->L_name;?>">
					</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">Gender</label>
					<div class="col-lg-8">
						<input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?php echo $data->gender;?>" disabled>
					</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">Age</label>
					<div class="col-xs-2">
						<input type="text" name="age" class="form-control" placeholder="Age" value="<?php 
						$odob = date('Y',strtotime($data->DOB));
						$dtod = date('Y');


						echo  $age = $dtod-$odob;?>" disabled>
					</div>
			</div>

			<div class="form-group form-inline">
				<label class="control-label col-sm-2">Date of Birth</label>
					<div class="col-xs-2">
						<input type="text" name="age" class="form-control" placeholder="" value="<?php echo date('M.d,Y',strtotime($data->DOB));?>" disabled>
					</div>
			</div>

			<div class="form-group"> 
				<label class="control-label col-sm-2">Email</label>
					<div class="col-lg-8">
						<input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $data->email;?>">
					</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">Contact No.</label>
					<div class="col-lg-8">
						<input type="text" name="contact" class="form-control" placeholder="Contact No." value="<?php echo $data->Contacts;?>">
					</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" style="float:left;">Marital Status</label>
					<div class="col-sm-4">
					 	<select name="MS" class="form-control">
					 		<option value="<?php echo $data->MS;?>">(Current)<?php echo $data->MS;?></option>
					 	<?php if($data->MS=='married'){?>
					 		<option value="single">Single</option>
							<option value="divorced">Divorced</option>
						<?php }elseif($data->MS=='single'){?>
							<option value="married">Married</option>
							<option value="divorced">Divorced</option>
						<?php }elseif($data->MS=='divorced'){?>
							<option value="single">Single</option>
							<option value="married">Married</option>
							<?php } ?>
						</select>
					</div>
			</div>


			
			<div class="form-group">
				<label class="control-label col-sm-2" style="float:left;">Position</label>
					<div class="col-lg-8">
					 	<input type="text" value="<?php echo $data->position?>" class="form-control" disabled/>
					</div>
			</div>

			<div class="form-group">
				<div class="col-lg-8 col-lg-offset-10">
						<input type="submit" name="sumbit" class="btn btn-primary " value="Submit">
				</div>
			</div>

			

		<?php } ?>

		<?php echo form_close();?>
		<h1>Change Password</h1>
		<?php echo form_open('account/change_password',array('class'=>'form-horizontal'));?>
		<input type="text" name="did" id="hide" value="<?php echo $data->empid;?>">
			
		<div class="form-group">
				<label class="control-label col-sm-2">New Password</label>
					<div class="col-lg-8">
						<input type="password" name="password" class="form-control" placeholder="Password">
					</div>
			</div>

		
			<div class="form-group">
				<div class="col-lg-8 col-lg-offset-10">
						<input type="submit" name="sumbit" class="btn btn-primary " value="Change">
				</div>
			</div>

		<?php echo form_close();?>

	</div>
</div>

