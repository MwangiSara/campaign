<?php include "..\..\connect.php";
if(isset($_SESSION["admin"])) {
  $user=$_SESSION["admin"];
}
if (isset($_GET['user'])) {
   $user= $_GET['user'];}
$sql="SELECT * FROM users
 WHERE user_username='$user' ";
$sql_get_details= mysqli_query($con,$sql);
$rowz= mysqli_fetch_array($sql_get_details);
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
<div class="app-main__inner"> <!-- content start here -->
  <?php
  if (isset($_GET['ID'])) {
    $ID= $_GET['ID'];}
    $sql="SELECT * FROM subcampaign sb 
    LEFT JOIN campaign c on c.Campaign_Id = sb.SubCampign_CampaigID
    WHERE SubCampign_Id='$ID' ";
    $sql_get_details= mysqli_query($con,$sql);
    $row= mysqli_fetch_array($sql_get_details);
  ?> 
   <div class="main-card mb-3 card ">
    <div class="card-header">
    <h5 class="card-title" >REPORT<span class="font-weight-light">#CMS<?=$row['SubCampign_Id']?></span></h5>
    </div>
<div class="card-body">
    <div class="scroll-area-lg">
        <div class="scrollbar-container ps--active-y">
            <div class="row">
                <div class="col-12">
                  <h5 class="card-description mt-1 font-weight-bold" style="text-align: center;"> 
                    <?=$row['SubCampign_name']?>
                  </h5>
                  <h7 class="card-title">Date: <span class="font-weight-light"><?=$row['SubCampign_ActualStartDate']?>-<?=$row['SubCampign_PlannedEndDate']?></span></h7><br>
                  <h7 class=""><?=$row['SubCampign_Desc']?></h7>
                </div>
              </div>
              <div class="row">
              <div class="col-6">
                  <div class="table-responsive">
                    <h6 class="font-weight-bold text-capitalize">Details</h6></h5>
                    <table class="table mt-3">
                      <tbody>
                        <tr>
                                  <td class="">
                                    Name
                                  </td>
                                  <td class="">
                                   <?=$row['SubCampign_name']?>
                                  </td>
                                </tr>
                                <tr>
                                <td class="">
                                    Parent Campaign
                                  </td>
                                  <td class="">
                                   <?=$row['Campaign_Name']?>
                                  </td>
                                </tr>
                                <tr>
                                <td class="">
                                    Active
                                  </td>
                                  <td class="">
                                   <?=$row['SubCampign_status']?>
                                  </td>
                                </tr>
                                <td class="">
                                    Status
                                  </td>
                                  <td class="">
                                   <?=$row['Campaign_status']?>
                                  </td>
                                </tr>
                                <td class="">
                                    Budget Allocated
                                  </td>
                                  <td class="">
                                   <?=$row['SubCampign_BudgetAllocated']?>
                                  </td>
                                </tr>
                                <td class="">
                                    Revenue
                                  </td>
                                  <td class="">
                                   <?=$row['SubCampign_revenue']?>
                                  </td>
                                </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-6">
                  <div class="table-responsive">
                    <h6 class="font-weight-bold text-capitalize">Financial Activities</h6></h5>
                    <table class="table mt-3">
                      <tbody>
                        <tr>
                          <td class="pl-0">
                            2022-11/2023-11
                          </td>
                          <td class="px-0">
                            50000
                          </td>
                          <td class="pr-0 ">
                            60000
                          </td>
                          <td class="pr-0">
                            55000
                          </td>
                        </tr>
                        <tr>
                          <td class="pl-0">
                            2022-06/2023-10
                          </td>
                          <td class="px-0">
                            100000
                          </td>
                          <td class="pr-0 ">
                            77000
                          </td>
                          <td class="pr-0">
                            95000
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-block text-right card-footer">
    <a class=" btn btn-success btn-lg" href="javascript:window.print()">Print</a>
</div>
</div> 
 </div><!-- content end here -->
<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
</div>
</div>
<script type="text/javascript" src="../../assets/scripts/main.js"></script>
</body>
</html>
