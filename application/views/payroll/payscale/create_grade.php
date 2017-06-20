<?php if($position == 'Administrator'){?>
<div class="container">
	<ul class="nav nav-tabs">
 
  	   	<li role="presentation" class="dropdown">
    		<li><a href="<?php echo base_url('payscale/view_payscale');?>"><i class="fa fa-list"></i>Manage Payscale</a></li>
    		 <li><a href="<?php echo base_url('payscale/create_grade')?>"><i class="fa fa-user-plus"> Add New Grade</i></a></li>

  		</li>
    </ul>
	<div class="well">
	<?php if(validation_errors()==TRUE){?>
		<div class="alert alert-warning alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<?php echo validation_errors();?>
		</div>
		<?php }?>
		<?php echo form_open('payscale/create_grade',array('class'=>'form-horizontal'));?>
        <input type="text" name="gid" id="hide" value="">
            <div class="form-group">
                <label class="control-label col-sm-4">Enter Grade:</label>
                <div class="col-md-4">
            	<input type="text" name="grade" id="" class="form-control" placeholder="Grade" value="<?php //echo $data->pay_scale;?>">
                </div>
			</div>
            <div class="form-group">
                <label class="control-label col-sm-4">Designation:</label>
                <div class="col-md-4">
            	<input type="text" name="designation" id="" class="form-control" placeholder="Designation" value="<?php //echo $data->pay_scale;?>">
                </div>
			</div>
			<div class="form-group">
                <label class="control-label col-sm-4">Enter Pay Scale:</label>
                <div class="col-md-4">
            	<input type="text" name="pay_scale" id="" class="form-control" placeholder="Pay Scale" value="<?php //echo $data->pay_scale;?>">
                </div>
			</div>
            <div class="form-group">
                <label class="control-label col-sm-4">Enter Basic:</label>
                <div class="col-md-4">
            	<input type="text" name="basic" id="" class="form-control" placeholder="Basic" value="<?php //echo $data->basic;?>">
                </div>
			</div>


			<!--<div class="form-group">
                <label class="control-label col-md-4">Enter HR:</label>
                <div class="col-md-4">
            	<input type="text" name="hr" id="" class="form-control" placeholder="HR" value="<?php //echo $data->hr;?>">
                </div>
			</div>-->
            <div class="form-group">
            <a href="<?php echo base_url('payscale/view_payscale');?>" class="btn btn-primary btn lrg col-md-offset-8">Cancel</a>
            <input  type="reset" name="reset" class="btn btn-primary btn-lrg " value="Reset">
            <input  type="submit" name="sumbit" class="btn btn-primary btn-lrg " value="Create">
            </div>
		<?php echo form_close();?>
    </div>



        <?php }
    else{
    	redirect('user_cp');
    }?>
</div>

