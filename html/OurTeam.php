<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <!-- <h1>Little Kids Nursery</h1>-->
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
    
    
    <div class="Manager_Div">
        <h1> <i>Our Manager </i></h1> <!--title-->
        <p>Name : Liza Makram  <br>
            Target : <br> <br>
              Contact Manager : <br>

        </p>
        <img id="Image_Options" src="../pictures/Manager.jpg" alt="Manager Picture" width="200" height="200"> 
       
    </div>

    <div class="Teacher1_Div">
        <h1> <i> Our English Teacher </i></h1> <!--title-->
        <p>Name : Nadia Mohamed Ahmed <br>
        Target : <br>
        Contact Teacher : <br>

        </p>
        <img id="Image_Options" src="../pictures/Teacher1.jpg" alt="Manager Picture" width="150" height="200" > 

    </div>

    <div class="Teacher2_Div">
        <h1> <i> Our French Teacher </i></h1> <!--title-->
        <p>Name : Sophia Martinez <br>
        Target : <br>
        Contact Teacher : <br>

        </p>
        <img id="Image_Options" src="../pictures/Teacher2.jpg" alt="Manager Picture" width="180" height="200"> 
           
    </div>

    <div class="Teacher3_Div">
        <h1> <i> Our Arabic Teacher </i></h1> <!--title-->
        <p>Name : Hassan Mohamed Ibrahim <br>
        Target : <br>
        Contact Teacher : <br>

        </p>
        <img id="Image_Options" src="../pictures/Teacher3.jpg" alt="Manager Picture"width="150" height="200" > 
         
    </div>

    <div class="Teacher4_Div">
        <h1> <i> Our Science Teacher </i></h1> <!--title-->
        <p>Name : Sherin Khaled Gamil  <br>
        Target : <br>
        Contact Teacher : <br>

        </p>
        <img id="Image_Options" src="../pictures/Teacher4.jpg" alt="Manager Picture"width="200" height="200" > 
         
    </div>

    <div class="Teacher5_Div">
        <h1> <i> Our Math Teacher </i></h1> <!--title-->
        <p>Name : <br>
        Target : <br>
        Contact Teacher : <br>

        </p>
        <img id="Image_Options" src="../pictures/Teacher5.jpg" alt="Manager Picture"width="200" height="200" > 
         
    </div>

    <div class="Doctor_Div">
        <h1> <i>Our Doctor </i></h1> <!--title-->
        <p>Name : <br>
        Target : <br>
        Contact Doctor : <br>

        </p>
         <img id="Image_Options" src="../pictures/Doctor.jpg" alt="Manager Picture"width="200" height="200" > 
            
    </div>

    <div class="Footer">
            <!--Social media button classes-->
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-youtube"></a>
        <a href="#" class="fa fa-instagram"></a>
    </div>

</body>
<style>
    body 
{
    font-family: Verdana, sans-serif;
    background-image: linear-gradient( snow,pink);
 
}
h1
{
    text-align:left;/*text starts from left */ 
    margin-left: 22.5px;/*starst from left and add 10 pixels to the start */
    text-align: center;
    float:center;
}
p
{
    text-align:left;/*text starts from left */ 
    margin-left: 22.5px;/*starst from left and add 10 pixels to the start */
    text-align:center;
    float: left;/*by5aly elsoura w el text gamb b3d */ 
}
.Manager_Div
{
    background-color:pink;  
    width: 1000px; 
    height: 300px;
    border-radius: 20px;
    margin: center;   
    margin-left: auto;
    margin-right: auto;
    position: relative;
    left: 0%;
    top: 0%;
}
.Teacher1_Div
{
    background-color:pink ;  
    width: 1000px; 
    height: 300px;
    border-radius: 20px;
    margin: center;   
    margin-left: auto;
    margin-right: auto;
    position: relative;
    left: 0%;
    top: 0%;
}
.Teacher2_Div
{
    background-color:pink ;  
    width: 1000px; 
    height: 300px;
    border-radius: 20px;
    margin: center;   
    margin-left: auto;
    margin-right: auto;
    position: relative;
    left: 0%;
    top: 0%;
}
.Teacher3_Div
{
    background-image: linear-gradient(pink , snow);  
    width: 1000px; 
    height: 300px;
    border-radius: 20px;
    margin: center;   
    margin-left: auto;
    margin-right: auto;
    position: relative;
    left: 0%;
    top: 0%;
}
.Teacher4_Div
{
    background-color:snow ; 
    width: 1000px; 
    height: 300px;
    border-radius: 20px;
    margin: center;   
    margin-left: auto;
    margin-right: auto;
    position: relative;
    left: 0%;
    top: 0%;
}
.Teacher5_Div
{
    background-color:Snow;  
    width: 1000px; 
    height: 300px;
    border-radius: 20px;
    margin: center;   
    margin-left: auto;
    margin-right: auto;
    position: relative;
    left: 0%;
    top: 0%;
}
.Doctor_Div
{
    background-color:Snow;  
    width: 1000px; 
    height: 300px;
    border-radius: 20px;
    margin: center;   
    margin-left: auto;
    margin-right: auto;
    position: relative;
    left: 0%;
    top: 0%;
}
#Image_Options
{
    border-radius: 15px;   
    margin-right: 20px;/*starst from left and add 10 pixels to the start */
    float:right;/*by5aly elsoura w eltext gamb b3d */

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

</html>