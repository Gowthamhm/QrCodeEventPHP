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
echo $page;
$results_per_page = 10;
$page_first_result = ($page-1) * $results_per_page;

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
         <script src="https://cdn.tiny.cloud/1/u5pxigthlaz73eb0hpt89t9lb57oe9f2kgsk4lub57k8r37b/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
             <meta name="viewport" content="width=device-width,initial-scale=1">
         <link rel="stylesheet"
           href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
           integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
           crossorigin="anonymous">
         <link rel="stylesheet" type="text/css" href="assets/css/my-login.css">
         <link rel="stylesheet" type="text/css" href="assets/css/home.css">
                  <script src="assets/css/jquery.min.js" type="text/javascript" charset="utf-8"></script>
         <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
             <title> <?php echo  $_SESSION['folder_name'] ; ?></title>
  	<meta name="viewport" content="width=device-width,initial-scale=1">
  </head>
  <style>
.pull-xs-left{
  width: 150px;
  height: 150px;
}
.pagination {
  display: inline-block;

}

.pagination a {
  color: black;
  float: right;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border-radius: 5px;
}

.pagination a:hover:not(.active) {
  background-color: #ddd;
  border-radius: 5px;
}
/* body {
  padding:20px;
  max-width:800px;
  margin:auto auto;
  font-family:sans;
} */

table {
  width:100%
} th {
  background:#666;
  color:#fff;
} td {
  padding:5px;
}

input {
  font-size: 18px;
  padding:2px;
  border:1px;

}
  </style>
  <body>
    <br>
    <input type="search" class="form-control mr-sm-2" aria-label="Search"  id="search" placeholder="Filter by Text" style="  width: auto;float: right;  height: fit-content;">
    <br>
<table class="table">
  <thead>
    <tr>
      <th>Sl No.</th>
      <th>Text</th>
      <th>In QrCode </th>
      <th>Out QrCode </th>
      <th>Status</th>
    </tr>
  </thead>

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
       ?> <tbody>
         <tr>
           <td> <?php echo $count; ?></td><td id="title">
           <?php echo $row['text'];?></td><td> <img src='<?php echo($row['path'].'/'.$row['infilename']);  ?>' class="img-fluid pull-xs-left" alt="...">
           </td><td> <img src='<?php echo($row['path'].'/'.$row['outfilename']); ?>' class="img-fluid pull-xs-left" alt="...">
           </td><td>
           <?php if($row['status'] == 0){
              echo "Not Shared Yet";
           }else if($row['status'] == 1){
             echo "Shared Already";
           }else{
             echo "Already Scanned";
           }
           $count++;
     }
}
  ?>
</td>
    </tr>
  </tbody>
</table>
<div class="pagination" id="pagenation">
<?php
if($page > 1){
    echo '<a class="btn btn-primary" href = "qrcodeDisplay.php?page=' . --$page . '">&laquo; </a>';
  }else{
  }
for($page = 1; $page<= $number_of_page; $page++) {
    echo '<a class="btn btn-primary" id="'.$page.'" href = "qrcodeDisplay.php?page=' . $page . '">' . $page . ' </a>';
  }
  if($page > 2){
    echo '<a class="btn btn-primary" href = "qrcodeDisplay.php?page=' . $page++ . '">&raquo; </a>';
  }else{

    }
 ?>
   <!-- <a href = "qrcodeDisplay.php?page='".$page++."'">&raquo;</a> -->
</div>
  </body>
  <script type="text/javascript">
  // Quick Table Search
$('#search').keyup(function() {
var regex = new RegExp($('#search').val(), "i");
var rows = $('table tr:gt(0)');
rows.each(function (index) {
  title = $(this).children("#title").html()
  if (title.search(regex) != -1) {
    $(this).show();
  } else {
    $(this).hide();
  }
});
});

var header = document.getElementById("pagenation");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</html>
