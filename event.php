<?php 
session_start();
include("db_config.php");
error_reporting(0);

$e_id = isset($_SESSION["e_id"]) ? $_SESSION["e_id"] : $_POST["e_id"];
$e_name = isset($_SESSION["e_name"]) ? $_SESSION["e_name"] : $_POST["e_name"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Event Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700&display=swap" rel="stylesheet">

<script src="https://kit.fontawesome.com/e288ab49f9.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/second.css">
 
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</head>

<body>
    <div class="topnav"> 
      <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <a class="navbar-brand" href="student.php"><img src="images/logo.PNG" alt="CEMS" srcset="" class="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <button class="btn btn-light my-2 my-sm-0 custom-class" type="submit"><a class="links"  href="student.php">HOME<span class="sr-only">(current)</span></a></button>
                </li>
                <li class="nav-item">
                <button class="btn btn-light my-2 my-sm-0 custom-class" type="submit"><a class = "links" href="My Events.php">Events Organised</a></button>
                </li>
                <li class="nav-item">
                <button class="btn btn-light my-2 my-sm-0 custom-class" type="submit"><a class = "links" href="Explore.php">Explore</a></button>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-outline-light custom-class"> <a style="color:white;" class="create-event-btn" href="CreateEvent.php">+ Create
                            Events</a></button>
                </li>
               
                

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <button class="btn btn-light my-2 my-sm-0 custom-class" type="submit"><a href="myaccount.php">My Account</a></button>
                <button class="btn btn-light my-2 my-sm-0" type="submit"><a class = "links" href="logout.php">Logout</a></button>
            </form>
        </div>
    </nav>
      
                 
      <h1><?php echo $e_name; ?></h1>



      <!---------Collapse Section   ------>

      <div id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="fas fa-plus-circle"></i> Add Participant
              </button>
            </h5>
          </div>
      
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body" style="background-color: #98D8F3;">
              <h4>Enter Student Details</h4>
              <form id="form_login" name="form_login" method="post">
                <div class="row">
                  <div class="col-lg-4">
                    <label for="prn">PRN</label>
                    <input type="text" class="form-control" name="student_prn" id="prn" placeholder="Enter PRN">
                  </div>
                  <div class="col-lg-4">
                    <label for="first-name">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first-name" placeholder="Enter First name">
                  </div>
                  <div class="col-lg-4">
                    <label for="last-name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last-name" placeholder="Enter Last name">
                  </div>
                  <div class="col-lg-4">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" pattern="[1-9]{1}[0-9]{9}" title="Enter 10 digit mobile number" id="phone" placeholder="Mobile number" required>
                  </div>
                  <div class="col-lg-4">
                    <label for="email">E-mail ID</label>
                    <input type="e_mail" class="form-control" name="email" id="email" placeholder="Enter email">
                  </div>
                  <div class="col-lg-4">
                    <label for="branch" class="ddl1">Branch</label>
                   <select id="branch" class="ddl-option" name="branch">
                    <option value="0">--Select--</option>
                    <option value="1">CS</option>
                    <option value="2">IT</option>
                    <option value="3">Mechanical</option>
                    <option value="4">EXTC</option>
                    <option value="5">PPT</option>
                   </select>
                  </div>
                  <div class="col-lg-4">
                    <label for="Year" class="ddl2">Year</label>
                    <select id="Year" class="ddl2-option" name="year">
                        <option value="0">--Select--</option>
                        <option value="1">FE</option>
                        <option value="2">SE</option>
                        <option value="3">TE</option>
                        <option value="4">BE</option>
                    </select>
                  </div>
                
                  <div class="col-lg-4">
                    <input type="hidden" class="form-control" value="<?php echo $e_id ?> " name="e_id" id="e_id" readonly>
                  </div>
                  
                
                <div class="col-lg-4">
                    <input type="hidden" class="form-control" value="<?php echo $e_name; ?>" name="e_name" id="e_name" readonly>
                </div>
                        
                </div>
                <h4>Enter Transaction Details</h4>


                        <label for="Money" class="newgroup">Money Given</label>
                        <input type="number" min="0" name="money_given" class="form-control" id="Money" placeholder="Enter Money-Given" style="width: 25%;">
                    
                   
                        <label for="newgroup" class="newgroup">Is this a new group?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="group_selected" id="exampleRadios1" value="Yes" checked>
                            <label class="form-check-label" for="exampleRadios1">
                              Yes
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="group_selected" id="exampleRadios2" value="No">
                            <label class="form-check-label" for="exampleRadios2">
                              No
                            </label>
                          </div>
                          <div class="row">
                              <div class="col-lg-4 grpid">
                                  <label for="GrpID">Group ID:</label>
                                  <label for="eventID"><?php echo $e_id ?> </label>
                                  <input type="text" id="rand_GrpID" name="group_id"> <br>
                                  <p id="group_selection_message"> (If No, enter existing Group ID)</p>
                              </div>

                          </div>

                          <input type="submit" class="btn btn-success submit" name="insert_submit" onclick="val(); validateEmail(email); ">
              </form>

              <script>
var value = $("input[name='group_selected']:checked").val();
        if(value == 'Yes') {
        var n = Math.random();
        var groupID = Math.floor((n * 1000) + 1);
        $("#rand_GrpID").val(groupID);
        $("#group_selection_message").css({"visibility":"hidden"});
        }
        $('input[type=radio]').click(function(e) {//jQuery works on clicking radio box
        var opt_value = $(this).val(); //Get the clicked checkbox value
        // $('.r-text').html(opt_value);
        if (opt_value == "No") {
          $("#rand_GrpID").val("");
          $("#group_selection_message").css({"visibility":"visible"});
        }
        else {
        var n = Math.random();
        var groupID = Math.floor((n * 1000) + 1);
        $("#rand_GrpID").val(groupID);
        $("#group_selection_message").css({"visibility":"hidden"});
        }
      });
</script>

            </div>
          </div>
        </div>

        <?php
                  
				if(isset($_POST['insert_submit'])){
                    $student_prn = $_POST['student_prn'];
					$money_given =  $_POST['money_given'];
                    $group_id=  $_POST['group_id'];
                    $e_id = $_POST['e_id'];
                    					
					$conn = new Mysqli(HOST,USER,PASS,DB);
					$pre_stmt = $conn->prepare("INSERT INTO `register_table`(`group_id`,`money_given`,`event_id`,`student_prn`) 
                    VALUES(?,?,?,?)");                    
                    $pre_stmt->bind_param("ssss", $group_id, $money_given,$e_id, $student_prn);
					$result = $pre_stmt->execute() or die ($conn->error);			
					if($result > 0){
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


        <!-- UPDATING PARTICIPANT INFO -->
        <div class="card" >
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <i class="fas fa-arrow-up"></i>
                Update Participant Information
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body" style="background-color: #98D8F3;">

            <!-- FORM -->
                <form method="post" name="update_participant_form">
                <div class="col">
                    <label for="prn" class="delete-prn">PRN</label>
                    <input type="text" name='stud_prn' class="form-control delete-text" style="width: 20%;" id="prn" placeholder="Enter PRN">
                </div>
                <div class="col grpid update">
                    <label for="GrpID delete-group">Current Group ID:</label>
                    <label for="eventID"><?php echo $e_id?> </label>
                    <input type="text" id="GrpID" name="g_id"> <br>
                </div>
                  <label for="newgroup" class="newgroup updategroup">Is this a new group?</label>
                        <div class="form-check updategroup">
                            <input class="form-check-input" type="radio" name="update_group_selected" id="exampleRadios1" value="Yes" checked>
                            <label class="form-check-label" for="exampleRadios1">
                              Yes
                            </label>
                          </div>
                          <div class="form-check updategroup">
                            <input class="form-check-input" type="radio" name="update_group_selected" id="exampleRadios2" value="No">
                            <label class="form-check-label" for="exampleRadios2">
                              No
                            </label>
                          </div>
                        <div class="col-lg-4">
                            <input type="hidden" class="form-control" value="<?php echo $e_id ?> " name="e_id" id="e_id" readonly>
                        </div>

                        <div class="col-lg-4">
                            <input type="hidden" class="form-control" value="<?php echo $e_name; ?>" name="e_name" id="e_name" readonly>
                        </div>

                        <div class="col grpid update">
                            <label for="GrpID">Group ID:</label>
                            <label for="eventID"> <?php echo $e_id ?> </label>
                            <input type="text" id="UGrpID" name="new_group_id"> <br>
                            <p id="update_group_selection_message"> (If No, enter existing Group ID)</p>
                        
                        
                </div>
                <label for="Money" class="newgroup Money">Update Money Given</label>
                <input type="number" min="0" class="form-control money-text" name="new_money_given" id="Money" placeholder="Enter Money-Given" style="width: 25%;">
                <input type="submit" class="btn btn-success submit2" name="update_submit" onclick="val(); validateEmail(email); ">
            </form>

            <script>
                  var value = $("input[name='update_group_selected']:checked").val();
                  if(value == 'Yes') {
                  var n = Math.random();
                  var groupID = Math.floor((n * 1000) + 1);
                  $("#UGrpID").val(groupID);
                  $("#update_group_selection_message").css({"visibility":"hidden"});
                  }
                  $('input[type=radio]').click(function(e) {//jQuery works on clicking radio box
                  var opt_value = $(this).val(); //Get the clicked checkbox value
                  // $('.r-text').html(opt_value);
                  if (opt_value == "No") {
                    $("#UGrpID").val("");
                    $("#update_group_selection_message").css({"visibility":"visible"});
                  }
                  else {
                  var n = Math.random();
                  var groupID = Math.floor((n * 1000) + 1);
                  $("#UGrpID").val(groupID);
                  $("#update_group_selection_message").css({"visibility":"hidden"});
                  }
                });
            </script>

            </div>
          </div>
        </div>

        <?php 
        if(isset($_POST['update_submit'])){
          $student_prn = $_POST['stud_prn'];
          $current_group_id = $_POST['g_id'];
          $new_group_id = $_POST['new_group_id'];
          $new_money_given = $_POST['new_money_given'];
          $e_id = $_POST['e_id'];
          
					
					$conn = new Mysqli(HOST,USER,PASS,DB);
                    $pre_stmt = $conn->prepare("Update register_table set group_id = '$new_group_id', money_given = '$new_money_given' where student_prn= '$student_prn' and event_id='$e_id' and group_id='$current_group_id'");
                    $pre_stmt->bind_param("ssss", $group_id, $money_given,$e_id, $student_prn);
					$result = $pre_stmt->execute() or die ($conn->error);			
					if($result > 0){
						?>
						<script>
							alert("Data updated sucessfully");
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

        <!-- DELETION OF PARTICIPANT -->
        <div class="card" >
          <div class="card-header" id="headingThree">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed deletebutton" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <i class="fas fa-trash-alt"></i>
                Delete Participant
              </button>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body" style="background-color: #98D8F3;">
                <form method="post" name="delete_participant_form">
                <div class="col">
                    <label for="prn" class="delete-prn">PRN</label>
                    <input type="text" name='s_prn' class="form-control delete-text" style="width: 20%;" id="prn" placeholder="Enter PRN">
                </div>

                <div class="col-lg-4">
                    <input type="hidden" class="form-control" value="<?php echo $e_id ?> " name="e_id" id="e_id" readonly>
                  </div>
                  
                
                <div class="col-lg-4">
                    <input type="hidden" class="form-control" value="<?php echo $e_name; ?>" name="e_name" id="e_name" readonly>
                </div>

                <div class="col grpid update">
                    <label for="GrpID delete-group">Group ID:</label>
                    <label for="eventID"><?php echo $e_id?> </label>
                    <input type="text" id="GrpID" name="grp_id"> <br>
                </div>
                <input type="submit" class="btn btn-success submit3" name="delete_submit" onclick="val(); validateEmail(email); "></input>
            </form>
            </div>
          </div>
        </div>

        <?php 
        if(isset($_POST['delete_submit'])){
          $student_prn = $_POST['s_prn'];
          $group_id = $_POST['grp_id'];
          $e_id = $_POST['e_id'];
					
					$conn = new Mysqli(HOST,USER,PASS,DB);
					$pre_stmt = $conn->prepare("Delete from register_table where student_prn= '$student_prn' and event_id='$e_id' and group_id='$group_id'");
                    $pre_stmt->bind_param("ssss", $group_id, $money_given,$e_id, $student_prn);
					$result = $pre_stmt->execute() or die ($conn->error);			
					if($result > 0){
						?>
						<script>
							alert("Data deleted sucessfully");
						</script>
						<?php
						}else{
						?>
						<script>
							alert("Data not deleted sucessfully");
                        </script>
                        <?php
                          }
                        }
                    ?>

      </div>

      <table>
        <thead>
            <tr>
                <th>Group ID</th>
                <th>Student PRN</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Branch</th>
                <th>Year</th>
                <th>Money_given</th>
            </tr>
        </thead>
		    <tbody>
        <?php
                $conn = new mysqli(HOST,USER,PASS,DB);
                $sql = $conn->prepare("Select student_table.*, register_table.money_given, register_table.group_id from student_table inner join register_table on student_table.student_prn=register_table.student_prn and '$e_id' = register_table.event_id ORDER BY group_id");
                $sql->bind_param("s",$e_id); 
                $sql->execute() or die($conn->error);
                $result = $sql->get_result();
		        if($result->num_rows > 0){
					while($row = $result-> fetch_assoc()){
				    	echo "<tr><td>".$row['group_id']."</td> <td>".$row['student_prn']."</td> <td>".$row['first_name']."</td> <td>".$row['last_name']."</td> <td>".$row['e_mail']."</td> <td>".$row['branch']."</td> <td>".$row['year']. "</td> <td>" .$row['money_given']. "</td> </tr>";
					}
                }else{							
					echo "<h4> Let's find some participants! </h4>";
				}	
				$conn->close();
			?>
        </tbody> 
    </table>



      <!----Script ---->
      <!-- <script type="text/javascript">
        function val()
        {
            prn = document.getElementById("prn").value;
            firstname = document.getElementById("first-name").value;
            lastname = document.getElementById("last-name").value;
            phone = document.getElementById("phone").value;
            email = document.getElementById("email").value;
            branch = document.getElementById("branch").value;
            year = document.getElementById("Year").value;
            money = document.getElementById("Money").value;
            yes = document.getElementById("exampleRadios1").checked;
            no = document.getElementById("exampleRadios2").checked;
            grpid= document.getElementById("GrpID").value;

                if (prn == "")
                {
                    alert("Please enter your PRN");
                    return false;
                }
                if (firstname == "")
                {
                    alert("Please enter your first-name");
                    return false;
                }
                if (lastname == "") 
                {
                    alert("Please enter your last-name");
                    return false;
                }
                if (phone == "") 
                {
                    alert("Please enter your phone-number");
                    return false;
                }
                if (email == "") 
                {
                    alert("Please enter your email-id");
                    return false;
                }
                if (branch == "") 
                {
                    alert("Please enter your branch");
                    return false;
                }
                if (money == "") 
                {
                    alert("Please enter money");
                    return false;
                }
                if ( !(yes || no ) )
                {
                    alert("Select either of one");
                    return false;
                }
                if (grpid == "") 
                {
                    alert("Please enter your grp-id");
                    return false;
                }
                return true;
         }

         function ValidateEmail(inputText)
         {
             var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
             if(inputText.value.match(mailformat))
             {
                 return true;
             }
             else
             {
                 alert("You have entered an invalid email address!");
                 return false;
             }
         }



    </script> -->

    </body>

    </html>


    <!-- VALUES('".$_POST['group_id']."', '".$_POST['money_given']."','".$_POST['e_id']."', '".$_POST['student_prn']."')"); -->