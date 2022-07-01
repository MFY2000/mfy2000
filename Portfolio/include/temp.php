<?php 

$connect = mysqli_connect("localhost", "root", "", "portfolio");
$output = '';
$file_data = file('C:\xampp\htdocs\Portfolio\include\iportfolio.sql');

foreach($file_data as $row){
    $start_character = substr(trim($row), 0, 2);

    if($start_character != '--' || $start_character != '/*' || $start_character != '//' || $row != ''){
        $output = $output . $row;
        $end_character = substr(trim($row), -1, 1);
        
        if($end_character == ';'){
            mysqli_query($connect, $output);
            $output = '';
        }
    }
}
?>

<!DOCTYPE html>  
<html>  
 <head>  
  <title>How to Import SQL File in Mysql Database using PHP</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 </head>  
 <body>  
  <br /><br />  
  <div class="container" style="width:700px;">  
   <h3 align="center">How to Import SQL File in Mysql Database using PHP</h3>  
   <br />
   <form method="post" enctype="multipart/form-data">
    <p><label>Select Sql File</label>
    <input type="file" name="database" /></p>
    <br />
    <input type="submit" name="import" class="btn btn-info" value="Import" />
   </form>
  </div>  
 </body>  
</html>
