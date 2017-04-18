<?php
 session_start();

 include ('includes/process.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chat Application</title>
    <link rel="stylesheet" href="css/main.css">
    <script
			  src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>
        <script src="script/chatApp.js" type="text/javascript"></script>
  </head>
  <body>

    <?php
    if (!isset($_SESSION['name'])) {
    loginform();
    }else{
     ?>

    <div id="wrapper">
      <div id="menu-bar">
        <p id="welcome">Welcome,<b><?php echo $_SESSION['name']; ?></b></p>
        <p id="logout"><a id="loggedout" href="#">Logout</a></p>
          <div style="clear:both"></div>
      </div>
      <!--Chat Display-->
      <div id="chatArea">
        <?php
          displayText();
         ?>
      </div>
      <!-- Chat text field -->
      <div id="chatTextField">
        <form action="" method="" name="message">
          <input type="text" name="userMessage" id="userMsg" size="110px" autocomplete="off">
          <button type="button" name="submitBtn" id="submitBtn">Send</button>
        </form>
      </div>

      </form>
    </div>
  </body>
</html>

<?php } ?> <!--CLOSING for else-->
