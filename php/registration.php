<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="../css/Registration.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script>

        $(document).ready(function(){
            $("#parent").click(function(){
                $("#choice").hide();
                $("#parentForm").fadeIn(1000);
            });
        });

        $(document).ready(function(){
            $("#employee").click(function(){
                $("#choice").hide();
                $("#employeeForm").fadeIn(1000);
            });
        });

        $(document).ready(function(){
            $("#backP").click(function(){
                $("#parentForm").fadeOut("fast");
                $("#choice").fadeIn(3000);
            });
        });

        $(document).ready(function(){
            $("#backE").click(function(){
                $("#employeeForm").fadeOut("fast");
                $("#choice").fadeIn(3000);
            });
        });

        function checkAvailability(){
            jQuery.ajax(
                {
                    url: "check_availability.php",
                    data: 'email='+$("#email").val(),
                    type: "POST",

                    success:function(data){
                        $("#msg").html(data);
                    },
                    error:function(){
                        $("#msg").html("error");
                    }
                });
        }

        function alertCV(){
            alert("make sure to put only an image format please, Only");
        }
        
        function alertMedic(){
            alert("make sure to put only a pdf format please, Only");
        }

    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1">

    <title> Nursery </title>
    </head>

    <body>
       
        <?php
            require_once("Database_Connection.php");

            if (isset($_POST['registerParent']) || isset($_POST['registerEmployee'])){

                $firstName = $_POST["firstName"];
                $lastName = $_POST["lastName"];
                $familyName = $_POST["familyName"];
                $gender = $_POST["gender"];
                $nationality = $_POST["nationality"];
                $dateOfBirth = $_POST["dateOfBirth"];
                $phoneNumber = $_POST["phoneNumber"];
                $homeNumber = $_POST["homeNumber"];
                $ssn = $_POST["ssn"];

                $region = $_POST["region"];
                $streetName = $_POST["streetName"];
                $buildingNumber = $_POST["buildingNumber"];
                $flatNumber = $_POST["flatNumber"];
                $apartmentNumber = $_POST["apartmentNumber"];
                $postalCode = $_POST["postalCode"];

                $workNumber = $_POST["workNumber"];

                $email = $_POST["email"];
                $password = $_POST["password"];
                $confirmPassword = $_POST["confirmPassword"];

                if($firstName!="" && $lastName!="" && $familyName!="" && $gender!="" && $nationality!="" && $dateOfBirth!="" && $phoneNumber!="" &&
                $homeNumber!="" && $ssn != "" && $region!="" && $streetName!="" && $buildingNumber!="" && $flatNumber!="" && $apartmentNumber!="" && $postalCode!="" &&
                $workNumber!="" && $email!="" && $password!="" && $confirmPassword!=""){

                    $date = date('Y-m-d H:i:s');

                    if($password == $confirmPassword){

                        if(isset($_POST['registerParent'])){
                            $typeId = 2; 
                        }
                        else if(isset($_POST['registerEmployee'])){
                            $typeId = 3;
                        }

                        $sql1 = "INSERT INTO `user` (`id`, `email`, `password`, `firstName`, `lastName`, `familyName`, `gender`, `nationality`, `dateOfBirth`, `workNumber`, `phoneNumber`, `homeTelephoneNumber`, `dateJoined`, `statusId`, `ssn`, `typeId`)
                        VALUES (NULL,'".$email."','".$password."','".$firstName."','".$lastName."','".$familyName."','".$gender."','".$nationality."','".$dateOfBirth."','".$workNumber."','".$phoneNumber."','".$homeNumber."','".$date."','1','".$ssn."','".$typeId."')";

                        if (mysqli_query($conn,$sql1)) {

                            $sqluserID = mysqli_query($conn,"SELECT id FROM user WHERE email='".$email."'");

                            if($row2 = mysqli_fetch_array($sqluserID)){

                                $userID = $row2["id"];

                                $sqlAdress = "INSERT INTO `address` (`id`, `Region`, `streetName`, `buildingNumber`, `floorNumber`, `appartment`, `postalCode`, `userId`) VALUES (NULL, '".$region."', '".$streetName."', '".$buildingNumber."', '".$flatNumber."', '".$apartmentNumber."', '".$postalCode."', '".$userID."')";

                                if(mysqli_query($conn,$sqlAdress)){

                                    if(isset($_POST['registerParent'])){

                                        $workPosition = $_POST["workPosition"];
                                        $workPlace = $_POST["workPlace"];
                                    
                                        if($workPosition!="" && $workPlace!=""){
                                            
                                            $sqlParent = "INSERT INTO `parent` (`id`, `userId`, `workPosition`, `workPlace`) VALUES (NULL, '".$userID."', '".$workPosition."', '".$workPlace."')";

                                            if(mysqli_query($conn,$sqlParent)){
        
                                                header("location:../html/Welcome_Page.php");
                                            }
                                            else{
                                                echo $sqlParent;
                                                echo"<br>";
                            
                                                //Underconstructing the error table for IT department
                                                printf("Errormessage: %s\n", mysqli_error($conn));
                                            }
                                        }
                                        else{                                   
                                            echo"Parent table might have a problem";
                                        }
                                    }

                                    else if(isset($_POST['registerEmployee'])){

                                        $university = $_POST["university"];
                                        $universityDegree = $_POST["universityDegree"];
                                        $graduationYear = $_POST["graduationYear"];
                                        $department = $_POST["department"];       
                                        $skills = $_POST["skills"];
                                        $bankAccount = $_POST["bankAccount"];

                                        $cv = addslashes($_FILES['cv']['tmp_name']);
                                        $cv = file_get_contents($cv);
                                        $cv = base64_encode($cv);
                                        $extensionCV = pathinfo($_FILES["cv"]["name"])['extension'];
                                        $cvSize = $_FILES["cv"]["size"]; 
                                        $cvName = $_FILES["cv"]["name"];                            

                                        $medicalTest = addslashes($_FILES['medicalTest']['tmp_name']);
                                        $medicalTest = file_get_contents($medicalTest);
                                        $medicalTest = base64_encode($medicalTest);   
                                        $extensionMedic = pathinfo($_FILES["medicalTest"]["name"])['extension'];
                                        $medicSize = $_FILES["medicalTest"]["size"]; 
                                        $medicName = $_FILES["medicalTest"]["name"];                            

                                        if($cv != "" && $medicalTest != ""){

                                            $cvSQL = "INSERT INTO `uploads` (`id`, `name`, `size`, `type`, `extension`, `data`, `userId`) 
                                            VALUES (NULL, '".$cvName."', '".$cvSize."', '1', '".$extensionCV."', '".$cv."', '".$userID."')";

                                            $medicSQL = "INSERT INTO `uploads` (`id`, `name`, `size`, `type`, `extension`, `data`, `userId`) 
                                            VALUES (NULL, '".$medicName."', '".$medicSize."', '2', '".$extensionMedic."', '".$medicalTest."', '".$userID."')";

                                            if(mysqli_query($conn,$cvSQL) && mysqli_query($conn,$medicSQL)){

                                                $sqlcvID = mysqli_query($conn,"SELECT id FROM uploads WHERE userId='".$userID."' AND type='1'");
                                                $sqlmedicID = mysqli_query($conn,"SELECT id FROM uploads WHERE userId='".$userID."' AND type='2'");

                                                if($cvEmpID = mysqli_fetch_array($sqlcvID)){
                                                    $cvID = $cvEmpID["id"];

                                                    if($medicEmpID = mysqli_fetch_array($sqlmedicID)){
                                                        $medicID = $medicEmpID["id"];

                                                        if($university!="" && $universityDegree!="" && $graduationYear!="" && $department!="" && $skills!="" && $bankAccount!=""){
                                                            
                                                            $sqlEmployee = "INSERT INTO `employee` (`id`, `userId`, `university`, `universityDegree`, `yearOfGraduation`, `departmentId`, `skills`, `bankAccount`, `medicalTestId`, `cvId`, `medicalInsuranceId`, `positionId`, `categoryId`) 
                                                            VALUES (NULL, '".$userID."', '".$university."', '".$universityDegree."', '".$graduationYear."', '".$department."', '".$skills."', '".$bankAccount."', '".$medicID."', '".$cvID."', '1', '3', '3')";

                                                            if(mysqli_query($conn,$sqlEmployee)){
                        
                                                                header("location:logIn.php");
                                                            }
                                                            else{
                                                                echo $sqlEmployee;
                                                                echo"<br>";
                                            
                                                                //Underconstructing the error table for IT department
                                                                printf("Errormessage: %s\n", mysqli_error($conn));
                                                            }
                                                        }
                                                        else{                                   
                                                            echo"Employee table might have a problem";
                                                        }
                                                    }
                                                    else{
                                                        echo"Problem fetching the uploads table for id of medical test";

                                                    }
                                                }
                                                else{
                                                    echo"Problem fetching the uploads table for id of cv";
                                                }
                                            }
                                            else{
                                                echo"uploads table problem";
                                            }
                                        }
                                        else{
                                            echo"CV or Medical Test is empty";
                                        }
                                    }
                                }
                            }
                            else{
                                echo"Error in user id";
                            }
                        }
                        else {
                            echo $sql1;
                            echo"<br>";
                            
                            //Underconstructing the error table for IT department
                            printf("Errormessage: %s\n", mysqli_error($conn));
                        }
                    }
                    else{
                        echo"Please confirm your password";
                    }
                }
                else {
                    echo "Please fill all the boxes";
                }
            }   

        mysqli_close($conn);
        ?>
        
       
    <div id="choice" class="choice">

        <h1> <b>Are you a: </b><h1>
            <button name="parent" id="parent"> Parent </button>

        <h2><b>Or a:</b><h2>
            <button name="employee" id="employee">Employee</button>

    </div>

   

    <div id="parentForm" style="display:none;">
        

