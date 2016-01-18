<?php
  if (isset($_POST["submit"])) { 
    $handle = fopen($_POST["token"] . ".txt", "w"); 
    fwrite($handle, $_POST["code"]);
    //fclose($handle);
  }
?>

<form method='post' action='<?php echo $_SERVER["PHP_SELF"]; ?>' >
  <input name='token' placeholder='Token' maxlength='25' <?php if (isset($_POST["submit"]) or isset($_POST["view"])) { echo "value='" . $_POST["token"] . "'"; } ?> style='width: 250px; height: 25px; font-size: 20px;'>
  <input type='submit' name='view' value='View' style='width: 75px; height: 25px; font-size: 20px;'>
  <input type='submit' name='submit' value='Run' style='width: 75px; height: 25px; font-size: 20px;'>
  <?php if (isset($_POST["submit"]) or isset($_POST["view"])) { echo "<a href='http://bit64.x10host.com/stuff/jsconsole/script.php?token=" . $_POST["token"] . "' style='font-szie: 20px'>Generate Script</a>"; } ?>
  <br>
  <textarea name='code' placeholder='Code to execute' style='width: 1000px; height: 500px; font-size: 20px;'><?php if (isset($_POST["submit"]) or isset($_POST["view"])) { echo file_get_contents($_POST["token"] . ".txt"); } ?></textarea>
</form>
