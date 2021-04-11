
<?php
  if(isset($_POST['share'])){
      if(!empty($_POST['chk'])){
      foreach($_POST['chk'] as $checked){
        echo $checked."</br>";
      }
    }
  }
?>
