<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {
                font-family: "Lato", sans-serif;
            }

            .sidenav {
                height: 100%;
                width: 0;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                background-color: #111;
                overflow-x: hidden;
                transition: 0.5s;
                padding-top: 60px;
            }

            .sidenav a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 25px;
                color: #818181;
                display: block;
                transition: 0.3s;
            }

            .sidenav a:hover {
                color: #f1f1f1;
            }

            .sidenav .closebtn {
                position: absolute;
                top: 0;
                right: 25px;
                font-size: 36px;
                margin-left: 50px;
            }

            @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
            }
        </style>
    </head>
    <body>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <?php
            if($_SESSION['typeId']=="1" || $_SESSION['typeId']=="3"){
            echo"<a href='displayChilds.php'>Display Childs Data</a><br>";
            echo"<a href='displayUsers.php'>Display Users Accounts</a><br>";
            }
            else if($_SESSION["departmentId"] = '1' && $_SESSION["typeId"] = "3"){
                
            }
            else if($_SESSION['typeId']=="2"){
                    echo"<a href='displayChilds.php'>Your Child Page</a><br>";
            }
        ?>
        <a href='editAccount.php'>Edit Your Account</a><br>
        <a href='messages.php'>Messages</a><br>
        <a href='logOut.php'>Sign Out</a><br>
        <a href='medicalInsurance.php'>Medical Insurance</a><br>
    </div>
        
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>

    </body>
</html>
