<?php
session_start();
if(isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $currentUserId = $_SESSION["userId"];
    
    $id_naloga = $_GET['id_naloga'];

    
    require_once "database-inc.php";
    require_once "functions-inc.php";


    #pridobim podatke o uporabniku
    $sql = "SELECT * FROM Users
            WHERE UsersId = $currentUserId";

    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../prva_stran.php?error=StatementFailed");
        exit();
    }
    mysqli_stmt_execute($statement);
    $resultDataUser = mysqli_stmt_get_result($statement);
    $rowUser = mysqli_fetch_assoc($resultDataUser);




    #vse podatke o nalogi
    $sql = "SELECT * FROM naloge
            WHERE id_naloga = $id_naloga";

    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../prva_stran.php?error=StatementFailed");
        exit();
    }
    mysqli_stmt_execute($statement);
    $resultDataNaloga = mysqli_stmt_get_result($statement);

    $rowNaloga = mysqli_fetch_assoc($resultDataNaloga);




    


    $fileName = $_FILES['file']["name"];
    $fileTmpName = $_FILES['file']["tmp_name"];
    $fileSize = $_FILES['file']["size"];
    $fileError = $_FILES['file']["error"];
    $fileType = $_FILES['file']["type"];

    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    

    
    if ($fileError == 0) {
        if ($fileSize < 500000) {
            $fileNameNew = $rowUser["UsersIme"]. $rowUser["UsersPriimek"]. "_" . $rowNaloga["naslov"].  $rowNaloga["id_naloga"]. "." . $fileActualExt;
            $fileDestination = "../uploads/" . $fileNameNew;


            if (move_uploaded_file($fileTmpName, $fileDestination)) {
                $sql = "REPLACE INTO Oddanenaloge(id_ucenec, id_naloga, datoteka)
                VALUES(?, ?, ?)";

                $statement = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($statement, $sql)){
                    header("location: ../prva_stran.php?error=StatementFailed");
                    exit();
                }
                mysqli_stmt_bind_param($statement, "iis", $currentUserId, $id_naloga, $fileNameNew);
                mysqli_stmt_execute($statement);



                
            } else {
                header("Location: ../naloga.php?id=". $id_naloga . "&error=NotUploaded");
            }

            header("Location: ../naloga.php?id=". $id_naloga . "&error=UploadSuccess");


        }
        else{
            header("Location: ../naloga.php?id=". $id_naloga . "&error=NotUploaded");
        }

    }
    else{
        header("Location: ../naloga.php?id=". $id_naloga . "&error=NotUploaded");
        echo $fileError = $_FILES['file']["error"];
    }



}