<?php
session_start();
if ( isset( $_POST["submit"] ) ) {
    $kratica = $_POST["kratica"];
    $celo_ime = $_POST["celo_ime"];
    $img = $_POST["imgUrl"];
    $kljuc = $_POST["kljuc"];
    $idSmer = $_GET["id_smer"];

    $currentUserId = $_SESSION["userId"];
    

    require_once "database-inc.php";
    require_once "functions-inc.php";



    
    

   
    $sql = "INSERT INTO Predmeti (kratica, celo_ime, slika, kljuc, id_smer) VALUES (?, ?, ?, ?, ?);";

    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../prva_stran.php?error=StatementFailed");
        exit();
    }

    mysqli_stmt_bind_param($statement, "ssssi",  $kratica,  $celo_ime, $img, $kljuc, $idSmer);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);

    header("location: ../posts_stran.php?&id=" . $idSmer);
    exit();


}
else {
    header("location: ../prva_stran.php");
    exit();
}