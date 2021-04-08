<?php
include 'config.php';
include 'error.php';
include 'session.php';
// include 'nav.php';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link    rel="stylesheet"      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"/>
        <link rel="stylesheet" href="css/mdb.min.css" />
        <link rel="stylesheet" href="css/table.css" />
  </head>
  <body>
    <h1><span class="blue">&lt;</span>Table<span class="blue">&gt;</span> <span class="yellow">Responsive</pan></h1>
    <h2>Created with love by <a href="https://github.com/pablorgarcia" target="_blank">Pablo García</a></h2>

    <table class="container">
    	<thead>
    		<tr>
    			<th><h1>Sites</h1></th>
    			<th><h1>Views</h1></th>
    			<th><h1>Clicks</h1></th>
    			<th><h1>Average</h1></th>
    		</tr>
    	</thead>
    	<tbody>
    		<tr>
    			<td>Google</td>
    			<td>9518</td>
    			<td>6369</td>
    			<td>01:32:50</td>
    		</tr>
    		<tr>
    			<td>Twitter</td>
    			<td>7326</td>
    			<td>10437</td>
    			<td>00:51:22</td>
    		</tr>
    		<tr>
    			<td>Amazon</td>
    			<td>4162</td>
    			<td>5327</td>
    			<td>00:24:34</td>
    		</tr>
        <tr>
    			<td>LinkedIn</td>
    			<td>3654</td>
    			<td>2961</td>
    			<td>00:12:10</td>
    		</tr>
        <tr>
    			<td>CodePen</td>
    			<td>2002</td>
    			<td>4135</td>
    			<td>00:46:19</td>
    		</tr>
        <tr>
    			<td>GitHub</td>
    			<td>4623</td>
    			<td>3486</td>
    			<td>00:31:52</td>
    		</tr>
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