<p id="test"></p>
                <h1>New Parent Registration </h1>

            <ul id="ProgressBar">
                <li> Personal Information </li>
                <li> Address Information </li>
                <li> Work Information </li>
                <li> Account Information </li>
            </ul>
            <form id="Parent_Form" method="post">
                <fieldset>
                    <h2 class="Form_Title">  Personal Information </h2>
                    <h3 class="Form_Subtitle">Step 1 </h3>
                    <input type="text" name="firstName" placeholder="First name" id="FirstName" required title="EX: Alfred">  

                    <input type="text" name="lastName" placeholder="Last name" required title="EX:Mohaned"> 

                    <input type="text" name="familyName" placeholder="Family Name" required title="EX:Elbechbechy">
 
                    <input type="radio" name="gender" value="Male"> Male 

                    <input  type="radio" name="gender" value="Female"> Female 

                    <input type="text" name="nationality" placeholder="Nationality" required title="EX:Egyptian , Algerian ,.."> 

                    <input type="date" class="Input_Number" name="dateOfBirth" placeholder="Date of Birth" required title="EX:Month/Day/Year">

                    <input type="number"  class="Input_Number" name="phoneNumber" placeholder="Phone Number" required title="EX:012365245681" > 

                    <input type="number"  class="Input_Number" name="homeNumber" placeholder="Home Number" required title="EX:02-25425246"> 

                    <input type="number" class="Input_Number" name="ssn" placeholder="SSN" required title="EX:2954413655254429">
                    
                    <input type="button" name="backP" id="backP" value="Get Back">    

                    <input type="submit" name="Next" class="Next" value="Next">

                </fieldset>

                <fieldset>
            
                    <h2 class="Form_Title">  Address Information </h2>
                    <h3 class="Form_Subtitle"> Step 2 </h3>
                    <input type="text" name="region" placeholder="Region">

                    <input type="text" name="streetName" placeholder="Street Name">

                    <input type="number"  class="Input_Number" name="buildingNumber" placeholder="Building Number">

                    <input type="number"  class="Input_Number" name="flatNumber" placeholder="Flat Number">

                    <input type="number"  class="Input_Number" name="apartmentNumber" placeholder="Apartment Number">

                    <input type="number"  class="Input_Number" name="postalCode" placeholder="Postal Code">

                    <input type="button"  class="Input_Number" name="Previous" class="Previous" value="Previous" >

                    <input type="button"  class="Input_Number" name="Next" class="Next" value="Next" >


                </fieldset>

                <fieldset>
                    <h2 class="Form_Title">  Work Information </h2>
                    <h3 class="Form_Subtitle"> Step 3 </h3>
                    <input type="text" name="workPosition" placeholder="Work Position">

                    <input type="text"  name="workPlace" placeholder="Work Residence">

                    <input type="number"  class="Input_Number" name="workNumber" placeholder="Work Number">

                    <input type="button" name="Previous" class="Previous" value="Previous" >

                    <input type="button" name="Next" class="Next" value="Next" >

                </fieldset>

                <fieldset>
                    <h2 class="Form_Title">  Account Information </h2>
                    <h3 class="Form_Subtitle">Final Step </h3>

                    <input type="email" name="email"  attr.id="email" placeholder="Email" onBlur="checkAvailability()"><br>
                    <div id="msg"></div>

                    <input type="password"  name="password" placeholder="Password">

                    <input type="password" name="confirmPassword" placeholder="Confirm Password">

                    <input type="button" name="Previous" class="Previous" value="Previous">

                    <input type="submit" name="registerParent" value="register">

                </fieldset>

        </form>

    </div>

    <div id="employeeForm" style="display:none;">
        <h1> New Employee Registration </h1>

        <ul id="ProgressBar">
            <li> Personal Information </li>
            <li> Address Information </li>
            <li> Work Information </li>
            <li> Account Information </li>
        </ul>

        <form  method="post"  enctype="multipart/form-data">

            <fieldset>

                <h2 class="Form_Title">  Personal Information </h2>
                <h3 class="Form_Subtitle"> Step 1 </h3>

                <input type="text" name="firstName" placeholder="First name" required title="EX: Mohamed">

                <input type="text" name="lastName" placeholder="Last name" required title="EX: Ahmed">

                <input type="text" name="familyName" placeholder="Family Name" required title="EX: El-Shenawy">

                <input type="radio" name="gender" value="Male" />  Male 
                <input type="radio" name="gender" value="Female" />  Female 

                <input type="text" name="nationality" placeholder="Nationality" required title="EX: Bulgarian , Ethiopian ,..">

                <input type="date" class="Input_Number" name="dateOfBirth" placeholder="Date of Birth" required title="EX:Month/Day/Year">

                <input type="number" class="Input_Number" name="phoneNumber" placeholder="Phone Number" required title="EX:01236879841" >

                <input type="number" class="Input_Number" name="HomeNumber" placeholder="Home Number"  required title="EX:01236879841" >

                <input type="number" class="Input_Number" name="ssn" placeholder="SSN"  required title="EX:27925425492572">

                <input type="button" name="backE" id="backE" value="Get Back">      

                <input type="button" name="NextEmployee" class="NextEmployee" value="Next">

            </fieldset>

            <fieldset>

                <h2 class="Form_Title">  Address Information </h2>
                <h3 class="Form_Subtitle"> Step 2 </h3>

                <input type="text" name="region" placeholder="Region"  required title="EX:Giza , Heliopolis ,...">

                <input type="text" name="streetName" placeholder="Street Name">

                <input type="number"  class="Input_Number" name="buildingNumber" placeholder="Building Number">

                <input type="number" class="Input_Number" name="flatNumber" placeholder="Flat Number">

                <input type="number" class="Input_Number" name="apartmentNumber" placeholder="Apartment Number">

                <input type="number" class="Input_Number" name="postalCode" placeholder="Postal Code">

                <input type="button" name="PreviousEmployee" class="PreviousEmployee" value="Previous" >

                <input type="button" name="NextEmployee" class="NextEmployee" value="Next" >

                

            </fieldset>

            <fieldset>

                <h2 class="Form_Title"> Applicant Information </h2>
                <h3 class="Form_Subtitle"> Step 3 </h3>

                <input type="text" name="university" placeholder="University">

                <input type="text" name="universityDegree" placeholder="University Degree">

                <input type="number" class="Input_Number" name="graduationYear" placeholder="Graduation Year">

                <select id="Dropdown" name="department">
                    <option value="">Select your department</option>
                    <option value="1">Accounting</option>
                    <option value="2">HR</option>
                    <option value="3">IT</option>
                    <option value="4">Marketing</option>
                    <option value="5">Medical</option>
                    <option value="6">PR</option>
                    <option value="7">Security</option>
                    <option value="8">Teaching</option>
                    <option value="9">Transportation</option>
                </select>

                C.V:
                <input id="C.V" type="file" name="cv" onBlur="alertCV()">

                <textarea rows="4" cols="50" name="skills">Skills</textarea>

                <input type="number" class="Input_Number" name="bankAccount" placeholder="Bank Account">

                Medical Test:
                <input id="MedicalTest" type="file" name="medicalTest" onBlur="alertMedic()">
                
                <input type="button" name="PreviousEmployee" class="PreviousEmployee" value="Previous" >

                <input type="button" name="NextEmployee" class="NextEmployee" value="Next" >

            </fieldset>

            <fieldset>

                <h2 class="Form_Title">  Account Information </h2>
                <h3 class="Form_Subtitle">Final Step </h3>

                <input type="email" name="email" id="email" placeholder="Email" onBlur="checkAvailability()">
                <div id="msg"></div>

                <input type="password" name="password" placeholder="Password">

                <input type="password" name="confirmPassword" placeholder="Confirm Password">

                <input type="button" name="Previous" class="Previous" value="Previous">

                <input type="submit" name="registerEmployee" value="register">

            </fieldset>

        </form>

    </div>

  </body>
  <script>

