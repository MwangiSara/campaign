<?php   
function redirect ($location = NULL) {
    if ($location != NULL) {
       ?>
       <script type="text/javascript">

		window.location.replace("<?=$location?>");

       </script>

       <?php
    }
}
?>
