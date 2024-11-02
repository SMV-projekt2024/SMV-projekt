<?php
require_once "database-inc.php";
require_once "functions-inc.php";




session_start();
if ( isset( $_POST["submit"] ) ) {
    $kljuc = $_POST["kljuc"];
    
    

    $id_predmet = $_GET["id_predmet"];
    $currentUserId = $_SESSION["userId"];


    $sql = "SELECT kljuc FROM Predmeti
            WHERE id_predmet = ?";

    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../prva_stran.php?error=StatementFailed");
        exit();
    }
    mysqli_stmt_bind_param($statement, "i",$id_predmet);
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);

    if ($row = mysqli_fetch_assoc($resultData)) {

        if ($kljuc === $row['kljuc']) {


            $sql = "INSERT INTO Vpisi(id_user, id_predmet)
            VALUES(?, ?)";

            $statement = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($statement, $sql)){
                header("location: ../prva_stran.php?error=StatementFailed");
                exit();
            }
            mysqli_stmt_bind_param($statement, "ii",$currentUserId, $id_predmet);
            mysqli_stmt_execute($statement);




            header("location: ../naloga.php?id=" . $id_predmet);
        } else {
            echo "The keys do not match.";
        }

    }
}