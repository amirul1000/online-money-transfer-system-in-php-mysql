<style>
	  .btn + .btn {
	   margin-left: 0px; 
	}
	
	.btn-block+.btn-block {
	     margin-top: 1px; 
	}
</style>
<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<?php
			  $b_name_file = $_SERVER['SCRIPT_NAME'];
			  $b_name_arr  = explode("/",$b_name_file);
			  $b_name      = $b_name_arr[count($b_name_arr)-1-1];
			?>
                        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>	
                <li class="start">
					<a href="../home">
					<i class="icon-home"></i>
					<span class="title  bold uppercase">Home</span>
					</a>
				</li>
              
				<li class="start active open">
					<a href="javascript:;">
					<i class="fa fa-cogs"></i>
					<span class="title  bold uppercase">Menu</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>					
				</li>
                <li <?php if(  $b_name=="users" || 
				               $b_name=="country" || 
				               $b_name=="currency" ||
							   $b_name=="escrow" || 
							   $b_name=="signup_bonus" || 
							   $b_name=="transfer_fee" || 
							   $b_name=="subscription" ||
                               $b_name=="roles"	||
							   $b_name=="designation" ||						   
							   $b_name=="invite_friends" || 
							   $b_name=="news_letter"  ||
							   $b_name=="send_newsletter" || 
							   $b_name=="privacy_policy"  ||
							   $b_name=="terms_condition" 
							  ) { ?> class="active open" <?php } ?>>
					<a href="javascript:;">
					<i class="icon-settings"></i>
					<span class="title  bold uppercase">Settings</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
                            <li <?php if($b_name=="users") { ?> class="active open" <?php } ?>><a href="../users/index.php?cmd=list"><i class="icon-rocket"></i>Users</a></li>
                            <li <?php if($b_name=="country") { ?> class="active open" <?php } ?>><a href="../country/index.php?cmd=list"><i class="icon-rocket"></i>Country</a></li>
                            <li <?php if($b_name=="currency") { ?> class="active open" <?php } ?>><a href="../currency/index.php?cmd=list"><i class="icon-rocket"></i>Currency</a></li>
                            <!--<li <?php if($b_name=="escrow") { ?> class="active open" <?php } ?>><a href="../escrow/index.php?cmd=list"><i class="icon-rocket"></i>Escrow</a></li>-->
                            <li <?php if($b_name=="signup_bonus") { ?> class="active open" <?php } ?>><a href="../signup_bonus/index.php?cmd=list"><i class="icon-rocket"></i>Signup Bonus</a></li>
                            <li <?php if($b_name=="transfer_fee") { ?> class="active open" <?php } ?>><a href="../transfer_fee/index.php?cmd=list"><i class="icon-rocket"></i>Transfer Fee</a></li>
                            <li <?php if($b_name=="roles") { ?> class="active open" <?php } ?>><a href="../roles/index.php?cmd=list"><i class="icon-rocket"></i>Roles</a></li>
                            <li <?php if($b_name=="designation") { ?> class="active open" <?php } ?>><a href="../designation/index.php?cmd=list"><i class="icon-rocket"></i>Designation</a></li>
                            <li <?php if($b_name=="invite_friends") { ?> class="active open" <?php } ?>><a href="../invite_friends/index.php?cmd=list"><i class="icon-rocket"></i>Invite friends</a></li>
							<li <?php if($b_name=="subscription") { ?> class="active open" <?php } ?>><a href="../subscription/index.php?cmd=list"><i class="icon-rocket"></i>Subscription</a></li>
                            <li <?php if($b_name=="news_letter") { ?> class="active open" <?php } ?>><a href="../news_letter/index.php?cmd=list"><i class="icon-rocket"></i>News letter</a></li>
                            <li <?php if($b_name=="send_newsletter") { ?> class="active open" <?php } ?>><a href="../send_newsletter/index.php?cmd=list"><i class="icon-rocket"></i>Send News letter</a></li>
                            <li <?php if($b_name=="privacy_policy") { ?> class="active open" <?php } ?>><a href="../privacy_policy/index.php?cmd=list"><i class="icon-rocket"></i>Privacy Policy</a></li>
                            <li <?php if($b_name=="terms_condition") { ?> class="active open" <?php } ?>><a href="../terms_condition/index.php?cmd=list"><i class="icon-rocket"></i>Terms Condition</a></li>
                            
                    </ul>
                </li>
                <li <?php if(  $b_name=="deposits" || 
				               $b_name=="transfer_funds" || 
				               $b_name=="loans_request" ||
							   $b_name=="loans" || 
							   $b_name=="withdraw_request" || 
							   $b_name=="withdraw" || 
							   $b_name=="transactions"  
							  ) { ?> class="active open" <?php } ?>>
					<a href="javascript:;">
					<i class="icon-settings"></i>
					<span class="title  bold uppercase">Transaction</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
                        <li <?php if($b_name=="deposits") { ?> class="active open" <?php } ?>><a href="../deposits/index.php?cmd=list"><i class="icon-rocket"></i>Deposits</a></li>                
                        <li <?php if($b_name=="transfer_funds") { ?> class="active open" <?php } ?>><a href="../transfer_funds/index.php?cmd=list"><i class="icon-rocket"></i>Transfer Funds</a></li>
                        <li <?php if($b_name=="loans_request") { ?> class="active open" <?php } ?>><a href="../loans_request/index.php?cmd=list"><i class="icon-rocket"></i>Loans requestd</a></li>
                        <li <?php if($b_name=="loans") { ?> class="active open" <?php } ?>><a href="../loans/index.php?cmd=list"><i class="icon-rocket"></i>Loans</a></li>
                        <li <?php if($b_name=="withdraw_request") { ?> class="active open" <?php } ?>><a href="../withdraw_request/index.php?cmd=list"><i class="icon-rocket"></i>Withdraw request</a></li>
                        <li <?php if($b_name=="withdraw") { ?> class="active open" <?php } ?>><a href="../withdraw/index.php?cmd=list"><i class="icon-rocket"></i>Withdraw</a></li>
                        <li <?php if($b_name=="transactions") { ?> class="active open" <?php } ?>><a href="../transactions/index.php?cmd=list"><i class="icon-rocket"></i>Transactions</a></li>
                     </ul>
                </li>
                
                <li <?php if(  $b_name=="orders" 
							  ) { ?> class="active open" <?php } ?>>
					<a href="javascript:;">
					<i class="icon-settings"></i>
					<span class="title  bold uppercase">Orders</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">           
                        <li <?php if($b_name=="orders") { ?> class="active open" <?php } ?>><a href="../orders/index.php?cmd=list">Orders</span></a></li>
                    </ul>
                </li>
                <li <?php if(  $b_name=="category" || 
				               $b_name=="products" || 
				               $b_name=="popular_products" ||
							   $b_name=="dealoftheday"
							  ) { ?> class="active open" <?php } ?>>
					<a href="javascript:;">
					<i class="icon-settings"></i>
					<span class="title  bold uppercase">Manage</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">           
                        <li <?php if($b_name=="category") { ?> class="active open" <?php } ?>><a href="../category/index.php?cmd=list">Category</span></a></li>
                        <li <?php if($b_name=="products") { ?> class="active open" <?php } ?>><a href="../products/index.php?cmd=list">Products</span></a></li>
                        <li <?php if($b_name=="popular_products") { ?> class="active open" <?php } ?>><a href="../popular_products/index.php?cmd=list">Popular products</span></a></li>
                        <li <?php if($b_name=="dealoftheday") { ?> class="active open" <?php } ?>><a href="../dealoftheday/index.php?cmd=list">Deal of the day</span></a></li>               
                    </ul>
                </li>


			</ul>
			<!-- END SIDEBAR MENU -->
           
	
          
			
		</div>
	</div>
