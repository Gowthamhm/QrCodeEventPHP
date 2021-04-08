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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link    rel="stylesheet"      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"/>
        <link rel="stylesheet" href="css/mdb.min.css" />
        <link rel="stylesheet" href="css/table.css" />
  </head>
  <body>

    <table class="container">
    	<thead>
    		<tr>
    			<th><h1>Sites</h1></th>
    			<th><h1>Views</h1></th>
    			<th><h1>Clicks</h1></th>
    			<th><h1>Average</h1></th>
          <th> <h1>Sl No.</h1> </th>
      <th> <h1>Text</h1> </th>
      <th> <h1>In QrCode</h1> </th>
      <th> <h1>Out QrCode</h1> </th>
      <th> <h1>Out QrCode</h1> </th>
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
         <td> <?php echo $count; ?></td><td id="title">
         <?php echo $row['text'];?></td><td> <img src='<?php echo($row['path'].'/'.$row['infilename']);  ?>' class="img-fluid pull-xs-left" alt="...">
         </td><td> <img src='<?php echo($row['path'].'/'.$row['outfilename']); ?>' class="img-fluid pull-xs-left" alt="...">
         </td><td>
         <?php if($row['status'] == 0){
            echo "Not Shared Yet";
         }else if($row['status'] == 1){
           echo "Shared ";
         }else if($row['status'] == 99){
           echo "Scanned the In QrCode and Shared the out QrCode";
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
    </table>
  </body>
</html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- DataTables CSS -->
<link href="css/addons/datatables2.min.css" rel="stylesheet">
<!-- DataTables JS -->
<script src="js/addons/datatables2.min.js" type="text/javascript"></script>

<!-- DataTables Select CSS -->
<link href="css/addons/datatables-select2.min.css" rel="stylesheet">
<!-- DataTables Select JS -->
<script src="js/addons/datatables-select2.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>
