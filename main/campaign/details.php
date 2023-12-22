<?php include "..\..\connect.php" ?>
<link href="../../main.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<?php include "..\inc\header.php" ?> 
<?php include "..\inc\Nav.php"?> 

<body>
<div class="app-main">
<?php include "..\inc\side_bar.php"?>
 <div class="app-main__outer">
<div class="app-main__inner">  
<div class="row">
  <!-- content start here -->
    <?php
      if (isset($_GET['ID'])) {
        $ID= $_GET['ID'];}
        $sql="SELECT * FROM campaign c 
        LEFT JOIN campaigntype ct on ct.CampaignType_id = c.Campaign_typeID
        WHERE campaign_id='$ID' ";
        $sql_get_details= mysqli_query($con,$sql);
        $row= mysqli_fetch_array($sql_get_details);
    ?>    
      <div class="col-md-6"><!-- campaign starts here -->
        <div class="card card-user">
          <div class="card-body">
              <div class="author">
                  <h5 style="color: #3F6AD8; text-align: center; font-size: 30px; " class="card-title"><?=$row['Campaign_Name']?></h5>
                  <div class="item-content">
                    <div class="info-table table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td> Name:</td>
                                    <td class="description font-medium text-dark-medium"><?=$row['Campaign_Name']?></td>
                                </tr>
                                <tr>
                                    <td> Active:</td>
                                    <td class="description font-medium text-dark-medium"><?=$row['campaign_active']?></td>
                                </tr>
                                <tr>
                                    <td> Type:</td>
                                    <td class="description font-medium text-dark-medium"><?=$row['CampaignType_Name']?></td>
                                </tr>
                                <tr>
                                    <td>  Status:</td>
                                    <td class="description font-medium text-dark-medium"><?=$row['Campaign_status']?></td>
                                </tr>
                                
                                <tr>
                                    <td> Planned Start Date:</td>
                                    <td class="description font-medium text-dark-medium"><?=$row['Campaign_PlannedStartDate']?></td>
                                </tr>
                                <tr>
                                    <td>Actual Start Date:</td>
                                    <td class="description font-medium text-dark-medium"><?=$row['Campaign_ActualStartDate']?></td>
                                </tr>
                                
                                <tr>
                                    <td> Planned End Date:</td>
                                    <td class="description font-medium text-dark-medium"><?=$row['Campaign_PlannedEndDate']?></td>
                                </tr>
                                <tr>
                                    <td>Actual End Date:</td>
                                    <td class="description font-medium text-dark-medium"><?=$row['Campaign_ActualEndDate']?></td>
                                </tr>
                                <tr>
                                    <td> Budget Allocated:</td>
                                    <td class="description text-dark-medium"><?=$row['Campaign_BudgetAllocated']?></td>
                                </tr>
                                <tr>
                                    <td> Emplyee ID:</td>
                                    <td class="description text-dark-medium"><?=$row['Campaign_EmplyeeID']?></td>
                                </tr>
                                <tr>
                                    <td> Expected Customer Reach:</td>
                                    <td class="description text-dark-medium"><?=$row['Campaign_ExpectedCustomerReach']?></td>
                                </tr>
                                <tr>
                                    <td>Revenue:</td>
                                    <td class="description text-dark-medium"><?=$row['Campaign_revenue']?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                  </div>
              </div>
          </div>
        </div>
    </div><!-- campaign ends here -->
    <div class="col">
      <div class="col-md-13"><!-- Marketing Lists starts here -->
        <div class="card main-card mb-3">
           <div class="card-header card-header-primary card-header-icon">
             <h5 class="card-title"> Marketing Lists </h5>
          </div>
            <div class="card-body" style="background-image: url('../../assets/img/');">
                <div class="row">
                  <div class="col-md-8 ml-auto mr-auto">
                  </div>
                </div> 
             <table  class="table table-bordered"  width="100%" style="width:100%">  
               <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Purpose</th>
                </tr>         
                  <tr>
                    <td>james Lend</td>
                    <td>Dynamic</td>
                    <td>Auditing</td>
                    <td><div class="row">
                    <div class="col-lg-10 col-md-6 col-sm-6 btn-group">
                        <div class="dropdown">
                      <button class="dropdown-toggle btn btn btn-outline-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> action</button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Email </a>
                        </div>
                        </div>
                        </div>
                  </div>
                  </td>
                </tr>
                <tr>
                    <td>Samuel John</td>
                    <td>Dynamic</td>
                    <td>Resarch</td>
                    <td><div class="row">
                    <div class="col-lg-10 col-md-6 col-sm-6 btn-group">
                        <div class="dropdown">
                      <button class="dropdown-toggle btn btn btn-outline-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> action</button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Email </a>
                        </div>
                        </div>
                        </div>
                  </div>
                  </td>
                </tr>
                </table>
              </div>
             </div> 
             </div><!-- Marketing Lists ends here -->
      <div class="col-md-13 "><!-- Financial Activities starts here -->
        <div class=" main-card mb-3 card">
           <div class="card-header card-header-primary card-header-icon">
             <h4 class="card-title"> Financial Activities </h4>
          </div>
            <div class="card-body" style="background-image: url('../../assets/img/');">
                <div class="row">
                  <div class="col-md-8 ml-auto mr-auto">
                  </div>
                </div> 
          
             <table  class="table table-bordered"  width="100%" style="width:100%">  
               <tr>
                    <th>Date Paid</th>
                    <th>Paid To</th>
                    <th>Amount</th>
                    <th>Description</th>
                </tr>
          <?php 
          $get_query="SELECT * FROM `expenditure` WHERE `Expenditure_Campaign` = $ID";
          $sql_get_expenditure= mysqli_query($con,$get_query);
          while ($row_expenditure= mysqli_fetch_array($sql_get_expenditure)) {?>
            <tr>
              <td><?=$row_expenditure['Expenditure_DatePaid'] ?></td>
              <td><?=$row_expenditure['Expenditure_PaidTo'] ?></td>
              <td><?=$row_expenditure['Expenditure_Amount'] ?></td>
              <td><?=$row_expenditure['Expenditure_Desc'] ?></td>
              <td>
                <div class="row">
                  <div class="col-lg-10 col-md-6 col-sm-6 btn-group">
                    <div class="dropdown">
                    <button class="dropdown-toggle btn btn btn-outline-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> action</button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="../expenditure/downloads.php?ID=<?=$row_expenditure['Expenditure_Id']?>&user=<?=$user?>">Print </a>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr><?php } ?>      
                  
                </table>
              </div>
             </div> 
             </div><!-- Financial Activities ends here -->
             </div>
    </div>
    <div class="row">
               <div class="col-md-5"><!-- Administratorss starts here -->
        <div class="card">
           <div class="card-header card-header-primary card-header-icon">
             <h4 class="card-title"> Administrators </h4>
          </div>
            <div class="card-body" style="background-image: url('../../assets/img/');">
                <div class="row">
                  <div class="col-md-8 ml-auto mr-auto">
                  </div>
                </div> 
             <table  class="table table-bordered"  width="100%" style="width:100%">  
               <tr>
                    <th>Owners</th>
                    <th>Designation</th>
                    <th>Access</th>
                </tr>         
                  <tr>
                    <td>Jane Doe</td>
                    <td>Software developer</td>
                    <td>super admin</td> 
                </tr>         
                  <tr>
                    <td>Samuel Mark</td>
                    <td>owner</td>
                    <td>Admin</td> 
                </tr>         
                  <tr>
                    <td>John Doe</td>
                    <td>Financial Manager</td>
                    <td>User</td> 
                </tr>
                </table>
              </div>
             </div> 
             </div><!--Administrators ends here -->
      <div class="col-md-7"><!-- Child Campaigns starts here -->
        <div class="card">
           <div class="card-header card-header-primary card-header-icon">
             <h4 class="card-title"> Child Campaigns </h4>
          </div>
            <div class="card-body" style="background-image: url('../../assets/img/');">
                <div class="row">
                  <div class="col-md-8 ml-auto mr-auto">
                  </div>
                </div> 
             <table  class="table table-bordered"  width="100%" style="width:100%">  
               <tr>
                    <th>Campaign name</th>
                    <th>Active</th>
                    <th>Status</th>
                    <th>Description</th>
                </tr>
                <?php 
                $get_query2="SELECT * FROM `subcampaign` WHERE `SubCampign_CampaigID`=$ID";
                $sql_get_subcampaign= mysqli_query($con,$get_query2);
                while ($row_subcampaign= mysqli_fetch_array($sql_get_subcampaign)) {
                 ?>         
                  <tr>
                    <td><a href="../Sub-Campaign/details.php?ID=<?=$row_subcampaign['SubCampign_Id']?>&user=<?=$user?>"><?=$row_subcampaign['SubCampign_name']?></td>
                    <td><?=$row_subcampaign['SubCampign_active']?></td>
                    <td><?=$row_subcampaign['SubCampign_status']?></td>
                    <td><?=$row_subcampaign['SubCampign_Desc']?></td> 
                </tr> <?php } ?>
                </table>
              </div>
             </div> 
             </div><!-- Child Campaigns ends here -->
    
             </div>
</div>  <!-- content end here -->
 </div>
<script src="https://maps.google.com/maps/api/js?sensor=true"></script>

</div>
</div>
<script type="text/javascript" src="../../assets/scripts/main.js"></script>
</body>
</html>
