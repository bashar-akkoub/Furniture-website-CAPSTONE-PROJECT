<?php 
include('../includes/connection.php'); 

if (isset($_POST['submit'])) {

	$product_name   		= $_POST['product_name'];
	$product_price  		= $_POST['product_price'];
	$product_description   	= $_POST['product_description'];
	$category_id	  		= $_POST['cat_id'];
	
	$product_image = $_FILES['product_image']['name'];
	$tmp_name      = $_FILES['product_image']['tmp_name'];
	$path 		   = "upload/";

	move_uploaded_file($tmp_name, $path.$product_image);


	$query = "INSERT INTO product (product_name, product_price, product_desc,cat_id,product_image) VALUES ('$product_name','$product_price','$product_description',$category_id, '$product_image')";
	
	if(mysqli_query($conn,$query)){
		header("Location: manage_product.php");
	}


}

include('../includes/admin_header.php'); 


 ?>
<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header bg-info text-white">Create Product</div>
						<div class="card-body">
							<div class="card-title">
								<h3 class="text-center title-2">
									<i class="fa fa-barcode"></i> New Product</h3>
							</div>
							<hr>
							<form action='' method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label  class="control-label mb-1">Product Name</label>
									<input id="full_name" name="product_name" type="text" class="form-control cc-full_name identified visa" value="">
								</div>
								<div class="form-group">
									<label class="control-label mb-1">Product Price</label>
									<input id="admin_email" name="product_price" type="text" class="form-control">
								</div>
								<div class="form-group has-success">
									<label for="cc-password" class="control-label mb-1">Product Description</label>
									<input id="password" name="product_description" type="text" class="form-control cc-paswword valid">
								</div>
								<div class="form-group has-success">
									<label for="cc-" class="control-label mb-1">Category ID</label>
									<select name="cat_id" id="select" class="form-control">
									<option disabled selected>Select Category</option>
									<?php
									$query  = " SELECT * FROM category";
									$result = mysqli_query($conn, $query);
									while ($row = mysqli_fetch_array($result)) 
										echo "<option value='$row[0]'>{$row[1]}</option>";
										?>
								</select>
								</div>
								<div class="form-group has-success">
									<label class="control-label mb-1">Product Image</label>
									<input name="product_image" type="file" class="form-control">
								</div>
								<div>
									<button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
										<span id="save-button-admin"><i class="fas fa-plus"></i>    
										 	Save </span>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body card-block">
					<form action='' method="get">
						<div class="row form-group">
							<div class="col-3">
								<label for="select" class=" form-control-label">Select Category:</label>
							</div>
							<div class="col-12 col-md-9">
								<select name="cat_id" id="select" class="form-control">
									<option selected disabled>Show all Category</option>
								<?php
									$query  = " SELECT * FROM category";
									$result = mysqli_query($conn, $query);
									$currentName = $row["cat_id"];

									while ($row = mysqli_fetch_array($result)) 
										echo "<option value='$row[0]'>{$row[1]}</option>";
										?>
								</select>
							</div>
						</div>
						<div class="col-12 ">
							<input type="submit" name="sort" value="Sort" class="btn btn-info float-right">
						</div>
					</div>						
				</form>
			</div>
		</div>
			<div class="row m-t-30">
				<div class="col-md-12">
					<!-- DATA TABLE-->
					<div class="table-responsive m-b-40">
						<table class="table table-borderless table-data3">
							<thead>
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Price</th>
									<th>Description</th>
									<th>Category Name</th>
									<th>Product image</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (isset($_GET['sort']) && isset($_GET['cat_id'])) {
									$query  = " SELECT * FROM product INNER JOIN category ON product.cat_id = category.cat_id WHERE category.cat_id = {$_GET['cat_id']}";

									$result = mysqli_query($conn, $query);
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td>{$row['product_id']}</td>";
										echo "<td>{$row['product_name']}</td>";
										echo "<td>{$row['product_price']}</td>";
										echo "<td>{$row['product_desc']}</td>";
										echo "<td>{$row['cat_name']}</td>";
										echo "<td><img src='upload/{$row['product_image']}'></td>";
										echo "<td><a href='edit_product.php?product_id={$row['product_id']}' class='btn btn-warning'>Edit</a></td>";
										echo "<td><a href='delete_product.php?product_id={$row['product_id']}' class='btn btn-danger '>Delete</a></td>";
										echo "<tr>";
									}

								}else {
									$query  = " SELECT * FROM product INNER JOIN category ON product.cat_id = category.cat_id";
									$result = mysqli_query($conn, $query);
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td>{$row['product_id']}</td>";
										echo "<td>{$row['product_name']}</td>";
										echo "<td>{$row['product_price']}</td>";
										echo "<td>{$row['product_desc']}</td>";
										echo "<td>{$row['cat_name']}</td>";
										echo "<td><img height='75px' width='75px' src='upload/{$row['product_image']}'></td>";
										echo "<td><a href='edit_product.php?product_id={$row['product_id']}&cat_id={$row['cat_id']}' class='btn btn-warning'>Edit</a></td>";
										echo "<td><a href='delete_product.php?product_id={$row['product_id']}' class='btn btn-danger '>Delete</a></td>";
										echo "<tr>";
									}
								}
								?>
							</tbody>
						</table>
					</div>
					<!-- END DATA TABLE-->
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('../includes/admin_footer.php'); ?>
