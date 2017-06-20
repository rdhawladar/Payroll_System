 

 	<script src="<?php echo base_url('assets/bootstrap/js/jquery.js');?>"></script>
 	<script src="<?php echo base_url('assets/bootstrap/js/site.js');?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
	<script src="assets/swal/sweetalert.min.js"></script>

	<script src="assets/swal/jquery-1.6.1.js"></script>





	<!--JS for SWAL-->


	<script type="text/javascript">
	function getdeleteBrand(id)
  {
	swal({
        title:"Delete",
        text: "Hey sir do Want to Delete this Item?",
        type:"",
        showCancelButton: true,
        confirmButtonText:"Aye!",
        cancelButtonText:"Nah!",
        closeOnConfirm: true
    },
    function(response)
    {
        
                 window.location.href="http://localhost/payroll_tmss/brands/edit/"+ id;
              
    });

  
  }
	</script>
 </body>

</html>
