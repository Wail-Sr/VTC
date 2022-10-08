<?php

require_once('../Controller/controller.php');
require_once('View_l.php');

class vtc_accueil_l_view extends vtc_view{

  protected $ac;

  public function __construct() {
    $this->ac = new accueil_l_controller();
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

  public function diaporama(){
    try{
      $src_image = $this->ac->get_img_src_controller();
      echo
        '<div class="container">
          <div class="navigation">
            <input type="radio" class="bbtn" id="bbtn1">
            <input type="radio" class="bbtn" id="bbtn2">
            <input type="radio" class="bbtn" id="bbtn3">
            <input type="radio" class="bbtn" id="bbtn4">
            <div id="btn1"></div>
            <div id="btn2"></div>
            <div id="btn3"></div>
            <div id="btn4"></div>
          </div>

          <script type="text/javascript">
            var cnt = 1;
            setInterval(function(){
              if (cnt == 1) document.getElementById("bbtn" + 4).checked = false;
              else document.getElementById("bbtn" + (cnt-1)).checked = false;
              document.getElementById("bbtn" + cnt).checked = true;
            //   console.log("btn" + cnt);
              cnt++;
              if(cnt > 4){			
              cnt = 1;
              }
            }, 3000);
          </script>
          
          <div class="pieces">';

          foreach ($src_image as $si) {
            echo'
                  <div class="piece piece'.$si["Id_image"].'">
                    <a href="'.$si["Link"].'"><img src="'.$si["Src"].'"></a>
                  </div>

                  <div class="after-img"></div>';
          }
           
          echo '</div>
          </div>';
    }catch(Exception $e){
      echo 'erreur' .$e->getMessage();
    }
  }

  public function main(){
    try{
      $wilayas = $this->ac->get_wilaya_controller();
      $annonce = $this->ac->get_annonce_controller();
      echo '<div class="main">
              <div class="search">
                <div class="search-title">
                  <h1>Rechercher sur VTC</h1>
                  <p>17,100,000+ annonce de plus des milliers des utilisateurs</p>
                </div>

                <form action="'.$this->search().'" method="POST" class="search-form">
                  <div class="search-input">
                      <ion-icon name="navigate-outline" class="search-icon"></ion-icon>
                      
                      <select class="my-select" name="wilaya1" required>
                        <option value="" disabled selected>Point de départ</option>';

                      foreach($wilayas as $wilaya){
                        echo '<option value="'.$wilaya["id"].'">'.$wilaya["code"].'.'.$wilaya["nom"].'</option>';
                      }
                      
                      echo'</select>

                  </div>

                  <div class="search-input">
                    <ion-icon name="pin-outline" class="search-icon"></ion-icon>
                    <select class="my-select" name="wilaya2" required>
                      <option value="" disabled selected>Point darrivé...</option>';

                      $wilayas = $this->ac->get_wilaya_controller();
                      foreach($wilayas as $wilaya){
                        echo '<option value="'.$wilaya["id"].'">'.$wilaya["code"].'. '.$wilaya["nom"].'</option>';
                      }

                      echo'</select>
                  </div>

                  <div class="search-submit">
                    <ion-icon name="chevron-forward-outline" class="search-icon"></ion-icon>
                    <input class="button" type="submit" name="submit" value="Rechercher" style="cursor: pointer">
                  </div>

                </form>
              </div>

              <div id="del" class="announcement">
                <div class="frames">
                  <ul class="frames-list">';

                  $i = 0;
                  
                  foreach($annonce as $an){
                    if ($an['etat'] == "valide") {$i++;
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

  public function search(){
    if(isset($_POST['submit']))
        {    
            $wilaya1 = $_POST['wilaya1'];
            $wilaya2 = $_POST['wilaya2'];

            //$this->ac->search_controller($wilaya1, $wilaya2);
            
        }


        $html = preg_replace('#<div id="del">(.*?)</div>#', '', '<div></div>');
        $html = preg_replace('#<div class="frames">(.*?)</div>#', '', '<div></div>');
  }
}


$k = new vtc_accueil_l_view();
$k->connecter();
$k->head();
$k->menu(1);
$k->diaporama();
$k->main();
$k->footer();

?>

