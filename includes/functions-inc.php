<?php   
function emptySignUp($UserName, $email, $password, $passwordRepeat){
    $result = ""; /* problem? */
    if (empty($UserName) || empty($email)  || empty($password) || empty($passwordRepeat)){
        $result = true;
    }
    else {
        $result = false;
    }return $result;
}

function invalidUsername($UserName){
    $result = ""; /* problem? */
    if (!preg_match("/^[a-zA-Z0-9]*$/", $UserName)){
        $result = true;
    }
    else {
        $result = false;
    }return $result;
}

function invalidEmail($email){
    $result = ""; /* problem? */
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else {
        $result = false;
    }return $result;
}

function checkPassword($password, $passwordRepeat){
    $result = ""; /* problem? */
    if ($password !== $passwordRepeat){
        $result = true;
    }
    else {
        $result = false;
    }return $result;
}

function UsernameTaken($conn, $UserName, $email){
    $sql = "SELECT * FROM users WHERE UsersUsername = ? OR UsersEmail = ?;";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../prva_stran.php?error=StatementFailed");
        exit();
    }
    mysqli_stmt_bind_param($statement, "ss", $UserName, $email);
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else {
        $result = false;
        return $result;
    }
}


function createUser($conn, $UserName, $email, $password){
    $sql = "INSERT INTO Users (UsersEmail, UsersUsername, UsersPassword) VALUES (?, ?, ?);";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../prva_stran.php?error=StatementFailed");
        exit();
    }

    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($statement, "sss", $email, $UserName, $hashPassword);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../prva_stran.php?error=None");
    exit();
}

function emptySignIn($UserName, $password){
    $result = ""; /* problem? */
    if (empty($UserName) || empty($password)){
        $result = true;
    }
    else {
        $result = false;
    }return $result;
}

function signInUser($conn, $username, $password){
    $usernameExist = UsernameTaken($conn, $username, $username);

    if ($usernameExist === false){
        header("location: ../prva_stran.php?error=wrongSignIn");
        exit();
    }

    $hashedPassword = $usernameExist["UsersPassword"];
    $checkPassword = password_verify($password, $hashedPassword);
    if ($checkPassword === false){
        header("location: ../prva_stran.php?error=wrongPassword");
        exit();
    }
    else if ($checkPassword === true){
        session_start();
        $_SESSION["userId"] = $usernameExist["UsersId"];
        $_SESSION["username"] = $usernameExist["UsersUsername"];
        header("location: ../prva_stran.php");
        exit();
    }
    
}

function displayPosts($resultData, $currentUser) {
    if (mysqli_num_rows($resultData) > 0) {
        while ($row = mysqli_fetch_assoc($resultData)) {
            echo '<div class="post">';
            echo '<a href="post.php?id=' . $row["id_predmet"] . '">';
            //echo '<img class="postImg" src="' . $row["PostsImgUrl"] . '">';
            echo '<div class="postBody">';
            echo '<h2 class="postTitle">' . $row["kratica"] . '</h2>';
            echo '<p class="postText">' . $row["celo_ime"] . '</p> <br>';
            //echo '<p class="postText">' . $row["PostsDescription"] . '</p> <br>';
            //echo '<p class="postInfo">Created by <i>' . $row["UsersUsername"] . '</i></p>';
            //echo '<p class="postInfo">Published on <i>' . $row["PostsDate"] . '</i></p>';

            /*
            if ($currentUser == $row['UsersUsername'] || roleCheck() == "admin") {
                echo "<a class='deleteButton' href='includes\delete_data-inc.php?id=" .$row["PostsId"] . "&type=post' ><img class='deleteIcon' src='img\delete-removebg-Outside.png' onmouseover='change(this)' onmouseout='changeback(this)'></a>";
            }
                */
            
            echo '</a>';
            echo '</div>';
            echo '</div>';
        }
        
    }
    else {
            echo "<p style='color:white'>No posts Found</p>";
    }
}
/*---------------------COMMENTS----------------- */
function displayComments($resultData, $currentUser, $conn) {
    if (mysqli_num_rows($resultData) > 0) {
        while ($row = mysqli_fetch_assoc($resultData)) {

            $sql = "SELECT Users.UsersUsername, Comments.* FROM Users INNER JOIN Comments ON users.UsersId = Comments.CommentsAuthourId
            WHERE Users.UsersId = " . $row["CommentsAuthourId"] ." ";
            $statement = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($statement, $sql)){
                header("location: ../prva_stran.php?error=StatementFailed");
                exit();
            }
            mysqli_stmt_execute($statement);
            $resultDUser = mysqli_stmt_get_result($statement);
            $user = mysqli_fetch_assoc($resultDUser);
            mysqli_stmt_close($statement);

            $commentUser = $user["UsersUsername"];



            echo '<div class="commentBox">';
            echo '    <div class="commentInfo">';
            echo '        <h4> <i>' . $commentUser . '</i></h4>';
            echo '        <p>' . $row["CommentsDate"] . '</p>';
            echo '    </div>';
            echo '    <h3>' . $row["CommentsText"] . '</h3>';
            if ($currentUser == $commentUser|| roleCheck() === "admin") {
                echo "<a class='deleteButton' href='includes\delete_data-inc.php?id=" . $row["CommentsId"] . "&type=comment' '><img class='deleteIcon' src='img\delete-removebg-Outside.png' onmouseover='change(this)' onmouseout='changeback(this)'></a>";
            }
            
            echo '</div>';
        }
    }
}

