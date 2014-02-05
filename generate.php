<?php

$dayvel = $_POST['dayvel'];
$dayvelval = $_POST['dayvelval'];
$date = $_POST['date'];
$phval = $_POST['phval'];
$ph = $_POST['ph'];
$we = $_POST['we'];
$title = $_POST['title'];
$chart_button = isset($_POST['chart_button']);
$configfile = $_FILES['file']['tmp_name'];

if($chart_button){
header("Content-type: application/pdf");
header("Content-Disposition: attachment; filename=burndown-".date('Y-m-d-h-i-s').".pdf");
passthru("./generate --output stdout-chart --start-date $date --$dayvel $dayvelval --phval $phval --ph $ph --with-hd-we $we --title \"$title\" --config $configfile");
} else {
header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=burndown-config-".date('Y-m-d-h-i-s').".txt");
passthru("./generate --output stdout-config --start-date $date --$dayvel $dayvelval --phval $phval --ph $ph --with-hd-we $we --title \"$title\" --config $configfile");
}

?>
