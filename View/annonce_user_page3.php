<?php

require_once('../Controller/controller.php');
require_once('View_l.php');

class profile_view extends vtc_view{

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
      $annonce = $this->ac->get_annonce_user_controller($_GET['id_annonce']);
      $wilaya_depart = $this->ac->get_annonce_wilaya_controller($annonce["Start"]);
      $wilaya_arrive = $this->ac->get_annonce_wilaya_controller($annonce["End"]);
      $wilayas = $this->ac->get_wilaya_controller();
      $types = $this->ac->get_type_controller();
      $weights = $this->ac->get_weights_controller();
      $volumes = $this->ac->get_volumes_controller();
      $moyennes = $this->ac->get_moyennes_controller();
      
      echo '
                <div class="container-ed">
                    <div class="image">
                        <img src="'.$annonce["image"].'" alt="">
                    </div>
                    
            
                    <div class="edit-body">
                    <form action="'.$this->update_an($_GET['id_annonce']).'" method="POST" enctype="multipart/form-data" class="insc-info">
              
                        <div class="title">
                            <label for="">Titre</label><br>
                            <input type="text" name="title" class="input-css" value="'.$annonce["Title"].'" placeholder="Entrez le titre dannonce ici" required disabled>
                        </div>
                        <div class="description">
                            <label for="">Description</label><br>
                            <textarea type="text" name="description" class="input-css" placeholder="Ajouter une description..." required style="padding-top:8px; min-height:20vh" disabled>'.$annonce["Description"].'</textarea>
                        </div>
    
                        <div class="name" id="choix-ed">
                            <div>
                                <label for="">Depart</label><br>
                                <select class="select-box" name="wilaya1" required disabled>
                                <option value="" disabled>Point de départ</option>';
    
                                foreach($wilayas as $wilaya){
                                    if($annonce["Start"] == $wilaya["id"]) echo '<option value="'.$wilaya["id"].'" selected>'.$wilaya["code"].'.'.$wilaya["nom"].'</option>';
                                    else echo '<option value="'.$wilaya["id"].'">'.$wilaya["code"].'.'.$wilaya["nom"].'</option>';
                                }
    
                                echo'
                                </select>
                            </div>
                            <div>
                                <label for="">Arrivé</label><br>
                                <select class="select-box" name="wilaya2" required disabled>
                                <option value="" disabled>Point de darrivé</option>';
    
                                $wilayas = $this->ac->get_wilaya_controller();
                                foreach($wilayas as $wilaya){
                                    if($annonce["End"] == $wilaya["id"]) echo '<option value="'.$wilaya["id"].'" selected>'.$wilaya["code"].'.'.$wilaya["nom"].'</option>';
                                    else echo '<option value="'.$wilaya["id"].'">'.$wilaya["code"].'.'.$wilaya["nom"].'</option>';
                                }
        
                                    echo'
                                </select>
                            </div>
                        </div>
    
                        <div>
                            <label for="">Type de transport</label><br>
                            <select class="select-box" name="type" required disabled>
                            <option value="" disabled>Selectionner un type de transport</option>';
    
                            foreach($types as $type){
                                if($annonce["Type"] == $type["Type"]) echo '<option value="'.$type["Id_type"].'" selected>'.$type["Type"].'</option>';
                                else echo '<option value="'.$type["Id_type"].'">'.$type["Type"].'</option>';
                            }
    
                                echo'
                            </select>
                        </div>
    
                        <div class="name" id="choix-ed">
                            <div>
                                <label for="">Poids</label><br>
                                <select class="select-box" name="poids" required disabled>
                                <option value="" disabled>Le poids</option>';
    
                                foreach($weights as $weight){
                                    if($annonce["Weight"] == $weight["Weight"]) echo '<option value="'.$weight["Id_type"].'" selected>'.$weight["Weight"].'</option>';
                                    else echo '<option value="'.$weight["Id_type"].'">'.$weight["Weight"].'</option>';
                                }
        
                                    echo'
                                </select>
                            </div>
                            <div>
                                <label for="">Volume</label><br>
                                <select class="select-box" name="volume" required disabled>
                                <option value="" disabled>Le volume</option>';
    
                                foreach($volumes as $volume){
                                    if($annonce["Volume"] == $volume["Volume"]) echo '<option value="'.$volume["Id_volume"].'" selected>'.$volume["Volume"].'</option>';
                                    else echo '<option value="'.$volume["Id_volume"].'">'.$volume["Volume"].'</option>';
                                }
        
                                    echo'
                                </select>
                            </div>
                        </div>
    
                        <div>
                            <label for="">Moyenne de transport</label><br>
                            <select class="select-box" name="moyen" required disabled>
                            <option value="" disabled>Selectionner un moyen de transport</option>';
    
                            foreach($moyennes as $moyenne){
                                if($annonce["Transport"] == $moyenne["Transport"]) echo '<option value="'.$moyenne["Id_transport"].'" selected>'.$moyenne["Transport"].'</option>';
                                else echo '<option value="'.$moyenne["Id_transport"].'">'.$moyenne["Transport"].'</option>';
                            }
    
                                echo'
                            </select>
                        </div>
    
                        <div>
                            <p>Prix: <span style="color:green">'.$annonce["Price"].'</span> DA</p>
                        </div>
                        
    
                        <div class="insc submit-ed">
                            <input type="submit" name="Supprimer" value="Supprimer">
                        </div>
                        
  
                    </form>
                </div>  
            </div>';
      

    }catch(Exception $e){
      echo 'erreur' .$e->getMessage();
    }

          
  }

  public function update_an($id)
  {
    if(isset($_POST['Update']))
    {    
        $wilaya1 = $_POST['wilaya1'];
        $wilaya2 = $_POST['wilaya2'];
        $title = $_POST['title'];
        $desc = $_POST['description'];
        $type = $_POST['type'];
        $weight = $_POST['poids'];
        $volume = $_POST['volume'];
        $moyen = $_POST['moyen'];

        $this->ac->update_an_controller($id, $title, $desc, $wilaya1, $wilaya2, $type, $weight, $volume, $moyen);

        header('Location: profile_an.php'); 
        
    }

    if(isset($_POST['Supprimer']))
    {
        $this->ac->archive_an_controller($id);

        header('Location: profile_an.php');
    }
  }

}


$k = new profile_view();
$k->connecter();
$k->head();
$k->menu(1);
$k->main();
$k->footer();

?>