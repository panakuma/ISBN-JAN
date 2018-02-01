<?php
$ip_dec = 2886735204;

function ipConv($ip){
    $octet1 = bindec(substr(decbin($ip), 0, 8));
    $octet2 = bindec(substr(decbin($ip), 8, 8));
    $octet3 = bindec(substr(decbin($ip), 16, 8));
    $octet4 = bindec(substr(decbin($ip), 24, 8));
    return $octet1.".".$octet2.".".$octet3.".".$octet4;
}

print ipConv($ip_dec);
?>
