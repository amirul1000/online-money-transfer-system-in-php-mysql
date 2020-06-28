<?php
 
	$assets_url = '../../v4.0.1/theme';
?>
<!DOCTYPE html>
  
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD --><head>
<meta charset="utf-8"/>
<title>Sovereign Money Member Area</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="<?=$assets_url?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="<?=$assets_url?>/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
<link href="<?=$assets_url?>/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?=$assets_url?>/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
 
<body class="page-header-fixed page-quick-sidebar-over-content page-style-square"> 
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<div class="page-logo" style="width:363px;">
			<a href="">
            <label>
			<img src="../../images/logo.png" alt="logo" class="logo-default" style="height:30px;float:left"/>
            <h6 class="heading_text_logo">Sovereign Money</h6></label>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
			
			</div>
		</div>
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<?php
		 include("../template/top_menu.php");
		?>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	 <?php
	  include("../template/left_menu.php");
	 ?> 
	<!-- END SIDEBAR -->
    
				
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			      
            <?php
			 ob_start(); 
			 session_start();
			 $count = count($_SESSION['cart']);
			 if($count>0)
			 {
			?>			
            <div class="row" align="center">                 
                  <!-- BEGIN CART -->
                    <div class="top-cart-block">
                      <div class="top-cart-info">                        
                        <p><?=$count?> Items in cart</p>
                        <a href="http://sovereign.money/cart.php" id="view-cart" class="eye-btn">View Cart</a>|
                        <a href="http://sovereign.money/cart.php" id="check-out" class="eye-btn">Check Out</a>
                      </div>
                      <i class="fa fa-shopping-cart"></i>  
                    </div>
                    <!--END CART -->
            </div>
            <?php
			 }
			?>
            
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->  
            
            <div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    	<button type="button" class="btn" style="    background-color: #01C27C;
    border: 1px solid #209369;
    float: right;
    border-radius: 3px !important;
    color: #FFF;
    margin-bottom: 33px;">"Invite freinds,earn $10 worth of coins"</button>         
                </div>
            </div>    



            <!---8 number requirements start-->
            <div class="row">
            	<h1>8 number requirements</h1>
            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            		<div class="pay_inner">
            			<div class="">  

            				<table width="100%">
		                		<tr>
		                			<th>SVM WALLET</th>
		                			<th class="text-right"><a href="./alldesign.php">More></a></th>
		                		</tr>

		                		<tr>
		                			<td colspan="2">Available</td>
		                			 
		                		</tr>
		                		<tr>
		                			<td colspan="2"><h1>$0.00   <span>SD*</span></h1></td>
		                			 
		                		</tr>
		                		 
		                		<tr>
		                			<td><a href="#">USD</a></td>
		                			<td>$0.00 USD</td>
		                		</tr>
		                		<tr>
		                			<td><a href="#">RUB</a></td>
		                			<td>$0.00 RUB</td>
		                		</tr>
		                		<tr>
		                			<td colspan="2"><span class="estimate_text">This is an estimate based on the most recent conversion</span></td>
		                			 
		                		</tr>
		                		<tr>
		                			<td><a href="#">Transfer Money</a></td>
		                			<td><a href="#">Currencies</a></td>
		                		</tr>

		                	</table>
            				 
            			</div>
            		</div>                            
            	</div>

            </div>
          
          <!---8 number requirements close-->


           <!---9 number requirements start-->
            
            <div class="row" id="home_top_sections">
            	<h1>9 number requirements</h1>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                	<table width="100%">
                		<tr>
                			<th>SVM Wallet</th>
                			<th>Available Equivalents</th>
                		</tr>

                		<tr>
                			<td><a href="#">Transfer Money</a></td>
                			<td></td>
                		</tr>
                		<tr>
                			<td><a href="#">Send or Request Money</a></td>
                			<td></td>
                		</tr>
                		<tr>
                			<td><a href="#">Payment Preference</a></td>
                			<td></td>
                		</tr>
                		<tr>
                			<td><a href="#">Merchant Fee</a></td>
                			<td></td>
                		</tr> 

                	</table>
                    	 
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="text-align: right;">
                    	 <table width="100%"> 

                		<tr>
                			<td></td>
                			<td><span class="doller_val">$0.00 USD</span></td>
                		</tr>
                		<tr>
                			<td>USD <span class="doller_sub">Primery</span></td>
                			<td><span class="doller_val">$0.00 USD</span></td>
                		</tr>
                		<tr>
                			<td>RUB </td>
                			<td><span class="doller_val">$0.00 RUB</span></td>
                		</tr>
                		 

                	</table>

                </div>
               
			</div>   

			 <!---9 number requirements start-->

           </br>
			<hr style="border-bottom:1px solid #ccc" />
            </br>

             <!---10 number requirements start-->
            <div class="row">
              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            		<div class="pay_inner">
            			<div class="">
            				<img src="../../images/pay_inner.png" class="img-responsive" width="60" height="60">
            				<h4 class="pay_title">Pay for goods or services</h4>
            				<p class="desc">No fee for you, The recipient dasys a fee </p>
            				<div class="pay_footer">
            					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            						<img src="../../images/pay_footer.png" width="25" height="25">
            					</div>
            					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
            						 <p> Eligible Purchase coverd by <a href="">Purchase protections</a></p>
            					</div>
            				</div>
            			</div>
            		</div>                            
            	</div>

            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            		   <div class="pay_inner">
            			<div class="">
            				<img src="../../images/pay_inner.png" class="img-responsive" width="60" height="60">
            				<h4 class="pay_title">Create an invoice</h4>
            				<p class="desc">You will pay a fee when you recive the money</p>
            				<div class="pay_footer">
            					<div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
            						<img src="../../images/pay_footer.png"width="25" height="25">
            					</div>
            					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
            						 <p> Eligible Purchase coverd by <a href="">Purchase protections</a></p>
            					</div>
            				</div>
            			</div>
            		</div>                           
            	</div>
               <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
            	<style type="text/css">
            	.estimate_text{
            	line-height: 30px;
    font-size: 8px;
}
            		.pay_inner {
						        border: 1px solid #ccc;
    border-radius: 8px !important;
    padding: 10px;
    margin-bottom: 60px;
						}
						.pay_inner h4 {
							color: #147cca;
							font-weight: bold;
							font-size: 13px;
							text-align: center;
						}
						.pay_title{
							padding-top: 20px;
							text-align: center;
						}

						   .pay_footer{
						   background: #095b95;
    display: -webkit-inline-box;
    color: #FFF;
    padding: 6px 0px;
    font-size: 12px;
    line-height: 16px;
    margin-left: -10px;
    margin-right: -10px;
    margin-bottom: -15px;
						}
						.pay_inner p.desc {
							padding: 4px 20px 35px 20px;
						}
						 
						.pay_inner img {
							text-align: center;
							 margin: 0 auto;

						}
						#home_top_sections table td{
						    padding: 10px 0px 0px 3px;
    font-size: 12px;


						}
						.doller_sub{
							display: block;
						}
						.doller_val {
    font-size: 14px;
    color: #686868;
}

