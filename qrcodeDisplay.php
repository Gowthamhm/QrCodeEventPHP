<?php
include 'config.php';
include 'error.php';
include 'session.php';
include 'nav.php';
if (!empty($_SESSION['folder_name'])) {
  // echo $_SESSION['folder_name'];
}else {
  ?><script type="text/javascript" charset="utf-8">
   window.location.replace('home.php');
   </script>
   <?php
}

if (!isset ($_GET['page']) ) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
// echo $page;
$results_per_page = 10;
$page_first_result = ($page-1) * $results_per_page;

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>QrCode Display</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
         <script src="https://cdn.tiny.cloud/1/u5pxigthlaz73eb0hpt89t9lb57oe9f2kgsk4lub57k8r37b/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
             <meta name="viewport" content="width=device-width,initial-scale=1">
         <link rel="stylesheet"
           href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
           integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
           crossorigin="anonymous">
        <!-- <script type = "text/javascript" src="assets/ckeditor.js"></script> -->
         <link rel="stylesheet" type="text/css" href="assets/css/my-login.css">
         <link rel="stylesheet" type="text/css" href="assets/css/home.css">
         <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  </head>
  <body>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                  <th> <input type="button" name="" value="select all" onclick='selectsdeselect()'> </th>
                  <th>Sl No.</th>
   <th>Text</th>
   <th>Qouted Text</th>
   <th>Number </th>
   <th>InText </th>
   <th>Out Text </th>
   <th>Status</th>
                </tr>
            </thead>
            <tbody>
              <?php
            $select = "SELECT * from qrcode where folder_name = '".$_SESSION['folder_name']."'";
            $result = $conn->query($select);
            $number_of_result = mysqli_num_rows($result);
            //determine the total number of pages available
            $number_of_page = ceil ($number_of_result / $results_per_page);
            $query = "SELECT * from qrcode where folder_name = '".$_SESSION['folder_name']."' LIMIT " . $page_first_result . ',' . $results_per_page;
            // echo $query;
               $result = $conn->query($query);
            if ($result->num_rows > 0){
              $count = 1;
                 while($row = $result->fetch_assoc()){
                   ?>
                     <tr>
                        <td> <input type="checkbox" name="chk" value="<?php echo $row['slno'] ?>"> </td>
                       <td> <?php echo $count; ?></td>
                       <td id="title"><?php echo $row['text'];?></td>
                       <td><?php echo $row['Qoute'];?></td>
                       <td><?php echo $row['number'];?></td>
                       <td><?php echo $row['intext'];?></td>
                       <td><?php echo $row['outtext'];?></td>
                       <td>
                       <?php if($row['status'] == 0){
                          echo "Not Shared Yet";
                       }else if($row['status'] == 1){
                         echo "Shared Already";
                       }else{
                         echo "Already Scanned";
                       }
                       $count++;
            ?>
            </td>
                </tr>
            <?php
                 }
            }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th> </th>
                <th>Sl No.</th>
  <th>Text</th>
  <th>Qouted Text</th>
  <th>Number </th>
  <th>InText </th>
  <th>Out Text </th>
  <th>Status</th>
              </tr>
            </tfoot>
        </table>
  </body>
</html>
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript" charset="utf-8"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" type="text/javascript" charset="utf-8"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js" type="text/javascript" charset="utf-8"></script> -->

<!-- DataTables CSS -->
<!-- <link href="css/addons/datatables2.min.css" rel="stylesheet"> -->
<!-- DataTables JS -->
<!-- <script src="js/addons/datatables2.min.js" type="text/javascript"></script> -->

<!-- DataTables Select CSS -->
<!-- <link href="css/addons/datatables-select2.min.css" rel="stylesheet"> -->
<!-- DataTables Select JS -->
<!-- <script src="js/addons/datatables-select2.min.js" type="text/javascript"></script> -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<script type="text/javascript">
function selectsdeselect(){
                var ele=document.getElementsByName('chk');
                for(var i=0; i<ele.length; i++){
                  console.log(i);
                    if(ele[i].type=='checkbox'){
                        if(ele[i].checked=true){
                          console.log("true");
                          ele[i].checked=false;
                        }else {
                          console.log("false");
                          ele[i].checked=true;
                        }
                    }

                }
            }
</script>
