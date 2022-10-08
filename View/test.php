<?php
if(isset($_POST['submit']))
        {    
            $name = $_POST['first-name'];
            $email = $_POST['last-name'];
            $mobile = $_POST['telephone'];
            $adress = $_POST['adress'];
            $email = $_POST['email'];
            $usertype = $_POST['radio-choise'];
            

            if($usertype = "transporteur"){
                $wilayas = $_POST['wilayas'];
                $certification = $_POST['certification'];
                
                break;
            }
            
        }


?>