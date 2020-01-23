<?php
include('includes/public_header.php'); 

if (isset($_POST['addtocart'])) {
    $_SESSION['product_id'][] = $_GET['product_id'];
        header("location:single_product_details.php?product_id={$_GET['product_id']}");

    exit();
}


if(!isset($_GET['product_id'])) {
    header("location:shop.php");
}
?>
    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <div class="">
                <?php
                    $query  = "SELECT * FROM product INNER JOIN category ON product.cat_id = category.cat_id WHERE product.product_id = {$_GET['product_id']} ";
                    $result = mysqli_query($conn,$query);
                    
                    $row = mysqli_fetch_assoc($result);
                    echo "<img height='95%' width='95%' src='admin/upload/{$row['product_image']}' alt=''>";
                                                
                    
            
            echo " </div>
        </div>

        <!-- Single Product Description -->
        <div class='single_product_desc clearfix'>
            
            <span>{$row['cat_name']}</span>
                <a href='cart.php'>
                <h2>{$row['product_name']}</h2>
            </a>
            <p class='product-price'><span class='old-price'></span>{$row['product_price']}</p>
            <p class='product-desc'>{$row['product_desc']}</p>

            <!-- Form -->
            <form class='cart-form clearfix' method='post'>
                <!-- Cart & Favourite Box -->
                <div class='cart-fav-box d-flex align-items-center'>
                    <!-- Cart -->
                    <button type='submit' name='addtocart' class='btn essence-bt'>Add to cart</button>
                    <!-- Favourite -->
                    <div class='product-favourite ml-4'>
                    </div>
                </div>
            </form>";
            ?>
        </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->
<?php
include('includes/public_footer.php'); 
?>