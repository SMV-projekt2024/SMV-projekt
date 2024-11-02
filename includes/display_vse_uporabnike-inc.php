<?php
    require_once "database-inc.php"; 

    $sql = "SELECT * FROM users"; 
    

    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../prva_stran.php?error=StatementFailed");
        exit();
    }
    
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);


    
    
    if (mysqli_num_rows($resultData) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Role</th></tr>"; 
    
        
        while ($row = mysqli_fetch_assoc($resultData)) {
            echo "<tr>";
            echo "<form action='uporabnik_stran.php?id_user=". $row['UsersId'] ."' method='post'>";
            echo "<td>" . htmlspecialchars($row['UsersId']) . "</td>"; 
            echo "<td>" . htmlspecialchars($row['UsersUsername']) . "</td>"; 
            echo "<td>" . htmlspecialchars($row['UsersEmail']) . "</td>"; 
            echo "<td>" . htmlspecialchars($row['UsersRole']) . "</td>"; 

            echo "<td><button class='tabelaButton' type='submit'>Edit</button></td>";
            echo "</form>"; 

            echo "</tr>";
        }
    
        echo "</table>";
    } else {
        echo "No users found with 'neki' in their username.";
    }
    
    mysqli_close($conn);
    