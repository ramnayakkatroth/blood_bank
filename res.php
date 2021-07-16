<?php
session_start();
$conn= mysqli_connect('localhost', 'root', '','bloodbank_database') or die(mysqli_connect_error());
    if(isset($_REQUEST['submit_hospital_signup']))
    {
     $target_dir = "images/hospital/";
      $target_file = $target_dir . basename($_FILES["h1"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
               
               
               $hospital_email     = $_POST["email"];
               $hospital_name      = $_POST["username"];
               $hospital_contact   = $_POST["mobile"];
               $hospital_address   = $_POST["address"];
               $hospital_password  = $_POST["password"];

                $check = getimagesize($_FILES["h1"]["tmp_name"]);
                if($check !== false) {
                  $uploadOk = 1;
                if (file_exists($target_file)) {
                        echo "Sorry, file already exists.";
                        $uploadOk = 0;
                      }
                      // Check file size
                      if ($_FILES["h1"]["size"] > 500000) {
                        echo "Sorry, your file is too large.";
                        $uploadOk = 0;
                      }
                      // Allow certain file formats
                      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                      && $imageFileType != "gif" ) {
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                      }
                } else {
                  echo "File is not an image.";
                  $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                      if ($uploadOk == 0) {
                        echo "Sorry, your file was not uploaded.";
                      // if everything is ok, try to upload file
                      } else {
                        $Query1=$conn->query("SELECT * FROM hospital WHERE h_email ='$hospital_email'");
                         $rows=mysqli_fetch_array($Query1);
 
                          if(mysqli_num_rows($Query1) ==0)
                           {    
                                      $Query2=$conn->query("INSERT INTO `hospital`(`h_email`, `h_name`,`h_contact`, `h_address`, `h_image`,`hospital_password`) VALUES ('$hospital_email','$hospital_name',$hospital_contact,'$hospital_address','".htmlspecialchars( basename( $_FILES["h1"]["name"]))."','$hospital_password')");
                            
                                      if($Query2)
                                      {    
                                          if (move_uploaded_file($_FILES["h1"]["tmp_name"], $target_file)) {
                                                    echo "<script type='text/javascript'>alert('Successfully Registered!!')</script>";
                                                    header( "refresh:0; url=index.php" );
                                                  } else {
                                                    echo "Sorry, there was an error uploading your file.";
                                                  }

                                        

                                      }
                                      else{
                                        echo "<script type='text/javascript'>alert('Incomplete or Incorrect Form Fields,Please Fill it again!!')</script>";

                                         header("refresh:0,url=Hospital_Signup.php");  
                                      }
                             }
                             else
                             {
                                 echo "<script type='text/javascript'>alert('Email id exists. Kindly login or Enter unique id which has not been used')</script>";
                                 header( "refresh:0; url=Hospital_Signup.php" );
                             }
                       
                      }
               
          
    }
    else if($_REQUEST['submit_reciever_signup']){
      $target_dir = "images/reciever/";
      $target_file = $target_dir . basename($_FILES["r1"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
               
               
               $reciever_email     = $_POST["email"];
               $reciever_name      = $_POST["username"];
               $reciever_contact   = $_POST["mobile"];
               $reciever_address   = $_POST["address"];
               $reciever_password  = $_POST["password"];
               $reciever_group  = $_POST["group"];
               echo $reciever_group.$reciever_email.$reciever_password.$reciever_address.$reciever_contact.$reciever_name;
                $check = getimagesize($_FILES["r1"]["tmp_name"]);
                if($check !== false) {
                  $uploadOk = 1;
                if (file_exists($target_file)) {
                        echo "Sorry, file already exists.";
                        $uploadOk = 0;
                      }
                      // Check file size
                      if ($_FILES["r1"]["size"] > 500000) {
                        echo "Sorry, your file is too large.";
                        $uploadOk = 0;
                      }
                      // Allow certain file formats
                      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                      && $imageFileType != "gif" ) {
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                      }
                } else {
                  echo "File is not an image.";
                  $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                      if ($uploadOk == 0) {
                        echo "Sorry, your file was not uploaded.";
                      // if everything is ok, try to upload file
                      } else {
                        $Query1=$conn->query("SELECT * FROM receiver WHERE r_email ='$reciever_email'");
                         $rows=mysqli_fetch_array($Query1);
 
                          if(mysqli_num_rows($Query1) ==0)
                           {    
                                      $Query2=$conn->query("INSERT INTO `receiver`( `r_email`, `r_name`,r_mobile, `r_address`, `r_blood_type`, `r_photo`, `r_password`) VALUES ('$reciever_email','$reciever_name',$reciever_contact,'$reciever_address','$reciever_group','".htmlspecialchars( basename( $_FILES["r1"]["name"]))."','$reciever_password')");
                                      echo $Query2;
                                      if($Query2)
                                      {    
                                          if (move_uploaded_file($_FILES["r1"]["tmp_name"], $target_file)) {
                                                    echo "<script type='text/javascript'>alert('Successfully Registered!!')</script>";
                                                    header( "refresh:0; url=index.php" );
                                                  } else {
                                                    echo "Sorry, there was an error uploading your file.";
                                                  }

                                        

                                      }
                                      else{
                                        echo "<script type='text/javascript'>alert('Incomplete or Incorrect Form Fields,Please Fill it again!!')</script>";

                                        // header("refresh:0,url=Hospital_Signup.php");  
                                      }
                             }
                             else
                             {
                                 echo "<script type='text/javascript'>alert('Email id exists. Kindly login or Enter unique id which has not been used')</script>";
                                 header( "refresh:0; url=Hospital_Signup.php" );
                             }
                       }

}
else{
  echo "not";
}
?>