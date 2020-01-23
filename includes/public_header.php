<?php
ob_start();
    session_start();
    include('includes/connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>3kkoub Home FOR Furnetue</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/Capture.png">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="index.php"><img src="img/core-img/Capture.png" width="30%" style="    margin-right: -33px;" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="#" method="post">
                    </form>
                </div>
                <!-- Favourite Area -->
                <div class="favourite-area">
                </div>
                <!-- User Login Info -->
                <div class="user-login-info">
                </div>
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="#" id="essenceCartBtn"><img src="img/core-img/bag.svg" alt=""> <span>
                        <?php
                            if (isset($_SESSION['product_id'])) {
                                echo count($_SESSION['product_id']);
                            }else{
                                echo 0;
                            }
                        ?>
                    </span></a>
                </div>
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="img/core-img/bag.svg" alt=""> 
                <span>
                    <?php
                        if (isset($_SESSION['product_id'])) {
                            echo count($_SESSION['product_id']);
                        }else{
                            echo 0;
                        }
                    ?>
                </span>
            </a>
        </div>

        <div class="cart-content d-flex">

            <!-- Cart List Area -->
            <div class="cart-list">
                <!-- Single Cart Item -->
                <?php 
                    $price= 0;
                    if (isset($_SESSION['product_id']) && count($_SESSION['product_id']) > 0) {
                        foreach ($_SESSION['product_id'] as $pro_id) {
                            $query  = " SELECT * FROM product WHERE product_id = $pro_id ";
                            $result = mysqli_query($conn,$query);
                            while ($row = mysqli_fetch_assoc($result)) {
                            echo "<div class='single-cart-item'>
                                        <a href='single_product_details.php?product_id={$row['product_id']}' class='product-image'>";
                            echo "<img src='admin/upload/{$row['product_image']}' class='cart-thumb' alt=''>"; 
                            echo "<div class='cart-item-desc'><form action='remove_item.php'>
                                    <button class='product-remove btn btn-link' id='remove'><i class='fa fa-close' aria-hidden='true'></i>
                                    </button>
                                    <input type='text' hidden name='product_id' value='{$row['product_id']}'>
                                    </form>";  
                            echo "  
                                    <p class='price'>{$row['product_name']}</p>"; 
                            echo " </div>
                                        </a>
                                  </div>";
                             $price+=$row['product_price'];                             
                            }
                        }
                    }

                ?>
                
                        
                        <!-- Cart Item Desc -->
                        
                    
  </div>

  <!-- Cart Summary -->
  <div class="cart-amount-summary">

    <h2>Summary</h2>
    <ul class="summary-table">
        <li><span>total:</span> <span>
            <?php 
                if (isset($price)) {
                    echo $price;
                }else{
                    echo 0;
                }
            ?> 
         </span></li>
    </ul>
    <div class="checkout-btn mt-100">
        <a href="checkout.php" class="btn essence-btn">check out</a>
    </div>
</div>
</div>
</div>
<!-- ##### Right Side Cart End ##### -->
