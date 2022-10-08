<?php

require_once('../Controller/controller.php');
require_once('View.php');

class vtc_accueil_view extends vtc_view{

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
          <script src="../assets/js/main.js"></script>
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
    try{
      $wilayas = $this->ac->get_wilaya_controller();
      $annonce = $this->ac->get_annonce_controller();
      echo '<div class="main">

              <div id="del" class="announcement">
                <div class="frames">
                  <ul class="frames-list">';

                  $i = 0;
                  
                  foreach($annonce as $an){
                    if ( ($an['etat'] == "valide") && ($an['Start'] == $_SESSION["w1"]) && ($an['End'] == $_SESSION["w2"]) ) {$i++;
                    echo '<li class="frames-item">
                            <a href="annonce_page.php?id_annonce='.$an['Id_annonce'].'" class="frame-link">
                              <div class="frame-image">
                                <img src="'.$an['image'].'">
                              </div>
                              <div class="frame-description">
                                <div class="desc">
                                  <h3 class="title">'.$an['Title'].'</h3>
                                  <span class="text">'.$an['Description'].'</span>
                                </div>
                                <div class="part2">
                                  <div class="views">
                                    <ion-icon name="eye-outline" class="views-icon"></ion-icon>
                                    <span class="views-number">'.$this->number_format_short(intval($an['Views'])).'</span>
                                  </div>
                                  <ion-icon name="chevron-forward-outline" class="go-icon"></ion-icon>
                                </div>
                              </div>
                            </a>
                          </li>';}
                    if($i == 8) break;
                  }

                    echo'
                  </ul>
                </div>
              </div>
            </div>
              
            <hr style="width: 90%;background-color: #9e9ea7; height: 1px; margin: 50px auto;">

            <div class="how-fonc">
              <h3 class="how-title">Pour une meilleure éxpérience</h3>
              <p class="how-desc">Pour bien comprendre tous les fonctionnalités du site VTC, vous pouvez consulter la page présentation</p>
              <div class="how-button"><a>Comment cela fonctionne</a></div>
            </div>

            <br>
            <br>
            <br>
            ';

    }catch(Exception $e){
      echo 'erreur' .$e->getMessage();
    }

          
  }

}


$k = new vtc_accueil_view();
$k->connecter();
$k->head();
$k->menu(1);
$k->main();
$k->footer();

?>


