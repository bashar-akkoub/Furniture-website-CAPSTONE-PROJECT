<?php
if (!isset($_GET['cat_id'])) {
    header("location:index.php");
}
include('includes/public_header.php'); 
?>
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>
                        <?php
                        if (isset($_GET['cat_id'])) {
                           
                            $query  ="SELECT * FROM category WHERE cat_id = {$_GET['cat_id']}";
                            $result = mysqli_query($conn, $query);
                            $row    = mysqli_fetch_assoc($result);
                            echo strtoupper("{$row['cat_name']}");
                        }
                        ?>                        
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Shop Grid Area Start ##### -->
<section class="shop_grid_area section-padding-80">
    <div class="container">
        <div class="row">
           
                <div class="shop_sidebar_area">

                    <!-- ##### Single Widget ##### -->
                    <div class="widget catagory mb-50">
                       

                        <!--  Catagories  -->
                        <div class="catagories-menu">
                            <ul id="menu-content2" class="menu-content collapse show">
                                <!-- Single Item -->

                                <?php 
                                while ($row = mysqli_fetch_assoc($result)) {
                                 echo "<li data-toggle='collapse' data-target='#{$row['cat_name']}'>
                                 <a href='#'>{$row['cat_name']}</a>
                                 <ul class='sub-menu collapse show' id='{$row['cat_name']}'>";
                                 $query  = " SELECT * FROM product WHERE cat_id =  {$row['cat_id']}";
                                 $result2 = mysqli_query($conn, $query2);
                                 while ($row2 = mysqli_fetch_assoc($result2)) {
                                     echo "<li><a href='single_product_details.php?product_id={$row2['product_id']}'>{$row2['product_name']}</a></li>";  
                                 }
                                 echo "</ul>
                                 </li>";
                             }
                             ?>
                         </ul>
                     </div>
                 

                 <!-- ##### Single Widget ##### -->
            
                <!-- ##### Single Widget ##### -->
           

                <!-- ##### Single Widget ##### -->
               
            </div>
        </div>

        <div class="col-12 col-md-8 col-lg-9">
            <div class="shop_grid_product_area">
                <div class="row">
                    <div class="col-12">
                        <div class="product-topbar d-flex align-items-center justify-content-between">
                            <!-- Total Products -->
                            <div class="total-products">
                                <?php
                                if (isset($_GET['cat_id'])){
                                    $query = "SELECT * FROM product WHERE cat_id = {$_GET['cat_id']}";
                                    $result = mysqli_query($conn,$query);
                                    $i=0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                      $i++;  
                                  }
                                  echo "<p><span>$i</span> products found</p>";
                              }else{
                                $query = "SELECT * FROM product ";
                                $result = mysqli_query($conn,$query);
                                $i=0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                  $i++;  
                              }
                              echo "<p><span>$i</span> products found</p>";
                          }
                          ?>

                      </div>
                      <!-- Sorting -->
                      <div class="product-sorting d-flex">
                        <form action="#" method="get">
                            
                            <input type="submit" class="d-none" value="">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            if (isset($_GET['cat_id'])) {
                $query  = " SELECT * FROM product INNER JOIN category ON product.cat_id = category.cat_id WHERE category.cat_id = {$_GET['cat_id']}";
                $result = mysqli_query($conn,$query);

                while ($row = mysqli_fetch_assoc($result)) {



                    echo "<div class='col-12 col-sm-6 col-lg-4'>
                    <div class='single-product-wrapper'>
                    <!-- Product Image -->


                    <div class='product-img'>
                    <img style='height:250px; width:450px;' src='admin/upload/{$row['product_image']}' alt=' '>

                    <!-- Product Badge -->
                    
                    <!-- Favourite -->
                    <div class='product-favourite'>
                    <a href='#' class='favme fa fa-heart'></a>
                    </div>
                    </div>

                    <!-- Product Description -->
                    <div class='product-description'>
                    <span>{$row{'cat_name'}}</span>
                    <a href='single_product_details.php?product_id={$row['product_id']}'>
                    <h6>{$row{'product_name'}}</h6>
                    </a>
                    <p class='product-price'><span class='old-price'></span>{$row['product_price']}</p>

                    <!-- Hover Content -->
                    <div class='hover-content'>
                    <!-- Add to Cart -->
                    <form method='get' action=''>
                        <div class='add-to-cart-btn'>
                            <input type='hidden' name='cart' value='{$row['product_id']}' />
                        </div>
                    </form>
                    </div>
                    </div>

                    </div>
                    </div>";
                }
            }else{


                $query  = " SELECT * FROM product INNER JOIN category ON product.cat_id = category.cat_id";
                $result = mysqli_query($conn,$query);

                while ($row = mysqli_fetch_assoc($result)) {



                    echo "<div class='col-12 col-sm-6 col-lg-4'>
                    <div class='single-product-wrapper'>
                    <!-- Product Image -->


                    <div class='product-img'>
                    <img style='height:250px; width:450px;' src='admin/upload/{$row['product_image']}' alt=' '>

                    <!-- Product Badge -->
                    <div class='product-badge offer-badge'>
                    <span>-30%</span>
                    </div>
                    <!-- Favourite -->
                    <div class='product-favourite'>
                    <a href='#' class='favme fa fa-heart'></a>
                    </div>
                    </div>

                    <!-- Product Description -->
                    <div class='product-description'>
                    <span>{$row{'cat_name'}}</span>
                    <a href='single_product_details.php?product_id={$row['product_id']}'>
                    <h6>{$row{'product_desc'}}</h6>
                    </a>
                    <p class='product-price'><span class='old-price'>$75.00</span>{$row['product_price']}</p>

                    <!-- Hover Content -->
                    <div class='hover-content'>
                    <!-- Add to Cart -->
                    <div class='add-to-cart-btn'>
                    <a href='#' class='btn essence-btn'>Add to Cart</a>
                    </div>
                    </div>
                    </div>

                    </div>
                    </div>";
                }
            }
            ?>
        </div>
    </div>
    <!-- Pagination -->
    <nav aria-label="navigation">
      
    </nav>
</div>
</div>
</div>
</section>
<!-- ##### Shop Grid Area End ##### -->
<?php
include('includes/public_footer.php'); 
?>