<?php
  $to="sanikabasare01234@gmail.com";
  $subject="test";
  $msg="hello! 2nd test.";
  $from="From: sanikabasare01234@gmail.com";
  if(mail($to,$subject,$msg,$from)){
  	echo "email sent.";
  }
  else{
  	echo "not sent.";
  }

?>