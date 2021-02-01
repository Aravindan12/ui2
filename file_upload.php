<?php

if (isset($_POST['submit'])){

    $open=array("jpg"=>"image/jpeg","pdf"=>"application/pdf","docx"=>"application/vnd.openxmlformats-officedocument.wordprocessingml.document","php"=>"application/octet-stream","mp3"=>"audio/mpeg");
    $name=$_FILES["fileupload"]["name"];
    $type=$_FILES["fileupload"]["type"];
    // echo $type;
    $ext=pathinfo($name,PATHINFO_EXTENSION);
    // echo $ext;

    if(!array_key_exists($ext,$open)) die("The File Format is not valid");

    if(in_array($type,$open))
    {
       if(file_exists("files/". $_FILES["fileupload"]["name"]))
       {
         echo "The File was Already Exists";
       }

       else
       {
           move_uploaded_file($_FILES["fileupload"]["tmp_name"],"files/" . $_FILES["fileupload"]["name"]);
       }
    }

    else
    {
        echo "The File was not Uploaded";
    }
}
?>
