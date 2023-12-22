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
<div class="app-main__inner"> <!-- content start here --> 
<div class="row">
  <div class="col">
<div class="col-md-13 "> <!-- Campaign Info starts here -->
<div class="card ">
    <div class="card-header ">
    <h5 class="card-title">Sub Campaign Info</h5>
    </div>
    <div class="card-body ">

  <form class="form-horizontal" enctype="multipart/form-data" action="" method="POST">
        <div class="row">
          <?php 
  if (isset($_GET['ID'])) {
      $ID= $_GET['ID'];}
      $sql="SELECT * FROM subcampaign sb
      LEFT JOIN campaign c on c.Campaign_Id = sb.SubCampign_CampaigID
      WHERE SubCampign_Id='$ID' ";
      $sql_get_details= mysqli_query($con,$sql);
      $row= mysqli_fetch_array($sql_get_details);

       $SubCampign_name=$row['SubCampign_name'];
      $SubCampign_CampaigID=$row['SubCampign_CampaigID'];
      $SubCampign_CampaigID_name=$row['Campaign_Name'];
      $SubCampign_Desc=$row['SubCampign_Desc'];
      $SubCampign_PlannedStartDate=$row['SubCampign_PlannedStartDate'];
      $SubCampign_ActualStartDate=$row['SubCampign_ActualStartDate'];
      $SubCampign_PlannedEndDate=$row['SubCampign_PlannedEndDate'];
      $SubCampign_ActualEndDate=$row['SubCampign_ActualEndDate'];
      $SubCampign_BudgetAllocated=$row['SubCampign_BudgetAllocated'];
      $Campaign_PlannedEndDate=$row['Campaign_PlannedEndDate'];
      $SubCampign_BudgetAllocated=$row['SubCampign_BudgetAllocated'];
      $SubCampign_EmployeeID=$row['SubCampign_EmployeeID'];
      $SubCampign_active=$row['SubCampign_active'];
      $SubCampign_status=$row['SubCampign_status'];
      $SubCampign_revenue=$row['SubCampign_revenue'];
      $SubCampign_Expected_response=$row['SubCampign_Expected_response'];

