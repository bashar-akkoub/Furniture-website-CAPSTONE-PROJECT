<?php

    include('includes/public_header.php'); 
   
    
?>
<!-- ##### Welcome Area Start ##### -->
<section class="welcome_area bg-img background-overlay" style="background-image: url(img/bg-img/fff.jpg);">

   
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
               
                    <?php
                    if (isset($_GET['done'])) {
                        echo "<div class='  hero-content'>
                    
                    <h3>Thanks for ordering </h3>
                </div>";
                     }  ?>
                    
                <div class="hero-content">
                   
                    <h2>New Collection</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Welcome Area End ##### -->

<!-- ##### Top Catagory Area Start ##### -->
<div class="top_catagory_area section-padding-80 clearfix">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Single Catagory -->
            <?php
            $query  = " SELECT * FROM category";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='col-12 col-sm-6 col-md-4'>
                    <div class='single_catagory_area d-flex align-items-center justify-content-center bg-img' style='background-image: url(admin/upload/{$row['cat_image']});'>
                        <div class='catagory-content'>
                            <a href='shop.php?cat_id={$row['cat_id']}'> {$row['cat_name']}</a>
                        </div>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>
</div>
<!-- ##### Top Catagory Area End ##### -->

<!-- ##### CTA Area Start ##### -->
<div class="cta-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cta-content bg-img background-overlay" style="background-image: url(img/bg-img/237211-cu-ran-pudding-luxury-sofas2.jpg);">
                    <div class="h-100 d-flex align-items-center justify-content-end">
                        <div class="cta--text">
                            <h6>WOOOW</h6>
                            <h2>AMAZING FURNITURE</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### CTA Area End ##### -->

<!-- ##### New Arrivals Area Start ##### -->
<section class="new_arrivals_area section-padding-80 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">

                    <!-- Single Product -->
                     <?php
            $query  = " SELECT * FROM category";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            echo "";
            }
            ?>
                    

                            <!-- Hover Content -->
                            
                
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### New Arrivals Area End ##### -->

<!-- ##### Brands Area Start ##### -->
<div class="brands-area d-flex align-items-center justify-content-between">
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="img/core-img/hooker.png" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="img/core-img/download.png" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="img/core-img/download1.png" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="img/core-img/download2.png" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="img/core-img/download3.jpeg" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="img/core-img/brand6.png" alt="">
    </div>
</div>
<!-- ##### Brands Area End ##### -->
<?php
include('includes/public_footer.php'); ?>
?>