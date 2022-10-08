<?php

require_once('../Controller/controller.php');

class admin_ann{
    protected $ac;

  public function __construct() {
    $this->ac = new admin_ann_controller();
  }

  public function head(){
      echo '<!DOCTYPE html>
      <html>
      <head>
          <title></title>
      
          <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
          <link
              href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
              rel="stylesheet">
      
          <!-- Custom styles for this template -->
          <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
      
          <!-- Custom styles for this page -->
          <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
          <link href="../assets/css/admin.css" rel="stylesheet">
      
          <link rel="stylesheet" type="text/css" href="style.css">
          <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
          <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
          <link rel="stylesheet" type="text/css" href="../assets/css/admin.css">
          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      
      
          
          <!-- Bootstrap core JavaScript-->
          <script src="../assets/vendor/jquery/jquery.min.js"></script>
          <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      
          <!-- Core plugin JavaScript-->
          <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
      
          <!-- Page level plugins -->
          <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
          <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
      
          <script src="../assets/js/admin.js"></script>
      
      </head>';
  }
  public function main(){
      try {
            $annonces = $this->ac->get_annonces_controller();
            $annonce = $this->ac->get_annonce_user_controller($_GET['id_ann']);
            $wilayas = $this->ac->get_wilaya_controller();
            $types = $this->ac->get_type_controller();
            $weights = $this->ac->get_weights_controller();
            $volumes = $this->ac->get_volumes_controller();
            $moyennes = $this->ac->get_moyennes_controller();
          echo '<body>
                <!-- Dashboard -->
                <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
                    <!-- Vertical Navbar -->
                    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
                        <div class="container-fluid">
                            <!-- Toggler -->
                            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <!-- Brand -->
                            <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
                                <img src="https://preview.webpixels.io/web/img/logos/clever-primary.svg" alt="...">
                            </a>
                            
                            <!-- Collapse -->
                            <div class="collapse navbar-collapse" id="sidebarCollapse">
                                <!-- Navigation -->
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="adminpage.php">
                                            <i class="bi bi-house"></i> Accueil
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="admin_users.php">
                                            <i class="bi bi-people"></i> Utilisateurs
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="admin_ann.php">
                                            <i class="bi bi-bar-chart"></i> Annonces
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="admin_news.php">
                                            <i class="bi bi-newspaper"></i> News
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="admin_contenu.php">
                                            <i class="bi bi-bookmarks"></i> Contenu
                                        </a>
                                    </li>
                                    
                                </ul>
                                <!-- Divider -->
                                <hr class="navbar-divider my-5 opacity-20">
                                <!-- Navigation -->
                                
                                <!-- Push content down -->
                                <div class="mt-auto"></div>
                                <!-- User (md) -->
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <i class="bi bi-person-square"></i> Account
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="admin_login.php">
                                            <i class="bi bi-box-arrow-left"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- Main content -->
                    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
                        <!-- Header -->
                        <header class="bg-surface-primary border-bottom pt-6">
                            <div class="container-fluid">
                                <div class="mb-npx">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                            <!-- Title -->
                                            <h1 class="h2 mb-0 ls-tight">Annonces</h1>
                                        </div>
                                    </div>
                                    <!-- Nav -->
                                    <ul class="nav nav-tabs mt-4 overflow-x border-0">
                                        <li class="nav-item ">
                                            <a href="admin_ann.php" class="nav-link active">Tous</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="admin_ann_d.php" class="nav-link font-regular">Demande validation</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </header>
                        <!-- Main -->
                        <main class="py-6 bg-surface-secondary">
                        <div class="edit-body">
                        <form action="'.$this->update_an($_GET['id_ann']).'" method="POST" enctype="multipart/form-data" class="insc-info">

                            <div class="mb-3">
                                <label class="small mb-1" for="inputTitle">Titre</label>
                                <input class="form-control" id="inputTitle" type="text" placeholder="Enter your Title" value="'.$annonce["Title"].'" name="title">
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="inputDescription">Titre</label>
                                <textarea class="form-control" id="inputDescription" type="text" placeholder="Enter your Description" name="description" required style="padding-top:8px; min-height:20vh">'.$annonce["Description"].'</textarea>
                            </div>

                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputDepart">Départ</label>
                                    <select class="select-box form-control" id="inputDepart" name="wilaya1" required>
                                    <option value="" disabled>Point de départ</option>';
        
                                    foreach($wilayas as $wilaya){
                                        if($annonce["Start"] == $wilaya["id"]) echo '<option value="'.$wilaya["id"].'" selected>'.$wilaya["code"].'.'.$wilaya["nom"].'</option>';
                                        else echo '<option value="'.$wilaya["id"].'">'.$wilaya["code"].'.'.$wilaya["nom"].'</option>';
                                    }
        
                                    echo'
                                    </select>
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputArrive">Adresse</label>
                                    <select class="select-box form-control" id="inputArrive" name="wilaya2" required>
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

                            <div class="mb-3">
                                <label class="small mb-1" for="inputType">Type de transport</label>
                                <select class="select-box form-control" id="inputType" name="type" required>
                                <option value="" disabled>Selectionner un type de transport</option>';
        
                                foreach($types as $type){
                                    if($annonce["Type"] == $type["Type"]) echo '<option value="'.$type["Id_type"].'" selected>'.$type["Type"].'</option>';
                                    else echo '<option value="'.$type["Id_type"].'">'.$type["Type"].'</option>';
                                }
        
                                    echo'
                                </select>
                            </div>



                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPoids">Poids</label>
                                    <select class="select-box form-control" id="inputPoids" name="poids" required>
                                    <option value="" disabled>Le poids</option>';
        
                                    foreach($weights as $weight){
                                        if($annonce["Weight"] == $weight["Weight"]) echo '<option value="'.$weight["Id_type"].'" selected>'.$weight["Weight"].'</option>';
                                        else echo '<option value="'.$weight["Id_type"].'">'.$weight["Weight"].'</option>';
                                    }
            
                                        echo'
                                    </select>
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputVolume">Volume</label>
                                    <select class="select-box form-control" id="inputVolume" name="volume" required>
                                    <option value="" disabled>Le volume</option>';
        
                                    foreach($volumes as $volume){
                                        if($annonce["Volume"] == $volume["Volume"]) echo '<option value="'.$volume["Id_volume"].'" selected>'.$volume["Volume"].'</option>';
                                        else echo '<option value="'.$volume["Id_volume"].'">'.$volume["Volume"].'</option>';
                                    }
            
                                        echo'
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="inputMoyen">Type de transport</label>
                                <select class="select-box form-control" id="inputMoyen" name="moyen" required>
                                <option value="" disabled>Selectionner un moyen de transport</option>';
        
                                foreach($moyennes as $moyenne){
                                    if($annonce["Transport"] == $moyenne["Transport"]) echo '<option value="'.$moyenne["Id_transport"].'" selected>'.$moyenne["Transport"].'</option>';
                                    else echo '<option value="'.$moyenne["Id_transport"].'">'.$moyenne["Transport"].'</option>';
                                }
        
                                    echo'
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="inputCert">Certificarion</label>
                                <select class="form-control" name="etat" id="select-btn" placeholder="Etat">
                                    <option value="non_valide"'; if($annonce["etat"] == "non_valide") echo ' selected '; echo'>non_valide</option>
                                    <option value="valide"'; if($annonce["etat"] == "valide") echo ' selected '; echo'>valide</option>
                                    <option value="affecte"'; if($annonce["etat"] == "affecte") echo ' selected '; echo'>affecte</option>
                                    <option value="archive"'; if($annonce["etat"] == "archive") echo ' selected '; echo'>archive</option>
                                </select>
                            </div>';
                            
                            if ($annonce["etat"] != "non_valide") echo'
                            <div>
                                <p>Prix: <span style="color:green">'.$annonce["Price"].'</span> DA</p></br>
                            </div>';
        
                            echo'
                            <button class="btn btn-primary" type="submit" name="sauv">Sauvegarder</button>
                            <button class="btn btn-primary" type="submit" name="supp">Supprimer</button>
                            
                        </form>
                    </div>
                        </main>
                    </div>
                </div>
                </body>
                </html>';


      }catch(Exception $e){
        echo 'erreur' .$e->getMessage();
      }
  }


  public function update_an($id){
    if(isset($_POST['sauv']))
    {    
        $wilaya1 = $_POST['wilaya1'];
        $wilaya2 = $_POST['wilaya2'];
        $title = $_POST['title'];
        $desc = $_POST['description'];
        $type = $_POST['type'];
        $weight = $_POST['poids'];
        $volume = $_POST['volume'];
        $moyen = $_POST['moyen'];
        $etat = $_POST['etat'];

        $this->ac->admin_update_an_controller($id, $title, $desc, $wilaya1, $wilaya2, $type, $weight, $volume, $moyen, $etat);

        header('Location: admin_ann.php');
        
    }

    if(isset($_POST['supp']))
    {    
        $this->ac->admin_deleteann_controller($id);

        header('Location: admin_ann.php'); 
        
    }
  }
}

$aff = new admin_ann();

$aff->head();
$aff->main();
?>




