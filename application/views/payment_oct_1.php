<div class="container">
<div class="panel panel-success panel-heading"><?php?> Regular Payment for ICT Department</div>
<div class="table-responsive">

		<?php
        // echo form_open('account/update_status');
        //percentage initializaiton
        // $medval = $this->db->where('item','%med%');

                                 foreach ($rr as $data) {
                                              echo $data['percent']."<br>";
                                 }
                                 foreach ($results as $datas) {
                                              echo $datas['id'].$datas['grade']."<br>";
                                 }
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
        $query = $this->db->query('SELECT * FROM percentage');

        ?>
        <table class="table_payscale table table-hover text-center" border="2" align="center">

				<tr style="border:1px solid white;">
                <th><pre><input type="checkbox" id='selecctall' /></pre></th>
                <th><pre>ID</pre></th>
                <th><pre>Designation</pre></th>
                <th><pre>Pay Scale</pre></th>
                <th><pre>Basic</pre></th>
                <th><pre>House Rent</pre></th>
                <th><pre>Medical</pre></th>
                <th><pre>Conveyance</pre></th>
                <th><pre>CPF</pre></th>
                <th><pre>GIA</pre></th>
                <th><pre>BF</pre></th>
                <th><pre>Gross Total</pre></th>
                <th><pre>Deduction CPF TMSS</pre></th>
                <th><pre>Deduction CPF Own</pre></th>
                <th><pre>Deduction CPF Total</pre></th>
                <th><pre>Deduction GIA TMSS</pre></th>
                <th><pre>Deduction GIA Own</pre></th>
				<th><pre>Deduction GIA Total</pre></th>
                <th><pre>Deduction BF TMSS</pre></th>
                <th><pre>Deduction BF Own</pre></th>
				<th><pre>Deduction BF Total</pre></th>
				<th><pre>Deduction Total</pre></th>
				<th><pre>Net Pay</pre></th>
              </tr>

            <?php
       echo form_open('');
         if($results){
            foreach ($results as $data)
                {
                 $paydata[] = array(
                        /*     $per = $this->input->post('percentage');
                        $temp = $data->basic;
                    $med = $temp*($per/100);*/
                    /*gross*/
                          "basic" =>$basic = $data->basic,
                          "account_id" =>$id = $data->id
                          );
                          $grade = $data->grade;
                          //hr calculation
                          if($grade==1)
                            $hr=$data->basic*.95;
                          else if($grade==2)
                            $hr=$data->basic*.90;
                          else if($grade==3)
                            $hr=$data->basic*.85;
                          else if($grade>=4 & $grade<=7)
                            $hr=$data->basic*.80;
                          else if($grade>=8 & $grade<=25)
                            $hr=$data->basic*.50;
                          else echo "Error fatching...";

                          $medical = $basic *$med_per/100;
                          $conveyance = $basic *$con_per/100;
                          $cpf = $basic *$cpf_per/100;
                          $gia = $basic *$gia_per/100;
                          $bf = $basic *$bf_per/100;
                          $gross_total = $basic + $hr + $medical +$conveyance+$cpf+$gia+$bf;
                    /*deduction*/
                          $ded_cpf_tmss = $basic*.1;
                          $ded_cpf_self = $basic *.05;
                          $ded_cpf_total = $ded_cpf_tmss+ $ded_cpf_self;

                          $ded_gia_tmss = $basic *.01;
                          $ded_gia_self = $basic *.005;
                          $ded_gia_total = $ded_gia_tmss+$ded_gia_self;

                          $ded_bf_tmss = $basic *.01;
                          $ded_bf_self = $basic *.005;
                          $ded_bf_total = $ded_bf_tmss+$ded_bf_self;
                          $ded_total = $ded_cpf_total+$ded_gia_total+$ded_bf_total;
                          $net_pay = $gross_total-$ded_total ;
                ?>
    				<tr>
                    <td><input type="checkbox" class="checkbox1" name="pro_status[]" id="pro_status[]" value="<?php                         echo $data->id;?>"/></td>
    				<td><?php echo $data->id;?></td>
    				<td><?php echo $data->designation;?></td>
    				<td><?php echo $data->pay_scale;?></td>
    				<td><?php echo $basic;?></td>
    				<td><?php echo $hr;?></td>
    				<td><?php echo $medical?></td>
    				<td><?php echo $conveyance;?></td>
    				<td><?php echo $cpf;?></td>
    				<td><?php echo $gia;?></td>
    				<td><?php echo $bf;?></td>
    				<td><?php echo $gross_total;?></td>
    				<td><?php echo $ded_cpf_tmss;?></td>
    				<td><?php echo $ded_cpf_self;?></td>
    				<td><?php echo $ded_cpf_total;?></td>
    				<td><?php echo $ded_gia_tmss;?></td>
    				<td><?php echo $ded_gia_self;?></td>
    				<td><?php echo $ded_gia_total;?></td>
    				<td><?php echo $ded_bf_tmss;?></td>
    				<td><?php echo $ded_bf_self;?></td>
    				<td><?php echo $ded_bf_total;?></td>
    				<td><?php echo $ded_total;?></td>
    				<td><?php echo $net_pay;?></td>
                    </tr>
    			<?php
                }
            }
            else { ?>
             <?php
            }

            ?>
			</table>
            <button class="btn btn-lg" value="CONFIRM PAYMENT" type="submit" name="paid">PAY</button>

               <?php
               if(isset($_POST['paid']))
               {
               foreach($paydata as $pay=> $value)
                    $this->db->insert('payroll',$paydata[$pay]);
               }
                //form closed
                echo form_close();
                ?>
        </div>















<hr><hr><hr>
<div class="container"><h2>Example tab 2 (using standard nav-tabs)</h2></div>

<div id="exTab2" class="container">
    <ul class="nav nav-tabs">
			<li class="active">
        <a  href="#1" data-toggle="tab">Overview</a>
			</li>
			<li><a href="#2" data-toggle="tab">Without clearfix</a>
			</li>
			<li><a href="#3" data-toggle="tab">Solution</a>
			</li>
		</ul>

			<div class="tab-content ">
			  <div class="tab-pane active" id="1">
          <h3>Standard tab panel created on bootstrap using nav-tabs</h3>
				</div>
				<div class="tab-pane" id="2">
          <h3>Notice the gap between the content and tab after applying a background color</h3>
				</div>
            <div class="tab-pane" id="3">
            <h3>add clearfix to tab-content (see the css)</h3>
				</div>
			</div>
  </div>

</div>
