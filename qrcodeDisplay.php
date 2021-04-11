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
         <link rel="stylesheet" type="text/css" href="assets/css/main.css">
         <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
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
</style>
  <body>
        <input type="search" class="form-control mr-sm-2" aria-label="Search"  id="search" placeholder="Filter by Text" style="  width: auto;float: right;  height: fit-content;">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                  <th> <button id="btn" class="btn btn-default clf" onclick="show()">Check / uncheck All</button> </th>
                  <th>Sl No.</th>
   <th id="title">Text</th>
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
                        <td> <input type="checkbox" name="check_list[]"  value="<?php echo $row['slno'] ?>"> </td>
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
                       }else if($row['status'] == 99){
                         echo "In QrCode Scanned & Out Shared ";
                       }else if($row['status']==999){
                         echo "All Done";
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
                <th></th>
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
      <div class="row">
        <div class="pagination" id="pagenation" >
<?php
if($page > 1){
    echo '<a class="btn btn-primary" style=\'float: right;\' href = "qrcodeDisplay.php?page=' . --$page . '">&laquo; </a>';
  }else{
  }
for($page = 1; $page<= $number_of_page; $page++) {
    echo '<a class="btn btn-primary" id="'.$page.'"style=\'float: right;\' href = "qrcodeDisplay.php?page=' . $page . '">' . $page . ' </a>';
  }
  if($page > 2){
    echo '<a class="btn btn-primary" style=\'float: right;\' href ="qrcodeDisplay.php?page=' . $page++ . '">&raquo; </a>';
  }else{

    }
 ?>
</div>
</div>
  <div class="row" style="float:right;">
<!-- <a class="btn btn-success" href="#" id="submit" style="float: right;" role="button">Share</a> -->
<a  class="btn btn-success"  id="submit" style="float: right;" role="button">Share</a>
<!-- <button type="button" name="button" class="btn btn-success" href="share.php" id="submit" style="float: right;" role="button">Share</button> -->
  <!-- <input type="submit"  name="submit" value="Share" style="float: right;"> -->
</div>
  </body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<script type="text/javascript">
// function selects(){
//               var ele=document.getElementsByName('chk');
//               for(var i=0; i<ele.length; i++){
//                   if(ele[i].type=='checkbox')
//                       ele[i].checked=true;
//               }
//           }
//           function deSelect(){
//               var ele=document.getElementsByName('chk');
//               for(var i=0; i<ele.length; i++){
//                   if(ele[i].type=='checkbox')
//                       ele[i].checked=false;
//
//               }
//           }
function check(checked = true) {
    const cbs = document.querySelectorAll('input[name="check_list[]"]');
    cbs.forEach((cb) => {
        cb.checked = checked;
    });
}
const btn = document.querySelector('#btn');
btn.onclick = checkAll;
function checkAll() {
    check();
    // reassign click event handler
    this.onclick = uncheckAll;
}
function uncheckAll() {
    check(false);
    // reassign click event handler
    this.onclick = checkAll;
}
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

//           $(document).ready(function() {
//
//     var $submit = $("#submit").hide(),
//         $cbs = $('input[name="chk"]').click(function() {
//             $submit.toggle( $cbs.is(":checked") );
//         });
//
// });
// function show(){
//   if (document.querySelector("#example > tbody > tr > td:nth-child(1) > input[type=checkbox]").checked) {
//      document.getElementById("submit").style.display = "block";
//   }else {
//    document.getElementById("submit").style.display = "none";
//   }
// }
           </script>
           <script>
           document.getElementById('submit').onclick = function() {
             var markedCheckbox = document.getElementsByName('check_list[]');
             for (var checkbox of markedCheckbox) {
               if (checkbox.checked)
                 document.body.append(checkbox.value + ' ');
             }
           }
           </script>
