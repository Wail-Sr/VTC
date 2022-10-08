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
                                            <a href="admin_ann.php" class="nav-link font-regular">Tous</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="admin_ann_d.php" class="nav-link font-regular">Demande validation</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="admin_ann_ar.php" class="nav-link active">Archivées</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </header>
                        <!-- Main -->
                        <main class="py-6 bg-surface-secondary">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Client</th>
                                                    <th>Etat</th>
                                                    <th>Vues</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>';


                                            foreach($annonces as $annonce){
                                                if ($annonce["etat"] == "archive") echo '<tr>
                                                        <td>'.$annonce["Id_annonce"].'</td>
                                                        <td>'.$annonce["User_id"].'</td>
                                                        <td>'.$annonce["etat"].'</td>
                                                        <td>'.$annonce["Views"].'</td>
                                                        <td class="col-mt5">
                                                            <a href="admin_ann_edit.php?id_ann='.$annonce["Id_annonce"].'" class="btn btn-sm btn-neutral">Edit</a>
                                                                <a href="admin_ann_delete.php?id_ann='.$annonce["Id_annonce"].'"><button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                                                    <i class="bi bi-trash"></i>
                                                                </button></a>
                                                        </td>
                                                    </tr>';
                                            }

                                            echo'
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
}

$aff = new admin_ann();

$aff->head();
$aff->main();
?>




