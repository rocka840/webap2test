<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>WEBAP2test - Katherine</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    
   <?php
    include_once("dbConnect.php");
    header('Content-Type: application/json; charset=utf-8');
   ?>

   <?php
    $sql = $conn->prepare("SELECT FROM Countries co JOIN Cities ci ON co.CountryName = ci.CityName = ci.Inhabitants WHERE co.CountryID = ?");
    $countrySelected = $_GET["CountryID"];
    $sql->bind_param("i", "$countrySelected");
    $sql->execute();
    $result = $sql->get_result();
    
    echo json_encode($result);
   ?>
    
   <?php
    if($_GET["Country"]){
        $sql = $conn->prepare("SELECT")
    }
   ?>

</body>
</html>