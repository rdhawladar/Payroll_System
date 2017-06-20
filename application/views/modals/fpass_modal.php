<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Forgot Password</h4>
      </div>
      <div class="modal-body">

      Please input your email:<br>
        <?php echo form_open('login/forgot_password',array('class'=>'form-horizontal'))?>
          <div class="form group">
            <label class="control-label col-sm-2">E-mail</label>
              <div class="col-lg-8">
                <input type="text" name="emailpass" class="form-control"/>
              </div>
          </div>
          
          <input type="submit" value="Submit" class="btn btn-success"/>

        <?php echo form_close('');?>
      </div>
      
    </div>
  </div>
</div>