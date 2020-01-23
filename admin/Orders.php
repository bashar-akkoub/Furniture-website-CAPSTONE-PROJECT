<?php
include('../includes/connection.php'); 






include('../includes/admin_header.php'); 


 ?>
<!-- MAIN CONTENT-->

<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header"> Orders</div>
						<div class="card-body">
							
							<hr>
							
							<div class="row">
								<div class="col-lg-12">
									<div class="table-responsive table--no-card m-b-30">
										<table class="table table-borderless table-striped table-earning">
											<thead>
												<tr>
													<th>Order ID</th>
													<th>Order Date</th>
													<th>Name</th>
													<th>Products</th>
													<th>Total Paid</th>
													<th >Locaion</th>
													<th >Mobile</th>
													<th>Delete</th>
													
												</tr>
											</thead>
											<tbody>
												<?php

												$query="SELECT * from orders INNER JOIN addresses INNER JOIN customer on orders.`customer_id`=  addresses.customer_id AND orders.`customer_id`=  customer.customer_id Group by orders.order_id ORDER BY `orders`.`order_id` DESC";
												$result=mysqli_query($conn,$query);

												while($row=mysqli_fetch_assoc($result))
												{
													echo"<tr>";	
													echo "<td>{$row['order_id']}</td>";
													echo "<td>". substr("{$row['order_date']} ",0,-4 )."</td>";
													echo "<td>{$row['name']}</td>";
													echo "<td>{$row['product_ids']}</td>";
													echo "<td>{$row['Total_paid']}</td>";
													echo "<td>{$row['country']}-{$row['city']}-{$row['location']}-{$row['street']}-{$row['building']}</td>";
													echo "<td>{$row['mobile']}</td>";

													
													echo "<td><a href='delete_order.php?order_id={$row['order_id']}'class='btn btn-danger'>delete</a></td>";
													echo"</tr>";




													
												} 
												?>

											</tbody>
										</table>
									</div>
								</div>
							</div>                           
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>


<?php include('../includes/admin_footer.php'); ?>
