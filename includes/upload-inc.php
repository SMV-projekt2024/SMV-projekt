<?php
session_start();
if(isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $currentUserId = $_SESSION["userId"];

    
    $id_naloga = $_GET['id_naloga'];
    

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
                    $sql = "INSERT INTO Oddanenaloge(id_ucenec, id_naloga, datoteka)
                    VALUES(?, ?, ?)";

                $statement = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($statement, $sql)){
                    header("location: ../prva_stran.php?error=StatementFailed");
                    exit();
                }
                mysqli_stmt_bind_param($statement, "iis", $currentUserId, $id_naloga, $fileNameNew);
                mysqli_stmt_execute($statement);



                    
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


}