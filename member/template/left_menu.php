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
					<span class="title bold uppercase">Home</span>
					</a>
				</li>
              
				<li class="start active open">
					<a href="javascript:;">
					<i class="fa fa-cogs"></i>
					<span class="title bold uppercase">Menu</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>					
				</li>
                <li <?php if(  $b_name=="users" || 
				               $b_name=="change_password" || 
				               $b_name=="my_currency" ||
							   $b_name=="subscription"  
							  ) { ?> class="active open" <?php } ?>>
                        <a href="javascript:;">
                        <i class="icon-settings"></i>
                        <span class="title bold uppercase">Settings</span>
                        <span class="arrow "></span>
                        </a>
					<ul class="sub-menu">
                        <li  <?php if($b_name=="users") { ?> class="active open" <?php } ?>><a href="../users/index.php?cmd=list"><i class="icon-rocket"></i>Profile</a></li>
                        <li  <?php if($b_name=="change_password") { ?> class="active open" <?php } ?>><a href="../change_password/index.php?cmd=list"><i class="icon-rocket"></i>Change password</a></li>
                        <li  <?php if($b_name=="my_currency") { ?> class="active open" <?php } ?>><a href="../my_currency/index.php?cmd=list"><i class="icon-rocket"></i>My currency</a></li>
                        <li  <?php if($b_name=="subscription") { ?> class="active open" <?php } ?>><a href="../subscription/index.php?cmd=list"><i class="icon-rocket"></i>Subscription</a></li> 
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
					<span class="title bold uppercase">Transaction</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">           
                        <li  <?php if($b_name=="deposits") { ?> class="active open" <?php } ?>><a href="../deposits/index.php?cmd=list"><i class="icon-rocket"></i>Deposits</a></li>                
                        <li  <?php if($b_name=="transfer_funds") { ?> class="active open" <?php } ?>><a href="../transfer_funds/index.php?cmd=list"><i class="icon-rocket"></i>Transfer Funds</a></li>
                        <li  <?php if($b_name=="loans") { ?> class="active open" <?php } ?>><a href="../loans/index.php?cmd=list"><i class="icon-rocket"></i>Loans</a></li>
                        <li  <?php if($b_name=="withdraw") { ?> class="active open" <?php } ?>><a href="../withdraw/index.php?cmd=list"><i class="icon-rocket"></i>Withdraw</a></li>
                        <li  <?php if($b_name=="transactions") { ?> class="active open" <?php } ?>><a href="../transactions/index.php?cmd=list"><i class="icon-rocket"></i>Transactions</a></li>
                    </ul>
                </li>                
                <li <?php if(  $b_name=="my_orders" 
							  ) { ?> class="active open" <?php } ?>>
					<a href="javascript:;">
					<i class="icon-settings"></i>
					<span class="title bold uppercase">Orders</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">           
                        <li  <?php if($b_name=="my_orders") { ?> class="active open" <?php } ?>><a href="../my_orders/index.php?cmd=list"><i class="icon-rocket"></i>My Orders</a></li>                   
                    </ul>
                </li>
                
                <?php
				  if($_SESSION["is_merchant"]=='yes')
				  {
				?>
                <li <?php if(  $b_name=="products" || 
				               $b_name=="orders"
							  ) { ?> class="active open" <?php } ?>>
					<a href="javascript:;">
					<i class="icon-settings"></i>
					<span class="title bold uppercase">Merchant</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">           
                        <li <?php if($b_name=="products") { ?> class="active open" <?php } ?>><a href="../products/index.php?cmd=list">Products</span></a></li>
                        <li <?php if($b_name=="orders") { ?> class="active open" <?php } ?>><a href="../orders/index.php?cmd=list">Orders</span></a></li>
                    </ul>
                </li>
                <?php
				  }
				?>

			</ul>
			<!-- END SIDEBAR MENU -->
           
	
          
			
		</div>
	</div>
