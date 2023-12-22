<?php include "..\..\connect.php"; 
if(isset($_SESSION["admin"])) {
  $user=$_SESSION["admin"];
}
if (isset($_GET['user'])) {
       $user= $_GET['user'];
      }
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
<div class="app-main__inner">  <!-- content start here -->
<div class="row">
                      <div class="col">
                    <div class="col-md-15 "> <!-- Campaign Info starts here -->
<div class="card ">
    <div class="card-header ">
    <h5 class="stats-title" style="font-weight: bolder;">Campaign Info</h5>
    </div>
    <div class="card-body ">

  <form class="form-horizontal" enctype="multipart/form-data" action="" method="POST">
        <div class="row">
          <?php 
  if (isset($_GET['ID'])) {
      $ID= $_GET['ID'];}
      $sql="SELECT * FROM campaign c 
      LEFT JOIN campaigntype ct on ct.CampaignType_id = c.Campaign_typeID
      WHERE campaign_id='$ID' ";
      $sql_get_details= mysqli_query($con,$sql);
      $row= mysqli_fetch_array($sql_get_details);

        $Campaign_Name=$row['Campaign_Name'];
      $Actives=$row['campaign_active'];
      $campaign_type=$row['Campaign_typeID'];
      $Campaign_Status=$row['Campaign_status'];
      $campaign_type_name=$row['CampaignType_Name'];
      $Campaign_ActualStartDate=$row['Campaign_ActualStartDate'];
      $Campaign_ActualEndDate=$row['Campaign_ActualEndDate'];
      $Campaign_PlannedStartDate=$row['Campaign_PlannedStartDate'];
      $Campaign_PlannedEndDate=$row['Campaign_PlannedEndDate'];
      $Campaign_Budget=$row['Campaign_BudgetAllocated'];
      $revenue=$row['Campaign_revenue'];
     $Campaign_description=$row['campaign_desc'];
      $campaign_expectedRespose=$row['campaign_expectedRespose'];

if(isset($_POST['save'])){
$Campaign_Name=mysqli_escape_string($con,$_REQUEST['Campaign_Name']);
$Active=mysqli_escape_string($con,$_REQUEST['Campign_active']);
$campaign_type=mysqli_escape_string($con,$_REQUEST['campaign_type']);
$Campaign_Status=mysqli_escape_string($con,$_REQUEST['Campaign_Status']);
$Campaign_ActualStartDate=mysqli_escape_string($con,$_REQUEST['Campaign_ActualStartDate']);
$Campaign_ActualEndDate=mysqli_escape_string($con,$_REQUEST['Campaign_ActualEndDate']);
$Campaign_PlannedStartDate=mysqli_escape_string($con,$_REQUEST['Campaign_PlannedStartDate']);
$Campaign_PlannedEndDate=mysqli_escape_string($con,$_REQUEST['Campaign_PlannedEndDate']);
$revenue=mysqli_escape_string($con,$_REQUEST['revenue']);
$Campaign_Budget=mysqli_escape_string($con,$_REQUEST['Campaign_Budget']);
$editor= $rowz['user_id'];
$Campaign_description=mysqli_escape_string($con,$_REQUEST['Campaign_description']);
$campaign_expectedRespose=mysqli_escape_string($con,$_REQUEST['campaign_expectedRespose']);
$query1= "UPDATE campaign
            SET 
              Campaign_PlannedStartDate= '$Campaign_PlannedStartDate',
              Campaign_ActualStartDate= '$Campaign_ActualStartDate',
              Campaign_PlannedEndDate= '$Campaign_PlannedEndDate',
              Campaign_ActualEndDate= '$Campaign_ActualEndDate',
              Campaign_Name= '$Campaign_Name',
              Campaign_BudgetAllocated= '$Campaign_Budget',
              Campaign_status= '$Campaign_Status',
              Campaign_revenue= '$revenue',
              campaign_active= '$Active',
              campaign_desc= '$Campaign_description',
              Campaign_typeID= '$campaign_type',
              campaign_expectedRespose= '$campaign_expectedRespose'
              where Campaign_Id='$ID'
              ";
               mysqli_query($con,$query1);
               redirect("../campaign/edit.php?ID=$ID&user=$user");

} ?>
            <label class="col-lg-5 col-form-label">Campaign Name <span style="color:red;">*</span> 
            </label>
            <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="Campaign_Name" class="form-control" value="<?=$row['Campaign_Name']?>" >
                </div>
            </div>
               <label class="col-lg-5 col-form-label">Active<span style="color:red;">*</span></label>
                <div class=" col-md-6">
                <div class="position-relative form-group">
                    <select class="custom-select"  title="<?=$row['campaign_active']?>" name="Campign_active" data-style="btn btn-facebook btn-round btn-block" data-size="7" selected>

                         <option value="Active" 
                         <?php if($row['campaign_active']== 'Active'){echo "selected";} ?>>Active</option>
                         <option value="Not Active"<?php if($row['campaign_active']== 'Not Active'){echo "selected";} ?>>Not Active</option>
                      </select>
                  </div>
                </div>
        </div>
        <div class="row">
          <label class="col-lg-5 col-form-label">Campaign Type<span style="color:red;">*</span></label>
           <div class=" col-md-6">
              <div class="form-group text-center">
                    <select class="custom-select" name="campaign_type" data-style="btn btn-facebook btn-round btn-block" title="<?=$campaign_type_name?>" data-size="7" >
                    <?php
                    $parent="SELECT * from campaigntype";
                    $pquery=mysqli_query($con,$parent);
                    while ($prow=mysqli_fetch_array($pquery)) {
                    ?>
                    <option value="<?=$prow['CampaignType_id']?>" <?php if($campaign_type_name == $prow['CampaignType_Name']){echo "selected";} ?>><?=$prow['CampaignType_Name'] ?> </option>
                    <?php
                    }?>
                    </select>
                </div>
            </div>
                <label class="col-lg-5 col-form-label">Campaign Status<span style="color:red;">*</span></label>
           <div class=" col-md-6">
                <div class="form-group text-center">
                      <select class="custom-select" name="Campaign_Status" data-style="btn btn-facebook btn-round btn-block"  title="<?=$Campaign_Status ?>" data-size="7">
                         <option value="Planned" <?php if($row['Campaign_status']== 'Planned'){echo "selected";} ?>>Planned</option>
                         <option value="In Progress" <?php if($row['Campaign_status']== 'In Progress'){echo "selected";} ?>>In Progress</option>
                         <option value="Completed" <?php if($row['Campaign_status']== 'Completed'){echo "selected";} ?>>Completed</option>
                         <option value="Aborted" <?php if($row['Campaign_status']== 'Aborted'){echo "selected";} ?>>Aborted</option>
                      </select>
                  </div>
                </div>
        </div>
        <div class="row">
            <label class="col-lg-5 col-form-label">Campaign Description</label>
            <div class="col-md-12">
                <div class="form-group">
                  <textarea type="text" rows="4" name="Campaign_description" class="form-control"><?=$Campaign_description ?></textarea>
                  <span id="admission-availability-status"></span>
                </div>
            </div>
        </div>
      </div>
    </div>    
  </div>
  <br>
  <div class="col-md-12 "><!-- admin Info starts here -->
    <div class="card">
      <div class="card-header ">
        <h5 class="stats-title" style="font-weight: bolder;">Admins</h5>
      </div>
      <div class="card-body ">
        <div class="row">
          <label class="col-md-3 col-form-label">Created By:</label>
          <div class="col-md-9">
              <div class="form-group">
                <label class="col-md-5 col-form-label" style="font-weight: bolder;"><?=$user?></label>
              </div>
          </div>
        </div>
        <div class="row">
            <label class="col-md-4 col-form-label"> Modified Last by:</label>
            <div class="col-md-7">
                <div class="form-group">
                  <label class="col-md-6 col-form-label" style="font-weight: bolder;"><?=$user?></label>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <div class="col">
