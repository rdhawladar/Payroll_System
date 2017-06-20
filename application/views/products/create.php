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
<h2>Add Product</h2>
  <?php if(validation_errors()==TRUE){?>
    <div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?php echo validation_errors();?>
    </div>
    <?php }?>


  <?php echo form_open('products/create',array('class'=>'form-horizontal'));?>

        <div class="form-group">
          <label class="control-label col-sm-2">Product Name</label>
            <div class="col-lg-8">
              <input type="text" name="product_name" class="form-control" placeholder="Name" >
            </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">Brand</label>
            <div class="col-lg-4">
              <select name='brand' class="form-control">
                <?php foreach($brand as $key){?>
                      <?php if($key->status=='Active'):?>
                 <option value="<?php echo $key->id?>" class="form-control"><?php echo $key->brand_name?></option>
                      <?php endif;?>
                <?php }?>

              </select>
            
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">Category</label>
            <div class="col-lg-4">
              <select name='category' class="form-control">
                <?php foreach($category as $cat){?>
                 <option value="<?php echo $cat->id?>" class="form-control"><?php echo $cat->category_name?></option>
                <?php }?>

              </select>
            
          </div>
        </div>

         <div class="form-group form-inline has-primary">
          <label class="control-label col-sm-2" for="inputGroupSuccess3">Price</label>
            <div class="col-lg-4">
              <div class="input-group">
                <span class="input-group-addon">$</span>
                <input type="text" class="form-control" name="price" placeholder="Amount">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2">Stock(Units)</label>
              <div class="col-lg-2">
                <input type="text" name="stock" class="form-control" placeholder="Stock" >
              </div>
          </div>

        <div class="form-group">
          <label class="control-label col-sm-2">Status</label>
            <div class="col-lg-2">
              <select name="status" class="form-control">
                <option value="Active">Active</option>
                <option value="In-active">In-active</option>
                
              </select>
            </div>
        </div>

        <div class="form-group">
        <div class="col-lg-2 col-lg-offset-10">
          <input type="submit" name="submit" value="Add" class="btn btn-success "/>
        </div>
      </div>
      <?php echo form_close();?>

      
</div>
</div>
