<?php
    include('../dbConnect.php');
    include('../user.php');
    include('admin.php');

	include("header.php");
	include("sidebar.php");

    $dbConnect = new dbConnect();
    $user = new user();
    $admin = new admin();

    if(isset($_POST['update']))
    {
        $username = isset($_POST['username']) ? ($_POST['username']) : "";
        $name = isset($_POST['name']) ? ($_POST['name']) : "";
        $mobile = isset($_POST['mobile']) ? ($_POST['mobile']) : "";
        // echo $username ,$name, $mobile, $password, $repassword;

        $sql = $admin->update($name, $mobile, $dbConnect->connect);
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
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-content">
					
					<div>
						<form action="#" method="post">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<!-- <p>
									<label>User Name</label>
									<input class="text-input small-input" type="text" id="small-input" placeholder="You Cant change the username..!!" readonly>
								</p> -->
								
								<p>
									<label>Name</label>
									<input class="text-input medium-input datepicker" type="text" id="name" name="name" placeholder="Enter Name.." onkeypress="return alphaonly(event)" value="<?php echo $_SESSION['userdata']['name']?>">
								</p>

                                <p>
									<label>Mobile</label>
									<input class="text-input medium-input datepicker" type="number" id="mobile" name="mobile" placeholder="Enter Mobile Number.." value="<?php echo $_SESSION['userdata']['mobile']?>">
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
			