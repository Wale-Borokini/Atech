<?php 
function uPin($length){
	$token = "AI";
	$codeAlphabet = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";
	
	$max = strlen($codeAlphabet);

		for ($i=0; $i < $length; $i++)
	{
			$token .= $codeAlphabet [random_int(0, $max-1)];
		}

		return $token;

}




function Redirect_to($New_Location){
  header("Location:".$New_Location);
  exit;
}


function Confirm_Unique_Pin(){
if (isset($_SESSION["uPin"])) {
  return true;
}  else {
  $_SESSION["ErrorMessage"]="Please Enter Your Unique Pin !";
  Redirect_to("check_reg.php");
}
}


function Check_Unique_Pin($checkUniquePin){
  global $ConnectingDB;
  $sql = "SELECT * FROM users WHERE uPin = '$checkUniquePin' LIMIT 1";
  $stmt = $ConnectingDB->prepare($sql);
  $stmt->bindValue(':checkUniquePin',$checkUniquePin);
  $stmt->execute();
  $Result = $stmt->rowcount();
  if ($Result==1) {
    return $DataRows=$stmt->fetch();
  }else {
    return null;
  }

}


function CheckUserNameExistsOrNot($username){
  global $ConnectingDB;
  $sql    = "SELECT username FROM users WHERE username=:userName";
  $stmt   = $ConnectingDB->prepare($sql);
  $stmt->bindValue(':userName',$username);
  $stmt->execute();
  $Result = $stmt->rowcount();
  if ($Result==1) {
    return true;
  }else {
    return false;
  }
}