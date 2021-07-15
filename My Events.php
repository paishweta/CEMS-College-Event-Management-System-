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
  <title>My Events</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/first.css">
 
  <script src="https://kit.fontawesome.com/e288ab49f9.js" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</head>
<body>

  <div class="topnav">
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
                <button class="btn btn-light my-2 my-sm-0 custom-class" type="submit"><a href="myaccount.php">My Account</a></button>
                <button class="btn btn-light my-2 my-sm-0" type="submit"><a class = "links" href="logout.php">Logout</a></button>
            </form>

          
          
        </div>
    </nav>
</div>

<div class="welcome">
  <h1>Events managed</h1>
  <p>Click on any event to view registrations and more detail</p>
</div>

<form class="form-event-id-selection" method="post" action="event.php">
  <label>Is selected event_name correct?</label>
  <input  class="form-control event-selection-field" type="text" name="e_id" id="e_id" readonly>
  <br>
  <input  class="form-control event-selection-field" type="text" name="e_name" id="e_name" readonly>
  <br>
  <input type="submit" name="submit" value="Submit">
  <hr/>
</form>                   

  <table id="table">
    <thead>
        <tr>
            <th>S. No.</th>
            <th>Event ID</th>
            <th>Event Name</th>
            <th>Type/Organiser</th>
            <th>Date</th>
            <th>Contact</th>
            <th>Duration</th>
            <th>End Time</th>
            <th>Charge</th>
            <th>ACTIVE?</th>
        </tr>
    </thead>
  <tbody>
        <?php
        
                $conn = new mysqli(HOST,USER,PASS,DB);
                  $sql = "SELECT Sr_no,event_id,event_name,Type,event_date,contact,duration,endtime,charge,activity from event_table where created_by = '$username' "; 
                  $result = $conn->query($sql);                    
                    if($result > 0){
                      while($row = $result-> fetch_assoc()){
                        echo "<tr> <td>".$row['Sr_no']."</td> <td>".$row['event_id']."</td> <td>".$row['event_name']."</td> <td>".$row['Type']."</td> <td>".$row['event_date']."</td> <td>".$row['contact']."</td> <td>".$row['duration']."</td> <td>".$row['endtime']. "</td> <td>" .$row['charge']. "</td> <td>".$row['activity']. "</td> </tr>";
                      }
                    }else{							
                      echo "Error!!";
                    }
                  
                $conn-> close();
            
        ?>

  </tbody>
</table>

      <script>
        var table = document.getElementById('table'),rInex;
        for(var i = 0;i < table.rows.length;i++){
          table.rows[i].onclick = function(){
            rIndex = this.rowindex;
            document.getElementById("e_name").value = this.cells[2].innerHTML;
            document.getElementById("e_id").value = this.cells[1].innerHTML;
            session_start();

            $_SESSION["e_name"] = $e_name;
          };
        }
      </script>

</body>
</html>