.heading_text_logo{
	color: #fff;
    float: left;
    font-size: 15px;
    font-weight: 600;
    padding-left: 12px;
    padding-top: 2px;
    text-transform: uppercase;
	font-weight:bold
 }
.click_panel{
	    margin: 0 auto;
    width: 100%;
    margin-bottom: 40px;
    text-align: center;
}
.click_panel a{
	    background: #ddd;
    color: #000;
    padding: 12px 60px;
    border-right: 3px solid #fff;
    border-color: white;
}

.click_panel a.active{
	    background: #0360a2;
	    color: #FFF
   
}
.circle_pay{
	border-radius: 100% !important;
    background: #0360a2;;
    color: #FFF;
    width: 29px;
    height: 29px;
    font-size: 10px;
    display: inline-block;
    border: none;
    vertical-align: middle;
    margin: 0 auto;
    line-height: 19px;
    text-align: center;
}

.pay_for_goods{
	padding: 0px;

}
.pay_for_goods li{
list-style: none;
    display: inline-block;
    padding: 6px;
}
            	</style>
             
            
            </div> 

          <!---9 number requirements start-->   



           <!---10 number requirements start-->
            <div class="row">
            	<h1>10 number requirements</h1>
            	<div class="click_panel"><a href="#" class="active">Method</a><a href="#">Amount</a><a href="#">Payment</a></div>
            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            		<div class="pay_inner">
            			<div class="">  

            				<table width="100%">
		                		<tr>
		                			<th>SVM WALLET</th>
		                			<th class="text-right"><a href="./alldesign.php">More></a></th>
		                		</tr>

		                		<tr>
		                			<td colspan="2">Available</td>
		                			 
		                		</tr>
		                		<tr>
		                			<td colspan="2"><h1>$0.00   <span>SD*</span></h1></td>
		                			 
		                		</tr>
		                		 
		                		<tr>
		                			<td><a href="#">USD</a></td>
		                			<td>$0.00 USD</td>
		                		</tr>
		                		<tr>
		                			<td><a href="#">RUB</a></td>
		                			<td>$0.00 RUB</td>
		                		</tr>
		                		<tr>
		                			<td colspan="2"><span class="estimate_text">This is an estimate based on the most recent conversion</span></td>
		                			 
		                		</tr>
		                		<tr>
		                			<td><a href="#">Transfer Money</a></td>
		                			<td><a href="#">Currencies</a></td>
		                		</tr>

		                	</table>
            				 
            			</div>
            		</div>                            
            	</div>

            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            		      <table width="100%"> 

                		<tr>
                			<td><span class="circle_pay">Bc</span></td>
                			<td><span class="doller_val">Lorim Ipsum text</span></td>
                		</tr>
                		<tr>
                			<td colspan="2"><h1>$0.00   <span>SD*</span></h1></td>
                		</tr>
                		<tr>
                			<td colspan="2">
 								<select>
 									<option>USD</option>
 									<option>RUD</option>
 								</select>

                			</td>
                		</tr>
                		 

                	</table>                     
            	</div>

            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            		<h4>Pay for goods or services</h4>
            		<ul class="pay_for_goods">
            			<li><img class="circle_pay" src="http://sovereign.money/profile_images/10_3.jpg"><p>lorim1</p></li>
            			<li><img class="circle_pay" src="http://sovereign.money/profile_images/10_3.jpg"><p>lorim1</p></li>
            			<li><img class="circle_pay" src="http://sovereign.money/profile_images/10_3.jpg"><p>lorim1</p></li>
            			<li><img class="circle_pay" src="http://sovereign.money/profile_images/10_3.jpg"><p>lorim1</p></li>
            			<li><img class="circle_pay" src="http://sovereign.money/profile_images/10_3.jpg"><p>lorim1</p></li>
            			<li><img class="circle_pay" src="http://sovereign.money/profile_images/10_3.jpg"><p>lorim1</p></li>
            			<li><img class="circle_pay" src="http://sovereign.money/profile_images/10_3.jpg"><p>lorim1</p></li>
            			<li><img class="circle_pay" src="http://sovereign.money/profile_images/10_3.jpg"><p>lorim1</p></li>
            			<li><img class="circle_pay" src="http://sovereign.money/profile_images/10_3.jpg"><p>lorim1</p></li>
            			<li><img class="circle_pay" src="http://sovereign.money/profile_images/10_3.jpg"><p>lorim1</p></li>
            			<li><img class="circle_pay" src="http://sovereign.money/profile_images/10_3.jpg"><p>lorim1</p></li>
            		 
            		</ul>
            		                          
            	</div>

            </div>
          
          <!---10 number requirements close-->
           
             

			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
			
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
        <!-- END PAGE HEADER-->
        </div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">         
         Copyright@<?=date("Y")?>. All right reserved.</a>
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
 
 
<script src="<?=$assets_url?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?=$assets_url?>/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="<?=$assets_url?>/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?=$assets_url?>/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
   Demo.init(); // init demo features 
   Index.init();   
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Tasks.initDashboardWidget();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>