<?php
    $hostName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "portfolio";

    // $hostName = "sql100.epizy.com";
    // $userName = "epiz_32077329";
    // $password = "oKBywQi6yn4";
    // $dbName = "epiz_32077329_portfolio";

$db=mysqli_connect($hostName,$userName,$password);

if (!($db->select_db($dbName))) {
    $sql = "CREATE DATABASE ".$dbName;
    if ($db->query($sql)) {
        $output = '';
        $file_data = file('.\iportfolio.sql');
        
        foreach($file_data as $row){
            $start_character = substr(trim($row), 0, 2);
        
            if($start_character != '--' || $start_character != '/*' || $start_character != '//' || $row != ''){
                $output = $output . $row;
                $end_character = substr(trim($row), -1, 1);
                
                if($end_character == ';'){
                    mysqli_query($db, $output);
                    $output = '';
                }
            }
        } 
        echo '<script>alert("")</script>';
    }
    else{
        header("location:index-2.html");
    }
}


$query = "SELECT * FROM basic_setup,personal_setup,aboutus_setup,facts";
$runquery = mysqli_query($db,$query);
if(!$db){
    header("location:index-2.html");
}  else {
    // echo "Error creating database: " . $conn->error;
}
$data = mysqli_fetch_array($runquery);