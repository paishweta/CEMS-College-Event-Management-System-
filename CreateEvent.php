<?php 
session_start();
include("db_config.php");
error_reporting(0);
$username = $_SESSION["username"];

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

    <!-- Create Event CSS -->
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
                <button class="btn btn-light my-2 my-sm-0" type="submit"><a class="links"  href="student.php">HOME<span class="sr-only">(current)</span></a></button>
                </li>
                <li class="nav-item">
                <button class="btn btn-light my-2 my-sm-0" type="submit"><a class = "links" href="My Events.php">Events Organised</a></button>
                </li>

                <li class="nav-item">
                <button class="btn btn-light my-2 my-sm-0" type="submit"><a class = "links" href="Explore.php">Explore</a></button>
                </li>

                <li class="nav-item">
                    <button type="button" class="btn btn-outline-light"> <a class="create-event-btn" href="CreateEvent.php">+ Create
                            Events</a></button>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <button class="btn btn-light my-2 my-sm-0" type="submit"> <a href="myaccount.php">My
                        Account</a> </button>
            </form>
        </div>
    </nav>
    <center>
        <div class="event-registration-form">

            <form action="" method="post">
            
                <div class="form-group">
                    <label for="">Event ID</label>
                    <input class="form-control" type="text" name="event_id" id="" required aria-required="true">
                    <br>
                    <label for="">Event Name</label>
                    <input class="form-control" type="text" name="event_name" id="" required aria-required="true">
                    <br>
                    <label for="">Venue</label>
                    <input class="form-control" type="text" name="venue" id="" required aria-required="true">
                    <br>
                    <label for="">Date</label>
                    <input class="form-control" type="date" name="event_date" id="" required aria-required="true">
                    <br>
                    <label for="">Charge of event</label>
                    <input class="form-control" type="number" name="charge" id="" required aria-required="true">
                    <br>
                    <label for="">Contact Number</label>
                    <input class="form-control" type="tel" id="phone" name="contact" placeholder=""
                        pattern="[0-9]{10}" required aria-required="true">
                    <small>Format: 9876543210</small>
                    <br>
                    <br>
                    <label for="">Email</label>
                    <input class="form-control" type="email" name="email" id="" required aria-required="true" >
                    <br>
                    <label for="">Duration of event</label>
                    <input class="form-control" type="time" name="duration" id="" required aria-required="true">
                    <br>
                    <label for="">End Time of event</label>
                    <input class="form-control" type="time" name="endtime" id="" required aria-required="true">
                    <br>
                    <label for="">Members in a Team</label>
                    <input class="form-control" type="number" name="grp_members" id="" required aria-required="true">
                    <br>

                    <label for="exampleFormControlFile1">Poster</label>
                    <input type="file" class="form-control-file" name="poster" id="exampleFormControlFile1" required aria-required="true">
                    <br>

                    
                    <label for="">Event Type/Organiser</label>
                    <input type="Type" class="form-control" name="Type" id="" required aria-required="true">
                    <br>
                   
                    <div class="col-lg-4">
                    <label for="active" class="ddl1">IS YOUR EVENT CURRENTLY ACTIVE?</label>
                    <select id="activity" class="ddl-option" name="activity" required>
                        <option value="">--Select--</option>
                        <option value="ACTIVE">ACTIVE</option>
                        <option value="INACTIVE">INACTIVE</option>
                    </select>
                  </div>		
								
					</select>
                        <br>
                    <!-- <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" value="" id="exampleInputPassword1" required aria-required="true">
                    <br> -->
                    <input type="submit" name="submit"  value="Submit" class="btn btn-primary submit-btn">
                
                </div>
    	
            </form>
            </center>		
			<?php
				
				if(isset($_POST['submit'])){
					$event_id = $_POST['event_id'];
					$event_name =  $_POST['event_name'];
					$venue =  $_POST['venue'];
					$event_date=  $_POST['event_date'];
					$charge =  $_POST['charge'];
					$contact =  $_POST['contact'];
					$email = $_POST['email'];
					$duration =  $_POST['duration'];
					$endtime =  $_POST['endtime'];
                    $grp_members =  $_POST['grp_members'];
					$poster =  $_POST['poster'];
                    $Type =  $_POST['Type'];
                    $activity = $_POST['activity'];
                    //$created_by =  $_POST['created by'];
					
					$conn = new Mysqli(HOST,USER,PASS,DB);
					$pre_stmt = $conn->prepare("INSERT INTO `event_table`(`event_id`,`event_name`,`venue`,`event_date`,`charge`,`contact`,`email`,`duration`,`endtime`,`grp_members`,`poster`,`Type`,`activity`,`created_by`) 
					VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                    $pre_stmt->bind_param("ssssisssssssss",$event_id,$event_name,$venue,$event_date,$charge,$contact,$email,$duration,
                    $endtime,$grp_members,$poster,$Type,$activity,$username);
					$result = $pre_stmt->execute() or die ($conn->error);			
					if($result > 0){
						?>
						<script>
							alert("Event created sucessfully");
						</script>
						<?php
						}else{
                        $result = die($conn->erorr);
                        echo $result;
					}
				}
			?>
			
        </div>
    

    <!-- Bootstrap Script -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous">
	</script>
	
	
	
</body>

</html>


<!--
				$e_id = $_POST["event_id"];
				$e_name =  $_POST["event_name"];
				$e_ven =  $_POST["venue"];
				$ev_date=  $_POST["date"];
				$e_charge =  $_POST["charge"];
				$e_con =  $_POST["contact_no"];
				$e_dur =  $_POST["duration"];
				$e_endtime =  $_POST["endtime"];
				$e_mem =  $_POST["members"];
				$e_post =  $_POST["poster"];
				$e_pass =  $_POST["password"];
				
				INSERT INTO `event_table`(`event_id`, `event_name`, `venue`, `event_date`, `charge`, `contact`, `email`, `duration`, `endtime`, `activity`, `grp_members`, `poster`, `Type`, `password`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)
				$conn = new mysqli(HOST,USER,PASS,DB);
					$sql = "INSERT INTO event_table VALUES('$e_id','$e_name','$e_ven','$ev_date','$e_charge','$e_con','$e_dur','$e_endtime','$e_mem','$e_post','$e_pass')";
					$insert = $conn-> query($sql);
				$conn->close();
					-->