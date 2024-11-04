<?php

require_once "database-inc.php";
require_once "functions-inc.php";

$currentUser = $_SESSION["userId"];

$sql = "SELECT Users.* FROM Users
WHERE UsersId = $currentUser";
$statement = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($statement, $sql)){
    header("location: ../prva_stran.php?error=StatementFailed");
    exit();
}
mysqli_stmt_execute($statement);

$resultData = mysqli_stmt_get_result($statement);

$row = mysqli_fetch_assoc($resultData);
    
    echo '<div class="profileBox">';
    echo '<p>Ime:</p>';
    echo '<p>' . $row["UserIme"] . '</p>';
    echo '</div>';

    echo '<div class="profileBox">';
    echo '<p>Priimek:</p>';
    echo '<p>' . $row["UserPriimek"] . '</p>';
    echo '</div>';

    echo '<div class="profileBox">';
    echo '<p>Username:</p>';
    echo '<p>' . $row["UsersUsername"] . '</p>';
    echo '</div>';

    echo '<div class="profileBox">';
    echo '<p>Email:</p>';
    echo '<p>' . $row["UsersEmail"] . '</p>';
    echo '</div>';

    echo '<div class="profileBox">';
    echo '<p>Password:</p>';
    echo '<p>*</p>';
    echo '</div>';

    echo '<div class="profileBox">';
    echo '<p>Rights:</p>';
    echo '<p>' . $row["UsersRole"] . '</p>';
    echo '</div>';


mysqli_stmt_close($statement);