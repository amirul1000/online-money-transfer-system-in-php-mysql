<?php
  include("template/header.php");
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
        <a class="site-logo" href="/"><img src="http://sovereign.money/images/logo.png" alt="Sovereign Money" style="height:50px;"></a>

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
			<a href="cart.php" id="view-cart" class="eye-btn">View Cart</a>|
			<a href="cart.php" id="check-out" class="eye-btn">Check Out</a>
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
			 <?php            
                $info["table"] = "products";
                $info["fields"] = array("products.*"); 
                $info["where"]   = "1  AND id='".$_REQUEST['id']."'";  
                $arr =  $db->select($info);
            ?>
            <table class="table">       
                    <tr>
                      <td>Category</td>
                      <td>
                            <?php
                                unset($info2);        
                                $info2['table']    = "category";	
                                $info2['fields']   = array("cat_name");	   	   
                                $info2['where']    =  "1 AND id='".$arr[0]['category_id']."' LIMIT 0,1";
                                $res2  =  $db->select($info2);
                                echo $res2[0]['cat_name'];	
                            ?>
                      </td>
                     </tr>
                     <tr> 
                      <td>Model</td><td><?=$arr[0]['model']?></td>
                     </tr>
                     <tr> 
                      <td>Title</td><td><?=$arr[0]['title']?></td>
                     </tr>
                     <tr>  
                      <td>Product Condition</td><td><?=$arr[0]['product_condition']?></td>
                     </tr>
                     <tr>  
                      <td>Sale Type</td><td><?=$arr[0]['sale_type']?></td>
                     </tr>
                     <tr>  
                      <td>Quantity</td><td><?=$arr[0]['quantity']?></td>
                     </tr>
                     <tr>  
                      <td>Price</td><td><?=$arr[0]['price']?></td>
                     </tr>
                     <tr>  
                      <td>Discount</td><td><?=$arr[0]['discount']?></td>
                     </tr>
                     <tr>  
                      <td>Shipping Cost</td><td><?=$arr[0]['shipping_cost']?></td>
                     </tr>
                     <tr>  
                      <td>Description</td><td><?=$arr[0]['description']?></td>
                     </tr>
                     <tr>  
                      <td>Product Details</td><td><?=$arr[0]['product_details']?></td>
                     </tr>
                     <tr>  
                      <td>Size</td><td><?=$arr[0]['size']?></td>
                     </tr>
                     <tr>  
                      <td>Weight</td><td><?=$arr[0]['weight']?></td>
                     </tr>
                     <tr>   
                      <td>Color</td><td><?=$arr[0]['color']?></td>
                     </tr>
                     <tr>  
                      <td>Company Name</td><td><?=$arr[0]['company_name']?></td>
                     </tr>
                     <tr>  
                      <td>Agreement Year</td><td><?=$arr[0]['agreement_year']?></td>
                     </tr>
                     <tr>  
                      <td>Made In</td><td><?=$arr[0]['made_in']?></td>
                     </tr>
                     <tr>  
                      <td>Shipping Desc</td><td><?=$arr[0]['shipping_desc']?></td>
                     </tr>
                     <tr>  
                      <td>Delivery Desc</td><td><?=$arr[0]['delivery_desc']?></td>
                     </tr>
                     <tr>  
                      <td>Payment Desc</td><td><?=$arr[0]['payment_desc']?></td>
                     </tr>
                     <tr>  
                      <td>Return Desc</td><td><?=$arr[0]['return_desc']?></td>
                     </tr>
                     <tr>  
                      <td>File Image1</td><td><img src="<?=$arr[0]['file_image1']?>" style="width:100px;"></td>
                     </tr>
                     <tr>  
                      <td>File Image2</td><td><img src="<?=$arr[0]['file_image2']?>" style="width:100px;"></td>
                     </tr>
                     <tr>  
                      <td>Product Type</td><td><?=$arr[0]['product_type']?></td>
                     </tr>
            </table>
   </div>
  </div> 
<?php
  include("template/footer.php");
?>    