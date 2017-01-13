<?php
session_start();
include("../html/top.inc");
if (isset($_SESSION['ordered'])){


        echo '<div class="mainFRAME"><h2> Provmaterial är bestält </2></div>';

        echo '<div class="mainFRAME"><h3> Har du frågor kan du kontakta Regionalt Cancer Centrum Stockholm-Gotland. Kontakt information finns i ditt kallelsebrev.  </h3></div>';

	session_destroy();
}

include("../html/bottom.inc");

?>
