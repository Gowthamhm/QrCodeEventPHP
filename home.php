<?php
include 'session.php';
include 'config.php';
include 'error.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Home</title>
    <!-- Required meta tags -->
    <?php include 'nav.php'; ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
	integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="assets/css/my-login.css">
<link rel="stylesheet" type="text/css" href="assets/css/home.css">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  </head>
  <body>
  <div class="container">
                 <!-- Grid row -->
                 <div class="row">

                     <!-- Grid column -->
                     <div class="col-md-6 col-lg-4" >

                         <button class="btn btn-default clf" data-toggle="collapse" data-target="#collapseOne" onclick="showf()" >
                             <i class="fas fa-folder pr-2" aria-hidden="true"></i>Create Folder</button>

                         <div class="collapse" id="collapseOne" style="display:none;">
                             <!--Panel-->
                             <div class="card card-body ml-1" style="background: none;width: 85%;">
                                 <h4 class="card-title">Create Folder</h4>
                                 <form action="CreateFolder.php" method="post">
                                     <div class="form-group row">
                                         <label for="inputPassword" class="col-sm-10 col-form-label">Folder Name</label>
                                         <div class="col-sm-10">
                                             <input type="text" class="form-control"  name="folder" placeholder="Enter Folder Name" required="true">
                                             <input type="hidden" class="form-control"  name="username" value="<?php echo $_SESSION['active_user']?>">
                                     </div>
                                 </div>
                                 <div class="flex-row">
                                     <input type="submit" class="btn btn-success cre"value="Create" name="create">
                                 </div>
                             </form>
                         </div>
                         <!--/.Panel-->
                     </div>


                 </div>
                 <!-- Grid column -->

             </div>

             <div class="row" style="padding-top: inherit;">

<?php
$sql ="SELECT * FROM `folders`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    ?>                 <div class="col-md-6 col-lg-4" >
    <form method="post" action="folder.php" class="btn btn-default fol" >
        <input type="hidden" name="foldername" value="<?php echo $row['folder_name'];?>">
        <i class="fas fa-folder-open"> <input type="submit" class="btn inp" name="view" value="<?php echo $row['folder_name'];?>"></i>
    </form>
</div>
    <?php
  }
}
?>
             </div>
             <!-- Grid row -->
         </div>
         <script>
             $('#collapseOne').on('shown.bs.collapse', function () {
                 $(".fa").removeClass("fa-folder-o").addClass("fa-folder-open-o");
             });

             $('#collapseOne').on('hidden.bs.collapse', function () {
                 $(".fa").removeClass("fa-folder-open-o").addClass("fa-folder-o");
             });

             function showf() {
                 var x = document.getElementById("collapseOne");
                 if (x.style.display === "none") {
                     x.style.display = "block";
                 } else {
                     x.style.display = "none";
                 }
             }

         </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
