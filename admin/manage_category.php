<?php 
include('../includes/connection.php'); 

if (isset($_POST['submit'])) {
	$catname 	 = $_POST['cat_name'];
	$cat_image   = $_FILES['cat_image']['name'];
	$tmp_name    = $_FILES['cat_image']['tmp_name'];
	$path 		 = "upload/";

	move_uploaded_file($tmp_name, $path.$cat_image);

	$query = "INSERT INTO category (cat_name,cat_image) VALUES ('$catname','$cat_image')";
	if(mysqli_query($conn,$query)){
		header("Location: manage_category.php");
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
						<div class="card-header bg-info text-white">Add Category</div>
						<div class="card-body">
							<div class="card-title">
								<h3 class="text-center title-2">
									<i class="far fa-list-alt"></i> New Category</h3>
							</div>
							<hr>
							<form action='' method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="cc-full_name" class="control-label mb-1">Category Name</label>
									<input id="full_name" name="cat_name" type="text" class="form-control cc-full_name identified visa" value="" data-val="true">
								</div>
								<div class="form-group">
									<label for="cc-full_name" class="control-label mb-1">Category Image</label>
									<input id="full_name" name="cat_image" type="file" class="form-control cc-full_name identified visa" value="" data-val="true">
								</div>
								<div>
									<button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
										<span id="save-button-admin"><i class="fas fa-plus"></i> Save</span>
									</button>
								</div>
							</form>
						</div>
					</div>
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
									<th>Category</th>
									<th>Image</th>
									<th>View</th>
									<th>Edit</th>
									<th>Delete</th>	
								</tr>
							</thead>
							<tbody>
								<?php
									$query  = " SELECT * FROM category";
									$result = mysqli_query($conn, $query);
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td>{$row['cat_id']}</td>";
										echo "<td>{$row['cat_name']}</td>";
										echo "<td><img height='75px' width='75px' src='upload/{$row['cat_image']}'></td>";
										echo "<td><a href='view_product.php?cat_id={$row['cat_id']}' class='btn btn-success'>View</a></td>";
										echo "<td><a href='edit_category.php?cat_id={$row['cat_id']}' class='btn btn-warning'>Edit</a></td>";
										echo "<td><a href='delete_category.php?cat_id={$row['cat_id']}' class='btn btn-danger ' >Delete</a></td>";
										echo "<tr>";
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
