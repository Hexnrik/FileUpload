<?php
include_once 'database.php';
if(isset($_POST['upload']))
{

 $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="upload/";

 /* new file size in KB */
 $new_size = $file_size/1024;
 /* new file size in KB */

 /* make file name in lower case */
 $new_file_name = strtolower($file);
 /* make file name in lower case */

 $final_file=str_replace(' ','-',$new_file_name);

 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql="INSERT INTO image(file,type,size) VALUES('$final_file','$file_type','$new_size')";
  mysqli_query($conn,$sql);


  echo "Succes!";


 }
 else
 {

  echo "Error.Melde Dich Im Support.";

		}
	}
?>
<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Upload Status!</title>
  </head>
  <body>
    <h1>Deine Datei wurde hochgeladen und ist nun auf unserem FTP Server gesichert, um deine Datei abzurufen schreibe mit dem Support.</h1>
  </body>
</html>
