<div id="sidebar">
	<div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
		<?php
			$filename = basename($_SERVER['REQUEST_URI']);
			//echo $filename;

			$dash = array('index.php');
			$rides = array('pendingR.php', 'completedR.php', 'canceledR.php', 'allR.php');
			$users = array('pendingU.php', 'approvedU.php', 'allU.php');
			$location = array('locationL.php', 'addnewL.php', 'UlocationL.php');
			$account = array('changeP.php');
		?>
			<!-- Logo (221px wide) -->
			<a href="#" class="navbar-brand mt-2"><span class="bg-dark text-white diff">Ced</span><span class="text-success diff">Cab</span></a>
			
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				<h5><a href="logout.php" title="Sign Out">Sign Out</a></h5>
			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->

				<li>
					<a href="index.php" class="nav-top-item no-submenu">Dashboard</a>       
				</li>
				
				<li> 
					<a href="#" class="nav-top-item <?php if(in_array($filename,$rides)): ?> current <?php endif; ?>">  <!-- Add the class "current" to current menu item -->
					Rides
					</a>
					<ul>
						<li><a <?php if($filename == 'pendingR.php'): ?>class="current"<?php endif; ?> href="pendingR.php">Pending Rides</a></li> <!-- Add class "current" to sub menu items also -->
                        <li><a <?php if($filename == 'completedR.php'): ?>class="current"<?php endif; ?> href="completedR.php">Completed Rides</a></li>
                        <li><a <?php if($filename == 'canceledR.php'): ?>class="current"<?php endif; ?> href="canceledR.php">Canceled Rides</a></li>
						<li><a <?php if($filename == 'allR.php'): ?>class="current"<?php endif; ?> href="allR.php">All Rides</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item <?php if(in_array($filename,$users)): ?> current <?php endif; ?>">
						Users
					</a>
					<ul>
						<li><a <?php if($filename == 'pendingU.php'): ?>class="current"<?php endif; ?> href="pendingU.php">Pending User Request</a></li>
						<li><a <?php if($filename == 'approvedU.php'): ?>class="current"<?php endif; ?> href="approvedU.php">Approved User Request</a></li>
						<li><a <?php if($filename == 'allU.php'): ?>class="current"<?php endif; ?> href="allU.php">All User</a></li>
					</ul>
				</li>

				<li>
					<a href="#" class="nav-top-item <?php if(in_array($filename,$location)): ?> current <?php endif; ?>">
						Location
					</a>
					<ul>
						<li><a <?php if($filename == 'locationL.php'): ?>class="current"<?php endif; ?> href="locationL.php">Location List</a></li>
						<li><a <?php if($filename == 'UlocationL.php'): ?>class="current"<?php endif; ?> href="UlocationL.php">Unavailable Locations</a></li>
						<li><a <?php if($filename == 'addnewL.php'): ?>class="current"<?php endif; ?> href="addnewL.php">Add New Location</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item <?php if(in_array($filename,$account)): ?> current <?php endif; ?>">
						Account
					</a>
					<ul>
						<li><a <?php if($filename == 'changeI.php'): ?>class="current"<?php endif; ?> href="changeI.php">Change Info</a></li>
						<li><a <?php if($filename == 'changeP.php'): ?>class="current"<?php endif; ?> href="changeP.php">Change Password</a></li>
					</ul>
				</li>      
				
			</ul>
			
			<div id="messages" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
				
				<h3>3 Messages</h3>
			 
				<p>
					<strong>17th May 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>2nd May 2009</strong> by Jane Doe<br />
					Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>25th April 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
				
				<form action="#" method="post">
					
					<h4>New Message</h4>
					
					<fieldset>
						<textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
					</fieldset>
					
					<fieldset>
					
						<select name="dropdown" class="small-input">
							<option value="option1">Send to...</option>
							<option value="option2">Everyone</option>
							<option value="option3">Admin</option>
							<option value="option4">Jane Doe</option>
						</select>
						
						<input class="button" type="submit" value="Send" />
						
					</fieldset>
					
				</form>
				
			</div> <!-- End #messages -->
			
		</div></div> <!-- End #sidebar -->