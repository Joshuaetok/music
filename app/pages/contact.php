  <?php require page('includes/header')?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Contact </title>
    <link rel="stylesheet" href="style.css" />
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  
  <body>
    <div class="containner" style="margin-top:200px; margin-bottom: 200px;">
      <div class="contennt">
        <div class="left-side" style="">
          <div class="address details">
            <i class="fa-brands fa-x-twitter"></i>
            <div class="topic">Address</div>
            <div class="text-one">@ajalaafrica</div>
            <div class="text-two"></div>
          </div>
          <div class="phone details">
            <i class="fas fa-phone-alt"></i>
            <div class="topic">Phone</div>
            <div class="text-one">+1409-359-2959</div>
            <div class="text-two">+447455687340</div>
          </div>
          <div class="email details">
            <i class="fas fa-envelope"></i>
            <div class="topic">Email</div>
            <div class="text-one">ajalafrica@gmail.com</div>
            <div class="text-two">ajala49@yahoomail.com</div>
          </div>
        </div>
        <div class="right-side">
          <div class="topic-text">Send a message</div>
          <p></p>
<form action="send_form_email.php" method="post">
    <div class="input-box">
        <input type="text" name="name" placeholder="Enter your name" required />
    </div>
    <div class="input-box">
        <input type="email" name="email" placeholder="Enter your email" required />
    </div>
    <div class="input-box message-box">
        <textarea name="message" placeholder="Enter your message" required></textarea>
    </div>
    <div class="button">
        <input type="button" value="Send Now" />
    </div>
</form>
        </div>
      </div>
    </div>
      <?php require page('includes/footer')?>

</body>
  </body>
</html>



<style>
  /* Google Font CDN Link */

@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  min-height: 100vh;
  width: 100%;
  background: #FAF9F6;
  *display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: center;
}
.containner {
  max-width: 1100px;
  width: 100%;
  background: #fff;
  border-radius: 6px;
  padding: 20px 60px 30px 40px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}
.containner .contennt {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.containner .contennt .left-side {
  width: 25%;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin-top: 15px;
  position: relative;
}
.contennt .left-side::before {
  content: "";
  position: absolute;
  height: 70%;
  width: 2px;
  right: -15px;
  top: 50%;
  transform: translateY(-50%);
  background: #afafb6;
}
.contennt .left-side .details {
  margin: 14px;
  text-align: center;
}
.contennt .left-side .details i {
  font-size: 30px;
  color: #6f6af8;
  margin-bottom: 10px;
}
.contennt .left-side .details .topic {
  font-size: 18px;
  font-weight: 500;
}
.contennt .left-side .details .text-one,
.contennt .left-side .details .text-two {
  font-size: 14px;
  color: #1e1e66;
}

.containner .contennt .right-side {
  width: 75%;
  margin-left: 75px;
}
.contennt .right-side .topic-text {
  font-size: 23px;
  font-weight: 600;
  color: #1e1e66;
}
.right-side .input-box {
  height: 55px;
  width: 100%;
  margin: 12px 0;
}
.right-side .input-box input,
.right-side .input-box textarea {
  height: 100%;
  width: 100%;
  border: none;
  outline: none;
  font-size: 16px;
  background: #f0f1f8;
  border-radius: 6px;
  padding: 0 15px;
  resize: none;
}
.right-side .message-box {
  min-height: 110px;
}
.right-side .input-box textarea {
  padding-top: 6px;
}
.right-side .button {
  display: inline-block;
  margin-top: 12px;
}
.right-side .button input[type="button"] {
  color: #fff;
  font-size: 18px;
  outline: none;
  border: none;
  padding: 8px 16px;
  border-radius: 6px;
  background: #1e1e66;
  cursor: pointer;
  transition: all 0.3s ease;
}
.button .submit input[type="button"]:hover {
  background: #6f6af8;
}

@media (max-width: 950px) {
  .containner {
    margin-left: 20px; 
    margin-right: 30px;
    width: 90%;
    padding: 30px 40px 40px 35px;;
  }
  .containner .contennt .right-side {
    width: 75%;
    margin-left: 55px;
  }
}
@media (max-width: 820px) {
  .containner {
    margin-left: 20px; 
    margin-right: 30px;
    height: 100%;
    padding: 200px 60px 200px 40px
  }
  .containner .contennt {
    flex-direction: column-reverse;
  }
  .containner .contennt .left-side {
    width: 100%;
    flex-direction: row;
    margin-top: 40px;
    justify-content: center;
    flex-wrap: wrap;
  }
  .containner .contennt .left-side::before {
    display: none;
  }
  .containner .contennt .right-side {
    width: 100%;
    margin-left: 0;
  }
}


</style>
