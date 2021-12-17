<?php
    // File: index.php
    /* Demonstrates the creation of a DB, a table and the
     * insertion of  a record.
    */

    declare(strict_types = 1);
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    function sanitizeInput($value) {
        return htmlspecialchars( stripslashes( trim( $value) ) );
    }

    function getPDO(): PDO {
        return new PDO('mysql:host=localhost;dbname=project', 'root', 'root');
    }

    function createDB(string $db) {
       
        $pdo = new PDO('mysql:host=localhost', 'root', 'root');
        $sql = "CREATE DATABASE IF NOT EXISTS $db";
        $status = $pdo->exec($sql) or die('Server error.');
        $pdo = null;
        echo "DB create status: $status<br>";
    }

    function createInstructorTable(PDO $pdo) {
        $sql = "
        CREATE TABLE IF NOT EXISTS instructor (
            id INT UNSIGNED AUTO_INCREMENT NOT NULL,
            name VARCHAR(30),
            PRIMARY KEY(id)
        )
        ";
        $status = $pdo->exec($sql);
        echo "Table create status: $status<br>";
    }

    function insertInstructorRecord(PDO $pdo, string $name) {
       
        $sql = "
        INSERT INTO instructor
          (name)
        VALUES
          ('$name')
        ";
        $status = $pdo->exec($sql);
        echo "Record insert status: $status record(s) inserted.<br>";
    }

    $phpScript = sanitizeInput($_SERVER['PHP_SELF']);



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
           
            $db = 'uni';
            createDB($db);
            
            $pdo = getPDO();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Create the instructor table.
            createInstructorTable($pdo);

            // Insert the instructor record.
            insertInstructorRecord( $pdo, sanitizeInput($_POST['name']) );

        } catch(PDOEXCEPTION $e) {
            // For debugging purposes reveal the message.
            die( $e->getMessage() );
        }
        $pdo = null;
    }
?>

<title>My List</title>
<h1>My List</h1>
<form action="<?php echo $phpScript; ?>" method="POST">
    <input type="text" name="name" placeholder = "class number" autofocus>
    <button>Insert</button>
</form>