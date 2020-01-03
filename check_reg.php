<?php $pageTitle = "Check Registration Details"; ?>

<?php require_once("inc/db.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php require_once("inc/sessions.php"); ?>

<?php 

if (isset($_POST["checkRegButton"])) {
  $checkUniquePin = $_POST["checkUniquePin"];
    if (empty($checkUniquePin)) {
        $_SESSION["ErrorMessage"]= "Please Enter Your Unique Pin";
        Redirect_to("check_reg.php");
    }else {
        // code for checking Booking ID from Database
    
        $DataRows = Check_Unique_Pin($checkUniquePin);
        if ($DataRows) {

            $_SESSION["username"]         = $DataRows["username"];
            $_SESSION["phoneNumber"]      = $DataRows["phoneNumber"];
            $_SESSION["email"]   		  = $DataRows["email"];
            $_SESSION["uPin"]   		  = $DataRows["uPin"];
          
            Redirect_to("check_reg_results.php");

        }else {
        $_SESSION["ErrorMessage"]="Invalid Pin";
        Redirect_to("check_reg.php");
        }
    }   
}
?>


<!-- Header Start -->
<?php include("inc/header.php"); ?>
<!-- Header End -->

	<div class="main-wrlapper">
		<div class="container">
		  <form action="check_reg.php" method="POST">
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
		      	<p>Enter Your Unique Pin</p>
		        <input type="text" id="" name="checkUniquePin" placeholder="Your Unique Pin..">
		      </div>
		    </div>
		    <div class="row">
		    	<div class="col-25">
		      	</div>
		      	<input name="checkRegButton" type="submit" value="Submit">
		    </div>
		  </form>
		  	<div class="row">
	    	<div class="col-25">
	      	</div>
	      	<p><a href="index.php"><span> << </span>Go Back</a></p>
	    </div>
		</div>
	</div>

</body>
</html>