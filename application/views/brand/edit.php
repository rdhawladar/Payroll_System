<div class="container">
<ul class="nav nav-tabs">
 		<li><a href="<?php echo base_url('account/inventory')?>"><i class="fa fa-home"></i> Home</a></li>
       
  	<li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
      Brands <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu">
       <li><a href="<?php echo base_url('brands')?>"><i class="fa fa-simplybuilt"></i> Manage Brands</a></li>
       <li><a href="<?php echo base_url('brands/create')?>"><i class="fa fa-simplybuilt"></i> Add New Brands</a></li>
   	</ul>
  </li>
 		<li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
      Products <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu">
    	<li><a href="<?php echo base_url('products')?>"><i class="fa fa-simplybuilt"></i> Manage Products</a></li>
	<li><a href="<?php echo base_url('products/create');?>"><i class="fa fa-simplybuilt"></i> Add New Products</a></li>

    </ul>
  </li>

  <li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
      Category <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu">
    	<li><a href="<?php echo base_url('categories');?>"><i class="fa fa-simplybuilt"></i> Manage Category</a></li>
		<li><a href="<?php echo base_url('categories/create');?>"><i class="fa fa-simplybuilt"></i> Add New Category</a></li>

    </ul>
  </li>

</ul>
	<div class="well">
	<h2>Edit Brand</h2>
	<?php if(validation_errors()==TRUE){?>
		<div class="alert alert-warning alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<?php echo validation_errors();?>
		</div>
		<?php }?>
		<?php 
			foreach($records as $data){
				?>
		<?php echo form_open('brands/edit',array('class'=>'form-horizontal'));?>
		
			<input type="text" name="did" id="hide" value="<?php echo $data->id;?>">
			<div class="form-group">
				<label class="control-label col-sm-2">Brand Name</label>
					<div class="col-lg-8">
						<input type="text" name="brand_name" class="form-control" placeholder="" value="<?php echo $data->brand_name;?>">
					</div>
			</div>


			<div class="form-group form-inline">
				<label class="control-label col-sm-2" style="float:left;">Status</label>
					<div class="col-sm-4">
					  <div class="input-group">
						<div class="input-group-addon"><?php echo $data->status;?></div>
								<select name="status" class="form-control">
								<option value="<?php echo $data->status;?>"><?php echo $data->status;?></option>
					 			<?php if($data->status=='In-active'){?>
								<option value="Active">Active</option>
								<?php }else{?>
								<option value="In-active">In-active</option>
								<?php }?>
							</select>
						</div>
					</div>
			</div>
		

		
	
		
			<div class="form-group">
				<div class="col-lg-8 col-lg-offset-10">
						<input type="submit" name="sumbit" class="btn btn-primary " value="Submit">
				</div>
			</div>

		<?php } ?>

		<?php echo form_close();?>

		
	</div>
</div>

