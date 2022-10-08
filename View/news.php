<?php

require_once('../Controller/controller.php');
require_once('View.php');

class vtc_news_view extends vtc_view{

  protected $ac;

  public function __construct() {
    $this->ac = new news_controller();
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
    
      return !empty($n_format . $suffix) ? $n_format . $suffix : 0;}
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
          $news = $this->ac->get_news_controller();
          echo '<div class="announcement" style="width: 90%; margin: 20px auto;">
                  <div class="frames">
                    <ul class="frames-list">';


                    $i = 0;
                  
                    foreach($news as $new){
                      $i++;
                      echo '<li class="frames-item">
                              <a href="news_page.php?id_new='.$new['Id'].'" class="frame-link">
                                <div class="frame-image">
                                  <img src="'.$new['Image'].'">
                                </div>
                                <div class="frame-description">
                                  <div class="desc">
                                    <h3 class="title">'.$new['Title'].'</h3>
                                    <span class="text">'.$new['Description'].'</span>
                                  </div>
                                  <div class="part2">
                                    <div class="views">
                                      <ion-icon name="eye-outline" class="views-icon"></ion-icon>
                                      <span class="views-number">'.$this->number_format_short(intval($new['Views'])).'</span>
                                    </div>
                                    <ion-icon name="chevron-forward-outline" class="go-icon"></ion-icon>
                                  </div>
                                </div>
                              </a>
                            </li>';
                      if($i == 8) break;
                    }

                      

                        echo'
                    </ul>
                  </div>
                </div>';
        }catch(Exception $e){
          echo 'erreur' .$e->getMessage();
        }
    }
}


$k = new vtc_news_view();
$k->head();
$k->menu(3);
$k->main();
$k->footer();
$k->connecter();

?>




