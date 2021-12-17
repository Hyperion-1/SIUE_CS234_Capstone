<?php
    // File: 200record.php

    declare(strict_types = 1);
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $curYear = date('Y');
    $id = sanitizeInput($_GET['id']);

    function sanitizeInput($value) {
        return htmlspecialchars( trim( stripslashes($value) ) );
    }

    function buildStudentCard($id) {
        $CRecord = getCRecord($id);
        $classNumber = "{$CRecord['number']}";
        $className = $CRecord['name'];
       

        // Build a card 
        $card = "
            <div class='w3-card-4' style='width: 40%'>
              <header class='w3-container w3-light-grey'>
                <h2>$classNumber</h2>
              </header>
              <div class='w3-container'>
                <p>classNumber: $classNumber</p>
                <p>className: $className</p>
              </div>
              <a href='200Classes.php' class='w3-button w3-block w3-dark-grey'>Ok</a>
            </div>
        ";

        return $card;
    }

    function getCRecord($id) {
        // Include the db connection script
        require_once 'inc.db.php';

        try {
            // Connect to the DB.
            $pdo = new PDO(CONNECT_MYSQL, USER, PWD);
    
            // Configure error handling
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // Create the query.
            $sql = "
                SELECT id, number, name
                FROM cs200
                WHERE id = $id;
            ";
    
            // Execute the query.
            $row = $pdo->query($sql)->fetch();
        
            $pdo = null;
            return $row;
    
        } catch(PDOException $e) {
            die ( $e->getMessage() );
        }
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Course Listing</title>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>

    <body class="w3-panel">
        <?php echo buildStudentCard($id); ?>

        <footer class="w3-panel w3-center w3-text-grey w3-small">
            &copy; 2018 - 2020 Bradley Walker
        </footer>

    </body>
</html>
