<?php
    $config = parse_ini_file('config/config.ini', true);
    $host = $config['hosts']['api_host'];
    $ch = curl_init();
    // set url
    curl_setopt($ch, CURLOPT_URL, $host . "/index.php?entity=product&action=get-all");

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
        <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <h1>Internet Securities Task</h1>
            </div>
        </div>
        <div class="row" style="padding-top: 25px;">
            <table class="offset-md-3 col-md-6">
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
                <tr>
                    <form action="add.php" method="POST">
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Add new">
                            </div>
                        </td>
                    </form>
                </tr>
            </table>
        </div>
    </div>
    </body>
</html>