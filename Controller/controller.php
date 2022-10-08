<?php
require_once('../Model/model.php');

class vtc_controller{

    public function get_page_name_controller(){
        $vtc_model = new vtc_model();
        $r = $vtc_model->get_page_name_model();
        return $r;
    }

    public function get_copyrights_controller(){
        $vtc_model = new vtc_model();
        $r = $vtc_model->get_copyrights_model();
        return $r;
    }

    public function get_wilaya_controller(){
        $vtc_model = new vtc_model();
        $r = $vtc_model->get_wilaya_model();
        return $r;
    }

    public function get_user_controller($idsuer){
        $vtc_model = new vtc_model();
        $r = $vtc_model->get_user_model($idsuer);
        return $r;
    }

}

class accueil_controller extends vtc_controller{

    public function get_page_title_controller(){
        $vtc_model = new accueil_model();
        $r = $vtc_model->get_page_title_model();
        return $r;
    }
    
    public function get_img_src_controller(){
        $vtc_model = new accueil_model();
        $r = $vtc_model->get_img_src_model();
        return $r;
    }

    public function get_annonce_controller(){
        $vtc_model = new accueil_model();
        $r = $vtc_model->get_annonce_model();
        return $r;
    }

    public function get_annonce_details_controller($id_ann){
        $vtc_model = new accueil_model();
        $r = $vtc_model->get_annonce_details_model($id_ann);
        return $r;
    }

    public function get_annonce_wilaya_controller($id_wilaya){
        $vtc_model = new accueil_model();
        $r = $vtc_model->get_annonce_wilaya_model($id_wilaya);
        return $r;
    }

    public function get_type_controller(){
        $vtc_model = new accueil_model();
        $r = $vtc_model->get_type_model();
        return $r;
    }

    public function get_weights_controller(){
        $vtc_model = new accueil_model();
        $r = $vtc_model->get_weights_model();
        return $r;
    }

    public function get_volumes_controller(){
        $vtc_model = new accueil_model();
        $r = $vtc_model->get_volumes_model();
        return $r;
    }

    public function get_moyennes_controller(){
        $vtc_model = new accueil_model();
        $r = $vtc_model->get_moyennes_model();
        return $r;
    }

    public function send_message_controller($nom, $mail, $contenu){
        $vtc_model = new accueil_model();
        $r = $vtc_model->send_message_model($nom, $mail, $contenu);
        return $r;
    }

    public function get_contact_controller(){
        $vtc_model = new accueil_model();
        $r = $vtc_model->get_contact_model();
        return $r;
    }


}

class presentation_controller extends vtc_controller{

    public function get_page_title_controller(){
        $vtc_model = new presentation_model();
        $r = $vtc_model->get_page_title_model();
        return $r;
    }

    public function get_pre_info_controller(){
        $vtc_model = new presentation_model();
        $r = $vtc_model->get_pre_info_model();
        return $r;
    }
}

class news_controller extends vtc_controller{

    public function get_page_title_controller(){
        $vtc_model = new news_model();
        $r = $vtc_model->get_page_title_model();
        return $r;
    }

    public function get_news_controller(){
        $vtc_model = new news_model();
        $r = $vtc_model->get_news_model();
        return $r;
    }

    public function get_news_info_controller($id_new){
        $vtc_model = new news_model();
        $r = $vtc_model->get_news_info_model($id_new);
        return $r;
    }
}


class inscription_controller extends vtc_controller{

    public function get_page_title_controller(){
        $vtc_model = new inscription_model();
        $r = $vtc_model->get_page_title_model();
        return $r;
    }

    public function get_pre_info_controller(){
        $vtc_model = new inscription_model();
        $r = $vtc_model->get_pre_info_model();
        return $r;
    }

    public function inscrir_t_controller($first, $last, $mobile, $adress, $email, $password, $usertype, $wilayas, $certification){
        $vtc_model = new inscription_model();
        $r = $vtc_model->inscrir_t_model($first, $last, $mobile, $adress, $email, $password, $usertype, $wilayas, $certification);
        return $r;
    }
    public function inscrir_c_controller($first, $last, $mobile, $adress, $email, $password, $usertype){
        $vtc_model = new inscription_model();
        $r = $vtc_model->inscrir_c_model($first, $last, $mobile, $adress, $email, $password, $usertype);
        return $r;
    }
}


