<div class="container">
	<div class="well">
		<div class="row">

		<?php
		$message = $this->session->flashdata('message');
		if($message==TRUE):?>
		<span class="alert alert-success"><?php echo $message?></span><br>

	<?php endif;?>
			<?php if($position == 'Administrator'):?>
					<div class="dropdown">
					  <?php echo form_open_multipart('payroll/upload');?>
					
		                             <a class="dropdown-toggle" data-toggle="dropdown" href="#">
		                                Upload Yearly Payroll <i class="fa fa-upload fa-1x"></i></a>
		                                <ul class="dropdown-menu">
		                                 <li role="presentation"><input type="file" name="userfile" size="20" /></li>
					    				 <li role="presentation"><input type="submit" value="Upload" class="btn btn-success btn-sm" style="float:right;"/></li>
		                                </ul>
		             
					  <?php echo form_close(); ?>
					</div>
				
			  <?php endif;?>       	
		
	    <?php echo form_open('payroll/search', array('method' => 'GET', 'role' => 'Search')); ?>
			
				<div class="col-md-4">
					<p>Please input ID of the Employee</p>
			   	</div>
			
				<div class="col-md-8">
			   		<?php echo form_input('keyword', $this->input->get('keyword'), 'class="form-control" placeholder="Search"'); ?>
			   	</div>
						
		<?php echo form_close(); ?>
		

		<div>
	</div>
</div>