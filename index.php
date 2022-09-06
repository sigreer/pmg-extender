<?php

require("pve2_api.class.php");
# You can try/catch exception handle the constructor here if you want.
$pve2 = new PVE2_API("hostname", "root", "pam", "password", '8006', false) ;
# realm above can be pve, pam or any other realm available.

/* Optional - enable debugging. It print()'s any results currently */
// $pve2->set_debug(true);

if ($pve2->login()) {
    var_dump($pve2->get('/config/domains'));die();
    var_dump($pve2->put('/api2/json/config/domains/', ['comment' => 'Test', 'domain' => 'domain.tld']));die();
} else {
    print("Login to Proxmox Host failed.\n");
    exit;
}