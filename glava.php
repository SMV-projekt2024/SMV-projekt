<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LLF Spletna učilnica</title>
    <link rel="stylesheet" href="style.css">
    <?php
        if(!isset($_SESSION["username"])) {
            echo "<link rel='stylesheet' href='style_post_block.css'>";
        }
    ?>
    
</head>
<body>
    <nav>
        <ul class="sidebar" id="sidebar">
            <li onclick=hidSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30"><path d="m249-207-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z"/></svg></a></li>
            <li><a href="prva_stran.php">Domov</a></li>
            <li><a href="posts_stran.php">Šola</a></li>
            <?php
                require_once("includes/functions-inc.php");
                if ( isset($_SESSION["userId"]) ){
                    if  ( roleCheck() == "admin" || roleCheck() == "creator"){
                        echo"<li><a href='create_post.php'>Create Post</a></li>";
                    }
                    echo "<li onclick=showSignIn()><a href='profile_stran.php'><button>Profile</button></a></li>";
                    echo "<li><a href='includes/signout-inc.php'><button>Logout</button></a></li>";
                    
                }
                else{
                    echo "<li onclick=showSignIn()><a><button>Prijava</button></a></li>";
                    echo "<li onclick=showSignUp()><a><button>Registracija</button></a></li>";
                }
            ?>
            
        </ul>
        <ul>
            <li><a href="prva_stran.php"><img class="logo" src="img/logo.png" alt="Logo"></a></li>
            <li class="hideMobile"><a href="prva_stran.php">Domov</a></li>
            <li class="hideMobile"><a href="posts_stran.php">Šole</a></li>
            <?php
                if ( isset($_SESSION["userId"]) ){
                    if  ( roleCheck() == "admin" || roleCheck() == "creator"){
                        echo"<li class='hideMobile'><a href='create_post.php'>Create Post</a></li>";
                    }
                    echo "<li class='hideMobile'><a href='profile_stran.php'><button>Profile</button></a></li>";
                    echo "<li class='hideMobile'><a href='includes/signout-inc.php'><button>Logout</button></a></li>";
                }
                else{
                    echo "<li class='hideMobile' onclick=showSignIn()><a><button>Prijava</button></a></li>";
                    echo "<li class='hideMobile' onclick=showSignUp()><a><button>Registracija</button></a></li>";
                }
            ?>
            <li class="menuButton" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="28" viewBox="0 -960 960 960" width="28"><path fill="#FFFFFF"  d="M120-240v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z"/></svg></a></li>
        </ul>
    </nav>

<!---------------Sign in POPUP----------------->
    <div class="zunanjiLogin">
        <span class="closeLogin" onclick=closeSignIn()><!--✕--><svg xmlns="http://www.w3.org/2000/svg" height="38" viewBox="0 -960 960 960" width="38"><path d="m249-207-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z"/></svg></span>
        <div class="formBox Login">
            <h2>Prijava</h2>
            <form action="includes/signin-inc.php" method="post" novalidate>
                <div class="inputBox">
                    <span class="iconLogin"><svg data-name="Layer 21" height="24" id="Layer_21" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><title/><path d="M19,5H5A2,2,0,0,0,3,7V17a2,2,0,0,0,2,2H19a2,2,0,0,0,2-2V7A2,2,0,0,0,19,5Zm0,4-7,5L5,9V7l7,5,7-5Z"/></svg>
                    </span>
                    <input type="text" required name="username" id="">
                    <label>Email/Uporabniško ime</label>
                </div>
                <div class="inputBox">
                    <span class="iconLogin"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 24 24">
                        <path d="M 12 1 C 8.6761905 1 6 3.6761905 6 7 L 6 8 L 4 8 L 4 22 L 20 22 L 20 8 L 18 8 L 18 7 C 18 3.6761905 15.32381 1 12 1 z M 12 3 C 14.27619 3 16 4.7238095 16 7 L 16 8 L 8 8 L 8 7 C 8 4.7238095 9.7238095 3 12 3 z M 8 14 C 8.55 14 9 14.45 9 15 C 9 15.55 8.55 16 8 16 C 7.45 16 7 15.55 7 15 C 7 14.45 7.45 14 8 14 z M 12 14 C 12.55 14 13 14.45 13 15 C 13 15.55 12.55 16 12 16 C 11.45 16 11 15.55 11 15 C 11 14.45 11.45 14 12 14 z M 16 14 C 16.55 14 17 14.45 17 15 C 17 15.55 16.55 16 16 16 C 15.45 16 15 15.55 15 15 C 15 14.45 15.45 14 16 14 z"></path>
                        </svg></span>
                    <input type="password" required name="password" id="">
                    <label>Geslo</label>
                </div>
                <button type="submit" name="submit" class="loginButton">Prijava</button>
            </form>
        </div>
   </div>
