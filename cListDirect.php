<?php
    session_start();
    $curDate = date('Y');

?>


<!DOCTYPE html>
<html>


<style>
 img {
  display: block;
  margin-left: auto;
  margin-right: auto;
 }
 </style>

 <img src="bannerWide.jpg" alt="alternatetext" class="center"> 

<hr>
<head>
        <title>Home page</title>
        <meta charset="utf-8"
              name="viewport"
              content='width=device-width, intitial-scale=1.0'>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>  

    <?php $homePage = 'index.php'; include 'inc.header.php'; ?>

    
    <header class="w3-container w3-blue w3-margin-top">
         <h1 class="w3-center">Select classes to list</h1>
    </header>
    <body style="background-color:grey">
    <div class="w3-container w3-light-grey w3-center">
    <br>
        <form method="GET">
        <p>
            This website is a simple tool to help students plan out what classes they will need to take, as well as what 
            elective classes they would like to take, while working towards a CS degree at SIUE.
        </p>

            <p>
                Select a button below to see class listings, or navigate to your own customizable worklist. 
            </p>

            <p>
                <button formaction = "100Classes.php" class="w3-button w3-round-large w3-blue">List 100's</button>
                <button formaction = "200Classes.php" class="w3-button w3-round-large w3-yellow">List 200's</button>
                <button formaction = "300Classes.php" class="w3-button w3-round-large w3-red">List 300's</button>
            </p>

            <p>
                <button formaction = "userList.php" class="w3-button w3-round-large w3-black">My list</button>
            </p>

        </form>
    <br>
    </div>

    <hr>

    <img src="SIUE_ENG_PLAIN.jpg" alt="alternatetext" class="center"> 

    <footer class="w3-panel w3-center w3-text-black w3-small">
            &copy;  2020-<?php echo $curDate; ?> Bradley Walker
     </footer>


        </main>
    </body>    
</html>