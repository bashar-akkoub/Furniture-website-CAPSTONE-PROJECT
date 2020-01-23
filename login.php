<?php 

include('includes/public_header.php');
if (isset($_POST['submit'])) { 

    $email    = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {

        $query ="SELECT * FROM customer WHERE email='$email' AND password='$password'";
        $result=mysqli_query($conn,$query);
        $row   = mysqli_fetch_assoc($result);
    
        if($row['customer_id']){

            $_SESSION['customer_id']=$row['customer_id'];
            echo '<script>window.top.location="index.php"</script>';

        }else{

            $error = "sorry you can not login";
            
        }
    }


    if (isset($_POST['submit'])) {
        
    $name    = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $mobile    = $_POST['mobile'];
   
   $query="INSERT INTO customer(name , email,password,mobile)VALUES('$name' , '$email','$password','$mobile')";
    $result=mysqli_query($conn,$query);
            echo '<script>window.top.location="login.php"</script>';
     
    
    }
    
}
?>

    
      <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Login</h5>
                        </div>

                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="first_name">Email <span>*</span></label>
                                    <input type="email" name="email" class="form-control" id="first_name" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="last_name">Password <span>*</span></label>
                                    <input type="password" name="password" class="form-control" id="last_name" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                <button class="btn btn-primary btn-lg" name="submit">Log In</button>
                            </div>
                               
                            </div>
                        </form>
                    </div>
                </div>

                 <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Register</h5>
                        </div>

                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="first_name">Name <span>*</span></label>
                                    <input type="text" name="name" class="form-control" id="first_name" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="last_name">Email <span>*</span></label>
                                    <input type="email" name="email" class="form-control" id="last_name" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="first_name">Password<span>*</span></label>
                                    <input type="password" name="password" class="form-control" id="first_name" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="last_name">Mobile <span>*</span></label>
                                    <input type="text" name="mobile" class="form-control" id="last_name" value="" required>
                                </div>
                           <div class="col-md-12 mb-3">
                                <button class="btn btn-primary btn-lg" name="submit">Register</button>
                            </div>
                               
                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
    

    
<?php
include('includes/public_footer.php');

?>