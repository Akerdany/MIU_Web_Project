<!DOCTYPE html>
<html lang="en">

<head>
    
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
           
           <button id="Branches_Button" onclick="window.location.href='../html/Branches.php'" >
               <span>Branches</span>
           </button>      

           <button id="Ourteam_Button" onclick="window.location.href='../html/OurTeam.php'" >
               <span>Our Team</span>
           </button>
           
           <button id="Aboutus_Button" onclick="window.location.href='../html/AboutUs.php'" > 
               <span>About Us</span> 
           </button>

           <button id="Contactus_Button" onclick="window.location.href='../html/ContactUs.php'" > 
               <span>Contact Us</span>
           </button>
        </div>
    </div>

    <div class="Middle_Of_Page">
            <h1> <i>Our Nursery Branches :</i></h1> <!--title-->
            <h2> <i>  Maadi Branch : </i></h2> <!--subtitle -->
            <p> 25 Nada Tower - 6th-El zahraa St. - after Kuwaiti mosque - Zahraa Elmaadi <br><br>
                <b> Telephone : 0225196542. </b> <br>
               <b> Mobile : 01097745933. </b>  <br>
            </p>

            <h2> <i>New Cairo Branch : </i></h2> <!--subtitle -->
            <p>  Villa 260 - 34 St. - in front of Al Shuwaifat School - 5th District - 4th Zone
                Cairo - New Cairo - Fifth Settlement <br><br>
                <b> Telephone : 0222641100. </b><br>
                <b> Mobile : 01220000035. </b><br>
            </p>

            <h2> <i> Nasr City Branch : </i></h2> <!--subtitle -->
            <p>  Villa 4 Al Nedal St off Mohamed Mandour behind KFC Al Tayaran - Al Tayaran St. - Rabea Al Adawiya
                Cairo - Nasr City  <br><br>
                <b> Telephone : 0224176681. </b><br>
               <b> Mobile : 01114566588. </b><br>
            </p>
    
        </div>
    

    <div class="Footer">
        <!--Social media button classes-->
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-youtube"></a>
        <a href="#" class="fa fa-instagram"></a>
    </div>

</body>

</html>
<style>
body 
{
    font-family: Verdana, sans-serif;
    background-image: linear-gradient( snow,pink);
 
}
.Middle_Of_Page
{
    background-color:snow;  
    width: 800px; 
    height: 550px;
    border-radius: 20px;
    margin: center;   
    margin-left: auto;
    margin-right: auto;
    position: relative;
    left: 0%;
    top: 0%;
}
h1
{
   font-size:30px; 
   text-align: center;
}
h2
{
    font-size:25px;
    text-align:left;/*text starts from left */
    margin-left: 15px;/*starst from left and add 10 pixels to the start */
}
p
{
    font-size:15px;
    text-align:left;/*text starts from left */
    margin-left: 22.5px;/*starst from left and add 10 pixels to the start */
}
.topnav/*setting of navbar place */
{
    overflow: hidden;
    background-color :indigo;
    border-radius: 10px;
    width: 1520px;  
    height: 50px;
    position:relative;
    left: -10px;/*starts after 1000pixel */
    top: -10px;
}

