<?php 
// database connection 
include('../includes/connection.php');


include('../includes/admin_header.php'); ?>
<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<h2 class="text-center">
				<?php
					$query  ="SELECT cat_name FROM category WHERE cat_id = {$_GET['cat_id']}";
					$result = mysqli_query($conn, $query);
					$row    = mysqli_fetch_assoc($result);
					echo strtoupper("{$row['cat_name']}");
				?>
			</h2>
			<div class="row m-t-30">
				<div class="col-md-12">
					<!-- DATA TABLE-->
					<div class="table-responsive m-b-40">
						<table class="table table-borderless table-data3">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Price</th>
									<th>Description</th>
									<th>Category Name</th>
									<th>Product image</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (isset($_GET['cat_id'])) {
									$query  = " SELECT * FROM product INNER JOIN category ON product.cat_id = category.cat_id WHERE category.cat_id = {$_GET['cat_id']}";

									$result = mysqli_query($conn, $query);
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td>{$row['product_id']}</td>";
										echo "<td>{$row['product_name']}</td>";
										echo "<td>{$row['product_price']}</td>";
										echo "<td>{$row['product_desc']}</td>";
										echo "<td>{$row['cat_name']}</td>";
										echo "<td><img height='100px' width='100px' src='upload/{$row['product_image']}'></td>";
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
