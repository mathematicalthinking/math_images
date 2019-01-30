<?php

function getDirs($dirName="."){
  if($handle = opendir($dirName)){
    while(false !== ($file = readdir($handle))){
      if (is_dir($file) && $file!="." && $file!=".."){
	echo($file."<br>");
      }
    }
  }
}

getDirs();

?>
