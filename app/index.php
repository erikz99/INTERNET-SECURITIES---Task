<?php
    $config = parse_ini_file('config/config.ini', true);
    $host = $config['hosts']['api_host'];
    $ch = curl_init();
    // set url
    curl_setopt($ch, CURLOPT_URL, "http://localhost/Task/api/index.php?entity=product&action=get-all");

    //return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // $output contains the output string
    $products = json_decode(curl_exec($ch));

    // close curl resource to free up system resources
    curl_close($ch);     

?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Products</title>
    </head>
    <body>
        <table>
            <tr>
                <th>Product</th>
                <th>Actions</th>
            </tr>
            <?php
            
            foreach($products as $product) {
                echo "<tr>";
                echo "<td>" . $product->name . "</td>";
                echo "<td><a href=\"delete.php?id=" . $product->id . "\">Delete</a></td>";
                echo "</tr>"; 
            }
            ?>
            <tr><form action="add.php" method="POST"><td><input type="text" name="name" placeholder="Name"></td><td><input type="submit" value="Add new"></a></td></form></tr>
        </table>
    </body>
</html>