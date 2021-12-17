<?php 

declare(strict_types = 1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

$phpScript = sanitizeInput($_SERVER['PHP_SELF']);
$curYear = date('Y');
$populateTblStatus = '';

function sanitizeInput($value) {
    return htmlspecialchars( stripslashes ( trim( $value ) ) );
}

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {  
    
    $fname = htmlspecialchars( trim($_POST['usrname']) );
    $lname = htmlspecialchars( trim($_POST['password']) );

    $isusrnameEmpty = empty($usrname); 
    $ispwrdEmpty = empty($pwrd);    

    $fnameClass = $isusrnameEmpty? 'w3-text-red' : 'w3-text-black';
    $lnameClass = $ispwrdEmpty? 'w3-text-red' : 'w3-text-black';

    $hasFormEmptyFields =  $isusrnameEmpty || $ispwrdEmpty;

    /*
    if ( $username == 'guest' && $password == 'guest' ) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        header('Location: home.php');
        die;
        
      } else {
        echo "<p>Incorrect username or password.</p>";
      }
*/
        //safecheck: required entry renders this mostly uneeded. 
    if ( $hasFormEmptyFields ) {
        include 'index.php'; 
    } else{
     include 'cListDirect.php';
    }
}

?>

<!DOCTYPE HTML>
<html>

<style>
 img {
  display: block;
  margin-left: auto;
  margin-right: auto;
 }
 </style>

    <head>
        <title>Login Page</title>
        <meta charset="utf-8"
              name="viewport"
              content='width=device-width, intitial-scale=1.0'>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>

    <body class="w3-display-container" style="background-color:grey;">
        <main class="w3-display-topmiddle">
            <header class="w3-container w3-blue w3-margin-top">
                <h1 class="w3-center">Sign in with your Eid and Password</h1>
            </header>

            <form method = "POST"> 
            <p>
                <input name="username" placeholder="Username" required>
                <span class="<?php echo $fnameClass? $fnameClass : 'w3-text-red'; ?>"> *</span>
            </p>
            <p>
                <input name="password" placeholder="Password" required type="password">
                <span class="<?php echo $lnameClass? $lnameClass : 'w3-text-red'; ?>"> *</span>
            </p>

            
            <button formaction="cListDirect.php" class="w3-button w3-round-large w3-blue">Submit</button>

            </form>

            <P>
                !!! Due to server issues indiviual profiles are down. Please log in as 'guest', password 'guest' !!!
            </p>
            

            
  <img src="SIUE_ENG_PLAIN.jpg" alt="banner" class="center">

<footer class="w3-panel w3-center w3-text-black w3-small">
              &copy; 2020-<?php echo $curYear; ?> Bradley Walker
          </footer>
        </main>
    </body>

</html>