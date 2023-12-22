<?php include "..\..\connect.php";
if(isset($_SESSION["admin"])) {
  $user=$_SESSION["admin"];} ?>
<link href="../../main.css" rel="stylesheet">
</head>
<?php include "..\inc\header.php" ?> 
<?php include "..\inc\Nav.php"?> 

<body>
<div class="app-main">
<?php include "..\inc\side_bar.php"?>
 <div class="app-main__outer">
<div class="app-main__inner">
	
<div class="row"><!-- widgets -->
    <div class="col-lg-6 col-xl-4">
    <div class="card mb-3 widget-content bg-night-fade">
    <div class="widget-content-wrapper text-white">
    <div class="widget-content-left">
    <div class="widget-heading">Expenses 2023</div>
    </div>
    <div class="widget-content-right">
    <div class="widget-numbers text-white"><span>96</span></div>
    </div>
    </div>
    </div>
    </div>
    <div class="col-lg-6 col-xl-4">
    <div class="card mb-3 widget-content bg-arielle-smile">
    <div class="widget-content-wrapper text-white">
    <div class="widget-content-left">
    <div class="widget-heading">Expenses Today</div>
    </div>
    <div class="widget-content-right">
    <div class="widget-numbers text-dark"><span>4</span></div>
    </div>
    </div>
    </div>
    </div>
    <div class="col-lg-6 col-xl-4">
    <div class="card mb-3 widget-content bg-night-fade">
    <div class="widget-content-wrapper text-white">
    <div class="widget-content-left">
    <div class="widget-heading">Expenses July</div>
    </div>
    <div class="widget-content-right">
    <div class="widget-numbers text-white"><span>18</span></div>
    </div>
    </div>
    </div>
    </div>
</div><!-- widgets end-->
<div class="row"><!-- Expenditure start-->
        <div class="col-lg-6 ml-auto mr-auto">
<div class="card h-100">
    <div class="card-header pb-0 p-3">
        <div class="row">
            <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">Expenditure</h6>
            </div>
            <div class="col-6 text-end"></div>
        </div>
    </div>
    <div class="card-body p-3 pb-0">
    <ul class="list-group">
        
        <?php
         $expenditure_sql1="SELECT * FROM expenditure e 
         left join subcampaign sc on sc.SubCampign_Id =e.Expenditure_SubCampaign 
         LEFT JOIN campaign c on c.Campaign_Id  = e.Expenditure_Campaign ";
          $expenditure_query1=mysqli_query($con,$expenditure_sql1);
          while ($expenditure_row1=mysqli_fetch_array($expenditure_query1)) { 
        ?>
        <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
            <div class="d-flex flex-column">
                <span class="text-xs">#AR-803481</span>
                <h6 class="text-dark mb-1 font-weight-bold text-sm"><?=$expenditure_row1['Campaign_Name']?>(<?=$expenditure_row1['SubCampign_name']?>)</h6>
                <span class="text-xs"><?=$expenditure_row1['Expenditure_PaidTo']?></span>
            </div>
        <div class="d-flex align-items-center text-sm"> KSH <?=$expenditure_row1['Expenditure_Amount']?></div>
        <a href="../expenditure/downloads.php?ID=<?=$expenditure_row1['Expenditure_Id']?>&user=<?=$user?>" class="btn btn-outline-primary mb-2 mr-2  " style="font-weight: bolder;"><i class="now-ui-icons education_paper" ></i> Print</a>
        </li><?php } ?>
    </ul>
    </div>
