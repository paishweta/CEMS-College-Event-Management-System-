<?php
session_start();
include("db_config.php");
error_reporting(0);
    $username = $_SESSION["username"];
//    print_r($username);
    
?>

<!DOCTYPE html>
<html lang="en">
   
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEMS SIESGST</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Google Fonts Link -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="studentpage.css">
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
                <button class="btn btn-light my-2 my-sm-0" type="submit"><a class="links"  href="#">HOME<span class="sr-only">(current)</span></a></button>
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
                <button class="btn btn-light my-2 my-sm-0 custom-class" type="submit"><a href="myaccount.php">My Account</a></button>
                <button class="btn btn-light my-2 my-sm-0" type="submit"><a class = "links" href="logout.php">Logout</a></button>
            </form>
        </div>
    </nav>
	
	</br>
	
    <table>
        <thead>
            <tr>
                <th>S. No.</th>
                <th>Event ID</th>
                <th>Event Name</th>
                <th>Type/Organiser</th>
                <th>Date</th>
                <th>Contact</th>
                <th>Details</th>
                <th>End Time</th>
                <th>Amount Paid</th>
                <th>ACTIVE?</th>
            </tr>
        </thead>
		<tbody>
			<?php
                $conn = new mysqli(HOST,USER,PASS,DB);
                $sql = $conn->prepare("Select Sr_no,et.event_id,et.event_name,et.Type,et.venue,et.event_date,et.contact,et.email,et.duration, et.endtime, et.charge,rt.money_given,et.activity,et.poster from event_table et INNER JOIN register_table rt ON et.event_id=rt.event_id and rt.student_prn = ?");
                $sql->bind_param("s",$username); 
                $sql->execute() or die($conn->error);
                $result = $sql->get_result();
		        if($result->num_rows > 0){
					while($row = $result-> fetch_assoc()){
				    	echo "<tr> <td>".$row['Sr_no']."</td> <td>".$row['event_id']."</td> <td>".$row['event_name']."</td> <td>".$row['Type']."</td> <td>".$row['event_date']."</td> <td>".$row['contact']."</td> <td>".$row['charge']."</td> <td>".$row['endtime']. "</td> <td>" .$row['charge']. "</td> <td>" .$row['activity']. "</td> </tr>";
					}
                }else{							
                    ?>
                    <script>
                        alert("Hola Amigos!!");
                   // window.location = "index.html";
                    </script>
                    <?php
				}	
				$conn->close();
			?>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	 
   
	
</body>

</html>