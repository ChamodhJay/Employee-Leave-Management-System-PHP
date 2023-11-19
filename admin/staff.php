<?php include('includes/header.php') ?>
<?php include('../includes/session.php') ?>
<?php
if (isset($_GET['delete'])) {
	$delete = $_GET['delete'];
	$sql = "DELETE FROM tblemployees where emp_id = " . $delete;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('Staff deleted Successfully');</script>";
		echo "<script type='text/javascript'> document.location = 'staff.php'; </script>";
	}
}

?>

<body>

	<head>

		<style>
			body {
				position: relative;
				/* Add position relative */
			}

			.loader {
				border: 16px solid #f3f3f3;
				/* Light gray */
				border-top: 16px solid #3498db;
				/* Blue */
				border-radius: 50%;
				width: 120px;
				height: 120px;
				animation: spin 1s linear infinite;
				position: fixed;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				z-index: 99999;
				/* Updated z-index value */
				backdrop-filter: blur(0px);
				-webkit-backdrop-filter: blur(0px);
				/* For Safari */
			}

			@keyframes spin {
				0% {
					transform: rotate(0deg);
				}

				100% {
					transform: rotate(360deg);
				}
			}

			.mobile-menu-overlay {
				display: inline-block;
				/* Initially hide the contents */
				position: absolute;
				/* Add position absolute */
				top: 0;
				left: 0;
				right: 0;
				bottom: 0;
				background: rgba(0, 0, 0, 0.9);
				/* Adjust the background color and opacity as desired */
				backdrop-filter: blur(5px);
				/* Apply the blur effect */
				-webkit-backdrop-filter: blur(5px);
				/* For Safari */
			}
		</style>
		<script>
			window.addEventListener('DOMContentLoaded', function() {
				var loader = document.querySelector('.loader');
				var mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');

				setTimeout(function() {
					loader.style.display = 'none';
					mobileMenuOverlay.style.display = 'contents'; // Show the contents
				}, 1000); // Hide the loader after 1 second (1000 milliseconds)
			});
		</script>
	</head>

	<body>


		<div class="loader"></div>


		<?php include('includes/navbar.php') ?>

		<?php include('includes/right_sidebar.php') ?>

		<!-- <#?php include('includes/left_sidebar.php')?> -->
		<?php include('SideBar/sidebar.php') ?>
		<style>
			<?php include('SideBar/style.css') ?>
		</style>
		<script>
			<?php include('SideBar/script.js') ?>
		</script>

		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="pd-ltr-20">
				<div class="title pb-20">
					<h2 class="h3 mb-0">Administrative Breakdown</h2>

				</div>

				<div class="row pb-10">
					<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
						<div class="card-box height-100-p widget-style3">

							<?php
							$sql = "SELECT emp_id from tblemployees";
							$query = $dbh->prepare($sql);
							$query->execute();
							$results = $query->fetchAll(PDO::FETCH_OBJ);
							$empcount = $query->rowCount();
							?>

							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark"><?php echo ($empcount); ?></div>
									<div class="font-14 text-secondary weight-500">Total Employees</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-user-2"></i></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
						<div class="card-box height-100-p widget-style3">

							<?php
							$query_reg_staff = mysqli_query($conn, "select * from tblemployees where role = 'Staff' ") or die(mysqli_error());
							$count_reg_staff = mysqli_num_rows($query_reg_staff);
							?>

							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark"><?php echo htmlentities($count_reg_staff); ?></div>
									<div class="font-14 text-secondary weight-500">Staffs</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#09cc06"><span class="icon-copy fa fa-hourglass"></span></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
						<div class="card-box height-100-p widget-style3">

							<?php
							$query_reg_hod = mysqli_query($conn, "select * from tblemployees where role = 'HOD' ") or die(mysqli_error());
							$count_reg_hod = mysqli_num_rows($query_reg_hod);
							?>

							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark"><?php echo ($count_reg_hod); ?></div>
									<div class="font-14 text-secondary weight-500">Department Heads</div>
								</div>
								<div class="widget-icon">
									<div class="icon"><i class="icon-copy fa fa-hourglass-end" aria-hidden="true"></i></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
						<div class="card-box height-100-p widget-style3">

							<?php
							$query_reg_admin = mysqli_query($conn, "select * from tblemployees where role = 'Admin' ") or die(mysqli_error());
							$count_reg_admin = mysqli_num_rows($query_reg_admin);
							?>

							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark"><?php echo ($count_reg_admin); ?></div>
									<div class="font-14 text-secondary weight-500">Administrators</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#ff5b5b"><i class="icon-copy fa fa-hourglass-o" aria-hidden="true"></i></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card-box mb-30">
					<div class="pd-20">
						<h2 class="text-blue h4">ALL EMPLOYEES</h2>

					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus">FULL NAME</th>
									<th>EMAIL</th>
									<th>DEPARTMENT</th>
									<th>POSITION</th>
									<th>AVE. LEAVE</th>
									<th class="datatable-nosort">ACTION</th>
								</tr>
							</thead>
							<tbody>
								<tr>

									<?php
									$teacher_query = mysqli_query($conn, "select * from tblemployees LEFT JOIN tbldepartments ON tblemployees.Department = tbldepartments.DepartmentShortName where role != 'Admin' ORDER BY tblemployees.emp_id") or die(mysqli_error());
									while ($row = mysqli_fetch_array($teacher_query)) {
										$id = $row['emp_id'];
									?>

										<td class="table-plus">
											<div class="name-avatar d-flex align-items-center">
												<div class="avatar mr-2 flex-shrink-0">
													<img src="<?php echo (!empty($row['location'])) ? '../uploads/' . $row['location'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
												</div>
												<div class="txt">
													<div class="weight-600"><?php echo $row['FirstName'] . " " . $row['LastName']; ?></div>
												</div>
											</div>
										</td>
										<td><?php echo $row['EmailId']; ?></td>
										<td><?php echo $row['DepartmentName']; ?></td>
										<td><?php echo $row['role']; ?></td>
										<td><?php echo $row['Av_leave']; ?></td>
										<td>
											<div class="dropdown">
												<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
													<i class="dw dw-more"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
													<a class="dropdown-item" href="edit_staff.php?edit=<?php echo $row['emp_id']; ?>"><i class="dw dw-edit2"></i> Edit</a>
													<a class="dropdown-item" href="staff.php?delete=<?php echo $row['emp_id'] ?>"><i class="dw dw-delete-3"></i> Delete</a>
												</div>
											</div>
										</td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>

				<?php include('includes/footer.php'); ?>
			</div>
		</div>
		<!-- js -->

		<?php include('includes/scripts.php') ?>
	</body>

	</html>