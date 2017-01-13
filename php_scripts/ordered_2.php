<?php
session_start();
session_destroy();
$_SESSION = array();
include("../html/top.inc");

//if (isset($_SESSION['code'])){
        echo '<div class="mainFRAME"><h2> Provmaterial är beställt </2></div>';                                                 
        echo '<div class="mainFRAME"><h3> Har du frågor kan du kontakta Regionalt Cancer Centrum Stockholm-Gotland. Kontakt information finns i ditt kallelsebrev.  </h3></div>';
        session_unset($_POST,$_SESSION, $_GET );
        session_destroy();
        die();

//}

include("../html/bottom.inc");

?>
