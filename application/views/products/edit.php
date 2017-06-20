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
<h2>Edit Product</h2>
 <?php 
      foreach($records as $data){
        ?>
    <?php echo form_open('products//edit',array('class'=>'form-horizontal'));?>
    
     <input type="text" name="did" id="hide" value="<?php echo $data->pid;?>">
      <div class="form-group">
        <label class="control-label col-sm-2">Product Name</label>
          <div class="col-lg-8">
            <input type="text" name="product_name" class="form-control" value="<?php echo $data->product_name;?>" disabled>
          </div>
      </div>


   <div class="form-group form-inline">
        <label class="control-label col-sm-2" style="float:left;">Category</label>
          <div class="col-sm-4">
            <div class="input-group">
            <div class="input-group-addon"><?php echo $data->category_name;?></div>
              <select name="category" class="form-control">
              <option value="<?php echo $data->cid;?>"><?php echo $data->category_name;?></option>
                <?php foreach ($category as $key) {
                    if($data->cid==$key->id){}else{?>
                  <option value="<?php echo $key->id;?>"><?php echo $key->category_name;?></option>
                  <?php } }?>
                </select>
            </div>
          </div>
      </div>


    <div class="form-group form-inline">
        <label class="control-label col-sm-2">Brands</label>
         <div class="col-sm-4">
            <div class="input-group">
              <div class="input-group-addon"><?php echo $data->brand_name;?></div>
               <select name="brand" class="form-control">
                    <option value="<?php echo $data->bid;?>"><?php echo $data->brand_name;?></option>
                    <?php foreach($brand as $bnd) {?>
                    <?php if($bnd->brand_name==$data->brand_name) 
                     {}else{?>
                  <option value="<?php echo $bnd->id;?>"><?php echo $bnd->brand_name;?></option>
                  <?php } }?>
                </select>
            </div>
          </div>
      </div>


       <div class="form-group">
        <label class="control-label col-sm-2">Stock(Units) Current:</label>
         <div class="col-sm-2">
            <div class="input-group">
              <div class="input-group-addon"> <?php echo $data->Quantity;?></div>
              <input type="text" name="cstock" id="hide" value=" <?php echo $data->Quantity;?>">
            <input type="text" name="stock" class="form-control" >
            </div>
          </div>
      </div>

       <div class="form-group">
        <label class="control-label col-sm-2">price</label>
          <div class="col-sm-2">
            <div class="input-group">
              <div class="input-group-addon"><?php echo $data->price;?></div>
                 <input type="text" name="price" class="form-control" value="<?php echo $data->price;?>">
            </div>
           
          </div>
      </div>

     <div class="form-group form-inline">
        <label class="control-label col-sm-2">Status</label>
         <div class="col-sm-4">
            <div class="input-group">
              <div class="input-group-addon"><?php echo $data->pstats;?></div>
                <select name="status" class="form-control">
                    <option value="<?php echo $data->pstats;?>"><?php echo $data->pstats;?></option>
                    <?php if($data->pstats=='In-active'){?>
                    <option value="Active">Active</option>
                    <?php }else{?>
                    <option value="In-active">In-active</option>
                    <?php }?>
                </select>
            </div>
          </div>
      </div>
    
       <div class="form-group">
        <div class="col-lg-2 col-lg-offset-10">
          <input type="submit" name="submit" value="Update" class="btn btn-success "/>
        </div>
      </div>
    <?php } ?>
           
  <?php echo form_close();?> 

  
</div>
</div>