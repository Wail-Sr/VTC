<?php

require_once('../Controller/controller.php');
require_once('View.php');

class vtc_annonce_page_view extends vtc_view{

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
      $annonce = $this->ac->get_annonce_details_controller($_GET['id_annonce']);
      $wilaya_depart = $this->ac->get_annonce_wilaya_controller($annonce["Start"]);
      $wilaya_arrive = $this->ac->get_annonce_wilaya_controller($annonce["End"]);
      
      echo '<div class="annonce_container">
                <div class="container">
                    <div class="image">
                        <img src="'.$annonce["image"].'" alt="">
                    </div>
            
                    <div class="info_anon">
                        <h3 class="title">'.$annonce["Title"].'</h3>
                        <p class="description">'.$annonce["Description"].'</p>
                        <table>
                            <thead>
                                <tr>
                                    <th colspan="2">Information</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Type</td>
                                    <td>'.$annonce["Type"].'</td>
                                </tr>
                                <tr>
                                    <td>Poid</td>
                                    <td>'.$annonce["Weight"].'</td>
                                </tr>
                                <tr>
                                    <td>Volume</td>
                                    <td>'.$annonce["Volume"].'</td>
                                </tr>
                            </tbody>    
                        </table>
            
                        <table>
                            <thead>
                                <tr>
                                    <th colspan="2">Transport</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Départ</td>
                                    <td>'.$wilaya_depart[0].'</td>
                                </tr>
                                <tr>
                                    <td>Arrivé</td>
                                    <td>'.$wilaya_arrive[0].'</td>
                                </tr>
                                <tr>
                                    <td>Transport</td>
                                    <td>'.$annonce["Transport"].'</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>';
      

    }catch(Exception $e){
      echo 'erreur' .$e->getMessage();
    }

          
  }
}


$k = new vtc_annonce_page_view();
$k->connecter();
$k->head();
$k->menu(1);
$k->main();
$k->footer();

?>




