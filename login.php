<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta charset="utf-8">
    <title>Login</title>
      <link rel="stylesheet" type="text/css" href="stylelogin.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
      <header>
        <a href="index.html"><input type="button" class="btn1" value=" X "></a>

          <div class="login-box">
            <h1>Login</h1>
              <form action="validation.php" method="post">
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" name="name" placeholder="Username" required>
            </div>

            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            
            
                  <button type="submit" class="btn">Log in</button>
                  </form>
          </div>
      </header>
  </body>
</html>
