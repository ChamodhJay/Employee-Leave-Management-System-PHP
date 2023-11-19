<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Dancing+Script&family=Josefin+Sans:ital,wght@0,100;0,200;1,200&family=Orbitron:wght@900&family=Young+Serif&family=Yuji+Hentaigana+Akari&display=swap" rel="stylesheet">
	<style>
		body {
			background: black;
		}

		.clock {
			position: absolute;
			top: 50%;
			left: 50%;
			width: 40%;
			transform: translateX(-50%) translateY(-50%);
			color: #4070f4;
			font-size: 40px;
			font-family: Orbitron;
			letter-spacing: 10px;
		}
	</style>

</head>

<body>
	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div id="MyClockDisplay" class="clock" onload="showTime()"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>

		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<!-- <i class="dw dw-settings2"></i> -->
					</a>
				</div>
			</div>

			<div class="user-info-dropdown">
				<div class="dropdown">

					<?php $query = mysqli_query($conn, "select * from tblemployees where emp_id = '$session_id'") or die(mysqli_error());
					$row = mysqli_fetch_array($query);
					?>

					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="<?php echo (!empty($row['location'])) ? '../uploads/' . $row['location'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" alt="" style="width: 52px;margin-top:auto;">
						</span>
						<span class="user-name"><?php echo $row['FirstName'] . " " . $row['LastName']; ?></span>
					</a>
					<!-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="my_profile.php"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="change_pasword.php"><i class="dw dw-help"></i> Reset Password</a>
						<a class="dropdown-item" href="../logout.php"><i class="dw dw-logout"></i> Log Out</a>
					</div> -->
				</div>
			</div>

		</div>
	</div>

	<script>
		function showTime() {
			var date = new Date();
			var h = date.getHours(); // 0 - 23
			var m = date.getMinutes(); // 0 - 59
			var s = date.getSeconds(); // 0 - 59
			var session = "AM";

			if (h == 0) {
				h = 12;
			}

			if (h > 12) {
				h = h - 12;
				session = "PM";
			}

			h = (h < 10) ? "0" + h : h;
			m = (m < 10) ? "0" + m : m;
			s = (s < 10) ? "0" + s : s;

			var time = h + ":" + m + ":" + s + " " + session;
			document.getElementById("MyClockDisplay").innerText = time;
			document.getElementById("MyClockDisplay").textContent = time;

			setTimeout(showTime, 1000);
		}

		showTime();
	</script>

</body>