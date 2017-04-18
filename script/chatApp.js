$(document).ready(function() {

  //User choose to end session
  $("#loggedout").click(function(){
    var exit = confirm("Are you sure you want to logout?");
    if(exit==true){
      window.location = 'index.php?logout=true';
    }
  });

  //User send msg
  $("#submitBtn").click(function(){
    var usermsg = $("#userMsg").val();
    //post to process.php
    $.post('index.php', {message: usermsg});
    //clear textbox after submission
    $("#userMsg").val("");
    showLog();
    return false;
  });

  //show the content of the chat log
  function showLog(){
    var oldscrollHeight = $("#chatArea").prop("scrollHeight") - 20;
    $.ajax({
      url: "chatlog.html",
      cache: false,
      success: function(result){
        $("#chatArea").html(result);

        //auto scrolling
        var newscrollHeight = $("#chatArea").prop("scrollHeight") - 20;
        if(newscrollHeight > oldscrollHeight){
          $("#chatArea").animate({scrollTop: newscrollHeight}, 10);
        }
      },
    });
  }

  setInterval(showLog, 2500);


});
