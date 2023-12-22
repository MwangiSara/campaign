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
    <div class="app-main__inner"> <!-- content start here -->
    	<div class="row"> <!-- table start -->
            <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Sub-Campaign
                    <div class="btn-actions-pane-right">
                    </div>
                </div>
            <div id="dynamic_content"></div>
            </div>
            </div>
            </div><!-- table end-->
    </div><!-- content start here -->
</div>
<script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }

  });
</script>
<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
</div>
</div>
<script type="text/javascript" src="../../assets/scripts/main.js"></script>
</body>
</html>
