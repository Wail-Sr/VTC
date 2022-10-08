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
      $types = $this->ac->get_type_controller();
      $weights = $this->ac->get_weights_controller();
      $volumes = $this->ac->get_volumes_controller();
      $moyennes = $this->ac->get_moyennes_controller();
      echo '
            <div class="main">
              <h3 id="add-an" class="meilleur">Ajouter annonce</h3> 
              <hr style="width: 100%;background-color: #9e9ea7; height: 1px; margin-bottom: 30px ;">
            
                          
            <div class="inscription" id="form-add">
            <div class="insc-header">
                <h1>Ajouter une annonce</h1>
            </div>
              <form action="'.$this->add_annonce().'" method="POST" enctype="multipart/form-data" class="insc-info">
              
                  <div class="title">
                      <label for="">Titre</label><br>
                      <input type="text" name="title" class="input-css" placeholder="Entrez le titre dannonce ici" required>
                  </div>
                  <div class="description">
                      <label for="">Description</label><br>
                      <textarea type="text" name="description" class="input-css" placeholder="Ajouter une description..." required style="padding-top:8px; min-height:20vh"></textarea>
                  </div>

                  <div>
                    <label for="">Importer une image</label><br>
                    <input type="file" name="image-up" value=""/>
                  </div>
                  

                  <div class="name">
                      <div>
                          <label for="">Depart</label><br>
                          <select class="select-box" name="wilaya1" required>
                            <option value="" disabled selected>Point de départ</option>';

                          foreach($wilayas as $wilaya){
                            echo '<option value="'.$wilaya["id"].'">'.$wilaya["code"].'.'.$wilaya["nom"].'</option>';
                          }

                            echo'
                          </select>
                      </div>
                      <div>
                          <label for="">Arrivé</label><br>
                          <select class="select-box" name="wilaya2" required>
                            <option value="" disabled selected>Point de darrivé</option>';

                            $wilayas = $this->ac->get_wilaya_controller();
                            foreach($wilayas as $wilaya){
                              echo '<option value="'.$wilaya["id"].'">'.$wilaya["code"].'.'.$wilaya["nom"].'</option>';
                            }
  
                              echo'
                          </select>
                      </div>
                  </div>

                  <div>
                      <label for="">Type de transport</label><br>
                      <select class="select-box selecting" name="type" required>
                        <option value="" disabled selected>Selectionner un type de transport</option>';

                        foreach($types as $type){
                          echo '<option value="'.$type["Id_type"].'">'.$type["Type"].'</option>';
                        }

                          echo'
                      </select>
                  </div>

                  <div class="name">
                      <div>
                          <label for="">Poids</label><br>
                          <select class="select-box" name="poids" required>
                            <option value="" disabled selected>Le poids</option>';

                            foreach($weights as $weight){
                              echo '<option value="'.$weight["Id_type"].'">'.$weight["Weight"].'</option>';
                            }
    
                              echo'
                          </select>
                      </div>
                      <div>
                          <label for="">Volume</label><br>
                          <select class="select-box" name="volume" required>
                            <option value="" disabled selected>Le volume</option>';

                            foreach($volumes as $volume){
                              echo '<option value="'.$volume["Id_Volume"].'">'.$volume["Volume"].'</option>';
                            }
    
                              echo'
                          </select>
                      </div>
                  </div>

                  <div>
                      <label for="">Moyenne de transport</label><br>
                      <select class="select-box selecting" name="moyen" required>
                        <option value="" disabled selected>Selectionner un moyen de transport</option>';

                        foreach($moyennes as $moyenne){
                          echo '<option value="'.$moyenne["Id_transport"].'">'.$moyenne["Transport"].'</option>';
                        }

                          echo'
                      </select>
                  </div>

                  

                  <div class="insc">
                      <input type="submit" name="submit" value="Ajouter"></input>
                  </div>

              </form>

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

  public function add_annonce(){
    if(isset($_POST['submit'])){  
      $filename = $_FILES['image-up']["name"]; 
      $image = "../assets/img/".$filename;  
      $wilaya1 = $_POST['wilaya1'];
      $wilaya2 = $_POST['wilaya2'];
      $title = $_POST['title'];
      $desc = $_POST['description'];
      $type = $_POST['type'];
      $weight = $_POST['poids'];
      $volume = $_POST['volume'];
      $moyen = $_POST['moyen'];
      $user = $_SESSION['userid'];

      $this->ac->add_annonce($user, $title, $image, $desc, $wilaya1, $wilaya2, $type, $weight, $volume, $moyen);
      
  }
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

