<?php 
session_start();
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
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
<div class="app-header header-shadow">
	<div class="app-header__logo">
		<div class="">
			<a class="app-sidebar__heading">Campaign System</a>
		</div>
		<div class="header__pane ml-auto">
			<div>
			</div>
		</div>
	</div>
 <div class="app-header__mobile-menu">
	<div>
		<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
			<span class="hamburger-box">
			<span class="hamburger-inner"></span>
			</span>
		</button>
	</div>
</div> 
<div class="app-header__menu">
	<span>
		<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
			<span class="btn-icon-wrapper">
				<i class="fa fa-ellipsis-v fa-w-6"></i>
			</span>
		</button>
	</span>
</div> 
<div class="app-header__content">
	<div class="app-header-left">
		<ul class="header-menu nav">
			<li class="nav-item">
			<a href="javascript:void(0);" class="nav-link">
			<i class="nav-link-icon fa fa-database"> </i>
			Statistics
			</a>
			</li>
			<li class="btn-group nav-item">
			<a href="javascript:void(0);" class="nav-link">
			<i class="nav-link-icon fa fa-edit"></i>
			Projects
			</a>
			</li>
			<li class="dropdown nav-item">
			<a href="javascript:void(0);" class="nav-link">
			<i class="nav-link-icon fa fa-cog"></i>
			Settings
			</a>
			</li>
		</ul> 
	</div>
<div class="app-header-right">
	<div class="header-btn-lg pr-0">
	<div class="widget-content p-0">
	<div class="widget-content-wrapper">
	<div class="widget-content-left">
		<div class="btn-group">
			<a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
				<img width="42" class="rounded-circle" src="../../assets/images/default-avatar.png" alt>
				<i class="fa fa-angle-down ml-2 opacity-8"></i>
			</a>
			<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
				<button type="button" tabindex="0" class="dropdown-item">User Account</button>
				<button type="button" tabindex="0" class="dropdown-item">Settings</button>
				<div tabindex="-1" class="dropdown-divider"></div>
				<button type="button" tabindex="0" class="dropdown-item"><a href="../../logout.php?user=<?=$user?>">Log Out</a></button>
			</div>
		</div>
	</div>
	<div class="widget-content-left  ml-3 header-user-info">
		<div class="widget-heading">
		<?=$user;?> 
		</div>
		<div class="widget-subheading">
		<?=$row_get_details['user_designation'];?>
		</div>
	</div>
	</div>
	</div>
	</div> 
</div>
</div>
</div> 
