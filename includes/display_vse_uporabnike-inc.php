<?php
    require_once "database-inc.php"; // Ensure this file establishes the $conn variable

    // Define the query to fetch user data where 'neki' appears in a specific column, e.g., 'username'
    $sql = "SELECT * FROM users"; // Adjust the column name if needed
    

    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../prva_stran.php?error=StatementFailed");
        exit();
    }
    
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);


    
    // Check if there are any results
    if (mysqli_num_rows($resultData) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Role</th></tr>"; // Add more headers based on your columns
    
        // Fetch and display each row of data
        while ($row = mysqli_fetch_assoc($resultData)) {
            echo "<tr>";
            echo "<form action='spremeni.php?id_user=". $row['UsersId'] ."' method='post'>";
            echo "<td>" . htmlspecialchars($row['UsersId']) . "</td>"; // Display ID
            echo "<td>" . htmlspecialchars($row['UsersUsername']) . "</td>"; // Display Username
            echo "<td>" . htmlspecialchars($row['UsersEmail']) . "</td>"; // Display Email
            echo "<td>" . htmlspecialchars($row['UsersRole']) . "</td>"; // Display Role

            echo "<td><button class='tabelaButton' type='submit'>Edit</button></td>";
            echo "</form>"; 

            echo "</tr>";
        }
    
        echo "</table>";
    } else {
        echo "No users found with 'neki' in their username.";
    }
    
    // Close the database connection
    mysqli_close($conn);
    