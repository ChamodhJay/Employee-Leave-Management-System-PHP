<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>

<?php 
	 if (isset($_GET['delete'])) {
		$leave_type_id = $_GET['delete'];
		$sql = "DELETE FROM tblleavetype where id = ".$leave_type_id;
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('LeaveType deleted Successfully');</script>";
     		echo "<script type='text/javascript'> document.location = 'leave_type.php'; </script>";
			
		}
	}
?>

<?php
 if(isset($_POST['add']))
{
	 $leavetype=$_POST['leavetype'];
	 $description=$_POST['description'];
	 $dtefrom=date('d-m-Y', strtotime($_POST['date_from']));
	 $dteto=date('d-m-Y', strtotime($_POST['date_to']));

     $query = mysqli_query($conn,"select * from tblleavetype where LeaveType = '$leavetype'")or die(mysqli_error());
	 $count = mysqli_num_rows($query);
     
     if ($count > 0){ 
     	echo "<script>alert('LeaveType Already exist');</script>";
      }
      else{
        $query = mysqli_query($conn,"insert into tblleavetype (LeaveType, Description, date_from, date_to)
  		 values ('$leavetype', '$description', '$dtefrom', '$dteto')      
		") or die(mysqli_error()); 

		if ($query) {
			echo "<script>alert('LeaveType Added');</script>";
			echo "<script type='text/javascript'> document.location = 'leave_type.php'; </script>";
		}
    }

}

?>
<body>

<head>

<style>
    body {
      position: relative; /* Add position relative */
    }

    .loader {
      border: 16px solid #f3f3f3; /* Light gray */
      border-top: 16px solid #3498db; /* Blue */
      border-radius: 50%;
      width: 120px;
      height: 120px;
      animation: spin 1s linear infinite;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 99999; /* Updated z-index value */
      backdrop-filter: blur(0px);
      -webkit-backdrop-filter: blur(0px); /* For Safari */
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .mobile-menu-overlay {
      display: inline-block; /* Initially hide the contents */
      position: absolute; /* Add position absolute */
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.9); /* Adjust the background color and opacity as desired */
      backdrop-filter: blur(5px); /* Apply the blur effect */
      -webkit-backdrop-filter: blur(5px); /* For Safari */
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


	<?php include('includes/navbar.php')?>

	<?php include('includes/right_sidebar.php')?>

	<!-- <@?php include('includes/left_sidebar.php')?> -->
	<?php include('SideBar/sidebar.php') ?>
	  <style>
		<?php include('SideBar/style.css') ?>
	  </style>
	  <script>
		<?php include('SideBar/script.js') ?>
	  </script>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Leave Type List</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
										<li class="breadcrumb-item active" aria-current="page">Leave Type Module</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
							<div class="card-box pd-30 pt-10 height-100-p">
								<h2 class="mb-30 h4">New Leave Type</h2>
								<section>
									<form name="save" method="post">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label >Leave Type</label>
												<input name="leavetype" type="text" class="form-control" required="true" autocomplete="off">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Leave Description</label>
												<textarea name="description" style="height: 5em;" class="form-control text_area" type="text"></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Start Date</label>
												<input name="date_from" class="form-control" type="date">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>End Date</label>
												<input name="date_to" class="form-control" type="date">
											</div>
										</div>
									</div>
									
									<div class="col-sm-12 text-right">
										<div class="dropdown">
										   <input class="btn btn-primary" type="submit" value="REGISTER" name="add" id="add">
									    </div>
									</div>
								   </form>
							    </section>
							</div>
						</div>
						
						<div class="col-lg-8 col-md-6 col-sm-12 mb-30">
							<div class="card-box pd-30 pt-10 height-100-p">
								<h2 class="mb-30 h4">Leave Type List</h2>
								<div class="pb-20">
									<table class="data-table table stripe hover nowrap">
										<thead>
										<tr>
											<th class="table-plus">LEAVETYPE</th>
											<th class="table-plus">DESCRIPTION</th>
											<th table-plus>DATE RANGE</th>
											<th class="datatable-nosort">ACTION</th>
										</tr>
										</thead>
										<tbody>

											<?php $sql = "SELECT * from tblleavetype";
											$query = $dbh -> prepare($sql);
											$query->execute();
											$results=$query->fetchAll(PDO::FETCH_OBJ);
											$cnt=1;
											if($query->rowCount() > 0)
											{
											foreach($results as $result)
											{               ?>  

											<tr>
												<td> <?php echo htmlentities($result->LeaveType);?></td>
	                                            <td><?php echo htmlentities($result->Description);?></td>
	                                            <td><?php echo htmlentities($result->date_from." - ".$result->date_to);?></td>
												<td>
													<div class="table-actions">
														<a href="edit_leave_type.php?edit=<?php echo htmlentities($result->id);?>" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
														<a href="leave_type.php?delete=<?php echo htmlentities($result->id);?>" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
													</div>
												</td>
											</tr>

											<?php $cnt++;} }?>  

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>

			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<?php include('includes/scripts.php')?>
</body>
</html>