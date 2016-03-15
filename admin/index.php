<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login | iBelanja.com</title>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo/iBelanja.png">
    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    .kotak{
      margin-top:150px;
    }
    </style>
  </head>
  <body>

    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4 kotak">
        <?php 
          if(isset($_GET['notif'])){
            $notif=$_GET['notif'];
            if($notif="gagal"){
              echo "<div class='alert alert-success'>Gagal login!</div>";
            }
            elseif($notif="logindulu"){
              echo "<div class='alert alert-success'>Login dulu gan!</div>";
            }
          }
        ?>
          <div class="login-panel panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                Please Sign In!
              </h3>
            </div>
            <div class="panel-body">
              <form role="form" action="act_login.php" method="post">
                <fieldset>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" placeholder="Username" type="text" name="username" autofocus></input>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" placeholder="Password" type="password" name="password"></input>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="remember" value="Remember Me">Remember Me
                    </label>
                  </div>
                  <button type="submit" class="btn btn-lg btn-success" href="#">Login</button>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>