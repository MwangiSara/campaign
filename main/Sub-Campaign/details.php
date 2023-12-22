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
<div class="app-main__inner"><!-- content start here -->                 
    <div class="row">
  <?php
        if (isset($_GET['ID'])) {
          $ID= $_GET['ID'];}
          $sql="SELECT * FROM subcampaign sb 
          LEFT JOIN campaign c on c.Campaign_Id = sb.SubCampign_CampaigID
          WHERE SubCampign_Id ='$ID' ";
          $sql_get_details= mysqli_query($con,$sql);
          $row= mysqli_fetch_array($sql_get_details);
        ?>    
        <div class="col-md-5"><!-- campaign details starts here --> 
        <div class="card card-user">
          <div class="card-body">
              <div class="author">
                  <h5 style="color: #3F6AD8; text-align: center; font-size: 30px; " class="card-title"><?=$row['SubCampign_name']?></h5>
                  <div class="item-content">
                    <div class="info-table table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td> Name:</td>
                                    <td class="description font-medium text-dark-medium"><?=$row['SubCampign_name']?></td>
                                </tr>
                                <tr>
                                    <td> Parent Campaign:</td>
                                    <td class="description font-medium text-dark-medium"><?=$row['Campaign_Name']?></td>
                                </tr>
                                <tr>
                                    <td> Active:</td>
                                    <td class="description font-medium text-dark-medium"><?=$row['SubCampign_active']?></td>
                                </tr>
                                <tr>
                                    <td>  Status:</td>
                                    <td class="description font-medium text-dark-medium"><?=$row['SubCampign_status']?></td>
                                </tr>
                                
                                <tr>
                                    <td> Planned Start Date:</td>
                                    <td class="description font-medium text-dark-medium"><?=$row['SubCampign_PlannedStartDate']?></td>
                                </tr>
                                <tr>
                                    <td>Actual Start Date:</td>
                                    <td class="description font-medium text-dark-medium"><?=$row['SubCampign_ActualStartDate']?></td>
                                </tr>
                                
                                <tr>
                                    <td> Planned End Date:</td>
                                    <td class="description font-medium text-dark-medium"><?=$row['SubCampign_PlannedEndDate']?></td>
                                </tr>
                                <tr>
                                    <td>Actual End Date:</td>
                                    <td class="description font-medium text-dark-medium"><?=$row['SubCampign_ActualEndDate']?></td>
                                </tr>
                                <tr>
                                    <td> Budget Allocated:</td>
                                    <td class="description text-dark-medium"><?=$row['SubCampign_BudgetAllocated']?></td>
                                </tr>
                                <tr>
                                    <td> Emplyee ID:</td>
                                    <td class="description text-dark-medium"><?=$row['Campaign_EmplyeeID']?></td>
                                </tr>
                                <tr>
                                    <td>Revenue:</td>
                                    <td class="description text-dark-medium"><?=$row['SubCampign_revenue']?></td>
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
      <div class="col-md-12 "> <!-- Marketing Lists starts here -->
        <div class="card">
           <div class="card-header card-header-primary card-header-icon">
             <h4 class="card-title"> Marketing Lists </h4>
          </div>
            <div class="card-body" style="background-image: url('../../assets/img/');">
                <div class="row">
                  <div class="col-md-4 ml-auto mr-auto">
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
                    <div class="col-lg-10 col-md-6 col-sm-6">
                        <div class="dropdown">
                      <button class="dropdown-toggle btn btn-outline-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> action</button>
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
                    <div class="col-lg-10 col-md-6 col-sm-6">
                        <div class="dropdown">
                      <button class="dropdown-toggle btn btn-outline-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> action</button>
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
             </div><!-- Marketing Lists starts here -->
             <br>
      <div class="col-md-12 "><!-- Financial Activities starts here -->
        <div class="card">
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
                    <th>Date</th>
                    <th>Activity Cost</th>
                    <th>Budget</th>
                    <th>Misc cost</th>
                    <th>Total cost</th>
                </tr>         
                  <tr>
                    <td>2022-11-8/2022-11-17</td>
                    <td>5000</td>
                    <td>5000</td>
                    <td>0</td>
                    <td>5000</td>
                    <td><div class="row">
                    <div class="col-lg-10 col-md-6 col-sm-6">
                        <div class="dropdown">
                      <button class="dropdown-toggle btn btn-outline-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> action</button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">View </a>
                        </div>
                        </div>
                        </div>
                  </div>
                  </td>
                </tr>
                </table>
              </div>

             </div> 
             </div><!-- Financial Activities ends here -->
             </div>
             </div>
             <br>
             <div class="row">
    
              <!-- Child Campaigns starts here -->
      <div class="col-md-6 ">
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
                    <td><a href="#">Jane Doe</td>
                    <td>Software developer</td>
                    <td>super admin</td> 
                </tr>         
                  <tr>
                    <td><a href="#">Samuel Mark</td>
                    <td>owner</td>
                    <td>Admin</td> 
                </tr>         
                  <tr>
                    <td><a href="#">John Doe</td>
                    <td>Financial Manager</td>
                    <td>User</td> 
                </tr>
                </table>
              </div>

             </div> 
             </div><!-- Child Campaigns ends here -->
             </div>
        </div>
</div><!-- content end here -->
<script src="https://maps.google.com/maps/api/js?sensor=true"></script>

</div>
</div>
<script type="text/javascript" src="../../assets/scripts/main.js"></script>
</body>
</html>
