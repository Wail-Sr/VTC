<?php

require_once('../Controller/controller.php');
require_once('View.php');

class vtc_inscription_view extends vtc_view{

    protected $ac;

  public function __construct() {
    $this->ac = new inscription_controller();
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
            $wilayas = $this->ac->get_wilaya_controller();
            echo '<div class="inscription">
            <div class="insc-header">
                <h1>Créez votre compte</h1>
                <p>
                    Avez vous déjà un compte ?  <a onclick="open_con()">Connectez-vous</a>
                </p>
            </div>
            <form action="'.$this->insert().'" method="POST" class="insc-info">
                <div class="name">
                    <div class="first">
                        <label for="">Nom</label><br>
                        <input type="text" name="first-name" class="input-css" placeholder="Entrez votre nom" required>
                    </div>
                    <div class="last">
                        <label for="">Prénom</label><br>
                        <input type="text" name="last-name" class="input-css" placeholder="Entrez votre prénom" required>
                    </div>
                </div>
        
                <div class="telephone">
                    <label for="">Téléphone</label><br>
                    <input type="telephone" name="telephone" class="input-css" placeholder="Entrez votre numéro de téléphone" required>
                </div>
        
                <div class="telephone">
                    <label for="">Adresse</label><br>
                    <input type="text" name="adress" class="input-css" placeholder="Entrez votre adresse actuelle" required>
                </div>
        
                <div class="email">
                    <label for="">E-mail</label><br>
                    <input type="email" name="email" class="input-css" placeholder="Entrez votre email" required>
                </div>
        
                <div class="password">
                    <label for="">Mot de passe</label><br>
                    <input type="password" name="password" class="input-css" placeholder="Entrez votre mot de passe" required>
                </div>
        
                <div>
                    <div>
                        <h5>Type utilisateur</h5>
                        <div class="radio-div">
                            <input type="radio" name="radio-choise" value="client" id="client"> <label for="client">Client</label>
                            <input type="radio" name="radio-choise" value="transporteur" id="transporteur"><label for="transporteur">Transporteur</label>
                        </div>
                    </div>
        
                    <div id="cas-trans">
        
        
                            <section>
                                <h2>Les wilayas de travaille</h2>
                                
                                <div class="row d-flex justify-content-center mt-100">
                                    <div class="col-md-6"> 
                                        <select name=wilayas[] id="choices-multiple-remove-button" placeholder="Vos trajets" multiple>';
                                        foreach ($wilayas as $wilaya) {
                                            echo '<option value="'.$wilaya["id"].'">'.$wilaya["code"].'.'.$wilaya["nom"].'</option>';
                                        }
                                        echo'
                                        </select>
                                    </div>
                                </div>
                            </section>
        
        
                            <div class="certification-check">
                                <input type="checkbox" name="certification" value="2" id="cert"><label for="cert">Demande de certification</label>
                            </div>
        
        
        
                    </div>
        
                    
                </div>
        
                <div class="insc">
                    <input type="submit" name="submit" value="Sinscrire"></input>
                </div>
        
            </form>
          
        </div>';

        }catch(Exception $e){
            echo 'erreur' .$e->getMessage();
        }
    }

    public function insert(){   

        if(isset($_POST['submit']))
        {    
            $first = $_POST['first-name'];
            $last = $_POST['last-name'];
            $mobile = $_POST['telephone'];
            $adress = $_POST['adress'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $usertype = $_POST['radio-choise'];
            

            if($usertype == "transporteur"){
                $wilayas = $_POST['wilayas'];
                $certification = 1;
                if(isset($_POST['certification'])) $certification = $_POST['certification'];
                $this->ac->inscrir_t_controller($first, $last, $mobile, $adress, $email, $password, $usertype, $wilayas, $certification);
                exit;
            }

            $this->ac->inscrir_c_controller($first, $last, $mobile, $adress, $email, $password, $usertype);
            
        }
    }
}


$k = new vtc_inscription_view();
$k->head();
$k->menu(4);
$k->main();
$k->footer();
$k->connecter();

?>





  <script
    type="module"
    src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
  ></script>
  <script
    nomodule
    src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
  ></script>
  



