<?php include "..\..\connect.php";
 ?>
<link href="../../main.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<?php include "..\inc\header.php" ?> 
<?php include "..\inc\Nav.php"?> 
<body>
<div class="app-main">
<?php include "..\inc\side_bar.php"?>
<div class="app-main__outer">
<div class="app-main__inner"><!-- content start -->
<div class="row">
  <div class="col-lg-7 ml-auto mr-auto"><!-- User info start -->
    <div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title">User info</h5>
      <?php 
      if(isset($_SESSION["admin"])) {
        $user=$_SESSION["admin"];
      }
       if (isset($_GET['user'])) {
             $user= $_GET['user'];
            }
      $sql="SELECT * FROM users u
            left join location l on l.Location_ID=u.user_locationID 
           WHERE user_username='$user' ";
          $sql_get_details= mysqli_query($con,$sql);
          $rowz= mysqli_fetch_array($sql_get_details); 
          ?>
         <div class=" text-center"> 
          <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-2 btn">
          <img width="100" class="rounded-circle" src="../../assets/images/default-avatar.png" alt>
        </a><br>
        <span class="card-title"><?=$rowz['user_username']?></span>
        </div> 
    <table class="mb-0 table table-borderless">
      <tbody>
        <tr>
          <td style="font-weight: bold;">Email:</td>
          <td><?=$rowz['user_email']?></td>
        </tr>
        <tr>
          <td style="font-weight: bold;">Designation:</td>
          <td><?=$rowz['user_designation']?></td>
        </tr>
         <tr>
          <td style="font-weight: bold;">Phone Number:</td>
          <td><?=$rowz['user_phone1']?></td>
        </tr>
        <tr>
          <td style="font-weight: bold;">ID Number:</td>
          <td><?=$rowz['user_nationalID']?></td>
        </tr>
        <tr>
          <td style="font-weight: bold;">user access:</td>
          <td><?=$rowz['user_access']?></td>
        </tr>
        <tr>
          <td style="font-weight: bold;">gender:</td>
          <td><?=$rowz['user_gender']?></td>
        </tr>
        <tr>
          <td style="font-weight: bold;">address:</td>
          <td><?=$rowz['Location_address']?></td>
        </tr>
        <tr>
          <td style="font-weight: bold;">ZipCode:</td>
          <td><?=$rowz['Location_ZipCode']?></td>
        </tr>
      </tbody>
    </table>
    </div>
    </div>
  </div><!-- User info end -->

</div>
</div><!-- content start -->
</div>
<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
</div>
</div>
<script type="text/javascript" src="../../assets/scripts/main.js"></script>
</body>
</html>
