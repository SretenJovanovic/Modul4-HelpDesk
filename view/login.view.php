<form class="form-box" action="#" id="login" method="post">
    <h1>Login</h1>
    <div class="input-box">
        <i class="fa bi bi-envelope-at-fill"></i>
        <input pattern="[a-z0-9A-Z@.]*" type="text" placeholder="Enter your email/username" id="email_username" name="email_username">
    </div>
    <div class="input-box">
        <i class="fa fa-eye mr-2 bi bi-lock-fill"></i>
        <input pattern="[a-z0-9A-Z]*" type="password" placeholder="Enter your password" id="password" name="password">
        <span class="eye" onclick="hideShowPassword()">
            <i id="hidePassword" class="fa fa-eye bi bi-eye-slash-fill"></i>
            <i id="showPassword" class="bi bi-eye-fill"></i>
        </span>
    </div>
    <button id="loginButton" class="login-btn" type="submit" name="loginSubmit">Login</button>
    <div id="msg"></div>
</form>

<script>
  function hideShowPassword(){
  var x = document.getElementById("password");
  var y = document.getElementById("hidePassword");
  var z = document.getElementById("showPassword");

  if(x.type === 'password'){
    x.type = "text";
    y.style.display = "block";
    z.style.display = "none";
  }
  else{
    x.type = "password";
    y.style.display = "none";
    z.style.display = "block";
  }
  }
  </script>