if(isset($_POST['save'])){
$SubCampign_CampaigID=mysqli_escape_string($con,$_REQUEST['Campaign_Id']);
$SubCampign_Desc=mysqli_escape_string($con,$_REQUEST['SubCampign_Desc']);
$SubCampign_PlannedStartDate=mysqli_escape_string($con,$_REQUEST['SubCampign_PlannedStartDate']);
$SubCampign_PlannedEndDate=mysqli_escape_string($con,$_REQUEST['SubCampign_PlannedEndDate']);
$SubCampign_ActualStartDate=mysqli_escape_string($con,$_REQUEST['SubCampign_ActualStartDate']);
$SubCampign_ActualEndDate=mysqli_escape_string($con,$_REQUEST['SubCampign_ActualEndDate']);
$SubCampign_BudgetAllocated=mysqli_escape_string($con,$_REQUEST['SubCampign_BudgetAllocated']);
$SubCampign_EmployeeID= $rowz['user_id'];
$SubCampign_active=mysqli_escape_string($con,$_REQUEST['SubCampign_active']);
$SubCampign_status=mysqli_escape_string($con,$_REQUEST['SubCampign_status']);
$SubCampign_name=mysqli_escape_string($con,$_REQUEST['SubCampign_name']);
$SubCampign_revenue=mysqli_escape_string($con,$_REQUEST['SubCampign_revenue']);
$SubCampign_Expected_response=mysqli_escape_string($con,$_REQUEST['SubCampign_Expected_response']);

              $query1= "UPDATE `subcampaign` SET 
                 `SubCampign_name`='$SubCampign_name',
                 `SubCampign_CampaigID`='$SubCampign_CampaigID',
                 `SubCampign_Desc`='$SubCampign_Desc',
                 `SubCampign_PlannedStartDate`='$SubCampign_PlannedStartDate',
                 `SubCampign_ActualStartDate`='$SubCampign_ActualStartDate',
                 `SubCampign_PlannedEndDate`='$SubCampign_PlannedEndDate',
                 `SubCampign_ActualEndDate`='$SubCampign_ActualEndDate',
                 `SubCampign_BudgetAllocated`='$SubCampign_BudgetAllocated',
                 `SubCampign_EmployeeID`='$SubCampign_EmployeeID',
                 `SubCampign_active`='$SubCampign_active',
                 `SubCampign_status`='$SubCampign_status',
                 `SubCampign_revenue`='$SubCampign_revenue',
                 `SubCampign_Expected_response`='$SubCampign_Expected_response' 
                  where SubCampign_Id='$ID'";
                mysqli_query($con,$query1);
redirect("../Sub-Campaign/edit.php?ID=$ID&user=$user");
} ?>
                      <label class="col-lg-5 col-form-label">Sub Campaign Name <span style="color:red;">*</span> 
                      </label>
                      <div class="col-md-6">
                          <div class="form-group">
                            <input type="text" name="SubCampign_name" value="<?=$SubCampign_name?>" class="form-control" >
                          </div>
                      </div>
                      <label class="col-lg-5 col-form-label">Active<span style="color:red;">*</span></label>
                <div class=" col-md-6">
                <div class="form-group text-center">
                    <select class="custom-select"  title="<?=$row['SubCampign_active']?>" name="SubCampign_active" data-style="btn btn-facebook btn-round btn-block" data-size="7" selected>

                         <option value="Active" 
                         <?php if($row['SubCampign_active']== 'Active'){echo "selected";} ?>>Active</option>
                         <option value="Not Active"<?php if($row['SubCampign_active']== 'Not Active'){echo "selected";} ?>>Not Active</option>
                      </select>
                  </div>
                </div>
                  </div>
                   <br>
                  <div class="row">
                    <label class="col-lg-5 col-form-label">Parent Campaign <span style="color:red;">*</span></label>
                     <div class=" col-md-6">
                        <div class="form-group text-center">
                            <select class="custom-select" name="Campaign_Id" data-style="btn btn-instagram btn-round btn-block" title="<?=$SubCampign_CampaigID_name?>" data-size="7">
                                  <option value="none">None</option>
                                   <?php if(empty($boarding ))?>
                              <?php
                              $parent="select * from campaign ";
                              $pquery=mysqli_query($con,$parent);
                              while ($prow=mysqli_fetch_array($pquery)) {

                              ?>
                              <option value="<?=$prow['Campaign_Id']?>" <?php if($SubCampign_CampaigID_name == $prow['Campaign_Name']){echo "selected";} ?>><?=$prow['Campaign_Name']?></option>
                                    <?php
                                  }
                                    ?>
                                </select>
                          </div>
                      </div>
                          <label class="col-lg-5 col-form-label">Sub Campaign Status<span style="color:red;">*</span></label>
                     <div class=" col-md-6">
                          <div class="form-group text-center">
                              <select class="custom-select" name="SubCampign_status" data-style="btn btn-facebook btn-round btn-block"  title="<?=$SubCampign_status?>" data-size="7" >
                         <option value="Planned" <?php if($row['SubCampign_status']== 'Planned'){echo "selected";} ?>>Planned</option>
                         <option value="In Progress" <?php if($row['SubCampign_status']== 'In Progress'){echo "selected";} ?>>In Progress</option>
                         <option value="Completed" <?php if($row['SubCampign_status']== 'Completed'){echo "selected";} ?>>Completed</option>
                         <option value="Aborted" <?php if($row['SubCampign_status']== 'Aborted'){echo "selected";} ?>>Aborted</option>
                              </select>
                            </div>
                          </div>
                  </div><br>
                  <div class="row">
                      <label class="col-lg-4 col-form-label">Sub Campaign Description</label>
                      <div class="col-md-8">
                          <div class="form-group">
                            <textarea type="text" rows="4" name="SubCampign_Desc" class="form-control" ><?=$SubCampign_Desc?></textarea>
                            <span id="admission-availability-status"></span>
                          </div>
                      </div>
                  </div>
      </div><!-- card body  -->
    </div>  <!-- card   -->  
  </div><!-- Campaign Info ends here -->
  <br>
  <div class="col-md-12"><!-- admin Info starts here -->
    <div class="card ">
      <div class="card-header ">
        <h5 class="card-title">Admins</h5>
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
            <label class="col-md-3 col-form-label"> Modified Last by:</label>
            <div class="col-md-9">
                <div class="form-group">
                  <label class="col-md-5 col-form-label" style="font-weight: bolder;"><?=$user?></label>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div><!-- admin Info ends here -->