<!--------------Sign UP POPUP---------->
    <div class="zunanjiLogin signup">
            <span class="closeLogin" onclick=closeSignUp()><!--✕--><svg xmlns="http://www.w3.org/2000/svg" height="38" viewBox="0 -960 960 960" width="38"><path d="m249-207-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z"/></svg></span>
            <div class="formBox Login">
                <h2>Registracija</h2>
                <form action="includes/signup-inc.php" method="post" novalidate>
                <div class="inputBox">
                        <input type="text" required name="username" id="">
                        <label>Uporabniško ime</label>
                    </div>
                    <div class="inputBox">
                        <span class="iconLogin"><svg data-name="Layer 21" height="24" id="Layer_21" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><title/><path d="M19,5H5A2,2,0,0,0,3,7V17a2,2,0,0,0,2,2H19a2,2,0,0,0,2-2V7A2,2,0,0,0,19,5Zm0,4-7,5L5,9V7l7,5,7-5Z"/></svg>
                        </span>
                        <input type="email" required name="email" id="">
                        <label>Email</label>
                    </div>
                    <div class="inputBox">
                        <span class="iconLogin"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 24 24">
                            <path d="M 12 1 C 8.6761905 1 6 3.6761905 6 7 L 6 8 L 4 8 L 4 22 L 20 22 L 20 8 L 18 8 L 18 7 C 18 3.6761905 15.32381 1 12 1 z M 12 3 C 14.27619 3 16 4.7238095 16 7 L 16 8 L 8 8 L 8 7 C 8 4.7238095 9.7238095 3 12 3 z M 8 14 C 8.55 14 9 14.45 9 15 C 9 15.55 8.55 16 8 16 C 7.45 16 7 15.55 7 15 C 7 14.45 7.45 14 8 14 z M 12 14 C 12.55 14 13 14.45 13 15 C 13 15.55 12.55 16 12 16 C 11.45 16 11 15.55 11 15 C 11 14.45 11.45 14 12 14 z M 16 14 C 16.55 14 17 14.45 17 15 C 17 15.55 16.55 16 16 16 C 15.45 16 15 15.55 15 15 C 15 14.45 15.45 14 16 14 z"></path>
                            </svg></span>
                        <input type="password" required name="password" id="">
                        <label>Geslo</label>
                    </div>
                    <div class="inputBox">
                        <span class="iconLogin"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 24 24">
                            <path d="M 12 1 C 8.6761905 1 6 3.6761905 6 7 L 6 8 L 4 8 L 4 22 L 20 22 L 20 8 L 18 8 L 18 7 C 18 3.6761905 15.32381 1 12 1 z M 12 3 C 14.27619 3 16 4.7238095 16 7 L 16 8 L 8 8 L 8 7 C 8 4.7238095 9.7238095 3 12 3 z M 8 14 C 8.55 14 9 14.45 9 15 C 9 15.55 8.55 16 8 16 C 7.45 16 7 15.55 7 15 C 7 14.45 7.45 14 8 14 z M 12 14 C 12.55 14 13 14.45 13 15 C 13 15.55 12.55 16 12 16 C 11.45 16 11 15.55 11 15 C 11 14.45 11.45 14 12 14 z M 16 14 C 16.55 14 17 14.45 17 15 C 17 15.55 16.55 16 16 16 C 15.45 16 15 15.55 15 15 C 15 14.45 15.45 14 16 14 z"></path>
                            </svg></span>
                        <input type="password" required name="passwordRepeat" id="">
                        <label>Ponovi geslo</label>
                    </div>
                    <button type="submit" name="submit" class="loginButton">Sign up</button>
                </form>
            </div>
    </div>
    
        <?php
        if (isset($_GET["error"])){
            echo "<div class='MessagePopup'>";
            echo "<span class='closeMessage' onclick=closeMessagePopup()><svg xmlns='http://www.w3.org/2000/svg' height='38' viewBox='0 -960 960 960' width='38'><path d='m249-207-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z'/></svg></span>";
            echo "<div class='MessegeBox'>";  
            
            if ($_GET["error"] == "emptyInput"){
                echo"<p> Fill all fields </p>";
            }
            else if ($_GET["error"] == "invalidUsername"){
                echo"<p> Username should be made with letters and numbers </p>";
            }
            else if ($_GET["error"] == "invalidEmail"){
                echo"<p> Invalid email. </p>";
            }
            else if ($_GET["error"] == "differentPasswords"){
                echo"<p> Passwords does not mach </p>";
            }
            else if ($_GET["error"] == "StatementFailed"){
                echo"<p> Something went wrong. </p>";
            }
            else if ($_GET["error"] == "UsernameTaken"){
                echo"<p> Username taken </p>";
            }
            else if ($_GET["error"] == "None"){
                echo"<p> Success! You are signed up. </p>";
            }
            else if ($_GET["error"] == "emptyInput"){
                echo"<p> Fill all fields </p>";
            }
            else if ($_GET["error"] == "wrongPassword"){
                echo"<p> Wrong password </p>";
            }
            else if ($_GET["error"] == "YouCreatedThePost"){
                echo"<p> Success! You created a post. </p>";
            }
            else if ($_GET["error"] == "None"){
                echo"<p> Success! You are signed up. </p>";
            }
            else if ($_GET["error"] == "SuccessComment"){
                echo"<p> You commented on a post. </p>";
            }
            else if ($_GET["error"] == "YouSentAMail"){
                echo"<p> You've successfully sent an email </p>";
            }
            else if ($_GET["error"] == "MailSent"){
                echo"<p> You've successfully sent an email </p>";
            }
            else if ($_GET["error"] == "YouDeletedpost"){
                echo"<p> You've successfully deleted a post</p>";
            }
            else if ($_GET["error"] == "YouDeletedcomment"){
                echo"<p> You've successfully deleted a comment</p>";
            }
            else if ($_GET["error"] == "NoData"){
                echo"<p> No data provided</p>";
            }
            else if ($_GET["error"] == "wrongSignIn"){
                echo"<p> Uporabnik ne obstaja.</p>";
            }


            echo "</div>";
            echo "</div>";
        
            
        }
    ?>
        
    
