<?php 
	session_start();

	include('../dbConnect.php');

	include("header.php");
	include("sidebar.php");

	if(isset($_POST['update']))
	{	
		$dbConnect = new dbConnect();
        $id = $_GET['id'];

        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $distance = isset($_POST['distance']) ? ($_POST['distance']) : '';
        
        $query = "UPDATE `tbl_location` SET `name`='".$name."', `distance`='".$distance."' WHERE `id`='".$id."'";    
        $result = mysqli_query($dbConnect->connect, $query);
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
				echo "<p id='page-intro'>ADD NEW LOCATION.</p>"
			?>
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-content">
					
					<div>
						<form action="#" method="post">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Location Name</label>
									<input class="text-input small-input" type="text" id="small-input" onkeypress="return alphaonly(event)" name="name"/>
								</p>
								
								<p>
									<label>Distance</label>
									<input class="text-input medium-input datepicker" type="number" id="medium-input" name="distance"/>
								</p>

								<p>
									<input class="button" type="submit" name="update" value="Update" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
					
			<div class="clear"></div>

			<script>
            	function alphaonly(button) 
				{ 
					console.log(button.which);
					var code = button.which;
					if ((code > 64 && code < 91) || (code < 123 && code > 96)|| (code==08)||(code < 58 && code > 47))
					return true; 
					return false; 
				} 
        	</script>
	
			<?php include("footer.php"); ?>
			