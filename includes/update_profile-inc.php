<?php
    session_start();

    require_once "database-inc.php";
    require_once "functions-inc.php";

    if (isset($_SESSION["userId"]) && isset($_POST["submit"])) {
        $newEmail = $_POST["newEmail"];
        $newPassword = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);
        $currentUserId = $_SESSION["userId"];


        if ($newEmail != "" && $newPassword != "") {
            $sql = "UPDATE Users
            SET UsersEmail = ?, UsersPassword = ?
            WHERE UsersId = $currentUserId";

            $statement = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($statement, $sql)){
                header("location: ../prva_stran.php?error=StatementFailed");
                exit();
            }
            mysqli_stmt_bind_param($statement, "ss", $newEmail, $newPassword);
        }
        elseif ($newEmail != "" && $newPassword = "") {
            $sql = "UPDATE Users
            SET UsersEmail = ?
            WHERE UsersId = $currentUserId";

            $statement = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($statement, $sql)){
                header("location: ../prva_stran.php?error=StatementFailed");
                exit();
            }
            mysqli_stmt_bind_param($statement, "s", $newEmail);
        }
        elseif ($newPassword != "") {
            $sql = "UPDATE Users
            SET UsersPassword = ?
            WHERE UsersId = $currentUserId";

            $statement = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($statement, $sql)){
                header("location: ../prva_stran.php?error=StatementFailed");
                exit();
            }
            mysqli_stmt_bind_param($statement, "s", $newPassword);
        }
        else {
            header("location: ../profile_stran.php?error=Ni");
            exit();
        }

        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);

        header("location: ../profile_stran.php");
        exit();
    }
    else {
        header("location: ../profile_stran.php?error=NoData");
            exit();
    }
