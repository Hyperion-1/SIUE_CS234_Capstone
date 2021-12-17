<?php
 // File: 300Classes.php

    /*
    * CS 314, Operating Systems 
    * CS 321, Human-Compter Interact Design
    * CS 325, Software Engineering
    * CS 330, Programming Languages
    * CS 340, Algorithms and Data Structures 	
    * CS 360, Eth/Soc Implications Computing
    * CS 398, CS Work Experience III
    * Cs 399, Comp Sci Coop Ed Exp III
    */


   

    //  session_start();  having issues


    declare(strict_types = 1);
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $curYear = date('Y');
    
    function renderTableListing($rows) {
        $curYear = $GLOBALS['curYear'];

        // Builds the html with a table of class records.
        echo '
            <!DOCTYPE html>
            <html>
            <form method="GET">
            <style>
 img {
  display: block;
  margin-left: auto;
  margin-right: auto;
 }
 </style>
 <title>300 Classes</title>
            <head>
                <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            </head>

            <body class="w3-display-container" style="background-color:grey">
            <table class="w3-table-all w3-hoverable w3-margin-top">
            <tr class="w3-blue">
                <th>CS#</th>
                <th>number</th>
                <th>name</th>
            </tr>
        ';

        while ( $row = $rows->fetch() ) {
            $id = $row['id'];
            $number = $row['number'];
            $name = $row['name'];

            echo "
                <tr>
                    <td><a href='300record.php?id=$id'>$number</a></td>
                    <td>$number</td>
                    <td>$name</td>
                </tr>
            ";
        }

        echo "
            </table>
            <button formaction='cListDirect.php' class='w3-button w3-round-large w3-blue'>back</button>
            <img src='SIUE_ENG_PLAIN.jpg' alt='alternatetext' class='center'>
            <footer class='w3-panel w3-center w3-text- w3-blacksmall'>
                &copy; 2018 - 2020 Bradley Walker
            </footer>
            </body>
            </html>
        ";
    }

    // Include the db connection script
    require_once 'inc.db.php';

    try {
        // Connect to the DB.
        $pdo = new PDO(CONNECT_MYSQL, USER, PWD);

        // Configure error handling
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create the query.
        $sql = '
            SELECT id, number, name
            FROM cs300
            ORDER BY id
        ';

        // Execute the query.
        $rows = $pdo->query($sql);

        // Display the records in a table.
        renderTableListing($rows);
        
        $pdo = null;

    } catch(PDOException $e) {
        die ( $e->getMessage() );
    }
?>