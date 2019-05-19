		<footer>
		    <p class="pull-right">@acha number | Site developed & Maintained by <a target="_blank" href="https://www.facebook.com/psachan190">Prashant Sachan</a></p>
          <div class="clearfix"></div>
        </footer>
    </div>
</div>
    <script src="<?php echo base_url(); ?>dashboard/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>dashboard/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>dashboard/vendors/fastclick/lib/fastclick.js"></script>
    <script src="<?php echo base_url(); ?>dashboard/vendors/nprogress/nprogress.js"></script>
    <script src="<?php echo base_url(); ?>dashboard/vendors/Chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>dashboard/vendors/gauge.js/dist/gauge.min.js"></script>
    <script src="<?php echo base_url(); ?>dashboard/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="<?php echo base_url(); ?>dashboard/vendors/iCheck/icheck.min.js"></script>
    <script src="<?php echo base_url(); ?>dashboard/vendors/skycons/skycons.js"></script>
    <script src="<?php echo base_url(); ?>dashboard/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>dashboard/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url(); ?>dashboard/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url(); ?>dashboard/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url(); ?>dashboard/vendors/Flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url(); ?>dashboard/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url(); ?>dashboard/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo base_url(); ?>dashboard/vendors/flot.curvedlines/curvedLines.js"></script>
    <script src="<?php echo base_url(); ?>dashboard/vendors/DateJS/build/date.js"></script>
    <script src="<?php echo base_url(); ?>dashboard/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo base_url(); ?>dashboard/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url(); ?>dashboard/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="<?php echo base_url(); ?>dashboard/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>dashboard/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="<?php echo base_url(); ?>dashboard/build/js/custom.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function(e) {
     $( "#datepicker" ).datepicker();
    $('.calc').click(function(){ 
	    var price = $('.price').val();
	    var admin = parseInt(price)*<?php echo $charges[0]->charge; ?>/100;
	    var comision = parseInt(price)*<?php echo $charges[2]->charge; ?>/100;
	    var tax = parseInt(price)*<?php echo $charges[1]->charge; ?>/100;
	    var final_price = parseInt(price) + parseInt(admin) + parseInt(comision) + parseInt(tax);
	    $('.final_price').val(final_price);
	    $('.admin_charge').val(admin);
	    $('.comision').val(comision);
	    $('.tax').val(tax);
	});
	$(".operator" ).change(function(){ form(); });
	$(".circle" ).change(function(){ form(); });
	$(".number" ).change(function(){ form(); });
	$(".status" ).change(function(){ form(); });
	
});

function form () {
	var nb = $('.number').val();
    var op = $('.operator').val();
    var ci = $('.circle').val();
    var status = $('.status').val();
	$.ajax({
				type:'POST',
				url:'<?php echo base_url('numb'); ?>',
				data:'status='+status+'&ci='+ci+'&op='+op+'&nb='+nb,
				success:function(res) {
					$('#numbers').html(res);
				}
		   });
}
function numbers () {
}
 </script>
  </body>
</html>