</div><!-- col1 ends here -->
  <div class="col">
<div class="col-md-12"><!-- Dates starts here -->
  <div class="card card-stats">
    <div class="card-header ">
    <h5 class="card-title">Dates</h5>
    </div>
    <div class="card-body ">
       <div class="row">
                    <label class="col-lg-5 col-form-label">Start Date<span style="color:red;">*</span></label>
                    <div class="col-lg-6">
                       <div class="input-group form-control-lg">
                        <input type="date" class="form-control datepicker" name="SubCampign_PlannedStartDate" value="<?=$SubCampign_PlannedStartDate?>" >
                        </div> 
                    </div>
                    <label class="col-lg-5 col-form-label">End Date<span style="color:red;">*</span></label>
                    <div class="col-lg-6">
                       <div class="input-group form-control-lg">
                        <input type="date" class="form-control " name="SubCampign_PlannedEndDate" value="<?=$SubCampign_PlannedEndDate?>" >
                        </div> 
                    </div>
                  </div>
        <div class="row">
          <label class="col-lg-5 col-form-label">Actual Start Date<span style="color:red;">*</span></label>
          <div class="col-lg-6">
             <div class="input-group form-control-lg">
              <input type="date" class="form-control datepicker" name="SubCampign_ActualStartDate" value="<?=$SubCampign_ActualStartDate ?>" >
              </div> 
          </div>
          <label class="col-lg-5 col-form-label">Actual End Date<span style="color:red;">*</span></label>
          <div class="col-lg-6">
             <div class="input-group form-control-lg">
              <input type="date" class="form-control " name="SubCampign_ActualEndDate" value="<?=$SubCampign_ActualEndDate ?>" >
              </div> 
          </div>
        </div>
    </div>
  </div>
</div> <br>
<div class="col-md-12 "><!-- Financials starts here -->
  <div class="card card-stats">
    <div class="card-header ">
    <h5 class="card-title">Financials</h5>
    </div>
    <div class="card-body ">
        <div class="row">
          <label class="col-lg-5 col-form-label">Expected Revenue(KSH)  
            </label>
            <div class="col-md-6">
                <div class="form-group">
                  <input type="number"  name="SubCampign_revenue" placeholder="0" class="form-control" value="<?=$SubCampign_revenue?>" >
                </div>
            </div>
            <label class="col-lg-5 col-form-label">Campaign Budget(KSH)
            </label>
            <div class="col-md-6">
                <div class="form-group">
                  <input type="number" placeholder="0" name="SubCampign_BudgetAllocated" class="form-control" value="<?=$SubCampign_BudgetAllocated ?>" >
                </div>
            </div>
        </div><br>
        <div class="row">
          <label class="col-lg-5  col-form-label">Expected response(%)<span style="color:red;">*</span>
            </label>
            <div class="col-md-6">
                <div class="form-group">
                  <input type="number" placeholder="0" name="SubCampign_Expected_response"  class="form-control" value="<?=$SubCampign_Expected_response?>" >
                </div>
            </div>
        </div><br>
    </div>
  </div>
</div>
</div>
</div> <!-- row end here -->
<br>
<div class="row ">
  <button type="submit" name="save" class="btn mb-2 mr-2 btn btn-alternate btn-md col-md-6 ml-auto mr-auto">Edit</button> 
</div>
</form>
 </div><!-- content end here -->
<script src="https://maps.google.com/maps/api/js?sensor=true"></script>  
</div>
</div>
<script type="text/javascript" src="../../assets/scripts/main.js"></script>
</body>
</html>
