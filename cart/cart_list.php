<?php
  include("../template/header2.php");
?>

<!-- Body BEGIN -->
<body class="corporate">
    
    <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span>+1 456 5555</span></li>
                        <li><i class="fa fa-envelope-o"></i><span>info@soveignmoney.com</span></li>
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
                        <li><a href="/member">Member Log In</a></li>
                        <li><a href="/member/login/index.php?cmd=register_view">Member Registration</a></li>
                        <li><a href="/admin">Admin Log In</a></li>
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>        
    </div>
    <!-- END TOP BAR -->
    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <a class="site-logo" href="/home"><img src="images/logo.png" alt="Sovereign Money" style="height:50px;"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN CART -->
        <div class="top-cart-block">
          <div class="top-cart-info">
            <?php
			 ob_start(); 
			 session_start();
			 $count = count($_SESSION['cart']);
			?>			
			<p><?=$count?> Items in cart</p>
			<a href="../cart/" id="view-cart" class="eye-btn">View Cart</a>|
			<a href="../cart/" id="check-out" class="eye-btn">Check Out</a>
          </div>
          <i class="fa fa-shopping-cart"></i>
                        
                      
        </div>
        <!--END CART -->

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
          <ul>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
                Woman 
                
              </a>
                
              <!-- BEGIN DROPDOWN MENU -->
              <ul class="dropdown-menu">
                <li class="dropdown-submenu">
                  <a href="shop-product-list.html">Hi Tops <i class="fa fa-angle-right"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="shop-product-list.html">Second Level Link</a></li>
                    <li><a href="shop-product-list.html">Second Level Link</a></li>
                    <li class="dropdown-submenu">
                      <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
                        Second Level Link 
                        <i class="fa fa-angle-right"></i>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="shop-product-list.html">Third Level Link</a></li>
                        <li><a href="shop-product-list.html">Third Level Link</a></li>
                        <li><a href="shop-product-list.html">Third Level Link</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="shop-product-list.html">Running Shoes</a></li>
                <li><a href="shop-product-list.html">Jackets and Coats</a></li>
              </ul>
              <!-- END DROPDOWN MENU -->
            </li>
            <li class="dropdown dropdown-megamenu">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
                Man
                
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="header-navigation-content">
                    <div class="row">
                      <div class="col-md-4 header-navigation-col">
                        <h4>Footwear</h4>
                        <ul>
                          <li><a href="shop-product-list.html">Astro Trainers</a></li>
                          <li><a href="shop-product-list.html">Basketball Shoes</a></li>
                          <li><a href="shop-product-list.html">Boots</a></li>
                          <li><a href="shop-product-list.html">Canvas Shoes</a></li>
                          <li><a href="shop-product-list.html">Football Boots</a></li>
                          <li><a href="shop-product-list.html">Golf Shoes</a></li>
                          <li><a href="shop-product-list.html">Hi Tops</a></li>
                          <li><a href="shop-product-list.html">Indoor and Court Trainers</a></li>
                        </ul>
                      </div>
                      <div class="col-md-4 header-navigation-col">
                        <h4>Clothing</h4>
                        <ul>
                          <li><a href="shop-product-list.html">Base Layer</a></li>
                          <li><a href="shop-product-list.html">Character</a></li>
                          <li><a href="shop-product-list.html">Chinos</a></li>
                          <li><a href="shop-product-list.html">Combats</a></li>
                          <li><a href="shop-product-list.html">Cricket Clothing</a></li>
                          <li><a href="shop-product-list.html">Fleeces</a></li>
                          <li><a href="shop-product-list.html">Gilets</a></li>
                          <li><a href="shop-product-list.html">Golf Tops</a></li>
                        </ul>
                      </div>
                      <div class="col-md-4 header-navigation-col">
                        <h4>Accessories</h4>
                        <ul>
                          <li><a href="shop-product-list.html">Belts</a></li>
                          <li><a href="shop-product-list.html">Caps</a></li>
                          <li><a href="shop-product-list.html">Gloves, Hats and Scarves</a></li>
                        </ul>

                        <h4>Clearance</h4>
                        <ul>
                          <li><a href="shop-product-list.html">Jackets</a></li>
                          <li><a href="shop-product-list.html">Bottoms</a></li>
                        </ul>
                      </div>
                      <div class="col-md-12 nav-brands">
                        <ul>
                          <li><a href="shop-product-list.html"><img title="esprit" alt="esprit" src="<?=$assets_url?>/assets/frontend/pages/img/brands/esprit.jpg"></a></li>
                          <li><a href="shop-product-list.html"><img title="gap" alt="gap" src="<?=$assets_url?>/assets/frontend/pages/img/brands/gap.jpg"></a></li>
                          <li><a href="shop-product-list.html"><img title="next" alt="next" src="<?=$assets_url?>/assets/frontend/pages/img/brands/next.jpg"></a></li>
                          <li><a href="shop-product-list.html"><img title="puma" alt="puma" src="<?=$assets_url?>/assets/frontend/pages/img/brands/puma.jpg"></a></li>
                          <li><a href="shop-product-list.html"><img title="zara" alt="zara" src="<?=$assets_url?>/assets/frontend/pages/img/brands/zara.jpg"></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
            <li><a href="shop-item.html">Kids</a></li>
            <li class="dropdown dropdown100 nav-catalogue">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
                New
                
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="header-navigation-content">
                    <div class="row">
                      <div class="col-md-3 col-sm-4 col-xs-6">
                        <div class="product-item">
                          <div class="pi-img-wrapper">
                            <a href="shop-item.html"><img src="<?=$assets_url?>/assets/frontend/pages/img/products/model4.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                          </div>
                          <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                          <div class="pi-price">$29.00</div>
                          <a href="#" class="btn btn-default add2cart">Add to cart</a>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-6">
                        <div class="product-item">
                          <div class="pi-img-wrapper">
                            <a href="shop-item.html"><img src="<?=$assets_url?>/assets/frontend/pages/img/products/model3.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                          </div>
                          <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                          <div class="pi-price">$29.00</div>
                          <a href="#" class="btn btn-default add2cart">Add to cart</a>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-6">
                        <div class="product-item">
                          <div class="pi-img-wrapper">
                            <a href="shop-item.html"><img src="<?=$assets_url?>/assets/frontend/pages/img/products/model7.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                          </div>
                          <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                          <div class="pi-price">$29.00</div>
                          <a href="#" class="btn btn-default add2cart">Add to cart</a>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-6">
                        <div class="product-item">
                          <div class="pi-img-wrapper">
                            <a href="shop-item.html"><img src="<?=$assets_url?>/assets/frontend/pages/img/products/model4.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                          </div>
                          <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                          <div class="pi-price">$29.00</div>
                          <a href="#" class="btn btn-default add2cart">Add to cart</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
            <li class="dropdown active">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
                Pages 
                
              </a>
                
              <ul class="dropdown-menu">
                <li><a href="shop-index.html">Home Default</a></li>
                <li class="active"><a href="shop-index-header-fix.html">Home Header Fixed</a></li>
                <li><a href="shop-index-light-footer.html">Home Light Footer</a></li>
                <li><a href="shop-product-list.html">Product List</a></li>
                <li><a href="shop-search-result.html">Search Result</a></li>
                <li><a href="shop-item.html">Product Page</a></li>
                <li><a href="shop-shopping-cart-null.html">Shopping Cart (Null Cart)</a></li>
                <li><a href="shop-shopping-cart.html">Shopping Cart</a></li>
                <li><a href="shop-checkout.html">Checkout</a></li>
                <li><a href="shop-about.html">About</a></li>
                <li><a href="shop-contacts.html">Contacts</a></li>
                <li><a href="shop-account.html">My account</a></li>
                <li><a href="shop-wishlist.html">My Wish List</a></li>
                <li><a href="shop-goods-compare.html">Product Comparison</a></li>
                <li><a href="shop-standart-forms.html">Standart Forms</a></li>
                <li><a href="shop-faq.html">FAQ</a></li>
                <li><a href="shop-privacy-policy.html">Privacy Policy</a></li>
                <li><a href="shop-terms-conditions-page.html">Terms &amp; Conditions</a></li>
              </ul>
            </li>
            <li><a href="index.html" target="_blank">Corporate</a></li>
            <li><a href="onepage-index.html" target="_blank">One Page</a></li>
            <li><a href="http://keenthemes.com/preview/metronic/theme/templates/admin&amp;page=ecommerce_index.html" target="_blank">Admin theme</a></li>

            <!-- BEGIN TOP SEARCH -->
            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                <form action="#">
                  <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Search</button>
                    </span>
                  </div>
                </form>
              </div> 
            </li>
            <!-- END TOP SEARCH -->
          </ul>
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>
    <!-- Header END -->
    <div class="main">
      <div class="container">
            <div class="slide_section">
                      <h2 id="product-name">Cart</h2>
                         <font color="#FF0000">
                         <?php
                           if(isset($message))
                           {
                             echo $message;
                           }
                         ?>
                         </font>
                          <table cellspacing="3" cellpadding="3" class="bodytext">
                                <tr bgcolor="#33CCFF">
                                    <td>Description</td>
                                     <td>Item name</td>
                                     <td>Item number</td>
                                     <td>Quantity</td>
                                     <td>Unit Price</td>
                                     <td>Amount</td>
                                </tr>
                                <?php
                                $count = count($_SESSION['cart']);
                                $total=0;
                                $total_shipping_charge = 0;
                                if($count==0)
                                {
                                echo "<tr><td colspan=6>No Item in the cart</td></tr>";
                                }
                                else
                                {
                                 for($i=0;$i<$count;$i++)
                                   {
                                   
                                   $subtotal = $_SESSION['cart'][$i]['amount']*$_SESSION['cart'][$i]['quantity'];
                                   $shipping_charge =  $_SESSION['cart'][$i]['shipping_charge']*$_SESSION['cart'][$i]['quantity'];
                                   
                                   $total = $total+$subtotal;
                                   $total_shipping_charge =  $total_shipping_charge + $shipping_charge;
                                   
                                   if($i % 2 == 0)
                                    {
                                        
                                        $row="#C8C8C8";
                                    }
                                    else
                                    {
                                        
                                        $row="#FFFFFF";
                                    }
                                ?>
                                 <tr bgcolor="<?=$row?>">
                                     <td valign="top">
                                        <div style="width:300px;">
                                         <img src="../<?=getImage($db,$_SESSION['cart'][$i]['item_number'])?>" style="width:100px;height:100px;float:left;" />
                                         <?=$_SESSION['cart'][$i]['os0']?> 
                                        </div> 
                                     </td>
                                     <td valign="top"><?=$_SESSION['cart'][$i]['item_name']?></td>
                                     <td valign="top"><?=$_SESSION['cart'][$i]['item_number']?></td>
                                     <td valign="top" nowrap>
                                       <form action="" method="post">
                                         <input type="text" name="quantity" value="<?=$_SESSION['cart'][$i]['quantity']?>" style="width:30px;">											
                                         <input type="hidden" name="item_number" value="<?=$_SESSION['cart'][$i]['item_number']?>">
                                         <input type="hidden" name="item_name" value="<?=$_SESSION['cart'][$i]['item_name']?>">
                                         <input type="submit" name="cmd" value="update" style="width:45px;font-size:11px;">
                                         <input type="submit" name="cmd" value="remove" style="width:45px;font-size:11px;">
                                        </form> 
                                    </td>
                                     <td valign="top"><?=number_format($_SESSION['cart'][$i]['amount'], 2, '.', '')?></td>
                                     <td valign="top">$<?=number_format($subtotal, 2, '.', '')?></td>
                                </tr>
                                <?php					
                                }
                                ?>
                                 <tr bgcolor="#DDFFFF">
                                     <td valign="top"></td>
                                     <td valign="top"></td>										
                                     <td valign="top" colspan="3">Shipping Charge</td>
                                     <td valign="top">$<?=number_format($total_shipping_charge, 2, '.', '')?></td>
                                </tr>
                                 <tr bgcolor="#FFFEEEE">
                                     <td valign="top"></td>
                                     <td valign="top"></td>						
                                     <td valign="top" colspan="3">Total</td>
                                     <td valign="top">
                                     $<?=number_format($total+$tax+$total_shipping_charge, 2, '.', '')?></td>
                                </tr>
                                <?php			
                                   $_SESSION['tax'] = $tax;
                                   $_SESSION['shipping_charge'] = $shipping_charge;		 
                                   $_SESSION['total'] = $total+$tax+$total_shipping_charge;		
                                }
                                ?>	  
                              </table>
                              
                             <div style="width:700px;"> 
                             <form action="" method="post">
                             <?php
                               if(isset($_SESSION['users_id']))
                                 {
                                    //get lastest order 
                                    unset($info);
                                    $info["table"] = "orders";
                                    $info["fields"] = array("orders.*"); 
                                    $info["where"]   = "1   AND users_id='".$_SESSION['users_id']."' ORDER BY id DESC LIMIT 0,1";
                                    $arr =  $db->select($info);
                                    //get shipping address
                                    unset($info2);        
                                    $info2["table"] = "shipping_address";
                                    $info2["fields"] = array("shipping_address.*"); 
                                    $info2["where"]   = "1  AND id='".$arr[0]['shipping_address_id']."' LIMIT 0,1";
                                    $res2 =  $db->select($info2);						
                                    if(empty($_REQUEST['ship_first_name']))
                                    {
                                      $_REQUEST['ship_first_name'] = $res2[0]['ship_first_name'];
                                    }
                                    if(empty($_REQUEST['ship_last_name']))
                                    {
                                      $_REQUEST['ship_last_name'] = $res2[0]['ship_last_name'];
                                    }
                                    if(empty($_REQUEST['ship_adress1']))
                                    {
                                      $_REQUEST['ship_adress1'] = $res2[0]['ship_adress1'];
                                    }
                                    if(empty($_REQUEST['ship_adress2']))
                                    {
                                      $_REQUEST['ship_adress2'] = $res2[0]['ship_adress2'];
                                    }
                                    if(empty($_REQUEST['ship_zip_code']))
                                    {
                                      $_REQUEST['ship_zip_code'] = $res2[0]['ship_zip_code'];
                                    }
                                    if(empty($_REQUEST['ship_city']))
                                    {
                                      $_REQUEST['ship_city'] = $res2[0]['ship_city'];
                                    }
                                    if(empty($_REQUEST['ship_state']))
                                    {
                                      $_REQUEST['ship_state'] = $res2[0]['ship_state'];
                                    }			   
                                    if(empty($_REQUEST['ship_country']))
                                    {
                                      $_REQUEST['ship_country'] = $res2[0]['ship_country'];
                                    }
                                    
                                    //billing information
                                    unset($info2);        
                                    $info2["table"] = "billing_information";
                                    $info2["fields"] = array("billing_information.*"); 
                                    $info2["where"]   = "1  AND id='".$arr[0]['billing_information_id']."' LIMIT 0,1";
                                    $res2 =  $db->select($info2);
                                    if(empty($_REQUEST['first_name']))
                                    {
                                      $_REQUEST['first_name'] = $res2[0]['first_name'];
                                    }
                                    if(empty($_REQUEST['last_name']))
                                    {
                                      $_REQUEST['last_name'] = $res2[0]['last_name'];
                                    }
                                    if(empty($_REQUEST['country']))
                                    {
                                      $_REQUEST['country'] = $res2[0]['country'];
                                    }
                                    if(empty($_REQUEST['adress1']))
                                    {
                                      $_REQUEST['adress1'] = $res2[0]['adress1'];
                                    }
                                    if(empty($_REQUEST['adress2']))
                                    {
                                      $_REQUEST['adress2'] = $res2[0]['adress2'];
                                    }
                                    if(empty($_REQUEST['city']))
                                    {
                                      $_REQUEST['city'] = $res2[0]['city'];
                                    } 
                                    if(empty($_REQUEST['state']))
                                    {
                                      $_REQUEST['state'] =$res2[0]['state'];
                                    } 
                                    if(empty($_REQUEST['zip_code']))
                                    {
                                      $_REQUEST['zip_code'] = $res2[0]['zip_code'];
                                    }
                                    if(empty($_REQUEST['phone_no']))
                                    {
                                      $_REQUEST['phone_no'] = $res2[0]['phone_no'];
                                    }
                                }	
                             ?>
                              <table width="100%">
                                <tr>
                                   <td>
                                      <?php
                                          include("../cart/cart_shipping_address.php");
                                      ?>           
                                   </td>
                                   <td align="right">
                                       <?php
                                          include("../cart/cart_billing_info.php");
                                       ?>     
                                   </td>
                                </tr>
                              </table>
                              </form>
                             </div> 
            </div>

</div>
  </div> 
<?php
  include("../template/footer.php");
?>    