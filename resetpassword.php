<?php
include 'config.php';
include 'error.php';

if (isset($_POST['reset'])) {
$username =mysqli_real_escape_string($conn,$_POST['username']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password =mysqli_real_escape_string($conn,$_POST['newpassword']);
$confirmPassword =mysqli_real_escape_string($conn,$_POST['confirmpassword']);

if ($password === $confirmPassword) {
  $searchUser="SELECT * FROM `users` where username = '".$username."' and email_id='".$email."';";
  // echo $searchUser;
   $result = $conn->query($searchUser);
   if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
  $dbusername = $row['username'];
  $dbemail =$row['email_id'];
}
// echo $dbusername;
// echo $dbemail;
if($dbusername == $username && $dbemail == $email){
  $update = "UPDATE `users` SET `password`='".$password."' WHERE username='".$username."' and email_id='".$email."'";
  if($conn->query($update) === TRUE){
    ?><script type="text/javascript" charset="utf-8">
     alert("Updated Successfully Login using new Password");
     window.location.replace('login.php');
     </script>
     <?php
  }
}
   }
   ?><script type="text/javascript" charset="utf-8">
    alert("CHeck the Username or Email Once");
    window.location.replace('forgot.php');
    </script>
    <?php
}else {
  ?><script type="text/javascript" charset="utf-8">
   alert("Password and Confirm Password are not Equal!");
   window.location.replace('forgot.php');
   </script>
   <?php
}
}else{
  ?><script type="text/javascript" charset="utf-8">
   window.location.replace('forgot.php');
   </script>
   <?php
}
 ?>
