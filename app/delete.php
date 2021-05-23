<?php
    $config = parse_ini_file('config/config.ini', true);
    $appHost = $config['hosts']['app_host'];
    $apiHost = $config['hosts']['api_host'];

    $ch = curl_init();

    // set url
    curl_setopt($ch, CURLOPT_URL, $apiHost . "/index.php?entity=product&action=delete&id=" . $_GET["id"]);

    //return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // $output contains the output string
    $result = json_decode(curl_exec($ch));
    curl_close($ch);  
    
    if ($result->success) {
        header("Location: " . $appHost . "/index.php");
    }
     else {
        header("Location:" . $appHost . "/error.html");
    }

?>