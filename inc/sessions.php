<?php
session_start();

function ErrorMessage(){
  if(isset($_SESSION["ErrorMessage"])){
    $Output = "<div class=\"error-msg\">" ;
    $Output .= htmlentities($_SESSION["ErrorMessage"]);
    $Output .= "</div>";
    $_SESSION["ErrorMessage"] = null;
    return $Output;
  }
}

function ErrorMessageForRg(){
  if(isset($_SESSION["ErrorMessageForRg"])){
    $Output = "<div class=\"error-rg\">" ;
    $Output .= htmlentities($_SESSION["ErrorMessageForRg"]);
    $Output .= "</div>";
    $_SESSION["ErrorMessageForRg"] = null;
    return $Output;
  }
}

function SuccessMessage(){
  if(isset($_SESSION["SuccessMessage"])){
    $Output = "<div class=\"success-msg\">" ;
    $Output .= htmlentities($_SESSION["SuccessMessage"]);
    $Output .= "</div>";
    $_SESSION["SuccessMessage"] = null;
    return $Output;
  }
}

 ?>
