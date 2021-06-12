<?php
function gst($c_rup){
    global $tot;
    $mul=$c_rup*18;
    $div=$mul/100;
    $tot=$c_rup+$div;
    return (float)$tot;
}
