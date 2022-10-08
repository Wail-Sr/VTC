<?php

require_once('../Controller/controller.php');
require_once('View.php');

class vtc_presentation_view extends vtc_view{

  protected $ac;

  public function __construct() {
    $this->ac = new presentation_controller();
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
        $presentation = $this->ac->get_pre_info_controller();
        try{
        echo '<div class="first-part">
                <div class="pre-image">
                    <img src="'.$presentation["Image"].'" alt="">
                </div>
                <div class="pre-text">
                    <h3>'.$presentation["Title"].'</h3>
                    <p>'.$presentation["Description"].'</p>
                </div>
            </div>
            
            <div class="second-part">
                <video src="'.$presentation["Video"].'" width="80%" height="500px" controls preload="auto" style="padding: 10px;">
                    <source src="movie.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                </video>
            </div>';
        }
        catch(Exception $e){
            echo 'erreur' .$e->getMessage();
          }
    }
}


$k = new vtc_presentation_view();
$k->head();
$k->menu(2);
$k->main();
$k->footer();
$k->connecter();

?>


