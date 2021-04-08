<?php
include 'session.php';
include 'config.php';
include 'error.php';

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Quick SMS</title>
  </head>
  <body>
    <form method="post" action="quick_sms.php">
      <fieldset class="form-group">
        <label for="formGroupExampleInput">Enter the Number</label>
        <input type="tel" class="form-control" id="formGroupExampleInput" name="number" placeholder="Enter Number">
      </fieldset>
      <fieldset class="form-group">
        <label for="formGroupExampleInput2">Enter the Text</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="text" placeholder="Enter text">
      </fieldset>
      <fieldset class="form-group">
        <input type="submit" class="form-control" id="formGroupExampleInput3" name="sendSMS" value="Send">
      </fieldset>

    </form>
  </body>
</html>
