<?php 

 include("includes/connection.php");
 include("includes/header.php");

 //$_SESSION['product_id']=array();
    if(isset($_POST['addtocart'])){
        if(!in_array($_GET['product_id'], $_SESSION['product_id']))
    $_SESSION['product_id'][]=$_GET['product_id'];

}
//unset($_SESSION['product_id'][0]);
   // header("location:single_product.php");
   //    exit();
 ?>

   
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        		
      <div class="single_product_thumb clearfix">
       <div class="product_thumbnail_slides owl-carousel">
            	<?php 

            		$query  = "SELECT * FROM product
                               WHERE product_id = {$_GET['product_id']}";
                     $result =  mysqli_query($connect,$query);
                    while($row = mysqli_fetch_assoc($result))
                    {
            		
            		echo "<div style='width:500px; height:500px'; ><img src='admin/upload/{$row['product_image']}' alt=''></div>";
                    echo "<div style='width:500px; height:500px ; padding:24px';><img src='admin/upload/{$row['product_image']}' alt=''></div>";

                    echo "";
                	}
            	 ?>
      </div>
       </div>          
        

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
        	<?php 

            		$query  = "SELECT * FROM product
                               WHERE product_id = {$_GET['product_id']}";
                     $result =  mysqli_query($connect,$query);
                    while($row = mysqli_fetch_assoc($result))
                    {
            		
                    echo "<span>mango</span>
            <a href=''>
                <h2>{$row['product_desc']}</h2>
            </a>
            <p class='product-price'><span class='old-price'>$65.00</span>{$row['product_price']}</p>";
                	}
            	 ?>
            
            <p class="product-desc">Mauris viverra cursus ante laoreet eleifend. Donec vel fringilla ante. Aenean finibus velit id urna vehicula, nec maximus est sollicitudin.</p>

            <!-- Form -->
            <form class="cart-form clearfix" method="post">
                <!-- Select Box -->
                <div class="select-box d-flex mt-50 mb-30">
                    <select name="select" id="productSize" class="mr-5">
                        <option value="value">Size: XL</option>
                        <option value="value">Size: X</option>
                        <option value="value">Size: M</option>
                        <option value="value">Size: S</option>
                    </select>
                    <select name="select" id="productColor">
                        <option value="value">Color: Black</option>
                        <option value="value">Color: White</option>
                        <option value="value">Color: Red</option>
                        <option value="value">Color: Purple</option>
                    </select>
                </div>
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->
                    <button type="submit" name="addtocart" value="5" class="btn essence-btn">Add to cart</button>
                    <!-- Favourite -->
                    <div class="product-favourite ml-4">
                        <a href="#" class="favme fa fa-heart"></a>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->
<?php 

include("includes/footer.php");

 ?>