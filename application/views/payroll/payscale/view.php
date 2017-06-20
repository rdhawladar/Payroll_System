
<?php if($position == 'Administrator'){?>
<div class="container" xmlns:width="http://www.w3.org/1999/xhtml">
	<ul class="nav nav-tabs">

  		<li role="presentation" class="dropdown">
    		<li><a href="<?php echo base_url('payscale/view_payscale');?>"><i class="fa fa-list"></i>Manage Payscale</a></li>
      		 <li><a href="<?php echo base_url('payscale/create_grade')?>"><i class="fa fa-user-plus"> Add New Grade</i></a></li>

  		</li>

</ul>
	<div class="panel-payscale panel-success" style="background:     ">

        <div class="panel-heading">Pay Scale 2014</div>
		<?php
        // echo form_open('account/update_status');
        //percentage initializaiton
//        $medval = $this->db->where('item','%med%');
         $this->db->where('item','medical');
                      $medval = $this->db->get('percentage')->result_array();
                      foreach($medval as $row12):
                      $med_per = $row12['percent'];
                      $med_item = $row12['item'];
                      endforeach;
          $this->db->where('item','conveyance');
                      $conval = $this->db->get('percentage')->result_array();
                      foreach($conval as $row12):
                      $con_per = $row12['percent'];
                      $con_item = $row12['item'];
                      endforeach;
         $this->db->where('item','cpf');
                      $conval = $this->db->get('percentage')->result_array();
                      foreach($conval as $row12):
                      $cpf_per = $row12['percent'];
                      $cpf_item = $row12['item'];
                      endforeach;
        $this->db->where('item','gia');
                      $conval = $this->db->get('percentage')->result_array();
                      foreach($conval as $row12):
                      $gia_per = $row12['percent'];
                      $gia_item = $row12['item'];
                      endforeach;
        $this->db->where('item','bf');
                      $conval = $this->db->get('percentage')->result_array();
                      foreach($conval as $row12):
                      $bf_per = $row12['percent'];
                      $bf_item = $row12['item'];
                      endforeach;

        $ded_cpf_tmss = 20;
        $ded_cpf_self = 20;
        $ded_gia_tmss = 20;
        $ded_gia_self = 20;
        $ded_bf_tmss = 20;
        $ded_bf_self = 20;
       // $query = $this->db->query('SELECT * FROM percentage');
        ?>
			<table class="table_payscale table table-hover text-center table-responsive" border="2" align="center">

				<tr style="border:1px solid white;">
				<th>Grade</th>
				<th>Designation</th>
				<th><abbr>Pay Scale</abbr></th>
				<th>Basic</th>
				<th><a href="<?php echo base_url('payscale/edit_percentage/'.$med_item);?>" class="btn btn-warning btn-sm">House Rent</a></th>
				<th><a href="<?php echo base_url('payscale/edit_percentage/'.$med_item);?>" class="btn btn-warning btn-sm">Medical (<?php echo $med_per ?>%)</a></th>
				<th><a href="<?php echo base_url('payscale/edit_percentage/'.$con_item);?>" class="btn btn-warning btn-sm">Conveyance (<?php echo $con_per ?>%)</a></th>
                <th><a href="<?php echo base_url('payscale/edit_percentage/'.$cpf_item);?>" class="btn btn-warning btn-sm">CPF (<?php echo $cpf_per ?>%)</a></th>
				<th><a href="<?php echo base_url('payscale/edit_percentage/'.$gia_item);?>" class="btn btn-warning btn-sm">GIA (<?php echo $gia_per ?>%)</a></th>
				<th><a href="<?php echo base_url('payscale/edit_percentage/'.$bf_item);?>" class="btn btn-warning btn-sm">BF (<?php echo $bf_per ?>%)</a></th>
				<th><pre>Gross Total</pre></th>
                <th><a href="" class="btn btn-warning btn-sm">Deduction CPF TMSS (10%)</a></th>
				<th><a href="" class="btn btn-warning btn-sm">Deduction CPF Own (5%)</a></th>
				<th><pre>Deduction CPF Total</pre></th>
				<th><a href="" class="btn btn-warning btn-sm">Deduction GIA TMSS (1%)</a></th>
				<th><a href="" class="btn btn-warning btn-sm">Deduction GIA Own (.5%)</a></th>
				<th><pre>Deduction GIA Total</pre></th>
				<th><a href="" class="btn btn-warning btn-sm">Deduction BF TMSS (1%)</a></th>
				<th><a href="" class="btn btn-warning btn-sm">Deduction BF Own (.5%)</a></th>
				<th><pre>Deduction BF Total</pre></th>
				<th><pre>Deduction Total</pre></th>
				<th><pre>Net Pay</pre></th>
              </tr>
            <?php


            foreach ($results as $data)

                {   /*     $per = $this->input->post('percentage');
                    $temp = $data->basic;
                $med = $temp*($per/100);*/
            ?>
				<tr>


				<td><?php echo $data->grade; ?></td>
				<td><?php echo $data->designation;?></td>
				<td><?php echo $data->pay_scale;?></td>
				<td><?php echo $data->basic ;?></td>
				<td><?php echo $data->hr; ?></td>
				<td><?php echo $data->medical?></td>
				<td><?php echo $data->conveyance;?></td>
				<td><?php echo $data->cpf;?></td>
				<td><?php echo $data->gia;?></td>
				<td><?php echo $data->bf;?></td>
				<td><?php echo $data->gross_total;?></td>
				<td><?php echo $data->ded_cpf_tmss;?></td>
				<td><?php echo $data->ded_cpf_self;?></td>
                <td><?php echo $data->ded_cpf_total;?></td>
                <td><?php echo $data->ded_gia_tmss;?></td>
                <td><?php echo $data->ded_gia_self;?></td>
                <td><?php echo $data->ded_gia_total;?></td>
                <td><?php echo $data->ded_bf_tmss;?></td>
                <td><?php echo $data->ded_bf_self;?></td>
                <td><?php echo $data->ded_bf_total;?></td>
				<td><?php echo $data->ded_total;?></td>
				<td><?php echo $data->net_pay;?></td>
                <td>

				<a href="<?php echo base_url('payscale/edit_payscale/'.$data->grade);?>" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-2x"></i></a>

                </td>
                <td>
  				<a href="<?php echo base_url('payscale/del_payscale/'.$data->grade);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-2x"></i></a>
                </td>
                </tr>
			<?php }
            ?>

			</table>

		<p><?php echo $links;?></p>
	</div>
</div>
<?php }else{
	redirect('user_cp');
}?>
