<?php 
session_start();
require_once("Database_Connection.php");
   $sqlInsurance="select m.*,u.firstName  from
   medicalinsurance m JOIN employee e ON e.medicalInsuranceId = m.id
   JOIN user u ON u.id=e.userId";
	//will be in a function, it is when any employee except HR and Manager and Head of doctors enters the table of the medical insurance
	
	$sqlInsuranceEmployee="select u.firstName  from
    employee e 
   JOIN user u ON u.id=e.userId
   AND e.departmentId NOT IN (2,10)
	
   AND e.userId='".$_SESSION['userId']."'";
   //The head of doctors
	$sqlInsuranceDoctor="select e.positionId,e.departmentId  from
    employee e 
   JOIN user u ON u.id=e.userId
   AND e.departmentId =5
	AND e.positionId=1
   AND e.userId='".$_SESSION['userId']."'";
    $resultInsuranceDoctor = mysqli_query($conn,$sqlInsuranceDoctor);
	 if(mysqli_num_rows($resultInsuranceEmployee) > 0)
	{
			
	}
   //the head of doctors section end
    $resultInsuranceEmployee = mysqli_query($conn,$sqlInsuranceEmployee);
    if(mysqli_num_rows($resultInsuranceEmployee) > 0)
	{	

		$sqlInsurance=$sqlInsurance."  AND e.userId='".$_SESSION['userId']."'";
	}
	
	//ends here
   $resultInsurance = mysqli_query($conn,$sqlInsurance);
 if(mysqli_num_rows($resultInsurance) > 0){
	 
                echo"<table border='1'>
                    <tr>
                    <td>ID</td>
					<td>First Name</td>
                    <td>Disease</td>
                    <td>Medicine Type </td>
                    <td>medicineType</td>
                    <td>medicalCardNumber</td>
					<td>maximumInsuranceCost</td>
					
                    </tr>";
                while($row = mysqli_fetch_array($resultInsurance)){
                    echo "<tr>";
                    echo "<td>" .$row['id']. "</td>";
					echo "<td>".$row['firstName']."</td>";
                    echo "<td>" .$row['disease']. "</td>";
                    echo "<td>".$row['medicineType']."</td>";
                    echo "<td>" .$row['medicalCardNumber']. "</td>";
                    echo "<td>".$row['medicinePrice']."</td>";
					echo "<td>".$row['maximumInsuranceCost']."</td>";
					

					
                    echo "</tr>";


                }
                    echo "</table>";
            }


?>