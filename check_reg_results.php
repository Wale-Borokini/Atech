<?php $pageTitle = "Registration Details"; ?>

<?php require_once("inc/db.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php require_once("inc/sessions.php"); ?>

<?php Confirm_Unique_Pin() ?>


<!-- Header Start -->
<?php include("inc/header.php"); ?>
<!-- Header End -->

	<div class="main-wrlapper">
		<div class="container">
		  	<div class="row">
		      <div class="col-25"> 
		      </div>
		      <div class="col-75">
		      	<h2>Registration Details</h2>
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-25"> 
		      </div>
		      <div class="col-75">
		      	<p><b>Username</b></p>
		        <p><?php echo $_SESSION["username"] ?></p>
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-25"> 
		      </div>
		      <div class="col-75">
		      	<p><b>Email</b></p>
		        <p><?php echo $_SESSION["email"] ?></p>
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-25"> 
		      </div>
		      <div class="col-75">
		      	<p><b>Phone Number</b></p>
		        <p><?php echo $_SESSION["phoneNumber"] ?></p>
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-25"> 
		      </div>
		      <div class="col-75">
		      	<p><b>Unique Pin</b></p>
		        <p><?php echo $_SESSION["uPin"] ?></p>
		      </div>
		    </div>
		    <div class="row">
	    	<div class="col-25">
	      	</div>
	      	<p><a href="check_reg.php"> <span> << </span>Go Back</a></p>
	    </div>
		</div>
	</div>

</body>
</html>