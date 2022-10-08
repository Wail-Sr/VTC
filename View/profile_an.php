<?php

require_once('../Controller/controller.php');
require_once('View_l.php');

class vtc_profile_view extends vtc_view{

    protected $ac;
  
    public function __construct() {
      $this->ac = new profile_controller();
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
              <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
	          <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
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
        $annonce = $this->ac->get_user_annonce_controller($_SESSION['userid']);
        try {
            echo '<div class="container-xl px-4 mt-4">
                    <!-- Account page navigation-->
                    <nav class="nav nav -borders">
                        <a class="nav-link active ms-0" href="profile.php" target="__blank">Profile</a>
                        <a class="nav-link" href="profile_an.php" target="__blank">Mes Annonces</a>
                    </nav>
                    <hr class="mt-0 mb-4">

                    <h6>Annonces demandées</h6>
                    <hr class="mt-0 mb-4">

                    <div id="del" class="announcement">
                        <div class="frames">
                        <ul class="frames-list">';

                        foreach($annonce as $an){
                            if ($an['etat'] == "non_valide") echo '<li class="frames-item">
                                    <a href="annonce_user_page.php?id_annonce='.$an['Id_annonce'].'" class="frame-link">
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
                                </li>';
                        }

                            echo'
                        </ul>
                        </div>
                    </div>

                    </br></br>
                    <h6>Annonces valide</h6>
                    <hr class="mt-0 mb-4">

                    <div id="del" class="announcement">
                        <div class="frames">
                        <ul class="frames-list">';

                        $annonce = $this->ac->get_user_annonce_controller($_SESSION['userid']);
                        foreach($annonce as $an){
                            if ($an['etat'] == "valide") echo '<li class="frames-item">
                                    <a href="annonce_user_page2.php?id_annonce='.$an['Id_annonce'].'" class="frame-link">
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
                                </li>';
                        }

                            echo'
                        </ul>
                        </div>
                    </div>

                    </br></br>
                    <h6>Annonces affecté</h6>
                    <hr class="mt-0 mb-4">

                    <div id="del" class="announcement">
                        <div class="frames">
                        <ul class="frames-list">';

                        $annonce = $this->ac->get_user_annonce_controller($_SESSION['userid']);
                        foreach($annonce as $an){
                            if ($an['etat'] == "affecte") echo '<li class="frames-item">
                                    <a href="annonce_user_page3.php?id_annonce='.$an['Id_annonce'].'" class="frame-link">
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
                                </li>';
                        }

                            echo'
                        </ul>
                        </div>
                    </div>
                    
                  </div>';
        }catch(Exception $e){
            echo 'erreur' .$e->getMessage();
          }
    }

    public function update($id){
        if(isset($_POST['submit']))
        {    
            $first = $_POST['first-name'];
            $last = $_POST['last-name'];
            $mobile = $_POST['telephone'];
            $adress = $_POST['adress'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $this->ac->update_controller($first, $last, $mobile, $adress, $email, $password, $id);

            header('Location: profile.php'); 
            
        }
    }
}


$k = new vtc_profile_view();
$k->head();
$k->menu(1);
$k->main();
#$k->footer();

?>
