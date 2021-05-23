<?php
    $config = parse_ini_file('config/config.ini', true);
    $appHost = $config['hosts']['app_host'];
    $apiHost = $config['hosts']['api_host'];
    $ch = curl_init($apiHost . "/index.php?entity=product&action=add");

    //return the transfer as a string
    $person = [
        "name" => $_POST["name"]
    ];
    $personData = json_encode($person);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $personData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',                                                                                
        'Content-Length: ' . strlen($personData))                                                                       
    );                                                                                                                   

    # Send request.
    // $output contains the output string
    
    $result = json_decode(curl_exec($ch));
    curl_close($ch);  
    
    if ($result->success) {
        header("Location: " . $appHost . "/index.php");
    }
     else {
        header("Location:" . $appHost . "/error.html");
    }
    //$products = json_decode(curl_exec($ch));
    
    // close curl resource to free up system resources

?>