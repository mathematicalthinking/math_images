<?php
function getAllImages($dirName="/var/www/html/mathimages/images/Field"){
  $uploadPath = "/var/www/html/mathimages/imgUpload";
#  echo("FUNCTION CALLED");
  if($handle = opendir($dirName)){
#    echo("Opened Directory: ".$dirName."<br>");
    while(false !== ($directory = readdir($handle))){
      if(is_dir($dirName."/".$directory) && $directory!="." && $directory!=".." && $directory!="thumb"){
#	echo("*Directory found: ".$directory."<br>  Going to get images");
	copyImages($directory,$dirName,$uploadPath);
      }else{
#	echo("Something found: ".$directory);
      }
    }
#    echo("DONE?");
    closedir($handle);
  }
}

function copyImages($dirName,$startLocation,$destFolder){
#  echo("OTHER FUNCTION CALLED...");
  $originalPath = $startLocation."/".$dirName."/";
#  echo("Original Path: ".$originalPath);
  $pattern = "(\.jpg$)|(\.jpeg$)|(\.png$)|(\.tif$)|(\.gif$)";
  if($dirHandle = opendir($originalPath)){
#    echo("**Opened directory ".$originalPath."<br>");
    while(false !== ($file = readdir($dirHandle))){
#      echo("FILE:    ".$file."<br>");
      if(is_dir($originalPath.$file) && $file == "thumb"){
	thumbprocess($file,"/var/www/html/mathimages/images/Field/".$dirName);
      }else if($file!="." && $file!=".." && eregi($pattern,$file)){
#	echo("****Found valid image: ".$file."<br>");
	$startPath = $originalPath.$file;
	$endPath = $destFolder."/".$file;
#	echo("*********Attempting to copy from: ".$startPath."<br>");
#	echo("*********to the location: ".$endPath."<br>");
	error_log("attempting to copy from $startPath to $endPath");
	if(copy($startPath,$endPath)){
#	  echo("******SUCCESSFULLY copied: ".$file."<br>");
	}else{
	  echo("******FAILURE!! On file: ".$originalPath.$file."<br>");
	}
      }
    }
#    echo("FINISHED Looking through!");
    closedir($dirHandle);
  }
}

function thumbprocess($folder,$origin){
#  echo("THUMBPROCESSING**********<br>");
  $pattern = "(\.jpg$)|(\.jpeg$)|(\.gif$)|(\.png$)|(\.tif$)";
  $endPath = "/var/www/html/mathimages/imgUpload/thumb";
  $startPath = $origin."/".$folder;
  if($handle = opendir($startPath)){
#    echo("OPENed: ".$startPath."<br>");
    while(false !== ($file = readdir($handle))){
      $startLocation = $startPath."/".$file;
#      echo("Start Location ************ ".$startLocation."<br>");
      $endLocation = $endPath."/".$file;
      if(is_dir($startLocation) && $file!= "." && $file!=".." && !(is_dir($endLocation))){
	mkdir($endLocation);
#	echo("DIRECTORY --- ".$endLocation." --- Made (maybe)<br>");
	thumbprocess($file,$startPath);
      }else if(is_dir($startLocation) && $file!='.' && $file!='..'){
	thumbprocess($file,$startPath);
      }else if($file!="." && $file!=".." && eregi($pattern,$file)){
	if(copy($startLocation,$endLocation)){
#	  echo("Thumnail ".$file." copied <br> to ".$endLocation);
	}else{
#	  echo("Failure on FILE: ".$file."<br>");
	}
      }
    }
    closedir($handle);
  }
}

getAllImages();

?>
