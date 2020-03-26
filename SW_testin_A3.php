<!DOCTYPE html>
<html lang="en">

<head>
    <title>BMI & Retirement Savings Calculator</title>
    <style>
        .error {
          color: #FF0000;
        }
        
    </style>
</head>

<body>
    <h1>BMI & Retirement Savings Calculator</h1>

    <p><span class="error">All form fields must be completed for the calculations to function.</span>
    
    <h2>BMI</h2>

    </p>
   
<?php

   $output = "";
   $num = 0;
   if(isset($_POST['submit'])){     
    
       if(isset($_POST['height'])) {
           $currentheight = $_POST['height'];
            if (filter_var($_POST['height'], FILTER_VALIDATE_INT)) {
                if($_POST['height'] >= 0 && $_POST['height'] <= 96) {
                $currentheight = $_POST['height'];
                $GPAErr = "";
                }
                else {
                        $GPAErr = "Must be 0 - 96 Inches (inclusive)";
                        }
            }
            
    else {
           $GPAErr = "Must be 0 - 96 Inches (inclusive)";
    }
    
        }    
        
       if(isset($_POST['weight'])) {
            if (filter_var($_POST['weight'], FILTER_VALIDATE_INT)) {
                if($_POST['weight'] >= 0 && $_POST['weight'] <= 450) {
                $currentweight = $_POST['weight'];
                $CCErr = "";
                }
                else {
                        $CCErr = "must be a positive integer";
                        }
            }
    else {
           $CCErr = "must be a positive integer";
    }
        }  

}


$weight = 703 * $currentweight;

$height = $currentheight * $currentheight;
$BMI = $weight / $height;
 
$num = number_format($BMI, 2);





	if ($BMI < 18.5) {
		$output = "underweight";
	}

	elseif ($BMI >= 18.5 && $BMI <= 24.9) {
		$output = "normal weight";
	}

	else {
		$output = "overweight";
	}


        ?>
     
    <form method="post" action="SW_testin_A3.php">
    
               Height: <input type="text" size="4" name="height" value="<?php echo $currentheight; ?>">
        <span class="error"> <?php echo $GPAErr; ?>
        </span>
        <br><br>

        Weight: <input type="text" size="3" name="weight" value="<?php echo $currentweight; ?>">
        <span class="error"> <?php echo $CCErr; ?> 
        </span>
        <br><br>
       Your Body Mass Index is <span style="font-weight: bold;"> <?php echo $num; ?> </span>.
       You are  <?php echo $output; ?>
        <br><br> 


        <input type="submit" name="submit" value="Calculate">
        

    </form>
  
  <h2>Retirement Goal</h2>
 <?php
$msg = "";
$goal_age = "";
   
       if(isset($_POST['age'])) {
           $age = $_POST['age'];
            if (filter_var($_POST['age'], FILTER_VALIDATE_INT)) {
                if($_POST['age'] > 0 && $_POST['age'] <= 100) {
                $age = $_POST['age'];
                $AgeErr = "";
                }
                else {
                        $AgeErr = "Must be a positive integer";
                        }
            }
            
    else {
           $AgeErr = "Must be a positive integer";
    }
    
        }    
        
       if(isset($_POST['salary'])) {
           $salary = $_POST['salary'];
            if (filter_var($_POST['salary'], FILTER_VALIDATE_INT)) {
                if($_POST['salary'] > 0) {
                $salary = $_POST['salary'];
                $SalaryErr = "";
                }
                else {
                        $SalaryErr = "must be a number more than 0";
                        }
            }
    else {
           $SalaryErr = "must be a number more than 0";
    }
        }  
   
       if(isset($_POST['percentage'])) {
           $percentage = $_POST['percentage'];
            if (filter_var($_POST['percentage'], FILTER_VALIDATE_INT)) {
                if($_POST['percentage'] >= 0 && $_POST['percentage'] <= 100) {
                $percentage = $_POST['percentage'];
                $PercentErr = "";
                }
                else {
                        $PercentErr = "Must be positive number";
                        }
            }
    else {
           $PercentErr = "Must be a positive number";
    }
    
       if(isset($_POST['savings'])) {
           $savings = $_POST['savings'];
            if (filter_var($_POST['savings'], FILTER_VALIDATE_INT)) {
                if($_POST['savings'] > 0) {
                $newCredits = $_POST['savings'];
                $SavingsErr = "";
                }
                else {
                        $SavingsErr = "(must be a number more than 0)";
                                            
                        }
            }
    else {
           $SavingsErr = "(must be a number more than 0)";
    }
        } 
        
}

$temp = $salary * $percentage * (.01);
$employer = $temp * 35 * (.01);
$total = $employer + $temp;


$goal = ceil(($savings / $total));
$goal_age = $goal + $age;

	if($goal_age >= 100 ){
		$msg = "Your goal is unreachable with the percentage saved";
	}
	elseif($goal_age <= 0) {
	    $total = 0;
	    $goal_age = 0;
		$msg = "You will reach the goal of $ $total by the age of $goal_age";
	}
	elseif($total <= 0){
	    $total = 0;
	    $goal_age = 0;
		$msg = "You will reach the goal of $ $total by the age of $goal_age";

	   }
	else{
		$msg = "You will reach the goal of $ $total by the age of $goal_age";	    
	   }
	

        ?>
     
    <form method="post" action="SW_testin_A3.php">
    
        Age: <input type="text" size="2" name="age" value="<?php echo $age; ?>">
        <span class="error"> <?php echo $AgeErr; ?>
        </span>
        <br><br>

        Salary(do not type commas): <input type="text" size="15" name="salary" value="<?php echo $salary; ?>">
        <span class="error"> <?php echo $SalaryErr; ?> 
        </span>
        <br><br>
      
        Percentage saved(%): <input type="text" size="3" name="percentage" value="<?php echo $percentage; ?>">
        <span class="error"> <?php echo $PercentErr; ?>
        </span>
        <br><br>

        Savings Goal($): <input type="text" size="15" name="savings" value="<?php echo $savings; ?>">
        <span class="error">
        <?php echo $NCErr; ?></span> 
        <span style="font-weight: bold;"> <?php echo $msg; ?> </span> 
        <br><br>
        <br><br>

            <input type="submit" name="submit" value="Goal">
        

    </form>
   
    
    
    
    
    
   
    


</body>

</html>
