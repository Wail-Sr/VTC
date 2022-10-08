<?php
require_once('../Controller/controller.php');

class login {
  protected $ac;
  
    public function __construct() {
      $this->ac = new login_controller();
    }

    public function main(){
    echo '<!DOCTYPE html>
          <html lang="en">
            <head>
              <meta charset="UTF-8" />
              <link
                rel="stylesheet"
                href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
              />
              <meta name="viewport" content="width=device-width, initial-scale=1.0" />
              <meta http-equiv="X-UA-Compatible" content="ie=edge" />
              <link rel="stylesheet" href="../assets/css/login.css" />
              <title>Login Page</title>
            </head>

            <body>
              <form action="'.$this->validate().'" method="post">
                <div class="login-box">
                  <h1>Login</h1>

                  <div class="textbox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input
                      type="text"
                      placeholder="Adminname"
                      name="adminname"
                      value=""
                    />
                  </div>

                  <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input
                      type="password"
                      placeholder="Password"
                      name="password"
                      value=""
                    />
                  </div>

                  <input class="button" type="submit" name="login" value="Sign In" />
                </div>
              </form>
            </body>
          </html>';
    }

    public function validate(){
      if (isset($_POST['login'])){
          $username = $_POST['adminname'];
          $password = $_POST['password'];

          $this->ac->validate_controller($username, $password);
      }
    }
}


$login = new login();

$login->main();

?>

