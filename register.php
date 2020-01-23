<?php 
    
    include('includes/connection.php');
    if (isset($_POST['submit'])) {
        
    $name    = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $mobile    = $_POST['mobile'];
   
   $query="INSERT INTO customer(name , email,password,mobile)VALUES('$name' , '$email','$password','$mobile')";
    $result=mysqli_query($conn,$query);
            header('location:login.php');
     
    
    }





?>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

     <!-- Fontfaces CSS-->
    <link href="admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
   

    <!-- Main CSS-->
    <link href="admin/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                 <a href="login.php">
                                <h2>login </h2>
                            </a>
                            <label style="font-size: 30px;">||</label>
                            <a href="register.php">
                                <h2>Register</h2>
                            </a>
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                 <div class="form-group">
                                    <label>Name</label>
                                    <input class="au-input au-input--full" type="text" name="name" required="" placeholder="Name">
                                </div>
                                 <div class="form-group">
                                    <label>Email</label>
                                    <input class="au-input au-input--full" type="email" name="email" required="" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" required="" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input class="au-input au-input--full" type="text" required="" name="mobile" placeholder="Mobile">
                                </div>
                                
                                
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="submit">Register</button>
                                <?php  if (isset($error)) {
                                    echo "<div class='alert alert-danger'>$error</div>";
                                }?>
                               
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

   

</body>

</html>
<!-- end document-->