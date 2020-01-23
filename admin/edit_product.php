<?php 
// database connection 
include('../includes/connection.php'); 

if (isset($_POST['submit'])) {
	// fetch data
	$product_name   		= $_POST['product_name'];
	$product_price  		= $_POST['product_price'];
	$product_description   	= $_POST['product_description'];
	$category_id	  		= $_POST['category_id'];
	
	//image
	$product_image = $_FILES['product_image']['name'];
	$tmp_name      = $_FILES['product_image']['tmp_name'];
	$path 		   = "upload/";

	move_uploaded_file($tmp_name, $path.$product_image);
		
if ($_FILES['product_image']['error']==0) {

	$query  = "SELECT * FROM product WHERE product_name = '{$_POST['product_name']}'" ;
	
	$result = mysqli_query($conn, $query);

	$row    = mysqli_fetch_assoc($result);

	unlink("upload/{$row['product_image']}");
	$query = "UPDATE product SET  
					product_name	='$product_name',
					product_price	='$product_price',
					product_desc 	='$product_description',
					cat_id 			= $category_id ,
					product_image	='$product_image' WHERE product_id={$_GET['product_id']}" ;

}else{
	$query = "UPDATE product SET  
					product_name	='$product_name',
					product_price	='$product_price',
					product_desc 	='$product_description',
					cat_id 			=$category_id 
					WHERE product_id={$_GET['product_id']}" ;

}
	
	
	// Applied query
	if(mysqli_query($conn,$query)){
		header("Location: manage_product.php");
	} /* Back to manage admin page */

}

//fetch data from edit

$query  = " SELECT * FROM product WHERE product_id={$_GET['product_id']}";
$result = mysqli_query($conn, $query); 
$row = mysqli_fetch_assoc($result);

include('../includes/admin_header.php'); 



?>
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header bg-success text-white">Update Product</div>
						<div class="card-body">
							<div class="card-title">
								<h3 class="text-center title-2">
									<i class="fa fa-barcode"></i> Edit Product</h3>
							</div>
							<hr>
							<form action='' method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label  class="control-label mb-1">Product Name</label>
									<input  name="product_name" type="text" class="form-control cc-full_name identified visa" value="<?php echo $row['product_name'];?>">
								</div>
								<div class="form-group">
									<label class="control-label mb-1">Product Price</label>
									<input  name="product_price" type="text" class="form-control" value="<?php echo $row['product_price'];?>">
								</div>
								<div class="form-group has-success">
									<label class="control-label mb-1">Product Description</label>
									<input  name="product_description" type="text" class="form-control cc-paswword valid"value="<?php echo $row['product_desc'];?>">
								</div>
								<div class="form-group has-success">
									<label for="cc-" class="control-label mb-1">Select Category</label>
									<select name="category_id" id="select" class="form-control">
									<option disabled>Select Category</option>
									<?php
									$query  = " SELECT * FROM category";
									$result = mysqli_query($conn, $query);

									while ($row1 = mysqli_fetch_assoc($result))
										if ($row1['cat_id']==$_GET['cat_id']) {
										 	echo "<option value='{$row1['cat_id']}' selected>{$row1['cat_name']}</option>";
										 } else{
										echo "<option value='{$row1['cat_id']}'>{$row1['cat_name']}</option>";
									}
										?>
								</select>
								</div>
								<div class="form-group has-success">
									<label class="control-label mb-1">Product Image</label>
									<input name="product_image" type="file" class="form-control">
								</div>
								<div>
									<button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-success btn-block">
										<span id="save-button-admin"><i class="far fa-edit"></i>  Update</span>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>

	<?php include('../includes/admin_footer.php'); ?>

