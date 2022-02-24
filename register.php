<?php
// To include config file, similar to "require" but
// only checks once if the file is included or not
require_once "config.php";

//defining all variabes below
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";


//additional varibales 
$first_name = $last_name = $address = $age =  $email = $slot = $phone ="";
$first_name_err = $last_name_err = $address_err =  $age_err =  $email_err = $slot_err = $phone_err = "";



//Processing form data when form is submitted 

if($_SERVER["REQUEST_METHOD"] == "POST"){

    //Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a valid username.";
    }elseif(!preg_match('/^[a-zA-Z0-9]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters and numbers";
    }else{
        //Prepare a select statement
        $sql = "SELECT user_id from userdata WHERE username = ?";
        
        // $mysqli->prepare function is used to prepare an SQL statement for execution.
        if($stmt = $mysqli->prepare($sql)){
            //Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            //set parameters
            $param_username = trim($_POST["username"]);
            
            //attempt to execute the prepared statement
            if($stmt -> execute()){
                //store results
                $stmt->store_result();

                if($stmt -> num_rows == 1){
                    $username_err = "This username is already taken";
                }else{
                    $username = trim($_POST["username"]);
                }
            }else{
                echo "OOPs! Something went wrong. Please try again later.";
            }

            //close statement
            $stmt->close();
        }
    }


    //to validate passsword
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    }elseif(strlen(trim($_POST["password"])) < 8 ){
        $password_err = "Password must have at least 8 characters.";
    }else{
        $password = trim($_POST["password"]);
    }

    //Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    }else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match";
        }
    }

    

    //For user's name ----------START-------------------
    
    //validate name
    if(empty(trim($_POST["first_name"]))){
        $first_name_err = "Please enter a valid name.";
    }else{
        //Prepare a select statement
        $sql = "SELECT user_id from userdata WHERE first_name = ?";

        // $mysqli->prepare function is used to prepare an SQL statement for execution.
        if($stmt = $mysqli->prepare($sql)){
            //bind variabes to the prepared statement as parameters
            $stmt->bind_param("s",  $param_first_name);

            //set parameters
            $param_first_name = trim($_POST["first_name"]);

            //attempt to execute the prepared statement 
            if($stmt->execute()){
                
                //store results
                $stmt->store_result();
                $first_name = trim($_POST["first_name"]);
            }else{
                echo "OOPs! Something went wrong. Please try again !";
            }
            //close statement
            $stmt->close();
        }
    }

    //For user's name -----------END--------------------

        //For user's last name ----------START-------------------
    
    //validate name
    if(empty(trim($_POST["last_name"]))){
        $last_name_err = "Please enter a valid name.";
    }else{
        //Prepare a select statement
        $sql = "SELECT user_id from userdata WHERE last_name = ?";

        // $mysqli->prepare function is used to prepare an SQL statement for execution.
        if($stmt = $mysqli->prepare($sql)){
            //bind variabes to the prepared statement as parameters
            $stmt->bind_param("s",  $param_last_name);

            //set parameters
            $param_last_name = trim($_POST["last_name"]);

            //attempt to execute the prepared statement 
            if($stmt->execute()){
                
                //store results
                $stmt->store_result();
                $last_name = trim($_POST["last_name"]);
            }else{
                echo "OOPs! Something went wrong. Please try again !";
            }
            //close statement
            $stmt->close();
        }
    }

    //For user's last name -----------END--------------------

    // //For user's Address ----------START-------------------
    
    // //validate name
    // if(empty(trim($_POST["address"]))){
    //     $address_err = "Please enter a valid address.";
    // }else{
    //     //Prepare a select statement
    //     $sql = "SELECT id from userdata WHERE address = ?";

    //     // $mysqli->prepare function is used to prepare an SQL statement for execution.
    //     if($stmt = $mysqli->prepare($sql)){
    //         //bind variabes to the prepared statement as parameters
    //         $stmt->bind_param("s",  $param_address);

    //         //set parameters
    //         $param_address = trim($_POST["address"]);

    //         //attempt to execute the prepared statement 
    //         if($stmt->execute()){
                
    //             //store results
    //             $stmt->store_result();
    //             $address = trim($_POST["address"]);
    //         }else{
    //             echo "OOPs! Something went wrong. Please try again !";
    //         }
    //         //close statement
    //         $stmt->close();
    //     }
    // }

    // //For user's Address -----------END--------------------

    //For user's Gender ----------START-------------------
    
    //validate name
         /*
        $sql = "SELECT id from userdata WHERE gender = ?";
        $gender = $_POST['gender']; 
        echo $sql;
        */

        //Prepare a select statement
        // if(empty($_POST["gender"])){
        //     $gender_err = "Please enter a valid gender.";
        // }else{
        //     // $mysqli->prepare function is used to prepare an SQL statement for execution.
        //     if($stmt = $mysqli->prepare($sql)){
        //         //bind variabes to the prepared statement as parameters
        //         $stmt->bind_param("s",  $param_gender);

        //         //set parameters
        //         $param_gender = trim($_POST["gender"]);

        //         //attempt to execute the prepared statement 
        //         if($stmt->execute()){
                    
        //             //store results
        //             $stmt->store_result();
        //             $gender = trim($_POST["gender"]);
        //         }else{
        //             echo "OOPs! Something went wrong. Please try again !";
        //         }
        //         //close statement
        //         $stmt->close();
        //     }
        // }
     
    //For user's Gender -----------END--------------------
    //For user's Slot ----------START-------------------
    
    //validate name
         /*
        $sql = "SELECT id from login WHERE gender = ?";
        $gender = $_POST['gender']; 
        echo $sql;
        */
        
        //Prepare a select statement
        // if(empty($_POST["slot_id"])){
        //     $slot_err = "Please choose a slot.";
        // }else{
        //     // $mysqli->prepare function is used to prepare an SQL statement for execution.
        //     if($stmt = $mysqli->prepare($sql)){
        //         //bind variabes to the prepared statement as parameters
        //         $stmt->bind_param("s",  $param_slot);

        //         //set parameters
        //         $param_slot = trim($_POST["slot_id"]);

        //         //attempt to execute the prepared statement 
        //         if($stmt->execute()){
                    
        //             //store results
        //             $stmt->store_result();
        //             $slot = trim($_POST["slot_id"]);
        //         }else{
        //             echo "OOPs! Something went wrong. Please try again !";
        //         }
        //         //close statement
        //         $stmt->close();
        //     }
        // }
            

    //For user's  slot  -----------END--------------------

    //For user's City ----------START-------------------
    
    //validate name
         /*
        $sql = "SELECT id from login WHERE gender = ?";
        $gender = $_POST['gender']; 
        echo $sql;
        */

        //Prepare a select statement
        if(empty($_POST["city"])){
            $city_err = "Please enter a valid City.";
        }else{
            // $mysqli->prepare function is used to prepare an SQL statement for execution.
            if($stmt = $mysqli->prepare($sql)){
                //bind variabes to the prepared statement as parameters
                $stmt->bind_param("s",  $param_city);

                //set parameters
                $param_city = trim($_POST["city"]);

                //attempt to execute the prepared statement 
                if($stmt->execute()){
                    
                    //store results
                    $stmt->store_result();
                    $city = trim($_POST["city"]);
                }else{
                    echo "OOPs! Something went wrong. Please try again !";
                }
                //close statement
                $stmt->close();
            }
        }
     
    //For user's  City  -----------END--------------------

    //For user's email ----------START-------------------
    
    //validate name
    if(empty(trim($_POST["email_id"]))){
        $email_err = "Please enter a valid email.";
    }elseif(!preg_match('/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/', trim($_POST["email_id"]))){
        $email_err = "Please enter a valid email ID.";
    }else{
        //Prepare a select statement
        $sql = "SELECT user_id from userdata WHERE email_id = ?";

        // $mysqli->prepare function is used to prepare an SQL statement for execution.
        if($stmt = $mysqli->prepare($sql)){
            //bind variabes to the prepared statement as parameters
            $stmt->bind_param("s",  $param_email);

            //set parameters
            $param_email = trim($_POST["email_id"]);

            //attempt to execute the prepared statement 
            if($stmt->execute()){
                
                //store results
                $stmt->store_result();
                $email = trim($_POST["email_id"]);
            }else{
                echo "OOPs! Something went wrong. Please try again !";
            }
            //close statement
            $stmt->close();
        }
    }

    //For user's email -----------END--------------------

    //For user's age ----------START-------------------
    
    //validate name
    if(empty(trim($_POST["age"]))){
        $age_err = "Please enter a valid age.";
    }else{
        //Prepare a select statement
        $sql = "SELECT user_id from userdata WHERE age = ?";

        // $mysqli->prepare function is used to prepare an SQL statement for execution.
        if($stmt = $mysqli->prepare($sql)){
            //bind variabes to the prepared statement as parameters
            $stmt->bind_param("i",  $param_age);

            //set parameters
            $param_age = trim($_POST["age"]);

            //attempt to execute the prepared statement 
            if($stmt->execute()){
                
                //store results
                $stmt->store_result();
                $age = trim($_POST["age"]);
            }else{
                echo "OOPs! Something went wrong. Please try again !";
            }
            //close statement
            $stmt->close();
        }
    }

    //For user's age -----------END--------------------

    //For user's phone ----------START-------------------
    
    //validate name
    if(empty(trim($_POST["phone"]))){
        $phone_err = "Please enter a valid phone number.";
    }else{
        //Prepare a select statement
        $sql = "SELECT user_id from userdata WHERE phone = ?";

        // $mysqli->prepare function is used to prepare an SQL statement for execution.
        if($stmt = $mysqli->prepare($sql)){
            //bind variabes to the prepared statement as parameters
            $stmt->bind_param("i",  $param_phone);

            //set parameters
            $param_phone = trim($_POST["phone"]);

            //attempt to execute the prepared statement 
            if($stmt->execute()){
                
                //store results
                $stmt->store_result();
                $phone = trim($_POST["phone"]);
            }else{
                echo "OOPs! Something went wrong. Please try again !";
            }
            //close statement
            $stmt->close();
        }
    }

    //For user's phone -----------END--------------------
   


    //Check input errors before inserting in data base
    if(empty($first_name_err) && empty($last_name_err) && empty($password_err) && empty($confirm_password_err) && empty($username_err) && empty($email_err) && empty($age_err) && empty($phone_err) && empty($slot_err) && empty($city_err)){
            
            // $checkbox1=$_POST['slot_id'];  
            // $chk="";  
            // foreach($checkbox1 as $chk1)  
            // {  
            //     $chk .= $chk1.",";  
            // }  

        // Prepare an insert statement
        //$sql = "INSERT INTO userdata (first_name, last_name, username, password, email_id, age, phone, slot_id, city) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $sql = "INSERT INTO userdata (first_name, last_name, username, password, email_id, age, phone, city) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";
          
        
        if($stmt = $mysqli->prepare($sql)){
            //Bind variables to the prepared statement as parameters
            //$stmt->bind_param("sssssiiss", $param_first_name, $param_last_name, $param_username, $param_password, $param_email, $param_age, $param_phone, $param_slot, $param_city);
            $stmt->bind_param("sssssiis", $param_first_name, $param_last_name, $param_username, $param_password, $param_email, $param_age, $param_phone, $param_city);

            //set parameters 
            $param_first_name = $first_name;
            $param_last_name = $last_name;
            $param_username = $username;
            $param_email = $email;
            $param_age = $age;
            $param_phone = $phone;
            //$param_slot = $slot;
            $param_city = $city;

            


            //creates a password hash
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            //attempt to execute the prepared statement
            if($stmt->execute()){
                //Redirect to login page
                header("location: login.php");
            }else{
                echo "OOPs! Something went wrong. Please try again later !";
            }

            //for assigneing ticket in ticket table --- start ----
        
            // $ticket_query = "INSERT INTO ticket SELECT user_id, slot_id, ticket_id
            // FROM userdata, masterticket WHERE assigned = 1 ORDER BY user_id, ticket_id DESC LIMIT 1;";

            $checkbox1=$_POST['slot_id'];  
            // $chk="";  
            foreach($checkbox1 as $chk1)  
            {  
                // $chk .= $chk1.",";  


                $ticket_query = "INSERT INTO ticket SELECT user_id, slot_id, ticket_id
                FROM userdata, masterticket WHERE assigned = 0 ORDER BY user_id DESC, ticket_id ASC LIMIT 2;";
                if(mysqli_query($mysqli, $ticket_query)){
                    
                }

                //$slot_update_query = " UPDATE `ticket` SET slot_id = $chk1 WHERE user_id ORDER BY user_id DESC LIMIT 1;";
                $slot_update_query = "UPDATE `ticket` SET slot_id = $chk1 WHERE ticket_id ORDER BY ticket_id DESC LIMIT 2;";
                if(mysqli_query($mysqli, $slot_update_query)){
                
                }

                $assign_query = "UPDATE `masterticket` SET `assigned`= 1 WHERE assigned = 0 ORDER BY ticket_id ASC LIMIT 2;";
                if(mysqli_query($mysqli, $assign_query)){
                
                }



                //for reflecting slots in slot table  --- start ---
                $slot_assign = "UPDATE `slots` SET `booked_seats`= `booked_seats` + 1 WHERE slot_id = $chk1;";
                if(mysqli_query($mysqli, $slot_assign)){
                
                }
                //for reflecting slots in slot table  --- end ----
            }  
            
            //for assigning ticket in ticket table --- end ----

            //close statement
            $stmt->close();
        }
    }



    //close connection 
    $mysqli->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
                
        .form-group-slots label{
            display: inline;
        };
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"  name="frm" id="frm">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control <?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $first_name; ?>">
                <span class="invalid-feedback"><?php echo $first_name_err; ?></span>
            </div>  
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control <?php echo (!empty($last_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $last_name; ?>">
                <span class="invalid-feedback"><?php echo $last_name_err; ?></span>
            </div>  
            <div class="form-group">
                <label>Age</label>
                <input type="age" min="6" max="85" maxlength="2" name="age" class="form-control <?php echo (!empty($age_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $age; ?>">
                <span class="invalid-feedback"><?php echo $age_err; ?></span>
            </div>  
 
            <div class="form-group">
                <label>Phone</label>
                <input type="tel" maxlength="10" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
                <span class="invalid-feedback"><?php echo $phone_err; ?></span>
            </div> 
            
            <div class="form-group">
                <label>City</label>
                <select name="city" class="form-control <?php echo (!empty($city_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $city; ?>">
                    <option value="" disabled selected>Choose option</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Pune">Pune</option>
                    <option value="Nagpur">Nagpur</option>
                    <option value="Ahmedabad">Ahmedabad</option>
                    <option value="Surat">Surat</option>
                    <option value="Baroda">Baroda</option>
                    <option value="Bhopal">Bhopal</option>
                    <option value="Indore">Indore</option>
                    <option value="Gwalior">Gwalior</option>
                </select>
                <span class="invalid-feedback"><?php echo $city_err; ?></span>
                <input type="hidden">
            </div>  
           
            <!-- <div class="form-group">
                <label>Preffered Slot : </label>
                <select name="slot_id" class="form-control <?php echo (!empty($slot_err)) ? 'is-invalid' : '';?>"  value="<?php echo $slot; ?>" >
                    <option value="" disabled selected>Choose option</option>
                    <option value="1">Day 1 - First Slot</option>
                    <option value="2">Day 1 - Second Slot</option>
                    <option value="3">Day 2 - First Slot</option>
                    <option value="4">Day 2 - Second Slot</option>
                </select>
                <span class="invalid-feedback"><?php echo $slot_err; ?></span>
                <input type="hidden">
            </div>   -->

            <div class="form-group-slots">    
                <label>Preffered Slot : </label>
                <input type="checkbox"  name="slot_id[]"  class="form-control <?php echo (!empty($slot_err)) ? 'is-invalid' : '';?>"  value="1">
                <label for="slot_id">Slot 1</label><br>
                <input type="checkbox"  name="slot_id[]"  class="form-control <?php echo (!empty($slot_err)) ? 'is-invalid' : '';?>"  value="2" >
                <label for="slot_id">Slot 2</label><br>
                <input type="checkbox"  name="slot_id[]"  class="form-control <?php echo (!empty($slot_err)) ? 'is-invalid' : '';?>"  value="3" >
                <label for="slot_id">Slot 3</label><br>
                <input type="checkbox"  name="slot_id[]"  class="form-control <?php echo (!empty($slot_err)) ? 'is-invalid' : '';?>"  value="4" >
                <label for="slot_id">Slot 4</label><br>
                <span class="invalid-feedback"><?php echo $slot_err; ?></span>
                <input type="hidden">
            </div>  <br>

            <div class="form-group">
                <label>Email ID</label>
                <input type="email" name="email_id" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>  
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submitbtn" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>