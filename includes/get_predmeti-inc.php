<?php 
if (isset($_GET["id"])){
    $id_sole = $_GET["id"];

    require_once "database-inc.php";
    require_once "functions-inc.php";
    if (isset($_SESSION["username"])){
        $currentUser = $_SESSION["username"];
    }
    else{
        $currentUser = "";
    }

    

    $sql = "SELECT * FROM Predmeti
    WHERE id_sola = $id_sole";
    
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../prva_stran.php?error=StatementFailed");
        exit();
    }
    mysqli_stmt_execute($statement);
    $resultData = mysqli_stmt_get_result($statement);

    prikazSmeri($resultData); /* function in functions-inc.php */

    mysqli_stmt_close($statement);
}<?php 
if (isset($_GET["id"])){
    $id_sole = $_GET["id"];

    require_once "database-inc.php";
    require_once "functions-inc.php";
    if (isset($_SESSION["username"])){
        $currentUser = $_SESSION["username"];
    }
    else{
        $currentUser = "";
    }

    

    $sql = "SELECT * FROM Predmeti
    WHERE id_sola = $id_sole";
    
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../prva_stran.php?error=StatementFailed");
        exit();
    }
    mysqli_stmt_execute($statement);
    $resultData = mysqli_stmt_get_result($statement);

    prikazSmeri($resultData); /* function in functions-inc.php */

    mysqli_stmt_close($statement);
}