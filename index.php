<!DOCTYPE html>
<html>
<head>
  <title>Chat Bot PHP</title>
  <link rel="stylesheet" href="style.css" type="text/css" media="all" />
  <!-- FONT AWESOME JS URL -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <!-- JQUERY URL JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
  
  <div class="wrapper">
    <div class="title">Simple Online ChatBot</div>
    <div class="form">
      <div class="bot-inbox inbox">
        <div class="icon">
          <i class="fas fa-user"></i>
        </div>
        <div class="msg-header">
          <p>Hello there, how can i help you?</p>
        </div>
      </div>
    </div>
    <div class="typing-field">
      <div class="input-data">
        <input type="text" id="data-msg" placeholder="Ketikkan Pesan..." required/>
        <button type="submit" id="send-btn">Send</button>
      </div>
    </div>
  </div>
  
  <!-- SCRIPT JQUERY -->
  <script>
    $(document).ready(() => {
      $("#send-btn").on("click", () => {
        $value = $("#data-msg").val();
        $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
        $(".form").append($msg);
        $("#data-msg").val('');
        
        // AJAX CODE
        $.ajax({
          url: 'message.php',
          type: 'POST',
          data: 'text=' + $value,
          success: (result) => {
            $msg_back = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
            $(".form").append($msg_back);
            // Scroll Ke Bawah Otomatis
            $(".form").scrollTop($(".form")[0].scrollHeight);
          }
        });
      });
    });
  </script>
  
</body>
</html>