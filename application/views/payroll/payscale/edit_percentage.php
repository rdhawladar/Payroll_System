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
			foreach($percentage as $data){
				?>
		<?php echo form_open('payscale/edit_process_percentage',array('class'=>'form-horizontal'));?>
        <input type="text" name="per_item" id="hide" value="<?php echo $data->item;?>">

            <div>
                <h5 style="padding:5px;"><b>Column Name: <?php echo ucfirst($data->item) ?></b></h5>
                <h5 style="padding:5px;"><b>Percentage: <?php echo $data->percent ?></b></h5>
            </div>
			<div class="form-group">
                <label class="control-label col-sm-4">Enter Percent based on basic:</label>
                <div class="col-md-4">
            	<input type="text" name="percent" id="" class="form-control" placeholder="Percentage" value="<?php echo $data->percent;?>">
                </div>

			</div>
            <a href="<?php echo base_url('payscale/view_payscale');?>" class="btn btn-primary btn lrg col-md-offset-8">Back</a>
            <input  type="submit" name="sumbit" class="btn btn-primary btn-lrg" value="Change">
</div>

		<?php } ?>
		<?php echo form_close();?>


	</div>
</div>

