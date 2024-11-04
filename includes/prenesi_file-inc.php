<?php
    require_once "database-inc.php"; 

if (isset($_GET['id_naloga']) ) {
    $nalogaId = $_GET["id_naloga"];

    $sql = "SELECT * FROM Naloge
            WHERE id_naloga = $nalogaId"; 
    

    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../prva_stran.php?error=StatementFailed");
        exit();
    }
    
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);
    $row = mysqli_fetch_assoc($resultData);
    
    $filePath = "C:/xampp/htdocs/NRS_PROJEKT_2/SMV-projekt/uploads/" . $row["datoteka"];



    if (file_exists($filePath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $row["datoteka"] . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));

        ob_clean();
        flush();

        readfile($filePath);
        exit();
    } else {
        echo "File not found.";
        echo $filePath;
    }
} else {
    echo "Invalid file request.";
}
?>