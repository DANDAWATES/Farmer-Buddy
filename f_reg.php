<?php
	session_start();
  if(!isset($_SESSION['admin']))
    {
        
        $_SESSION['msg'] = "Admin not logged in";
        session_destroy();
        header("location: A_login.php");

    }



	$con=new mysqli("localhost","root","","Farmer_Buddy");
	if(!$con)
		echo("Error to connect Database");

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$fname=$_POST['fname'];
		$date=$_POST['date'];
		$mno=$_POST['mno'];
		$area=$_POST['area'];
		$email=$_POST['email'];
        $pass=$_POST['password'];
		$proof=$_POST['proof'];
		$bankname=$_POST['bankname'];
        $acc=$_POST['accno'];
        $ifsc=$_POST['ifsc'];

		// create table tbl_farmer(fcode int primary key,fname text,Date date,
//        mno bigint,email text,password text,area text,proof text,bankname text,accno bigint,ifsccode text);

		$q1="select * from tbl_farmer";
		$result=$con->query($q1);
		$fid=mysqli_num_rows($result);
		$fcode=$fid + 1;
		$sql = "INSERT INTO tbl_farmer VALUES ('$fcode','$fname','$date','$mno','$email','$pass','$area','$proof','$bankname','$acc','$ifsc')";
		$res=$con->query($sql) or die("Qurey Error");
		if($res)
			{	
				//$to_email = '$email';
				$subject="For Login details";
                $body="hi $fname,Your Farmer Buddy(Krushimitra) Application code is '$fcode' and  Your password id '$pass' . Please do not share code and password to anyone..";
                $sender_mail="From: shrikrishnadandawate01@gmail.com";
    
                if(mail($email,$subject,$body,$sender_mail))
                {
                  
                    header('location: F_login.php');
                }
                else
                {
                    echo"Email sending failed";
                }
			echo "<script> alert('record added successfully') </script>";
            }
		mysqli_close($con);
	}



?>


<!DOCTYPE html>
<html>
    <head>
        <title>Farmer Buddy</title>
        <link rel= "Shortout icon" type="image" href='farm1.png' />
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

<style>
.container
{
  width:500px;
  
}
.submit1
{
  /* margin-left:50%; */
  margin-right:50%;
  text-align:right;
}
b{
  margin-right:50px;
}

</style>

  <style>
     h2{
      text-align: center;
			}
  </style>

  <style>

body {
     /* background: url('https://static-communitytable.parade.com/wp-content/uploads/2014/03/rethink-target-heart-rate-number-ftr.jpg') fixed; */
    background-size: cover;
}
    *[role="form"] {
    max-width: 530px;
    padding: 15px;
    margin: 0 auto;
    border-radius: 0.3em;
    background-color: #f2f2f2;
}

*[role="form"] h2 { 
    font-family: 'Open Sans' , sans-serif;
    font-size: 40px;
    font-weight: 600;
    color: #000000;
    margin-top: 5%;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 4px;
}


    </style>
    </head>
    <body>
        <header>
  
      <nav class="navbar navbar-expand-lg navbar-light text-white" >
        <a class="navbar-brand h1">FARMER BUDDY</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav"  class="collapse navbar-collapse">
--------------------------------------------------------------------------------------------------------          <ul class="navbar-nav ml-auto ">
            <li class="nav-item active">
              <a class="nav-link text-white" href="admin_edit.php">HOME </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="about.php">ABOUT US</a>
            </li>
          </ul>
        </div>
      </nav>
           </header>
           <!-- create table tbl_farmer(fcode int primary key,fname text,Date date,
           mno bigint,area text,advance int,proof text,bank_detials text); -->

           <br>
           <div class="container">
           <form  method="post" class="form-horizontal" role="form">
            <h2>Farmer registration...</h2>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Farmer_Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="firstName" placeholder="farmer name" name="fname" class="form-control" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email* </label>
                    <div class="col-sm-9">
                        <input type="email" id="email" placeholder="email" class="form-control" name= "email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password*</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" placeholder="Password" name="password" required class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthDate" class="col-sm-3 control-label">Date*</label>
                    <div class="col-sm-9">
                        <input type="date" id="Date"  name="date" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneNumber" class="col-sm-3 control-label">Phone_number </label>
                    <div class="col-sm-9">
                        <input type="phoneNumber" id="phoneNumber" placeholder="Phone Number" name="mno" class="form-control" required>
                        <span class="help-block">Your phone number won't be disclosed anywhere </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                        <input type="text" id="firstName" placeholder="Enter address" name="area" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label" >Proof_Type</label>
                    <div class="col-sm-9">
                        
                        <select name="proof" id="type"  class="form-control" autofocus>
                          <option value=""disabled selected>--select--</option>
                          <option value="Voter ID">Voter ID</option>
                          <option value="Adhar Card">Adhar card</option>
                          <option value="Pan Card ">Pan Card</option>
                      </select>
                    </div>
                </div>
            
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Bank_name</label>
                    <div class="col-sm-9">
                        <input type="text" id="firstName" placeholder="Enter Bank name" name="bankname" required class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Account_no.</label>
                    <div class="col-sm-9">
                        <input type="text" id="firstName"placeholder="Enter accounr number" name="accno" required class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">IFSC_code</label>
                    <div class="col-sm-9">
                        <input type="text" id="firstName" placeholder="Enter IFSC code" name="ifsc" required class="form-control" autofocus>
                    </div>
                </div>
            
                <div style="padding-left: 120px;"> 
                         <button class="btn btn-primary" value="click here" name="b1" type="Submit">Submit</button>
                         <button class="btn btn-primary" value="click here" name="b1" type="reset">Reset</button>          
              	</div>

           </form>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    </body>
</html>
    
             


             


            
            
