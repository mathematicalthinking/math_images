<?php

function getImages($dirName="."){
  $pattern = "(\.jpg$)|(\.jpeg$)|(\.png$)|(\.tif)|(\.gif$)"; //valid img exts
  if($handle = opendir($dirName)){
    while(false !== ($file = readdir($handle))){
      if(eregi($pattern,$file)){
	echo($file."<br>");
      }
    }
    closedir($handle)
  }
}

getImages();

?>