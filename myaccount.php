<?php
session_start();
include("db_config.php");
error_reporting(0);
    $username = $_SESSION["username"];
    $pwd = $_SESSION["pwd"];
//    print_r($username);
    
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEMS SIESGST</title>

    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Google Fonts Link -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="CreateEvent.css">

</head>


<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <a class="navbar-brand" href="student.php"><img src="images\logo.PNG" alt="CEMS" srcset="" class="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <button class="btn btn-light my-2 my-sm-0 custom-class"  type="submit"><a class="links"  href="student.php">HOME<span class="sr-only">(current)</span></a></button>
                </li>
                <li class="nav-item">
                <button class="btn btn-light my-2 my-sm-0 custom-class" type="submit"><a class = "links" href="My Events.php">Events Organised</a></button>
                </li>
                <li class="nav-item">
                <button class="btn btn-light my-2 my-sm-0 custom-class" type="submit"><a class = "links" href="Explore.php">Explore</a></button>
                </li>
                <li class="nav-item">
                    <button type="button"  class="btn btn-outline-light custom-class"> <a class="create-event-btn" style="color:white;" href="CreateEvent.php">+ Create
                            Events</a></button>
                </li>
               
                

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <button class="btn btn-light my-2 my-sm-0" style="margin-right:20px; " type="submit"><a style="color:black;" href="myaccount.php">My Account</a></button>
                <button class="btn btn-light my-2 my-sm-0" type="submit"><a class = "links" href="logout.php">Logout</a></button>
            </form>

          
          
        </div>
    </nav>

    <center>
        <div class="event-registration-form">

        <?php
        $conn = new mysqli(HOST,USER,PASS,DB);
                    $sql = $conn->prepare("Select * from student_table st INNER JOIN student_login sl ON sl.student_prn = st.student_prn where st.student_prn = '$username' and sl.student_password='$pwd'");
                    $sql->bind_param("ssssssss",$username,$first_name,$last_name,$branch,$year,$phone_number,$e_mail,$pwd); 
                    $sql->execute() or die($conn->error);
                    $result = $sql->get_result();
                    if($result->num_rows > 0){
                        while($row = $result-> fetch_assoc()){
                            ?>
                                <form id="" action="" method="post">
                <div class="form-group">
                    <label for="">PRN</label>
                    <input class="form-control" type="text" name="student_prn" id="student_prn" value="<?php echo $_SESSION['username']; ?>" required aria-required="true" readonly>
                    <br>
                    <label for="">First Name</label>
                    <input class="form-control" type="text" pattern="[a-zA-Z]*" value="<?php echo $row['first_name']; ?>" name="first_name" id="first_name" required aria-required="true">
                    <br>
                    <label for="">Last Name</label>
                    <input class="form-control" type="text" pattern="[a-zA-Z]*" value="<?php echo $row['last_name']; ?>" name="last_name" id="last_name" required aria-required="true">
                    <br>
                    <div class="col-lg-4">
                    <label class="ddl1">Branch</label>
                    <select id="branch" name="branch" class="ddl-option"  name="Select branch" required aria-required="true">
                        <option><?php echo $row['branch']; ?></option>
                        <option value="CS">CS</option>
                        <option value="IT">IT</option>
                        <option value="Mechanical">Mechanical</option>
                        <option value="EXTC">EXTC</option>
                        <option value="PPT">PPT</option>
                    </select>
                  </div>

                    <br>
                    
                    <div class="col-lg-4">
                        <label for="year" class="ddl1">Year</label>
                    <select id="year" name="year" class="ddl-option"  name="Select year" required aria-required="true">
                        <option ><?php echo $row['year']; ?></option>
                        <option value="FE">FE</option>
                        <option value="SE">SE</option>
                        <option value="TE">TE</option>
                        <option value="BE">BE</option>
                    </select>
                  </div>
                    
                    <br>
                    <label for="">Contact Number</label>
                    <input class="form-control" type="tel" value="<?php echo $row['phone_number']; ?>" id="phone_number" name="phone_number" placeholder=""
                        pattern="[0-9]{10}" >
                    <small>Format: 9876543210</small>
                    <br>
                    <br>
                    <label for="">Email</label>
                    <input class="form-control" type="email" value="<?php echo $row['e_mail']; ?>" name="email" id="email" required aria-required="true">
                    <br>
                    <input type="submit" name="submit" value="Update Profile Details" class="btn btn-primary">
                </div>
            </form>
                    
           <?php                    
                       }
                    }else{
						?>
						<script>
							alert("Data not updated sucessfully");
						</script>
						<?php
                    }
                
                
            ?>

            
            <?php
                if(isset($_POST['submit'])){
                    $student_prn = $_POST['student_prn'];
					$first_name = $_POST['first_name'];
					$last_name =  $_POST['last_name'];
					$branch =  $_POST['branch'];
					$year =  $_POST['year'];
					$phone_number =  $_POST['phone_number'];
					$email = $_POST['email'];
					
					$conn = new Mysqli(HOST,USER,PASS,DB);
					$pre_stmt = $conn->prepare("update student_table set first_name='$first_name',last_name='$last_name',branch='$branch', year='$year',phone_number='$phone_number',e_mail='$email' where student_prn IN(Select student_prn from student_login where student_prn='$username' and student_password='$pwd')");
        			$result = $pre_stmt->execute() or die ($conn->error);			
					if($result > 0){
						?>
						<script>
                            alert("Your account updated sucessfully");
                            window.location = "myaccount.php";
                            //header('Location:myaccount.php');
						</script>
						<?php
						}else{
						?>
						<script>
							alert("Data not updated sucessfully");
						</script>
						<?php
                    }             
                }
                

			?>

        </div>
    </center>


    <!-- Bootstrap Script -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>

</body>

</html>