<?php

require_once('../Controller/controller.php');
require_once('View.php');

class vtc_contact_view extends vtc_view{

  protected $ac;

  public function __construct() {
    $this->ac = new accueil_controller();
  }

    public function head(){
        try{
          $r = $this->ac->get_page_title_controller();
          echo'
          <!DOCTYPE html>
          <html>
            <head>
              <meta charset="UTF-8" />
              <meta http-equiv="X-UA-Compatibel" content="IE=edge" />
              <meta name="viewport" content="width-device-width" , initial-scal="1.0" />
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
              <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
              <link rel="stylesheet" href="../assets/css/style.css">
    
              <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    
              <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    
              <script src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>
              <script type="text/javascript" src="../assets/js/jquery-3.6.0.js"></script>
              <script
                type="text/javascript"
                src="../assets/js/jquery-3.6.0.min.js"
              ></script>
              <script
              type="module"
              src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
            ></script>
            <script
              nomodule
              src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
            ></script>
              
              <title>' .$r[0]. '</title>
            </head>';
    
        }catch(Exception $e){
            echo 'erreur' .$e->getMessage();
          }
      }

    public function main(){
        try {
          $info = $this->ac->get_contact_controller();
          echo '<div class="contact">
                  <div class="info">
                      <div class="info-title">
                          <h3>Contactez nous..!</h3>
                          <span>Si vous avez des question, nhésitez pas à nous contacter</span>
                      </div>
                      <div class="info-desc">
                          <div class="adress">
                              <ion-icon name="location-outline" class="inf-logo"></ion-icon>
                              <span>'.$info["location"].'</span>
                          </div>
                          <div class="phone">
                              <ion-icon name="call-outline" class="inf-logo"></ion-icon>
                              <span>'.$info["phone"].'</span>
                          </div>
                          <div class="mail">
                              <ion-icon name="mail-outline" class="inf-logo"></ion-icon>
                              <span>'.$info["mail"].'</span>
                          </div>
                      </div> 
                
                      <div class="social">
                        <a href="'.$info["link_fb"].'"><i class="fab fa-facebook-f social-logo" aria-hidden="true"></i></a>
                        <a href="'.$info["link_link"].'"><i class="fab fa-linkedin-in social-logo" aria-hidden="true"></i></a>
                        <a href="'.$info["link_twit"].'"><i class="fab fa-twitter social-logo" aria-hidden="true"></i></a>
                      </div>
                  </div>
                
                  <div class="message">
                      <form action="'.$this->send_message().'" method="POST" class="message-inf">
                            <input type="text" name="namee" placeholder="Nom" required>
                            <input type="email" name="email" placeholder="Email" required>
                            <textarea type="textarea" name="description" placeholder="Votre message" required></textarea>
                            <input class="button" type="submit" name="go" value="Envoyer">
                      </form>
                  </div>
                </div>';
        }catch(Exception $e){
          echo 'erreur' .$e->getMessage();
        }
    }

    public function send_message(){
      if(isset($_POST['go']))
        {
          $nom = $_POST['namee'];
          $mail = $_POST['email'];
          $contenu = $_POST['description'];

          $this->ac->send_message_controller($nom, $mail, $contenu);

        }
    }
}


$k = new vtc_contact_view();
$k->head();
$k->menu(6);
$k->main();
$k->footer();
$k->connecter();

?>