class statistic_controller extends vtc_controller{

    public function get_page_title_controller(){
        $vtc_model = new statistic_model();
        $r = $vtc_model->get_page_title_model();
        return $r;
    }

    public function get_stat_info_controller(){
        $vtc_model = new statistic_model();
        $r = $vtc_model->get_stat_info_model();
        return $r;
    }

    public function get_annonce_controller(){
        $vtc_model = new statistic_model();
        $r = $vtc_model->get_annonce_model();
        return $r;
    }

    public function get_stat_controller(){
        $vtc_model = new statistic_model();
        $r = $vtc_model->get_stat_model();
        return $r;
    }
}

class connexion_controller extends vtc_controller{
    public function login($email, $password){
        $vtc_model = new connexion_model();
        $r = $vtc_model->login_model($email, $password);

        if ($r) {
             
            $_SESSION['userid'] = $r["Id_user"];

            $iduser = $_SESSION['userid'];
             
            // Welcome message
            $_SESSION['userrole'] = $r["Role"];
             
            // Page on which the user is sent
            // to after logging in
            
            if($r["Role"] == 'client') header("Location:accueil_l.php?id=$iduser");
            else header("Location:accueil_lt.php?id=$iduser");
        }
        else {
             
            header('location: wrong.php');
        }
        return $r;
    }
}

class accueil_l_controller extends accueil_controller{

    public function add_annonce($user, $title, $image, $desc, $wilaya1, $wilaya2, $type, $weight, $volume, $moyen){
        $vtc_model = new accueil_l_model();
        $r = $vtc_model->add_annonce($user, $title, $image, $desc, $wilaya1, $wilaya2, $type, $weight, $volume, $moyen);
        return $r;
    }
}

class profile_controller extends accueil_l_controller{
    public function update_controller($first, $last, $mobile, $adress, $email, $password, $id){
        $vtc_model = new profile_model();
        $r = $vtc_model->update_model($first, $last, $mobile, $adress, $email, $password, $id);
        return $r;
    }

    public function get_user_annonce_controller($id)
    {
        $vtc_model = new profile_model();
        $r = $vtc_model->get_user_annonce_model($id);
        return $r;
    }

    public function get_annonce_user_controller($id_ann){
        $vtc_model = new profile_model();
        $r = $vtc_model->get_annonce_user_model($id_ann);
        return $r;
    }

    public function update_an_controller($id, $title, $desc, $wilaya1, $wilaya2, $type, $weight, $volume, $moyen)
    {
        $vtc_model = new profile_model();
        $r = $vtc_model->update_an_model($id, $title, $desc, $wilaya1, $wilaya2, $type, $weight, $volume, $moyen);
        return $r;
    }

    public function archive_an_controller($id)
    {
        $vtc_model = new profile_model();
        $r = $vtc_model->archive_an_model($id);
        return $r;
    }
}
class login_controller extends vtc_controller{
    public function validate_controller($username, $password){
        $vtc_model = new login_model();
        $r = $vtc_model->validate_model();
        foreach($r as $user) {
		
            if(($user['adminname'] == $username) &&
                ($user['password'] == $password)) {
                    header("Location: adminpage.php");
                die();
            }
        }
    
        echo "<script language='javascript'>";
                echo "alert('WRONG INFORMATION')";
                echo "</script>";
                die();
        return $r;
    }
}

class admin_user_controller extends profile_controller{
    public function get_users_controller()
    {
        $vtc_model = new admin_user_model();
        $r = $vtc_model->get_users_model();
        return $r;
    }

    public function get_users_d_controller()
    {
        $vtc_model = new admin_user_model();
        $r = $vtc_model->get_users_d_model();
        return $r;
    }

    public function admin_update_controller($first, $last, $mobile, $adress, $email, $password, $id){
        $vtc_model = new admin_user_model();
        $r = $vtc_model->admin_update_model($first, $last, $mobile, $adress, $email, $password, $id);
        return $r;
    }