<div class="col-md-12"><!-- Dates starts here -->
  <div class="card card-stats">
    <div class="card-header ">
    <h5 class="stats-title" style="font-weight: bolder;">Dates</h5>
    </div>
    <div class="card-body ">
      <div class="row">
          <label class="col-lg-5 col-form-label">Planned Start Date<span style="color:red;">*</span></label>
          <div class="col-md-7.5">
             <div class="input-group form-control-lg">
              <div class="input-group-prepend">
              </div>
              <input type="date" class="form-control datepicker" name="Campaign_PlannedStartDate" value="<?=$Campaign_PlannedStartDate ?>" >
              </div> 
          </div>
          <label class="col-lg-5 col-form-label">Planned End Date<span style="color:red;">*</span></label>
          <div class="col-md-7.5">
             <div class="input-group form-control-lg">
              <div class="input-group-prepend">
              </div>
              <input type="date" class="form-control " name="Campaign_PlannedEndDate" value="<?=$Campaign_PlannedEndDate ?>" >
              </div> 
          </div>
        </div>
        <div class="row">
          <label class="col-lg-5 col-form-label">Actual Start Date<span style="color:red;">*</span></label>
          <div class="col-md-7.5">
             <div class="input-group form-control-lg">
              <div class="input-group-prepend">
              </div>
              <input type="date" class="form-control datepicker" name="Campaign_ActualStartDate" value="<?=$Campaign_ActualStartDate ?>" >
              </div> 
          </div>
          <label class="col-lg-5 col-form-label">Actual End Date<span style="color:red;">*</span></label>
          <div class="col-md-7.5">
             <div class="input-group form-control-lg">
              <div class="input-group-prepend">
              </div>
              <input type="date" class="form-control " name="Campaign_ActualEndDate" value="<?=$Campaign_ActualEndDate ?>" >
              </div> 
          </div>
        </div>
    </div>
  </div>
</div>
<br>
<div class="col-md-12 "><!-- Financials starts here -->
  <div class="card card-stats">
    <div class="card-header ">
    <h5 class="stats-title" style="font-weight: bolder;">Financials</h5>
    </div>
    <div class="card-body ">
        <div class="row">
          <label class="col-lg-5 col-form-label">Expected Revenue(KSH)  
            </label>
            <div class="col-md-4">
                <div class="form-group">
                  <input type="number"  name="revenue" placeholder="0" class="form-control" value="<?=$revenue ?>" >
                </div>
            </div>
            <label class="col-lg-5 col-form-label">Campaign Budget(KSH)
            </label>
            <div class="col-md-4">
                <div class="form-group">
                  <input type="number" placeholder="0" name="Campaign_Budget" class="form-control"value="<?=$Campaign_Budget ?>" >
                </div>
            </div>
        </div>
        <div class="row">
          <label class="col-lg-5 col-form-label">Expected response(%)<span style="color:red;">*</span>
            </label>
            <div class="col-md-4">
                <div class="form-group">
                  <input type="number" placeholder="0" name="campaign_expectedRespose"  class="form-control" value="<?=$campaign_expectedRespose ?>"  >
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
</div>
</div><br>
<div class="row ">
  <button type="submit" name="save" class="btn mb-2 mr-2 btn btn-alternate btn-md col-md-6 ml-auto mr-auto">Edit</button> 
</div>
</div>  <!-- content end here -->
 </div>
<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
</div>
</div>
<script type="text/javascript" src="../../assets/scripts/main.js"></script>
</body>
</html>