var current_fs, next_fs, previous_fs; //to detect which step is next and which is pervious and which is in now 
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".Next").click(function()
    {
	if(animating) return false;
	animating = true;
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();

	$("#ProgressBar li").eq($("fieldset").index(next_fs)).addClass("active");//bt5aly elorder bta3 progress bar INC
	
	next_fs.show(); //show the next fieldset
    current_fs.hide();//hide the previous fieldset
	
	current_fs.animate({opacity: 0}, 
    {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 1000, 
		complete: function(){
			current_fs.hide();
			animating = false;
		},
	});
});

$(".Previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();

	$("#ProgressBar li").eq($("fieldset").index(current_fs)).removeClass("active");//Dec of order in progressbar 
	previous_fs.show(); //Show Previous fieldset
	//current_fs.hide();//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 1000, 
		complete: function(){
			current_fs.hide();
            previous_fs.show();
			animating = false;
		}, 
	});
});


var current_fs_employee, next_fs_employee, previous_fs_employee; //to detect which step is next and which is pervious and which is in now 
var left_Employee, opacity_Employee, scale_Employee; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".NextEmployee").click(function()
    {
	if(animating) return false;
	animating = true;
	current_fs_employee = $(this).parent();
	next_fs_employee = $(this).parent().next();

	$("#ProgressBar li").eq($("fieldset").index(next_fs_employee)).addClass("active");//bt5aly elorder bta3 progress bar INC
	
	next_fs_employee.show(); //show the next fieldset
    current_fs_employee.hide();//hide the previous fieldset
	
	current_fs_employee.animate({opacity: 0}, 
    {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs_employee.css({'transform': 'scale('+scale+')'});
			next_fs_employee.css({'left': left, 'opacity': opacity});
		}, 
		duration: 1000, 
		complete: function(){
			current_fs_employee.hide();
			animating = false;
		},
	});
});

$(".PreviousEmployee").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs_employee = $(this).parent();
	previous_fs_employee = $(this).parent().prev();

	$("#ProgressBar li").eq($("fieldset").index(current_fs_employee)).removeClass("active");//Dec of order in progressbar 
	previous_fs_employee.show(); //Show Previous fieldset
	//current_fs.hide();//hide the current fieldset with style
	current_fs_employee.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs_employee.css({'left': left});
			previous_fs_employee.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 1000, 
		complete: function(){
			current_fs_employee.hide();
            previous_fs_employee.show();
			animating = false;
		}, 
	});
});

$(".registerParent").click(function(){
	return false;
})
      </script>

<style>
/* webkit deh bt-remove el arrows up and down */
    .Input_Number::-webkit-inner-spin-button, 
    .Input_Number::-webkit-outer-spin-button
    { 
    -webkit-appearance: none; 
    margin: 0; 
    }
    </style>

</html>