    public function admin_update_t_controller($first, $last, $mobile, $adress, $email, $password, $certification, $id){
        $vtc_model = new admin_user_model();
        $r = $vtc_model->admin_update_t_model($first, $last, $mobile, $adress, $email, $password, $certification, $id);
        return $r;
    }

    public function admin_deleteuser_controller($id){
        $vtc_model = new admin_user_model();
        $r = $vtc_model->admin_deleteuser_model($id);
        return $r;
    }

    public function admin_add_user_controller($role, $first, $last, $mobile, $adress, $email, $password){
        $vtc_model = new admin_user_model();
        $r = $vtc_model->admin_add_user_model($role, $first, $last, $mobile, $adress, $email, $password);
        return $r;
    }

    public function admin_add_user_t_controller($role, $first, $last, $mobile, $adress, $email, $password, $certification){
        $vtc_model = new admin_user_model();
        $r = $vtc_model->admin_add_user_t_model($role, $first, $last, $mobile, $adress, $email, $password, $certification);
        return $r;
    }
}

class admin_ann_controller extends profile_controller{
    public function get_annonces_controller(){
        $vtc_model = new admin_ann_model();
        $r = $vtc_model->get_annonces_model();
        return $r;
    }
    public function admin_deleteann_controller($id){
        $vtc_model = new admin_ann_model();
        $r = $vtc_model->admin_deleteann_model($id);
        return $r;
    }

    public function admin_update_an_controller($id, $title, $desc, $wilaya1, $wilaya2, $type, $weight, $volume, $moyen, $etat)
    {
        $vtc_model = new admin_ann_model();
        $r = $vtc_model->admin_update_an_model($id, $title, $desc, $wilaya1, $wilaya2, $type, $weight, $volume, $moyen, $etat);
        return $r;
    }
}

class admin_news_controller{
    public function admin_getnews_controller(){
        $vtc_model = new admin_news_model();
        $r = $vtc_model->admin_getnews_model();
        return $r;
    }

    public function admin_news_controller($id){
        $vtc_model = new admin_news_model();
        $r = $vtc_model->admin_news_model($id);
        return $r;
    }

    public function admin_updatenews_controller($id, $title, $description, $image){
        $vtc_model = new admin_news_model();
        $r = $vtc_model->admin_updatenews_model($id, $title, $description, $image);
        return $r;
    }

    public function admin_insertnews_controller($title, $description, $image){
        $vtc_model = new admin_news_model();
        $r = $vtc_model->admin_insertnews_model($title, $description, $image);
        return $r;
    }

    public function admin_deletenews_controller($id){
        $vtc_model = new admin_news_model();
        $r = $vtc_model->admin_deletenews_model($id);
        return $r;
    }
}

class admin_contenu_controller extends vtc_controller{
    public function get_presentation_controller(){
        $vtc_model = new admin_contenu_model();
        $r = $vtc_model->get_presentation_model();
        return $r;
    }

    public function set_presentation_controller($desc, $image, $video){
        $vtc_model = new admin_contenu_model();
        $r = $vtc_model->set_presentation_model($desc, $image, $video);
        return $r;
    }

    public function get_diapo_controller(){
        $vtc_model = new admin_contenu_model();
        $r = $vtc_model->get_diapo_model();
        return $r;
    }

    public function set_diapo_controller($id, $image, $link){
        $vtc_model = new admin_contenu_model();
        $r = $vtc_model->set_diapo_model($id, $image, $link);
        return $r;
    }

    public function get_messages_controller(){
        $vtc_model = new admin_contenu_model();
        $r = $vtc_model->get_messages_model();
        return $r;
    }


    public function set_contact_controller($location, $phone, $mail){
        $vtc_model = new admin_contenu_model();
        $r = $vtc_model->set_contact_model($location, $phone, $mail);
        return $r;
    }

    public function get_contact_controller(){
        $vtc_model = new admin_contenu_model();
        $r = $vtc_model->get_contact_model();
        return $r;
    }

}

?>