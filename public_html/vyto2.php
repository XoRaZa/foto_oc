<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<?php

$servername = "localhost";
$username = "pprelati_oc";
$password = "jusK1tas";
$dbname = "pprelati_oc";


$link = mysqli_connect("localhost", "pprelati_oc", "jusK1tas", "pprelati_oc");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT model from oc_product 
            INNER JOIN oc_product_to_category ON oc_product.product_id = oc_product_to_category.product_id 
            WHERE oc_product_to_category.category_id = 59";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>model</th>";
//                echo "<th>first_name</th>";
   //             echo "<th>last_name</th>";
      //          echo "<th>email_address</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['model'] . "</td>";
//                echo "<td>" . $row['first_name'] . "</td>";
   //             echo "<td>" . $row['last_name'] . "</td>";
      //          echo "<td>" . $row['email_address'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);




    

?>