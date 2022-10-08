<?php

require_once('../Controller/controller.php');
require_once('View.php');

class vtc_statistic_view extends vtc_view{

  protected $ac;

  public function __construct() {
    $this->ac = new statistic_controller();
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
              
              <title>' .$r[0]. '</title>
            </head>';
    
        }catch(Exception $e){
            echo 'erreur' .$e->getMessage();
          }
      }

    public function main(){
        
        try{
            $presentation = $this->ac->get_stat_info_controller();
            $annonce = $this->ac->get_annonce_controller();
            $stat = $this->ac->get_stat_controller();
            echo '<div class="main">

                    <div class="stat">
                        <div>
                            <h3>Utilisateurs</h3>
                            <h1>'.$this->number_format_short(intval($stat["Users_number"])).'</h1>
                        </div>
                        <div>
                            <h3>Annonces</h3>
                            <h1>'.$this->number_format_short(intval($stat["Annonce_number"])).'</h1>
                        </div>
                        <div>
                            <h3>Ttansactions</h3>
                            <h1>'.$this->number_format_short(intval($stat["Transaction_number"])).'</h1>
                        </div>
                    </div>


                    <h3 class="meilleur">Meilleurs annonces</h3>
                    <hr style="width: 100%;background-color: #9e9ea7; height: 1px; margin-bottom: 30px ;">

                    <div id="del" class="announcement">
                        <div class="frames statistics">
                            <ul class="frames-list">';

                            $i = 0;
                            
                            foreach($annonce as $an){
                                $i++;
                                echo '<li class="frames-item">
                                        <a href="annonce_page.php?id_annonce='.$an["Id_annonce"].'" class="frame-link">
                                        <div class="frame-image">
                                            <img src="'.$an["image"].'">
                                        </div>
                                        <div class="frame-description">
                                            <div class="desc">
                                            <h3 class="title">'.$an["Title"].'</h3>
                                            <span class="text">'.$an["Description"].'</span>
                                            </div>
                                            <div class="part2">
                                            <div class="views">
                                                <ion-icon name="eye-outline" class="views-icon"></ion-icon>
                                                <span class="views-number">'.$this->number_format_short(intval($an["Views"])).'</span>
                                            </div>
                                            <ion-icon name="chevron-forward-outline" class="go-icon"></ion-icon>
                                            </div>
                                        </div>
                                        </a>
                                    </li>';
                                if($i == 4) break;
                            }

                                echo'
                            </ul>
                        </div>
                    </div>
                </div>';
        }
        catch(Exception $e){
            echo 'erreur' .$e->getMessage();
          }
    }
}


$k = new vtc_statistic_view();
$k->head();
$k->menu(5);
$k->main();
$k->connecter();
$k->footer();


?>



