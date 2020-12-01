<?php 
	session_start();

	include('../dbConnect.php');
	include('admin.php');
	
	include("header.php");
	include("sidebar.php");

	if(isset($_GET['id']))
	{
		// echo "<center>".$_GET['id']."</center>";
		
		$dbConnect = new dbConnect();
		$admin = new admin();

		$idpass = $_GET['id'];

		$sql = $admin->General($idpass, $dbConnect->connect);
	}
?>

<html>
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			<?php
				echo "<h2>Welcome " .$_SESSION['userdata']['username']. "</h2>";
				echo "<p id='page-intro'>What would you like to do?</p>"
			?>
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-content">  
					
				</div>
				
			</div> <!-- End .content-box -->
					
			<div class="clear"></div>

			<div class="select">
				<form action="index.php" method="POST">
					<center>Filter Value:-
						<select name="filter" id="filter">
							<option value="Select Value">Select Value</option>
							<option value="name">Name</option>
							<option value="fare">Total-fare</option>
							<option value="date">Date</option>
						</select>
						<input type="submit" value="submit" name="submit" class="submit">
					</center>
				</form>

				<?php

					if (isset($_POST['submit'])) 
					{
						$dbConnect = new dbConnect();
						$ab = new admin();

						$filter=isset($_POST['filter'])?$_POST['filter']:'';
						if($filter==1 || $filter=='fare'|| $filter=='date')
						{
							$a= "<table><tr><th>Ride_id</th><th>Ride_date</th><th>Pickup</th><th>Drop</th><th>Distance</th><th>Fare</th><th>Laugage</th></tr><tr>";
							$ab->filterrr($a,$filter,$dbConnect->connect);
						}
						else
						{
							$a='<table><tr><th>User_id</th><th>Name</th><th>Contact</th><th>Date </th><th>username</th></tr><tr>';
							$ab->filterrr($a,$filter,$dbConnect->connect);
						}
					}

				?>
			</div>
<?php include("footer.php"); ?>
			