/*--------------DISPLAY NALOGE---------------*/
function prikazNaloge($resultData) {
    if (mysqli_num_rows($resultData) > 0) {
        while ($row = mysqli_fetch_assoc($resultData)) {
            
            echo '<div class="post">';
            echo '<a href="post.php?id=' . $row["id_naloga"] . '">';
            //echo '<img class="postImg" src="' . $row["PostsImgUrl"] . '">';
            echo '<div class="postBody">';
            echo '<h2 class="postTitle">' . $row["naslov"] . '</h2>';
            echo '<p class="postText">' . $row["opis"] . '</p> <br>';
            //echo '<p class="postText">' . $row["PostsDescription"] . '</p> <br>';
            //echo '<p class="postInfo">Created by <i>' . $row["UsersUsername"] . '</i></p>';
            //echo '<p class="postInfo">Published on <i>' . $row["PostsDate"] . '</i></p>';

            /*
            if ($currentUser == $row['UsersUsername'] || roleCheck() == "admin") {
                echo "<a class='deleteButton' href='includes\delete_data-inc.php?id=" .$row["PostsId"] . "&type=post' ><img class='deleteIcon' src='img\delete-removebg-Outside.png' onmouseover='change(this)' onmouseout='changeback(this)'></a>";
            }
                */
            echo '</a>';
            echo '</div>';
            echo '</div>';
            echo '<div>_</div>';

        }

    }
    else {
            echo "<p style='color:white'>No posts Found</p>";
    }
}



/*-------------- DISPLAY SMERI ------------------*/
function prikazSmeri($resultData){
    if (mysqli_num_rows($resultData) > 0) {
        while ($row = mysqli_fetch_assoc($resultData)) {
            
            echo '<div class="post">';
            echo '<a href="post.php?id=' . $row["id_smer"] . '">';
            echo '<div class="postBody">';
            echo '<h2 class="postTitle">' . $row["naziv_smer"] . '</h2>';
            
            
            echo '</a>';
            echo '</div>';
            echo '</div>';

        }

    }
    else {
            echo "<p style='color:white'>No posts Found</p>";
    }
}



/*--------------ROLE CHECK ------------------*/

function roleCheck(){
    $server = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "NRS_KONCNI_PROJEKT";

    $conn = mysqli_connect($server, $dbUsername, $dbPassword, $dbName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_SESSION["username"])){
        $currentUser = $_SESSION["username"];
        $currentUserId = $_SESSION["userId"];

        $sql = "SELECT UsersId, UsersUsername, UsersRole FROM Users
        WHERE UsersId = $currentUserId";
        $statement = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($statement, $sql)){
            header("location: ../prva_stran.php?error=StatementFailed");
            exit();
        }
        mysqli_stmt_execute($statement);

        $resultData = mysqli_stmt_get_result($statement);

        
        $row = mysqli_fetch_assoc($resultData);
        if ($row["UsersRole"] === "admin"){
            return "admin";
        }
        elseif ($row["UsersRole"] === "creator"){
            return "creator";
        }
        else {
            return "reader";
        }
    }
    else{
        return "reader";
    }
}

