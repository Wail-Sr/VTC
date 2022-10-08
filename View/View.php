<?php

require_once('../Controller/controller.php');

class vtc_view{

  protected $ac;

  public function __construct() {
        $this->ac = new vtc_controller();
    }

  public function menu($i){
    try{
      $ac = new vtc_controller();
      $menu_list = $this->ac->get_page_name_controller();

      echo'
      <body>
      <header>
        <ion-icon name="close-outline" class="header_close"></ion-icon>
        <ion-icon name="menu-outline" class="header_toggle"></ion-icon>

        <div class="logo">
          <img src="../assets/img/Logo.png" alt="" />
        </div>

        <nav class="nav">
          <ul class="nav_list">';


          foreach($menu_list as $ml){
            if($i == $ml["Id_item_menu"]) echo '<li class="nav_item"><a href="" class="nav_link" style="color: #0d0c22;">' .$ml["Nom_item_menu"]. '</a></li>';
            else echo '<li class="nav_item"><a href="' .$ml["Link"]. '" class="nav_link">' .$ml["Nom_item_menu"]. '</a></li>';
          }

          echo'
          </ul>
        </nav>

        <div>
          <ul class="register_list">
            <li class="register_item">
              <a id="connecterr" class="register_link" onclick="open_con()">Se connecter</a>
            </li>
            <li class="register_item">
              <a href="inscription.php" class="register_link">'; echo"S'inscrire</a>
            </li>
          </ul>
        </div>
      </header>";

    }catch(Exception $e){
        echo 'erreur' .$e->getMessage();
      }
  } 

  public function connecter(){
    echo '
    <div class="pop-up">
        <div class="inscription">
            
            <div class="insc-header">
            <ion-icon class="connect-close" name="close-outline" onclick="close_con()"></ion-icon>
                <h1>Créez votre compte</h1>
                <p>
                    Vous êtes un nouvel utilisateur ? <a href="inscription.php">Créez un compte</a>
                </p>
            </div>
            <form action="connect.php" method="POST" class="insc-info">
              
                <div class="email">
                    <label for="">E-mail</label><br>
                    <input type="email" name="email" class="input-css" placeholder="Entrez votre email" required>
                </div>

                <div class="password">
                    <label for="">Mot de passe</label><br>
                    <input type="password" name="password" class="input-css" placeholder="Entrez votre mot de passe" required>
                </div>

                <div class="insc">
                    <input type="submit" name="login" value="Se connecter"></input>
                </div>

            </form>
        </div>
    </div>';
  }

  public function footer(){

    try{

      $menu_list = $this->ac->get_page_name_controller();
      $r = $this->ac->get_copyrights_controller();

      echo '
      <div class="footer">
      
      <div class="footer-menu">';

      foreach($menu_list as $ml)
        echo '<a href="'.$ml["Link"].'" class = "footer-menu-item">' .$ml["Nom_item_menu"]. '</a>';
      
      echo '
      </div>
      
      <div class="copyrights">'

        .$r->fetch()["Copyrights"];

      echo '
      </div>

      </div>
      
      
      <script src="../assets/js/main.js"></script>
      <script
        type="module"
        src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
      ></script>
      <script
        nomodule
        src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
      ></script>
    
      </body>
      </html>';

    }catch(Exception $e){
      echo 'erreur' .$e->getMessage();
    }

  }

  public function number_format_short( $n ) {
    if ($n >= 0 && $n < 1000) {
      // 1 - 999
      $n_format = floor($n);
      $suffix = '';
    } else if ($n >= 1000 && $n < 1000000) {
      // 1k-999k
      $n_format = floor($n / 1000);
      $suffix = 'k';
    } else if ($n >= 1000000 && $n < 1000000000) {
      // 1m-999m
      $n_format = floor($n / 1000000);
      $suffix = 'm';
    } else if ($n >= 1000000000 && $n < 1000000000000) {
      // 1b-999b
      $n_format = floor($n / 1000000000);
      $suffix = 'b';
    } else if ($n >= 1000000000000) {
      // 1t+
      $n_format = floor($n / 1000000000000);
      $suffix = 't';
    }
  
    return !empty($n_format . $suffix) ? $n_format . $suffix : 0;
  }
}

?>