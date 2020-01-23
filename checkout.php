<?php

include('includes/public_header.php');
/*session_destroy();

*/
 $_SESSION['pro_ids']=" ";
 if (!isset($_SESSION['customer_id'])) {
   echo '<script>window.top.location="login.php"</script>';
    exit();
}

// if (isset($_POST['placeOrder'])) {

//     $country=$_POST['country'];
//     $city=$_POST['city'];
//     $location=$_POST['location'];
//     $street=$_POST['street'];
//     $building=$_POST['building'];
//     $customer_id=$_SESSION['customer_id'];

    
//     $query="INSERT INTO addresses(country,city,location,street,building,customer_id)VALUES('$country','$city','$location','$street','$building','$customer_id')";
//     $queryOrder="INSERT INTO orders(customer_id,Total_paid,product_ids)VALUES('$customer_id','$price','{$_SESSION['pro_ids']} ')";
   
   
//     mysqli_query($conn,$query);
//     mysqli_query($conn,$queryOrder);
//     echo "<script>window.top.location='checkout.php'</script>";
// }
?>
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Billing Address</h5>
                        </div>

                        <form action="#" method="post">
                            <div class="row">
                                
                                <div class="col-12 mb-3">
                                    <label for="country">Country <span>*</span></label>
                                    <input type="text" name="country" class="form-control mb-3" id="country" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="city">City <span>*</span></label>
                                    <input type="text" name="city" class="form-control mb-3" id="city" value="">
                                    
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="location">Location <span>*</span></label>
                                    <input type="text" name="location" class="form-control" id="location" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street">Street <span>*</span></label>
                                    <input type="text" name="street" class="form-control" id="street" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="building">Building <span>*</span></label>
                                    <input type="text" name="building" class="form-control" id="building" value="">
                                </div>

                                <input name="placeOrder" class="btn essence-btn" value="Place Order" type="submit">

                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Your Order</h5>
                            <p>The Details</p>
                        </div>

                        <ul class="order-details-form mb-4">
                            <li ><span>Product</span></li> <br>
                                <?php
                                 $price=0;
                                  $_SESSION['pro_ids']=" ";
                                if (isset($_SESSION['product_id']) && count($_SESSION['product_id'])> 0){
                                    //foreach ($_SESSION['product_id'] as  $pro_id) {
                                    // $numpeOfPruduct=count($_SESSION['product_id']);
                                    foreach ($_SESSION['product_id'] as $key => $value) {
                                      $counter=$key+1;
                                     
                                        $query  =" SELECT * FROM product where product_id=$value";

                                        $result = mysqli_query($conn,$query);
                                        $row=mysqli_fetch_assoc($result);
                                        //echo '<pre>';
                                        //print_r($row);die;
                                         $_SESSION['pro_ids'].="$counter.{$row['product_name']}"."<br>";
                                        echo "<li><span  class='col-9'>$counter - {$row['product_name']} </span>";
                                        echo "<span  class='col-3 text-right'>{$row['product_price']}$</span>";
 echo "</li>";
                                             $price+=$row['product_price'];
                                    }}
                                    // while ( $_SESSION['product_id']) {
                                    //     # code...
                                    
                                    //     $query  =" SELECT * FROM product where product_id=$pro_id";
                                    //     $result = mysqli_query($conn,$query);
                                    //     $row=mysqli_fetch_assoc($result);
                                    //     //echo '<pre>';
                                    //     //print_r($row);die;
                                    //     echo "<span>{$row['product_name']}</span>";
                                    //          $price+=$row['product_price'];
                                    // }}
                                //}
                                    ?>
                            </li>
                            <li><span>Shipping</span> <span>Free</span></li>
                            <li><span>Total</span>$
                             <?php
                            if (isset( $price)) {
                                echo  $price;
                            }else{
                                echo 0;
                            }
                            ?> 

                            </li>
                        </ul>

                        <div id="accordion" role="tablist" class="mb-4">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-circle-o mr-3"></i>cash on delievery</a>
                                    </h6>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo quis in veritatis officia inventore, tempore provident dignissimos.</p>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->

  <?php
  if (isset($_POST['placeOrder'])) {

    $country=$_POST['country'];
    $city=$_POST['city'];
    $location=$_POST['location'];
    $street=$_POST['street'];
    $building=$_POST['building'];
    $customer_id=$_SESSION['customer_id'];

    
    $query="INSERT INTO addresses(country,city,location,street,building,customer_id)VALUES('$country','$city','$location','$street','$building','$customer_id')";
    $queryOrder="INSERT INTO orders(customer_id,Total_paid,product_ids)VALUES('$customer_id','$price','{$_SESSION['pro_ids']} ')";
   
  
    mysqli_query($conn,$query);
    mysqli_query($conn,$queryOrder);
    $price=0;
  unset($_SESSION['pro_ids']);
  unset($_SESSION['product_id']);
    echo "<script>window.top.location='index.php?done=D'</script>";

}

include('includes/public_footer.php');
  ?>