.topnav a /*inside the world font settings*/
{
    float: right;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

.topnav a:hover /*lma 2a2af 3ala elbutton feh eltopnav*/
{
    background-color:none;
    color: white;
}
.Footer/*setting of nagbar place */
{
    overflow: hidden;
    background-color:indigo;
    border-radius:20px;
    width: 1520px;  
    height: 120px;
    position:relative;/*bt-apply width height top left position*/
    left: -10px;/*sratrs after 1000pixel */
    top: 30px; 
}

.Footer a /*inside the world font settings*/
{
    float: right;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

.Footer a:hover {
    background-color:none;
    color: white;
}  
.Header
{
    background-image: transparent;
    width: 700px; 
    height: 50px;
    text-align-last: justify;
    margin-left: auto;
    margin-right: auto;
    position: relative;
    left: 0px;
    top: 0px;
}
#Buttons/* mkan buttons feen feh header*/
{
    width: 510px;  
    height: 50px;
    position:relative;
    left: 15px;
    top: 15px;
  
}
#Home_Button /*Button Settings*/
{
    border-radius: 5px;/*smooth of edges*/
    background-color:hotpink;
    color: #FFFFFF;
    border: none;
    text-align: middle;
    font-size: 15px;
    padding: 5px;
    width: 75px;
    transition: all 0.5s;/*23taked dah leh 3laka bel word motion*/
    cursor: auto;/*shape of cursor lma mouse you2af 3ala button*/
    margin: 5px;
}

#Home_Button span 
{
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
}
  
#Home_Button span:after /* lma 2a2af 3ala elbutton eleffects elly bttla3*/
{
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -15px;/*arrow motion starts mn feen */
    transition: 0.5s;
}
  
#Home_Button:hover span 
{
    padding-right: 25px;
}
  
#Home_Button:hover span:after 
{
    opacity: 5;
    right: 5px;/*arrow ha-y-stop feen*/
}
#Aboutus_Button /*Button Settings*/
{
    border-radius: 5px;/*smooth of edges*/
    background-color: darkgreen;
    color: #FFFFFF;
    border: none;
    text-align: middle;
    font-size: 15px;
    padding: 5px;
    width: 100px;
    transition: all 0.5s;/*23taked dah leh 3laka bel word motion*/
    cursor: auto;/*shape of cursor lma mouse you2af 3ala button*/
    margin: 5px;
}

#Aboutus_Button span 
{
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
}
  
#Aboutus_Button span:after 
{
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -15px;/*arrow motion starts mn feen */
    transition: 0.5s;
}
  
#Aboutus_Button:hover span 
{
    padding-right: 25px;
}
  
#Aboutus_Button:hover span:after 
{
    opacity: 5;
    right: 5px;/*arrow ha-y-stop feen*/
}
#Contactus_Button /*Button Settings*/
{
    border-radius: 5px;/*smooth of edges*/
    background-color: violet;
    color: #FFFFFF;
    border: none;
    text-align: middle;
    font-size: 15px;
    padding: 5px;
    width: 120px;
    transition: all 0.5s;/*23taked dah leh 3laka bel word motion*/
    cursor: auto;/*shape of cursor lma mouse you2af 3ala button*/
    margin: 5px;
}

#Contactus_Button span 
{
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
}
  
#Contactus_Button span:after 
{
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -15px;/*arrow motion starts mn feen */
    transition: 0.5s;
}
  
#Contactus_Button:hover span 
{
    padding-right: 25px;
}
  
  #Contactus_Button:hover span:after 
{
    opacity: 5;
    right: 5px;/*arrow ha-y-stop feen*/
}
#Branches_Button /*Button Settings*/
{
    border-radius: 5px;/*smooth of edges*/
    background-color: teal;
    color: #FFFFFF;
    border: none;
    text-align: middle;
    font-size: 15px;
    padding: 5px;
    width: 90px;
    transition: all 0.5s;/*23taked dah leh 3laka bel word motion*/
    cursor: auto;/*shape of cursor lma mouse you2af 3ala button*/
    margin: 5px;
}
#Branches_Button span 
{
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
}
#Branches_Button span:after 
{
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -15px;/*arrow motion starts mn feen */
    transition: 0.5s;
}
#Branches_Button:hover span 
{
    padding-right: 25px;
}
  
#Branches_Button:hover span:after 
{
    opacity: 5;
    right: 5px;/*arrow ha-y-stop feen*/
}
#Ourteam_Button /*Button Settings*/
{
    border-radius: 5px;/*smooth of edges*/
    background-color:  deeppink;
    color: #FFFFFF;
    border: none;
    text-align: middle;
    font-size: 15px;
    padding: 5px;
    width: 120px;
    transition: all 0.5s;/*23taked dah leh 3laka bel word motion*/
    cursor: auto;/*shape of cursor lma mouse you2af 3ala button*/
    margin: 5px;
}

#Ourteam_Button span 
{
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
}
  
#Ourteam_Button span:after 
{
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -15px;/*arrow motion starts mn feen */
    transition: 0.5s;
}
  
#Ourteam_Button:hover span 
{
    padding-right: 25px;
}
  
#Ourteam_Button:hover span:after 
{
    opacity: 5;
    right: 5px;/*arrow ha-y-stop feen*/
}
</style>