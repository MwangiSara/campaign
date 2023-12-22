<?php 
if(isset($_SESSION["admin"])) {
  $user=$_SESSION["admin"];
}
 if (isset($_GET['user'])) {
       $user= $_GET['user'];
      }
$sql="SELECT * FROM users
     WHERE user_username='$user' ";
    $sql_get_details= mysqli_query($con,$sql);
    $row_get_details= mysqli_fetch_array($sql_get_details);
 ?>
<div class="app-sidebar sidebar-shadow">
	<!-- <div class="app-header__logo">
		<div class="logo-src"></div>
			<div class="header__pane ml-auto">
				<div>
					<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>
			</div>
	</div> -->
	<!-- <div class="app-header__mobile-menu">
		<div>
			<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</button>
		</div>
	</div> -->
	
	<div class="scrollbar-sidebar">
		<div class="app-sidebar__inner">
			<ul class="vertical-nav-menu">
				<li class="app-sidebar__heading">Dashboard</li>
				<li>
					<a href="../dashboard/" >
					<i class="metismenu-icon pe-7s-rocket"></i>
					Dashboard
					</a>
				</li>
				<li class="app-sidebar__heading">Campaign</li>
				<li>
					<a href="../campaign/">
					<i class="metismenu-icon pe-7s-science"></i>
					Campaign
					</a>
				</li>
				<li>
					<a href="../Sub-Campaign/" >
					<i class="metismenu-icon pe-7s-science"></i>
					Sub-Campaign
					</a>
				</li>
				<li>
					<a href="../Campaign Analysis/" >
					<i class="metismenu-icon pe-7s-display1"></i>
					Campaign Analysis
					</a>
				</li>
				<li class="app-sidebar__heading">Expenditure</li>
				<li>
					<a href="../Expenditure/index.php" >
					<i class="metismenu-icon pe-7s-cash"></i>
					Expenditure
					</a>
				</li>
				<li class="app-sidebar__heading">Team</li>
				<li>
					<a href="../team/">
						<i class="metismenu-icon pe-7s-users"></i>
						Team
					</a>
				</li>
				<li>
					<a href="../admn/" >
					<i class="metismenu-icon pe-7s-user"></i>
					User account
					</a>
				</li>
				<li>
					<a href="../../logout.php?user=<?=$user?>">
					<i class="metismenu-icon pe-7s-refresh"></i>
					log Out
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>

