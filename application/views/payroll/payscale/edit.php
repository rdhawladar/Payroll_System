<div class="container">
	<ul class="nav nav-tabs">

  		<li role="presentation" class="dropdown">
    		<li><a href="<?php echo base_url('payscale/view_payscale');?>"><i class="fa fa-list"></i>Manage Payscale</a></li>
  		</li>

</ul>
<div class="well">
	<?php if(validation_errors()==TRUE){?>
		<div class="alert alert-warning alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<?php echo validation_errors();?>
		</div>
		<?php }?>
		<?php
			foreach($payscale as $data){
				?>
		<?php echo form_open('payscale/edit_process',array('class'=>'form-horizontal'));?>
        <input type="text" name="gid" id="hide" value="<?php echo $data->gid;?>">

            <div>
                <h5 style="padding:5px;"><b>Grade: <?php echo $data->grade ?></b></h5>
                <h5 style="padding:5px;"><b>Designation: <?php echo $data->designation ?></b></h5>
                <input type="text" name="designation" id="" class="hide" value="<?php echo $data->designation;?>">
            </div>
			<div class="form-group">
                <label class="control-label col-sm-4">Enter Pay Scale:</label>
                <div class="col-md-4">
            	<input type="text" name="pay_scale" id="" class="form-control" placeholder="Pay Scale" value="<?php echo $data->pay_scale;?>">
            </div>

			</div>
            <div class="form-group">
                <label class="control-label col-sm-4">Enter Basic:</label>
                <div class="col-md-4">
            	<input type="text" name="basic" id="" class="form-control" placeholder="Basic" value="<?php echo $data->basic;?>">
                </div>
			</div>


		 <!--	<div class="form-group">
                <label class="control-label col-md-4">Enter HR:</label>
                <div class="col-md-4">
            	<input type="text" name="hr" id="" class="form-control" placeholder="HR" value="<?php echo $data->hr;?>">
                </div>
			</div>-->
            <div class="form-group">
            <a href="<?php echo base_url('payscale/view_payscale');?>" class="btn btn-primary btn lrg col-md-offset-8">Back</a>
            <input  type="submit" name="sumbit" class="btn btn-primary btn-lrg " value="Change">
            </div>
</div>

		<?php } ?>
		<?php echo form_close();?>

</div>

