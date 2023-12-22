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
   <div class="main-card mb-3 card">

<div class="card-body">
<div class="scroll-area-md">
<div class="scrollbar-container ps--active-y">
  <?php
  if (isset($_GET['ID'])) {
    $ID= $_GET['ID'];}
     $expenditure_sql1="SELECT * FROM expenditure e 
     left join subcampaign sc on sc.SubCampign_Id =e.Expenditure_SubCampaign 
     LEFT JOIN campaign c on c.Campaign_Id  = e.Expenditure_Campaign 
     WHERE Expenditure_Id = $ID";
      $expenditure_query1=mysqli_query($con,$expenditure_sql1);
    $row= mysqli_fetch_array($expenditure_query1);
  ?> 
  <div class="row">
    <div class="col-12">
            <h5 class="card-description mt-3 font-weight-bold text-center">
          <hr> <?=$row['Campaign_Name']?>(<?=$row['SubCampign_name']?>) 
          </h5>
      <h4 class="card-title text-center "><span class="font-weight-light">#EX<?=$row['Expenditure_Id']?></span></h4>

    </div>
  </div>
  <div class="row">
                        <div class="col-12">
                          <div class="table-responsive">
                            <table class="table mt-3">
                            <thead>
                                <tr>
                                  <th class="pl-0">
                                    <h6 class="font-weight-bold text-capitalize">Date</h6>
                                  </th>
                                  <th class="pr-0 text-right">
                                    <h6 class="font-weight-bold text-capitalize">Paid To</h6>
                                  </th>
                                  <th class="pr-0 text-right">
                                    <h6 class="font-weight-bold text-capitalize">Amount</h6>
                                  </th>
                                  <th class="pr-0 text-right">
                                    <h6 class="font-weight-bold text-capitalize">Details</h6>
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td class="pl-0">
                                    <?=$row['Expenditure_DatePaid']?>
                                  </td>
                                  <td class="px-0">
                                    <?=$row['Expenditure_PaidTo']?>
                                  </td>
                                  <td class="pr-0 ">
                                    <?=$row['Expenditure_Amount']?>
                                  </td>
                                  <td class="pr-0">
                                    <?=$row['Expenditure_Desc']?>
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
</div>
</div>
</div>

</div>  <!-- content end here -->


 </div>
<script src="https://maps.google.com/maps/api/js?sensor=true"></script>

</div>
</div>
<script type="text/javascript" src="../../assets/scripts/main.js"></script>
</body>
</html>
