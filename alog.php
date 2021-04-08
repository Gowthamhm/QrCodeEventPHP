<?php
session_start();
include 'config.php';
include 'error.php';

if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($conn,$_POST['username']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);
     $searchUser = "SELECT * FROM `USERS` WHERE username = '".$username."' and password ='".$password."'";
     // echo $searchUser;
     $result = $conn->query($searchUser);
     // echo $result;
     // if ($result) {
     if ($result->num_rows > 0) {
       // echo "inside if result";
       while($row = $result->fetch_assoc()) {
    $dbusername = $row['username'];
    $dbpassword = $row['password'];
  }
   if($username==$dbusername && $password == $dbpassword){
     $_SESSION['active_user'] = $dbusername;
     ?><script type="text/javascript" charset="utf-8">
      alert("Login Successfully ");
      window.location.replace('home.php');
      </script>
      <?php
   }else{
      ?>
      <script type="text/javascript" charset="utf-8">
       alert("Check The Username And Password ");
       // window.location.replace('home.php');
       </script>
       <?php
   }
     }else{
        ?><script type="text/javascript" charset="utf-8">
  alert("Please Contact Admin to Register ");
// window.location.replace("login.php");
      </script>
      <?php
     }
}
else{
   ?>
<script type='text/javascript' charset='utf-8'>
// window.location.replace('login.php');
</script>
<<?php
}

 ?>
