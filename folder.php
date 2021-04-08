<?php
include 'config.php';
include 'error.php';
include 'session.php';
include 'nav.php';

if (isset($_POST['view'])) {
  // echo $_POST['view'];
  // echo $_POST['foldername'];
  $_SESSION['folder_name'] = mysqli_real_escape_string($conn,$_POST['foldername']);
      // echo $_SESSION['folder_name'];
}else{
  if (!empty($_SESSION['folder_name'])) {
    // echo $_SESSION['folder_name'];
  }else {
    ?><script type="text/javascript" charset="utf-8">
     window.location.replace('home.php');
     </script>
     <?php
  }
}
$user = $_SESSION['folder_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
       <script src="https://cdn.tiny.cloud/1/u5pxigthlaz73eb0hpt89t9lb57oe9f2kgsk4lub57k8r37b/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
           <meta name="viewport" content="width=device-width,initial-scale=1">
       <link rel="stylesheet"
         href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
         integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
         crossorigin="anonymous">
      <script type = "text/javascript" src="assets/ckeditor.js"></script>
       <link rel="stylesheet" type="text/css" href="assets/css/my-login.css">
       <link rel="stylesheet" type="text/css" href="assets/css/home.css">
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
           <title> <?php echo   $user; ?></title>
	<script src="assets/js/sample.js"></script>
	<link rel="stylesheet" href="assets/css/samples.css">
	<link rel="stylesheet" href="assets/css/neo.css">
	<meta name="viewport" content="width=device-width,initial-scale=1">
  <style>
           div#editor {
               width: 100%;
               margin: auto;
               text-align: left;
           }
       </style>
</head>
<body>
<div class="container">
    <!-- Grid row -->
    <div class="row">
        <!-- Grid column -->
        <div class="col-md-6 col-lg-4" >
            <!-- <button class="btn btn-default clf" >
                QR CODE</button> -->
                <a href="qrcodeDisplay.php" class="btn btn-default clf">QR CODE</a>
        </div>
        <div class="col-md-6 col-lg-4" >
            <button class="btn btn-default clf"  >
                Scanned Info</button>
        </div>
        <div class="col-md-6 col-lg-4" >
            <!-- <button class="btn btn-default clf" >
                Google Sheets</button> -->
                <a href="googlesheet.php?export=true" class="btn btn-default clf" >Google Sheets</a>
        </div>
    </div>
    <div class="row">
        <!-- Grid column -->
        <div class="col-md-6 col-lg-4" >
            <button class="btn btn-default clfa"  onclick="showeditor()" >
                New</button>
                <!-- <a href="editor.php" class="btn btn-default clfa" >New</a> -->
        </div>
        <div class="col-md-6 col-lg-4" >
            <button class="btn btn-default clfa"  >
                Select All</button>
        </div>
        <!--    <div class="col-md-6 col-lg-4" >
               <button class="btn btn-default clf" >
           Google Sheets</button>
          </div>-->
    </div>
    <div class="row" id="collapseOne" style="display:none;width: fit-content;">
        <form method="post" id="qrsubmit" action="QrCodeGenerate.php">
          <textarea name="editor1" id="editor1" rows="10" cols="80">
               </textarea>
            <input type="hidden" name="hiddentext" id="hiddentext" value="">
            <input type="hidden" name="foldername" value=<?php echo $user; ?>
            <br>
            <input name="number" type="tel" class="form-control mb-2 inptFielsd" id="phone"
                   placeholder="Phone Number" pattern="[0-9]{10}" required/>
            <!--<input id="phone" type="tel" name="phone" />-->
            <input type="button" class="btn btn-default clf" onclick="submitForm()" name="qrcreate" value="Create" style="float: right;"/>
        </form>
    </div>
      </div>
</body>
<script>
	initSample();
  CKEDITOR.replace( 'editor1' );
  function showeditor() {
               var x = document.getElementById("collapseOne");
               if (x.style.display === "none") {
                   x.style.display = "block";
               } else {
                   x.style.display = "none";
               }
           }
           function submitForm() {
              // $("#hiddentext").val($("").html());
              var data = CKEDITOR.instances.editor1.getData();
              console.log(data);
              document.getElementById("hiddentext").value=data;
              document.getElementById("qrsubmit").submit();
              // document.getElementById("qrsubmit").submit();
          }
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</html>
