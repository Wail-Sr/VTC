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
        $us = $this->ac->get_user_controller($_SESSION['userid']);
        try {
            echo '<div class="container-xl px-4 mt-4">
                    <!-- Account page navigation-->
                    <nav class="nav nav -borders">
                        <a class="nav-link active ms-0" href="profile.php" target="__blank">Profile</a>';
                        if ($us["Role"] == "client") echo '<a class="nav-link" href="profile_an.php" target="__blank">Mes Annonces</a>';
                    echo'</nav>
                    <hr class="mt-0 mb-4">
                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header">Photo de profile</div>
                                <div class="card-body text-center">
                                    <!-- Profile picture image-->
                                    <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                    <!-- Profile picture help block-->
                                    <div class="small font-italic text-muted mb-4">@'.$us["Role"].'</div>
                                    <!-- Profile picture upload button-->
                                    <button class="btn btn-primary" type="button">Upload new image</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header">Account Details</div>
                                <div class="card-body">
                                    <form action="'.$this->update($_SESSION['userid']).'" method="POST">
                                        <!-- Form Row-->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (first name)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputFirstName">Nom</label>
                                                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="'.$us["First_Name"].'" name="first-name">
                                            </div>
                                            <!-- Form Group (last name)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLastName">Prénom</label>
                                                <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="'.$us["Last_Name"].'" name="last-name">
                                            </div>
                                        </div>
                                        <!-- Form Row        -->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (organization name)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputOrgName">Téléphone</label>
                                                <input class="form-control" id="inputOrgName" type="tel" placeholder="Enter your organization name" value="'.$us["Phone"].'" name="telephone">
                                            </div>
                                            <!-- Form Group (location)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLocation">Adresse</label>
                                                <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="'.$us["Adress"].'" name="adress">
                                            </div>
                                        </div>
                                        <!-- Form Group (email address)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="'.$us["Email"].'" name="email">
                                        </div>
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control" id="inputPassword" type="password" placeholder="Enter your email address" value="'.$us["Password"].'" name="password">
                                        </div>';
                                        if ($us["Role"] == "transporte"){ echo'
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputPassword">Etat certification : </label>
                                            <span>'; if ($us["Certification"] == "1") echo 'Non_certifié'; 
                                                     else if ($us["Certification"] == "2") echo 'En_Attente';
                                                     else echo 'Certifié';
                                            
                                            echo'</span>
                                        </div>';
                                    }


                                        echo'
                                        <!-- Save changes button-->
                                        <button class="btn btn-primary" type="submit" name="submit">Sauvegarder</button>
                                    </form>
                                </div>
                            </div>
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
$k->footer();

?>
