<?php

define("HOST","localhost");
define("USER","root");
define("PASS","");
define("DB","cems");
error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign-up</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="Signup.css">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

</head>
<body>
    <br>
    <h2>WELCOME TO CEMS</h2>
    <section id="Landing">
        <div class="row" style="margin-right:0;margin-left:0;">

            <div class="col-md-5 landing-intro">

                <img src="images/pablita-success.png" alt="" srcset="">

            </div>

            <div class="col-md-6 register-right login">

                <form id="register_form" name="register_form" method="post">
                  <div class="tab-content" id="myTabContent">
                        <h3 class="register-heading">REGISTER HERE</h3><hr>
                  <div class="row register-form">
                      <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="student_prn" placeholder="Enter your PRN *" required>
                            <small id="pr_error"></small>
                        </div>
                          <div class="form-group">
                            <input type="text" class="form-control" name="student_fname"placeholder="Enter your first name *" value="" required>
                            <small id="f_error"></small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="student_lname" placeholder="Enter your last name *" value="" required>
                            <small id="l_error"></small>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="e_mail" name="e_mail" placeholder="Your Email" value="" required>
                            <small id="e_error"></small>
                        </div>
                      </div>
                      <div class="col-md-6">

                          <div class="form-group">
                              <input type="text" minlength="10" maxlength="10" name="phone_number" class="form-control" placeholder="Your Phone *" required>
                              <small id="ph_error"></small>
                          </div>

                          <div class="form-group">
                              <input type="password" class="form-control" name="student_password" placeholder="Password *" value="" required>
                              <small id="pass_error"></small>                          
                            </div>

                          <div class="form-group">
                            <input list="Branch" type="text" class="form-control" name="branch" placeholder="Select your Branch *" required>
                                <datalist id="Branch">
                                 <option value="IT">
                                 <option value="COMPUTER">
                                 <option value="EXTC">
                                 <option value="MECH">
                                 <option value="PPT">
                              </datalist>
                              <small id="branch_error"></small>
                          </div>

                          <div class="form-group">
                            <input list="Year" type="text" class="form-control" name="year" placeholder="Select your Year *" required>
                                <datalist id="Year">
                                 <option value="FE">
                                 <option value="SE">
                                 <option value="TE">
                                 <option value="BE">
                              </datalist>
                              <small id="year_error"></small>
                          </div>

                          <input type="submit" value="Register" name="submit" class="btnRegister btn-primary">


                      </div>
                  </div>

                  
              </div>
                </form>
               
               <?php
        
                if(isset($_POST['submit'])){
                    $student_prn = $_POST['student_prn'];
                    $e_mail =  $_POST['e_mail'];
                    $conn = new mysqli(HOST,USER,PASS,DB);
                    $sql = $conn->prepare("Select student_prn,e_mail from student_table where student_prn = ? and e_mail = ?");
                    $sql->bind_param("ss",$student_prn,$e_mail); 
                    $sql->execute() or die($conn->error);
                    $result = $sql->get_result();
                    if($result->num_rows > 0){
                            ?>
                            <script>
                                alert("You have already registered!!");

                            </script>
                            <?php
                    }else{                         
					$student_fname =  $_POST['student_fname'];
                    $student_lname =  $_POST['student_lname'];
					$branch =  $_POST['branch'];
					$year=  $_POST['year'];
					$phone_number =  $_POST['phone_number'];
                    
					$pre_stmt = $conn->prepare("INSERT INTO `student_table`(`student_prn`,`first_name`,`last_name`,`branch`,`year`,`phone_number`,`e_mail`) 
					VALUES(?,?,?,?,?,?,?)");
                    $pre_stmt->bind_param("sssssis",$student_prn,$student_fname,$student_lname,$branch,$year,$phone_number,$e_mail);
					$result = $pre_stmt->execute() or die ($conn->error);			
					if($result > 0){
						?>
						<script>
							alert("Data inserted sucessfully");
                            window.location = "index.html";
						</script>
						<?php
						}else{
						?>
						<script>
							alert("Data not inserted sucessfully");
                        </script>
                        <?php
                          }
                
                    }
                    $student_password = $_POST['student_password'];
					
                    $pre_stmt = $conn->prepare("INSERT INTO `student_login`(`student_prn`,`student_password`) VALUES(?,?)");
                    $pre_stmt->bind_param("ss",$student_prn,$student_password);
					$result1 = $pre_stmt->execute() or die ($conn->error);			
					if($result1 > 0){
						?>
						<script>
							alert("Data inserted sucessfully");
						</script>
						<?php
                        }else{
						?>
						<script>
							alert("Data not inserted sucessfully");
                        </script>
                        <?php
                        }
                    }
                
                    ?>

            </div>

        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
</body>
</html>








