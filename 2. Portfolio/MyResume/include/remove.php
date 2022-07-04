<?php
$db=mysqli_connect("localhost","root","");

    $sql = "Drop DATABASE portfolio";

    if ($db->query($sql) === TRUE) {
        // echo "Database created successfully";

    }

?>