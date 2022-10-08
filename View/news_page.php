<?php

require_once('../Controller/controller.php');
require_once('View.php');

class vtc_news_page_view extends vtc_view{

  protected $ac;

  public function __construct() {
    $this->ac = new news_controller();
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
        $new = $this->ac->get_news_info_controller($_GET['id_new']);
        $new = $new[0];
        echo '<div class="news">
                <h3 class="news-title">'.$new["Title"].'</h3>
                <div class="news-image">
                  <img src="'.$new["Image"].'" alt="">
                </div>
              
                <div class="news-desc">
                  <p>'.$new["Description"].'</p>
                </div>
              </div>';
      }catch(Exception $e){
        echo 'erreur' .$e->getMessage();
      }
        
    }
}


$k = new vtc_news_page_view();
$k->head();
$k->menu(3);
$k->main();
$k->footer();
$k->connecter();

?>



