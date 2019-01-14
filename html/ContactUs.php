<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/ContactUs.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Nursery </title>
</head>

<body>
    <?php
    session_start();
    if(empty($_SESSION['loggedIn'])){
        echo"<div class='topnav'>
                <a href='../php/logIn.php'> <span>Login</span></a>
                <a href='../php/registration.php'><span>Sign Up</span></a>
            </div>";
    }
    else if($_SESSION['loggedIn']==1){
        echo"<div class='topnav'>";
            require("../php/sidebar.php");
        echo"</div>";
    }
    ?>

    <div class="Header">
        <div class="Buttons">
            <button id="Home_Button" onclick="window.location.href='../html/Welcome_Page.php'">
                <span>Home</span>
           </button>      
           
           <button id="Branches_Button" onclick="window.location.href='../html/Branches.html'" >
               <span>Branches</span>
           </button>          
           <button id="Ourteam_Button" onclick="window.location.href='../html/OurTeam.html'" >
               <span>Our Team</span>
           </button>

           
           <button id="Aboutus_Button" onclick="window.location.href='../html/AboutUs.html'" > 
               <span>About Us</span> 
           </button>

           <button id="Contactus_Button" onclick="window.location.href='../html/ContactUs.html'" > 
               <span>Contact Us</span>
           </button>
        </div>
    </div>
<div class="Middle_Of_Page">
    
</div>

    <div class="Footer">
        <!--Social media button classes-->
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-youtube"></a>
        <a href="#" class="fa fa-instagram"></a>
    </div>

</body>

</html>