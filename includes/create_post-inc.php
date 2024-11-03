<?php
session_start();
if ( isset( $_POST["submit"] ) ) {
    $title = $_POST["naslov"];
    $description = $_POST["opis"];
    $img = $_POST["imgUrl"];
    $body = $_POST["navodila"];
    $branch = $_POST["branch"];

    $id_predmet = $_GET["id_predmet"];

    $currentUserId = $_SESSION["userId"];
    

    $current_date = date("d/m/Y");

    #$currentUserId = $_SESSION["userId"];

    require_once "database-inc.php";
    require_once "functions-inc.php";



    














    $file = $_FILES['file'];
    

    require_once "database-inc.php";
    require_once "functions-inc.php";

    $fileName = $_FILES['file']["name"];
    $fileTmpName = $_FILES['file']["tmp_name"];
    $fileSize = $_FILES['file']["size"];
    $fileError = $_FILES['file']["error"];
    $fileType = $_FILES['file']["type"];

    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    $allowed = array("jpg", "jpeg", "png", "pdf", "doc");

    if (in_array($fileActualExt, $allowed)){
        if ($fileError == 0) {
            if ($fileSize < 500000) {
                $fileNameNew = uniqid("", true) . "." . $fileActualExt;
                $fileDestination = "../uploads/" . $fileNameNew;

                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    $sql = "INSERT INTO Naloge (id_avtor, naslov, opis, navodilo, rok, id_predmet, slika) VALUES (?, ?, ?, ?, ?, ?, ?);";

                $statement = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($statement, $sql)){
                    header("location: ../prva_stran.php?error=StatementFailed");
                    exit();
                }

                mysqli_stmt_bind_param($statement, "sssssis", $currentUserId, $title,  $description, 
                                                                                        $body, $current_date, $fileNameNew, 
                                                                                        $id_predmet, $img);
                mysqli_stmt_execute($statement);
                mysqli_stmt_close($statement);



                    
                } else {
                    echo "Failed to move uploaded file.";
                }

                header("Location: naloga.php?uploadsuccess");


            }
            else{
                echo "Your file is too big";
            }

        }
        else{
            echo "There was an error uploading a file";
            echo $fileError = $_FILES['file']["error"];
        }
    }
    else {
        echo "You cannot upload files of this type!";
    }












    #--------------------VPIS V TABELO------------------------

    
    
    header("location: ../post.php?error=YouCreatedThePost&id=" . $id_predmet);
    exit();
}
else {
    header("location: ../prva_stran.php");
    exit();
}