<div class="container">
    <table class="table table-bordered center-block text-center">
        <div class="form-group form-inline">
            <?php $this->load->helper('dob');  echo form_open('payroll/leave_count/'.$ab=2);?>
            <div style="float:left;padding: 6px 12px 2px 16px;">
                <select name="year"  id="selectUser" style="width:auto;" class="form-control">
                    <option value="0">Year</option><?php echo generate_options(2015,2050)?>
                </select>
                <select name="month"  id="selectUser" style="width:auto;" class="form-control">
                    <option>Month</option><?php echo generate_options(1,12,'callback_month');?>
                </select>
            </div>
        </div>


        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Deducted Days(Late/Absent</td>
        </tr>
        <?php
        foreach ($results as $data)
        {?>
            <tr>
                <td><?php  echo $data->id; ?></td>
                <td><?php  echo $data->F_name." ".$data->M_name." ".$data->L_name; ?></td>
                <td><input type="text" value="0" class="input-sm" name="<?php echo $data->id; ?>"></td>
            </tr>
        <?php }
    ?>
    </table>
        <div CLASS="col-lg-offset-4">
            <input type="submit" value="SUBMIT" name="submit" class="btn btn-sm">
            <input type="submit" value="UPDATE" name="update" class="btn btn-sm">
        </div>
    <?php echo form_close();?>
    <hr><hr>
</div>