<?php
  $error = "";

  function loginForm(){
    echo '
      <div id="loginform">
        <form action="index.php" method="post">
          <p>Please enter your name to continue:</p>
          <label for="name">Name:</label>
          <input type="text" name="name" id="name"/>
          <input type="submit" name="submit" id="submit" value="Submit"/><br>'
           . $GLOBALS['error'].
        '</form>
      </div>
    ';
  }

  if(isset($_POST['submit'])){
    if($_POST['name'] != ""){
      $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
      $fp = fopen("chatlog.html",'a');
      fwrite($fp, "<div class='infoMsg'><i>User ". $_SESSION['name']. " join the chat.</i><br></div>");
      fclose($fp);
    }else{
      $error = '<span class="error">Name field is mandatory!</span>';
    }
  }


    if(isset($_GET['logout'])){
      //Display a message in chatbox when user end session
      $fp = fopen("chatlog.html", 'a'); //set it to be write only
      fwrite($fp, "<div class='infoMsg'><i>User ". $_SESSION['name']. " just left the chat.</i><br></div>");
      fclose($fp);

      session_destroy();
      header("Location: index.php");
    }


    if(isset($_SESSION['name']))
    {
      if(isset($_POST['message'])){
        $text = $_POST['message'];

        $fp = fopen("chatlog.html", 'a');
        fwrite($fp, "<div class='infoMsg'>(". date("g:i A") .") <b>".$_SESSION['name']."</b>:" .stripslashes(htmlspecialchars($text)). "<br></div>");
        fclose($fp);
      }

    }

    function displayText(){
      if(file_exists("chatlog.html") && filesize("chatlog.html") > 0){
        $fileOpen = fopen("chatlog.html","r");
        $fileContent = fread($fileOpen, filesize("chatlog.html"));
        fclose($fileOpen);

        echo $fileContent;
      }
    }

 ?>
