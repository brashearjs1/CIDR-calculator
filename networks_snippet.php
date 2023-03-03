<?php

    if (isset($_GET["calculateButton"])) {
        $slash = $_GET['slash'];
        $ip_address = $_GET['ip'];

        if ($slash > 32 | $slash < 1){
            echo "Invalid Slash Mask";

        }
        else {
            if ($_GET['calculateButton']) {
                $b = " ";


                for ($i = 1; $i <= 32; $i++) {
                    $b .= $slash >= $i ? '1' : '0';
                }

                $ip_nmask = long2ip(bindec($b));

                if ($ip_nmask == "0.0.0.0") {
                    return false;
                }


                function Cidr($ip_address, $ip_nmask)
                {
                    $ip_address_ext = ip2long($ip_address);
                    $ip_nmask_ext = ip2long($ip_nmask);
                    $ip_net = $ip_address_ext & $ip_nmask_ext;
                    $ip_host_first = ((~$ip_nmask_ext) & $ip_address_ext);
                    $ip_broadcast_invert = ~$ip_nmask_ext;
                    $first = ($ip_address_ext ^ $ip_host_first) + 1;
                    $last = ($ip_address_ext | $ip_broadcast_invert) - 1;
                    $ip_broadcast = $ip_address_ext | $ip_broadcast_invert;
                    $ip_net_short = long2ip($ip_net);
                    $ip_first_short = long2ip($first);
                    $ip_last_short = long2ip($last);
                    $ip_broadcast_short = long2ip($ip_broadcast);

                    echo "Network: " . $ip_net_short . "<br>";
                    echo "Broadcast: " . $ip_broadcast_short . "<br>";
                    echo "First usable: " . $ip_first_short . "<br>";
                    echo "Last usable: " . $ip_last_short . "<br>";
                    echo "Subnet Mask: " . $ip_nmask;
                }

            }
            Cidr($ip_address, $ip_nmask);

    }
}

?>

