<?php if($position == 'Administrator'){?>
<div class="container">
	<ul class="nav nav-tabs">
 
  		<li role="presentation" class="dropdown">
    		<li><a href="<?php echo base_url('account/view_employees');?>"><i class="fa fa-list"></i> User Management</a></li>
                   
      		 <li><a href="<?php echo base_url('account/create')?>"><i class="fa fa-user-plus"> Add New Employee</i></a></li>
                      
  		</li>
 
</ul>
	<div class="panel panel-success">

		<div class="panel-heading">List of Employees </div>
		<?php echo form_open('account/update_status');?>
			<table class="table table-hover text-center">
				<tr>
				
				<td>
				Option<br>
				<input type="checkbox" id='selecctall' />Select all &nbsp
				<input type="radio" name="status" value="Active"/>Active &nbsp
				<input type="radio" name="status" value="In-active"/>In-active
				</td>
				<td>Position</td>
				<td>Name(LN, FN MN)</td>
				<td>Applied Since</td>
				<td>Status</td>
				<td>Action</td>
				</tr>

		
			<?php foreach ($results as $data) {?>
			
				<tr>
				<td><input type="checkbox" class="checkbox1" name="emp_status[]" id="emp_status[]" value="<?php echo $data->empid;?>"/></td>
				<td><?php echo $data->position;?></td>
				<td><?php echo $data->L_name;?>,<?php echo $data->F_name;?> <?php echo $data->M_name;?></td>
				<td><?php echo $data->date_applied;?></td>
				<td>
					<?php if($data->status == 'Active'){?>
						<span class="label label-success"><?php echo $data->status;?></span>
					<?php }else{ ?>
						<span class="label label-danger"><?php echo $data->status;?></span>
					<?php } ?>
				</td>
				<td>
				<a href="<?php echo base_url('account/edit_employee/'.$data->empid);?>" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-2x"></i></a>&nbsp;
					</tr>
			<?php }?>
			<tr>
				<td><input type="submit" value="Update" class="btn btn-info btn-sm"></td>
				<td>Position</td>
				<td>Name(LN, FN MN)</td>
				<td>Applied Since</td>
				<td>Status</td>
				<td>Action</td>
				</tr>

			</table>
			
		<p><?php echo $links;?></p>
			
	</div>


</div>
<?php }else{
	redirect('user_cp');
}?>