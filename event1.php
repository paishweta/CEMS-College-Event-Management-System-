<?php 
include("db_config.php");
//error_reporting(0);
$e_id= $_POST['e_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Event Page</title>
  <link rel="stylesheet" href="css/second.css"
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700&display=swap" rel="stylesheet">

<script src="https://kit.fontawesome.com/e288ab49f9.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
 
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</head>

<body>
    <div class="topnav">
        <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="#">
          <img src="images/logo.PNG" alt="logo" >
        </a>
      
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      
        <!-- Links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link home" href="student.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link history" href="#">HISTORY</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-warning btn-lg  download-button btnmyevent" href="My Events.php" role="button">MyEvents</a>
      
          </li>
          <li class="nav-item">
              <a class="btn btn-outline-light btn-lg download-button btncreate" href="CreateEvent.php" role="button">+ CreateEvent</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <button class="btn btn-light my-2 my-sm-0" type="submit" ><a href="myaccount.php">My Account</a></button>
        </form>
      
      </div>
      
      </nav>
      </div>

      <h1><?php echo $_POST['e_name']?></h1>



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
              <form>
                <div class="row">
                  <div class="col-lg-4">
                    <label for="prn">PRN</label>
                    <input type="text" class="form-control" id="prn" placeholder="Enter PRN">
                  </div>
                  <div class="col-lg-4">
                    <label for="first-name">First Name</label>
                    <input type="text" class="form-control" id="first-name" placeholder="Enter First name">
                  </div>
                  <div class="col-lg-4">
                    <label for="last-name">Last Name</label>
                    <input type="text" class="form-control" id="last-name" placeholder="Enter Last name">
                  </div>
                  <div class="col-lg-4">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="mobile" class="form-control" pattern="[1-9]{1}[0-9]{9}" title="Enter 10 digit mobile number" id="phone" placeholder="Mobile number" required>
                  </div>
                  <div class="col-lg-4">
                    <label for="email">E-mail ID</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email">
                  </div>
                  <div class="col-lg-4">
                    <label for="branch" class="ddl1">Branch</label>
                   <select id="branch" class="ddl-option" name="Select branch">
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
                    <select id="Year" class="ddl2-option" name="Select Year">
                        <option value="0">--Select--</option>
                        <option value="1">FE</option>
                        <option value="2">SE</option>
                        <option value="3">TE</option>
                        <option value="4">BE</option>
                    </select>
                  </div>
                </div>
                <h4>Enter Transaction Details</h4>


                        <label for="Money" class="newgroup">Money Given</label>
                        <input type="number" min="0" class="form-control" id="Money" placeholder="Enter Money-Given" style="width: 25%;">
                    
                   
                        <label for="newgroup" class="newgroup">Is this a new group?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                              Yes
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                              No
                            </label>
                          </div>
                          <div class="row">
                              <div class="col-lg-4 grpid">
                                  <label for="GrpID">Group ID:</label>
                                  <label for="eventID">Yak123 - </label>
                                  <input type="text" id="GrpID"> <br>
                                  <small> (If No, enter existing Group ID)</small>
                              </div>

                          </div>

                          <button type="submit" class="btn btn-success submit" name="submit" onclick="val(); validateEmail(email); "><b>Submit</b></button>
              </form>


            </div>
          </div>
        </div>


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
                <form>
                  <label for="newgroup" class="newgroup updategroup">Is this a new group?</label>
                        <div class="form-check updategroup">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                              Yes
                            </label>
                          </div>
                          <div class="form-check updategroup">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                              No
                            </label>
                          </div>
                <div class="col grpid update">
                    <label for="GrpID">Group ID:</label>
                    <label for="eventID">Yak123 - </label>
                    <input type="text" id="GrpID"> <br>
                </div>
                <label for="Money" class="newgroup Money">Update Money Given</label>
                <input type="number" min="0" class="form-control money-text" id="Money" placeholder="Enter Money-Given" style="width: 25%;">
                <button type="submit" class="btn btn-success submit2" name="submit" onclick="val(); validateEmail(email); "><b>Submit</b></button>
            </form>
            </div>
          </div>
        </div>

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
                <form>
                <div class="col">
                    <label for="prn" class="delete-prn">PRN</label>
                    <input type="text" class="form-control delete-text" style="width: 20%;" id="prn" placeholder="Enter PRN">
                </div>
                <div class="col grpid update">
                    <label for="GrpID delete-group">Group ID:</label>
                    <label for="eventID">Yak123 - </label>
                    <input type="text" id="GrpID"> <br>
                </div>
                <button type="submit" class="btn btn-success submit3" name="submit" onclick="val(); validateEmail(email); "><b>Submit</b></button>
            </form>
            </div>
          </div>
        </div>
      </div>

      <table>
        <thead>
            <tr>
                <th>S. No.</th>
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
        <tr>
          <td>1</td>
          <td>1200</td>
          <td>Treasure Hunt</td>
          <td>118A3057</td>
          <td>Srikripa</td>
          <td>sri@gmail.com</td>
          <td>IT</td>
          <td>TE</td>
          <td>20</td>
        </tr>
        </tbody> 
    </table>



      <!----Script ---->
      <script type="text/javascript">
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



    </script>

    </body>

    </html>

