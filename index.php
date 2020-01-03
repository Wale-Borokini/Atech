<?php $pageTitle = "Registration Page"; ?>
<?php require_once("inc/db.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php require_once("inc/sessions.php"); ?>

 
<?php
if (isset($_POST["Submit"])) {
    if (!empty($_POST["username"])&&!empty($_POST["email"])
        &&!empty($_POST["phoneNumber"]))
        {

        $uPin 					= uPin(8);
        $username       		= $_POST["username"];
        $email        			= $_POST["email"];
        $phoneNumber            = $_POST["phoneNumber"];

        if (CheckUserNameExistsOrNot($username)) {
	    $_SESSION["ErrorMessage"]= "Username Exists. Try Another One! ";
	    Redirect_to("index.php");
		}
        
        // check if Username syntax is valid or not
        if(!preg_match("/^[A-Za-z0-9\.\-\ \'\ ]*$/",$username)){
        $_SESSION["ErrorMessageForRg"]="Invalid Name Format";
        }
        // check if e-mail address syntax is valid or not
        if(!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/",$email))
        {
        $_SESSION["ErrorMessageForRg"]="Invalid Email Format";
        }
        // check if Sender Phonenumber syntax is valid or not
        if(!preg_match("/^[A-Za-z0-9\.\-\ \'\ ]*$/",$phoneNumber)){
        $_SESSION["ErrorMessageForRg"]="Invalid Name Format";
        }

        if((preg_match("/^[A-Za-z0-9\.\-\ \'\ ]*$/",$username)==true)
            &&(preg_match("/^[A-Za-z0-9\.\-\ \'\ ]*$/",$phoneNumber)==true)
            &&(preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/",$email)==true))

        {

        	// $emailTo    = $email;
         //    $subject    = "Registration Details";
         //    $message    = "Username: ".$username."\n"."Unique Pin: ".$uPin;
         //    $headers    = "From: "."AITECHMA";

         //    mail($emailTo, $subject, $message, $headers);

            global $ConnectingDB;
            $sql = "INSERT INTO users(uPin, username, phoneNumber, email)
            VALUES(:uPiN, :usernamE, :phoneNumbeR, :emaiL)";
            $stmt = $ConnectingDB->prepare($sql);
            $stmt->bindValue(':uPiN', $uPin);
            $stmt->bindValue(':usernamE', $username);
            $stmt->bindValue(':phoneNumbeR', $phoneNumber);
            $stmt->bindValue(':emaiL', $email);
            

            $Execute = $stmt->execute();
            if ($Execute) {
                $_SESSION["SuccessMessage"]="Your Registration Was Successful And a Unique Pin Has Been Sent To Your Mail !";
            }
        }
    }else {
            $_SESSION["ErrorMessage"]="Please Fill in All Fields Correctly" ;
        }
}



?>

<!-- Header Start -->
<?php include("inc/header.php"); ?>
<!-- Header End -->

<div class="main-wrlapper">
	<div class="container">
		<div class="row">
	      <div class="col-25"> 
	      </div>
	      <div class="col-75">
	      	<h2>Registration Page</h2>
	      </div>
	    </div>
	  <form action="index.php" method="POST">
	  	<div class="row">
	      <div class="col-25"> 
	      </div>
	      <div class="col-75">
	      	<?php
           echo ErrorMessage();
           echo SuccessMessage();
          ?>
	      </div>
	    </div>
	    <div class="row">
	      <div class="col-25"> 
	      </div>
	      <div class="col-75">
	      	<p>Username</p>
	        <input type="text" id="" name="username" placeholder="Your Username..">
	      </div>
	    </div>
	    <div class="row">
	      <div class="col-25">
	      </div>
	      <div class="col-75">
	      	<p>Email</p>
	        <input type="email" id="" name="email" placeholder="Your Email..">
	      </div>
	    </div>
	    <div class="row">
	      <div class="col-25">
	      </div>
	      <div class="col-75">
	      	<p>Phone Number</p>
	        <input type="text" id="" name="phoneNumber" placeholder="Your Phone Number">
	      </div>
	    </div>
	    <div class="row">
	    	<div class="col-25">
	      	</div>
	      	<input name="Submit" type="submit" value="Submit">
	    </div>
	  </form>
	  	<div class="row">
	    	<div class="col-25">
	      	</div>
	      	<p><a href="check_reg.php">Check Registration Details</a></p>
	    </div>
	</div>
</div>

</body>
</html>