<?php
include('../includes/connection.php'); 


if (isset($_POST['save'])) 
	{
	$email  	 = 	$_POST['admin_email'];
	$password    = $_POST['admin_password'];
	$fullname    =	$_POST['fullname'];


	$query="INSERT INTO admin(admin_email,admin_password,fullname) VALUES ('$email','$password','$fullname')";

	if(mysqli_query($conn,$query)){
    header("Location:manage_admin.php");
    exit();
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
						<div class="card-header"> ADMIN</div>
						<div class="card-body">
							<div class="card-title">
								<h3 class="text-center title-2">Add Admin</h3>
							</div>
							<hr>
							<form action="" method="post" novalidate="novalidate">
								<div class="form-group">
									<label for="cc-payment" class="control-label mb-1"> Email</label>
									<input id="cc-pament" name="admin_email" type="Email" class="form-control" aria-required="true" aria-invalid="false" >
								</div>
								<div class="form-group has-success">
									<label for="cc-name" class="control-label mb-1">Password</label>
									<input id="cc-name" name="admin_password" type="password" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
									>
									
								</div>
								<div class="form-group">
									<label for="cc-number" class="control-label mb-1">Fullname</label>
									<input id="cc-number" name="fullname" type="text" class="form-control cc-number identified visa" value=""
									>
									
								</div>

								<div>
									<button id="payment-button" type="submit" name="save" class="btn btn-lg btn-info btn-block">
										
										<span id="payment-button-amount">SAVE</span>
										<span id="payment-button-sending" style="display:none;">Sending…</span>
									</button>
								</div>
							</form>
							<div class="row">
								<div class="col-lg-12">
									<div class="table-responsive table--no-card m-b-30">
										<table class="table table-borderless table-striped table-earning">
											<thead>
												<tr>
													<th>ID</th>
													<th>Email</th>
													<th>Full Name</th>
													<th >Edit</th>
													<th>Delete</th>
													
												</tr>
											</thead>
											<tbody>
												<?php
												$query="SELECT * from admin";
												$result=mysqli_query($conn,$query);
												while($row=mysqli_fetch_assoc($result))
												{
													echo"<tr>";	
													echo "<td>{$row['admin_id']}</td>";
													echo "<td>{$row['admin_email']}</td>";
													echo "<td>{$row['fullname']}</td>";
													echo"<td><a href='edit_admin.php?admin_id={$row['admin_id']}' class='btn btn-success'>edit</a></td>";
													echo "<td><a href='delete_admin.php?admin_id={$row['admin_id']}'class='btn btn-danger'>delete</a></td>";
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
