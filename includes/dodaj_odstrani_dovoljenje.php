<?php
require_once "database-inc.php";
require_once "functions-inc.php";

if (isset($_POST["id_user"], $_POST["id_predmet"], $_POST["action"])) {
    $userId = $_POST["id_user"];
    $predmetId = $_POST["id_predmet"];
    $action = $_POST["action"];

    if ($action === "add") {
        // SQL statement to add access
        $sql = "INSERT INTO Poucevanja (id_user, id_predmet) VALUES (?, ?)";
    } elseif ($action === "remove") {
        // SQL statement to remove access
        $sql = "DELETE FROM Poucevanja WHERE id_user = ? AND id_predmet = ?";
    } else {
        header("location: ../prva_stran.php?error=InvalidAction");
        exit();
    }

    // Initialize and prepare the statement
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../prva_stran.php?error=StatementFailed");
        exit();
    }

    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($statement, "ii", $userId, $predmetId);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);

    // Redirect to the appropriate page
    header("location: ../poucevanja_stran.php");
    exit();
} else {
    header("location: ../posts_stran.php?error=NoData");
    exit();
}