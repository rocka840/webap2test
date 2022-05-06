    <?php
    include_once("dbConnect.php");
    header('Content-Type: application/json; charset=utf-8');
    ?>

   <?php
    $conn=json_encode($_GET);

    $sql = $conn->prepare("SELECT FROM Countries co JOIN Cities ci WHERE co.CountryName = ci.CityName AND ci.Inhabitants WHERE co.CountryID = ?");
    $countrySelected = $_POST["Countries"];
    $sql->bind_param("i", "$countrySelected");
    $sql->execute();
    $result = $sql->get_result();
    
    echo json_encode($result);
   ?>

   <?php
    if(isset($_GET["Country"])){
        $sqlSelect = $conn->prepare("SELECT Countries FROM countries WHERE CountryName=?");
        $sqlSelect->bind_param("s", $_GET["Country"]);
        $sqlSelect->execute();
        $res = $sqlSelect->get_result();
    }
   ?>

   <?php
    if(isset($_GET["minInhabitants"])) {
        $sqlSelect2 = $conn->prepare("SELECT Cities FROM countries WHERE CityName=?");
        $sqlSelect2->bind_param("s", $_GET["minhabitants"]);
        $sqlSelect2->execute();
        $res = $sqlSelect2->get_result();
        if($res->num_rows>0){
            $row = $res->fetch_assoc();
            echo json_encode($row);
        }
    }
   ?>