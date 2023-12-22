<?php include "..\..\connect.php" ?>
<link href="../../main.css" rel="stylesheet">
</head>
<?php include "..\inc\header.php" ?> 
<?php include "..\inc\Nav.php"?> 

<body>
<div class="app-main">
<?php include "..\inc\side_bar.php"?>
 <div class="app-main__outer">
<div class="app-main__inner"><!-- content start here -->
<div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="card-shadow-danger mb-3 widget-chart widget-chart2 text-left card">
        <div class="widget-content">
        <div class="widget-content-outer">
        <div class="widget-content-wrapper">
        <div class="widget-content-left pr-2 fsize-1">
        <div class="widget-numbers mt-0 fsize-3 ">70%</div>
        </div>
        <div class="widget-content-right w-100">
        <div class="progress-bar-xs progress">
        <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: 71%;"></div>
        </div>
        </div>
        </div>
        <div class="widget-content-left fsize-1">
        <div class="text-muted opacity-6">Population Target</div>
        </div>
        </div>
        </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card-shadow-success mb-3 widget-chart widget-chart2 text-left card">
        <div class="widget-content">
        <div class="widget-content-outer">
        <div class="widget-content-wrapper">
        <div class="widget-content-left pr-2 fsize-1">
        <div class="widget-numbers mt-0 fsize-3 ">54%</div>
        </div>
        <div class="widget-content-right w-100">
        <div class="progress-bar-xs progress">
        <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 44%;"></div>
        </div>
        </div>
        </div>
        <div class="widget-content-left fsize-1">
        <div class="text-muted opacity-6">Expenses 2023</div>
        </div>
        </div>
        </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card-shadow-warning mb-3 widget-chart widget-chart2 text-left card">
        <div class="widget-content">
        <div class="widget-content-outer">
        <div class="widget-content-wrapper">
        <div class="widget-content-left pr-2 fsize-1">
        <div class="widget-numbers mt-0 fsize-3 ">32%</div>
        </div>
        <div class="widget-content-right w-100">
        <div class="progress-bar-xs progress">
        <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100" style="width: 12%;"></div>
        </div>
        </div>
        </div>
        <div class="widget-content-left fsize-1">
        <div class="text-muted opacity-6">Expenses July</div>
        </div>
        </div>
        </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card-shadow-info mb-3 widget-chart widget-chart2 text-left card">
        <div class="widget-content">
        <div class="widget-content-outer">
        <div class="widget-content-wrapper">
        <div class="widget-content-left pr-2 fsize-1">
        <div class="widget-numbers mt-0 fsize-3 ">89%</div>
        </div>
        <div class="widget-content-right w-100">
        <div class="progress-bar-xs progress">
        <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%;"></div>
        </div>
        </div>
        </div>
        <div class="widget-content-left fsize-1">
        <div class="text-muted opacity-6">Totals Target</div>
        </div>
        </div>
        </div>
        </div>
    </div>
</div>	
<div class="row">   
    <div class="col-md-12 col-lg-6">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                This Years' Report
                </div>
            </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="">
                <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                <div class="widget-chat-wrapper-outer">
                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                <canvas id="canvas"></canvas>
                </div>
                </div>
                </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-6">
<div class="card ">
    <div class="card-header pb-0 p-3">
        <div class="row">
            <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">Monthly Expenditure</h6>
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
</div>
</div><!-- content start here -->
</div>
<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
</div>
</div>
<script type="text/javascript" src="../../assets/scripts/main.js"></script>
</body>
</html>