</div>
</div>
<div class="col-lg-6 ml-auto mr-auto">
<div class="card">
    <div class="card-header pb-0 p-3">
        <div class="row">
            <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">Add Expenditure</h6>
            </div>
            <div class="col-6 text-end"></div>
        </div>
    </div>
    <div class="card-body ">
        <?php 
        if (isset($_GET['user'])) { $user= $_GET['user']; }
            $sql="SELECT * FROM users WHERE user_username='$user' ";
            $sql_get_details= mysqli_query($con,$sql);
            $rowz= mysqli_fetch_array($sql_get_details);

        if (isset($_POST['save'])) {
            $Expenditure_Id=rand(99,99999);
            $campaign_id = mysqli_real_escape_string($con, $_REQUEST['campaign_id']);
            $Sub_Campaigns_id = mysqli_real_escape_string($con, $_REQUEST['Sub_Campaigns_id']);
            $paid_to = mysqli_real_escape_string($con, $_REQUEST['paid_to']);
            $date_paid = mysqli_real_escape_string($con, $_REQUEST['date_paid']);
            $amount = mysqli_real_escape_string($con, $_REQUEST['amount']);
            $desc = mysqli_real_escape_string($con, $_REQUEST['desc']);
            $editor = $rowz['user_id'];

           $e_sql="INSERT INTO `expenditure`(
            `Expenditure_Id`, 
            `Expenditure_Campaign`, 
            `Expenditure_SubCampaign`, 
            `Expenditure_DatePaid`, 
            `Expenditure_Desc`, 
            `Expenditure_PaidTo`, 
            `Expenditure_Amount`, 
            `Expenditure_EmployeeID`) VALUES ('$Expenditure_Id','$campaign_id','$Sub_Campaigns_id','$date_paid','$desc','$paid_to','$amount','$editor')";
            mysqli_query($con,$e_sql);

             redirect("../expenditure/?user=$user");
        } 
         ?>
        <form class="form-horizontal" enctype="multipart/form-data" action="" method="POST">
                <div class="" >
            <label>campaign</label>
            <div class="form-group">
                <select class="custom-select" name="campaign_id" data-style="btn btn-primary btn-round btn-block" title="campaign List" data-size="7" >
                <?php
                  $campaign_sql="select * from campaign";
                  $campaign_query=mysqli_query($con,$campaign_sql);
                  while ($campaign_row=mysqli_fetch_array($campaign_query)) {
                  ?>
                  <option value="<?=$campaign_row['Campaign_Id']?>"><?=$campaign_row['Campaign_Name']?></option>
                  <?php
                  }?>
                </select>
            </div>
            </div>
            <div class="" id="">
            <label>sub campaign</label>
            <div class="form-group">
                <select class="custom-select" name="Sub_Campaigns_id" data-style="btn btn-primary btn-round btn-block" title="subcampaign List" data-size="7" >
                    <option value="0">None</option>
                <?php
                  $parent1="SELECT * from subcampaign sc
                  LEFT JOIN campaign c on c.Campaign_Id = sc.SubCampign_CampaigID";
                  $pquery1=mysqli_query($con,$parent1);
                  while ($prow1=mysqli_fetch_array($pquery1)) {
                  ?>
                  <option value="<?=$prow1['SubCampign_Id']?>"><?=$prow1['SubCampign_name']?>(<?=$prow1['Campaign_Name']?>)</option>
                  <?php
                  }?>
                </select>
            </div>
            </div>
            <script type="text/javascript">
                   hide(document.querySelectorAll('.targets'));
                function hide (elements) {
                  elements = elements.length ? elements : [elements];
                  for (var index = 0; index < elements.length; index++) {
                    elements[index].style.display = 'none';
                  }
                }
               </script>
            <label>Paid To..<span style="color:red;">*</span></label>
            <div class="form-group">
                <input type="text" name="paid_to" class="form-control" required>
            </div>
            <label>Date paid..<span style="color:red;">*</span></label>
            <div class="form-group">
                <input type="date" name="date_paid" class="form-control " required>
            </div>
            <label>Amount..<span style="color:red;">*</span></label>
            <div class="form-group">
                <input type="number" placeholder="0" name="amount" class="form-control" required>
            </div>
            <label>Description..</label>
            <div class="form-group">
                <textarea type="text" rows="4" name="desc" class="form-control" required></textarea>
            </div>
            <div class="row">
            <button type="submit" name="save" class="btn btn-primary btn-md col-md-4  ml-auto mr-auto ">SAVE</button>
            </div>
        </form>
    </div>
</div>
</div>
</div><!-- Expenditure end-->
</div><!-- content end -->
 </div> 
<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
</div>
</div>
<script type="text/javascript" src="../../assets/scripts/main.js"></script>
</body>
</html>
