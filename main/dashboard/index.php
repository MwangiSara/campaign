<?php 
    include "..\..\connect.php";
    if(isset($_SESSION["admin"])) {
        $user=$_SESSION["admin"];} 
?>
<link href="../../main.css" rel="stylesheet">
</head>
<?php include "..\inc\header.php" ?> 
<?php include "..\inc\Nav.php"?> 
<body>
<div class="app-main">
<?php include "..\inc\side_bar.php"?>
 <div class="app-main__outer">
<div class="app-main__inner">
<div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-midnight-bloom">
        <div class="widget-content-wrapper text-white">
        <div class="widget-content-left">
        <div class="widget-heading">Total Campaign</div>
        <div class="widget-subheading">Last year </div>
        </div>
        <div class="widget-content-right">
        <div class="widget-numbers text-white"><span>4</span></div>
        </div>
        </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-arielle-smile">
        <div class="widget-content-wrapper text-white">
        <div class="widget-content-left">
        <div class="widget-heading">Total Sub Campaign</div>
        <div class="widget-subheading">Last year </div>
        </div>
        <div class="widget-content-right">
        <div class="widget-numbers text-white"><span>10</span></div>
        </div>
        </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-grow-early">
        <div class="widget-content-wrapper text-white">
        <div class="widget-content-left">
        <div class="widget-heading">Followers</div>
        <div class="widget-subheading">Last year</div>
        </div>
        <div class="widget-content-right">
        <div class="widget-numbers text-white"><span>46%</span></div>
        </div>
        </div>
        </div>
    </div>
</div>
<div class="row">   
    <div class="col-md-12 col-lg-7">
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
    <div class="col">
        <div class="col-md-6 col-lg-10">
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
    <div class="col-md-6 col-lg-10">
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
    <div class="col-md-6 col-lg-10">
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
    <div class="col-md-6 col-lg-10">
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
</div>
 </div>
<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
</div>
</div>
<script type="text/javascript" src="../../assets/scripts/main.js"></script></body>
</html>
