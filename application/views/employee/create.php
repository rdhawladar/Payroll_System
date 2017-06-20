<?php if($position == 'Administrator'){?>
<div class="container">
	<ul class="nav nav-tabs">
 
  		<li role="presentation" class="dropdown">
    		<li><a href="<?php echo base_url('account/view_employees');?>"><i class="fa fa-list"></i> User Management</a></li>
                   
      		 <li><a href="<?php echo base_url('account/create')?>"><i class="fa fa-user-plus"> Add New Employee</i></a></li>

  		</li>
 
</ul>
	<div class="well">
		<?php if(validation_errors()==TRUE){?>
		<div class="alert alert-warning alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<?php echo validation_errors();?>
		</div>
		<?php }?>
		<?php echo form_open('account/create',array('class'=>'form-horizontal'));?>
			<div class="form-group">
				<label class="control-label col-sm-2">First Name</label>
					<div class="col-lg-8">
						<input type="text" name="fname" class="form-control" placeholder="First Name">
					</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">Middle Name</label>
					<div class="col-lg-8">
						<input type="text" name="mname" class="form-control" placeholder="Middle Name">
					</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">Last Name</label>
					<div class="col-lg-8">
						<input type="text" name="lname" class="form-control" placeholder="Last Name">
					</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">Gender</label>
					<div class="col-lg-2">
						<select name="gender" class="form-control">
							<option value="male">Male</option>
							<option value="female">Female</option>
							</select>
					</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">Grade</label>
					<div class="col-lg-8">
						<input type="text" name="grade" class="form-control" placeholder="Grade">
					</div>
			</div>
			<div class="form-group form-inline">
				<label for="selectUser" class="control-label col-sm-2" style="float:left;">Date of Birth</label>
				<?php $this->load->helper('dob');?>
					<div style="float:left;padding: 6px 12px 2px 16px;">
						<select name="year"  id="selectUser" style="width:auto;" class="form-control">
						<option value="0">Year</option><?php echo generate_options(1963,2015)?>
						</select>

						<select name="month"  id="selectUser" style="width:auto;" class="form-control">
						<option value="0">Month</option><?php echo generate_options(1,12)?>
						</select>

						<select name="day"  id="selectUser" style="width:auto;" class="form-control">
						<option value="0">Day</option><?php echo generate_options(1,31)?>
						</select>
					</div>
			</div>


			<div class="form-group">
				<label class="control-label col-sm-2">Email</label>
					<div class="col-lg-8">
						<input type="text" name="email" class="form-control" placeholder="Email">
					</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">Contact No.</label>
					<div class="col-lg-8">
						<input type="text" name="contact" class="form-control" placeholder="Contact No.">
					</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">Marital Status</label>
					<div class="col-lg-8">
						<select name="MS" class="form-control">
							<option value="married">Married</option>
							<option value="single">Single</option>
							<option value="divorced">Divorced</option>
						</select>
					</div>
			</div>

			<div class="form-group">
				<div class="col-lg-8 col-lg-offset-10">
						<input type="submit" name="sumbit" class="btn btn-primary " value="create">
				</div>
			</div>



		<?php echo form_close();?>
	</div>
</div>
<?php }else{
	redirect('user_cp');
}?>