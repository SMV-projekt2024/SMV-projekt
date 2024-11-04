<?php
session_start();
if ( isset( $_POST["submit"] ) ) {
    $naslov = $_POST["naslov"];
    $opis = $_POST["opis"];
    $img = $_POST["imgUrl"];
    $navodilo = $_POST["navodila"];

    $id_predmet = $_GET["id_predmet"];

    $currentUserId = $_SESSION["userId"];
    

    $current_date = date("d/m/Y");

    #$currentUserId = $_SESSION["userId"];

    require_once "database-inc.php";
    require_once "functions-inc.php";




    $file = $_FILES['file'];
    
    $fileName = $_FILES['file']["name"];
    $fileTmpName = $_FILES['file']["tmp_name"];
    $fileSize = $_FILES['file']["size"];
    $fileError = $_FILES['file']["error"];
    $fileType = $_FILES['file']["type"];

    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));
    

    
    if ($fileError == 0) {
        if ($fileSize < 500000) {
            $fileNameNew = uniqid("", true) . "." . $fileActualExt;
            $fileDestination = "../uploads/" . $fileNameNew;

            if (move_uploaded_file($fileTmpName, $fileDestination)) {
                $sql = "INSERT INTO Naloge (id_avtor, naslov, opis, navodilo, rok, datoteka, id_predmet, slika) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

            $statement = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($statement, $sql)){
                header("location: ../prva_stran.php?error=StatementFailed");
                exit();
            }

            mysqli_stmt_bind_param($statement, "isssisis", $currentUserId, $naslov,  $opis, 
                                                                                    $navodilo, $current_date, $fileNameNew, 
                                                                                    $id_predmet, $img);
            mysqli_stmt_execute($statement);
            mysqli_stmt_close($statement);

            header("location: ../post.php?error=YouCreatedThePost&id=" . $id_predmet);
            exit();



                
        } else {
                echo "Failed to move uploaded file.";
            }

            header("Location: post.php?id=" . $id_predmet ."&status=uploadsuccess");


        }
        else{
            echo "Your file is too big";
        }

    }
    else{
        echo "There was an error uploading a file";
        echo $fileError = $_FILES['file']["error"];
    }
    
    



    #--------------------VPIS V TABELO------------------------

    
    
    
}
else {
    header("location: ../prva_stran.php");
    exit();
}