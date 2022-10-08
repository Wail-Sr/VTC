<?php
require_once('../Model/model.php');
require_once('../Controller/controller.php');
session_start();
class vtc_model{

    protected $dbname='TDW';
    protected $host = '127.0.0.1';
    protected $user = 'root';
    protected $password = '';

    protected function connection($dbname, $host, $user, $password){
        $dns = "mysql:dbname=$dbname; host=$host;";
        try{
            $c = new PDO($dns, $user, $password);
            $c->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $c->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
        }
        catch(PDOException $ex){
            printf("erreur de connextion à la base de donnée", $ex->getMessage());
            exit();
        }
        
        return $c;
    }

    protected function disconnection(&$c){
        $c = null;
    }

    protected function request($c, $r){
        return $c->query($r);
    }

    public function get_page_name_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from menu";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function get_copyrights_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from Copyrights";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function get_wilaya_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from wilayas";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function get_user_model($idsuer){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from users where Id_user='$idsuer'";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r->fetch();
    }

}

class accueil_model extends vtc_model{

    public function get_page_title_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT Titre_page from titre_page where Role='Accueil'";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r->fetch();
    }
    

    public function get_img_src_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from diaporama";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function get_annonce_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from annonce";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function get_annonce_details_model($id_ann){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT *,weights.Weight,type_transport.Type,transport.Transport,volume.Volume from annonce
        INNER JOIN weights ON annonce.Weight=weights.Id_type 
        INNER JOIN type_transport ON annonce.Type=type_transport.Id_type
        INNER JOIN transport ON annonce.Transport=transport.Id_transport
        INNER JOIN volume ON annonce.Volume=volume.Id_volume
        WHERE annonce.Id_annonce='$id_ann'";    
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        $this->update_views($id_ann);
        return $r->fetch();
    }


    public function get_annonce_wilaya_model($id_wilaya){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT nom from wilayas where id='$id_wilaya'";   
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r->fetch();
    }

    public function update_views($id_ann){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $stm = "SELECT Views from annonce where Id_annonce='$id_ann'";
        $req = $this->request($c, $stm);
        $req = $req->fetch();
        $req = $req[0]+1;
        $stm = "UPDATE annonce SET Views='$req' WHERE Id_annonce='$id_ann'";
        $req = $this->request($c, $stm);
        $this->disconnection($c);
        return $req->fetch();
    }

    public function get_type_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from type_transport";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function get_weights_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from weights";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function get_volumes_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from volume";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function get_moyennes_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from transport";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function send_message_model($nom, $mail, $contenu){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $datee = time();
        $currentDate = date('Y-m-d', $datee);
        $qtf = "INSERT INTO messages (name, email, message, date) VALUES ('$nom', '$mail', '$contenu', '$currentDate')";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function get_contact_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from contact";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r->fetch();
    }
}


class presentation_model extends vtc_model{

    public function get_page_title_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT Titre_page from titre_page where Role='Presentation'";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r->fetch();
    }

    public function get_pre_info_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from presentation";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r->fetch();
    }
}

class news_model extends vtc_model{

    public function get_page_title_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT Titre_page from titre_page where Role='News'";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r->fetch();
    }

    public function get_news_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from news";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function get_news_info_model($id_new){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from news WHERE Id='$id_new'";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        $this->update_views($id_new);
        return $r->fetchall();
    }

    public function update_views($id_new){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $stm = "SELECT Views from news where Id='$id_new'";
        $req = $this->request($c, $stm);
        $req = $req->fetch();
        $req = $req[0]+1;
        $stm = "UPDATE news SET Views='$req' WHERE Id='$id_new'";
        $req = $this->request($c, $stm);
        $this->disconnection($c);
        return $req->fetch();
    }
}

class inscription_model extends vtc_model{

    public function get_page_title_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT Titre_page from titre_page where Role='Inscription'";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r->fetch();
    }

    public function inscrir_t_model($first, $last, $mobile, $adress, $email, $password, $usertype, $wilayas, $certification){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);

        $qtf = "INSERT INTO users (Role,First_Name, Last_Name, Phone, Adress, Email, Password, Certification)
        VALUES ('$usertype', '$first', '$last', '$mobile', '$adress', '$email', '$password', '$certification')";

        $r = $this->request($c, $qtf);

        $last_id = $c->lastInsertId();

        $qtfid = "SELECT * from users where Id_user='$last_id'";

        $rid = $this->request($c, $qtfid);

        foreach ($rid as $rrr) {
            $klm = $rrr['Id_user'];
        }

        foreach ($wilayas as $wilaya) {

            $qtf = "INSERT INTO transp_wilaya (User_id, Wilaya_id)
            VALUES ('$klm', '$wilaya')";

            $r = $this->request($c, $qtf);
        }

        
        $this->disconnection($c);
    }

    public function inscrir_c_model($first, $last, $mobile, $adress, $email, $password, $usertype){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);

        $qtf = "INSERT INTO users (Role,First_Name, Last_Name, Phone, Adress, Email, Password)
        VALUES ('$usertype', '$first', '$last', '$mobile', '$adress', '$email', '$password')";

        $r = $this->request($c, $qtf);
        $this->disconnection($c);
    }
}

class statistic_model extends vtc_model{

    public function get_page_title_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT Titre_page from titre_page where Role='Statistique'";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r->fetch();
    }

    public function get_stat_info_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from statistics";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r->fetch();
    }

    public function get_annonce_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from annonce ORDER BY Views DESC";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function get_stat_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from statistics";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r->fetch();
    }
}


class connexion_model extends vtc_model{

    public function login_model($email, $password){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from users WHERE Email='$email' AND Password='$password'";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r->fetch();
    }
}

class accueil_l_model extends accueil_model{
    public function add_annonce($user, $title, $image, $desc, $wilaya1, $wilaya2, $type, $weight, $volume, $moyen){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "INSERT INTO annonce (User_id, Title, Description, image, Start, End, Type, Weight, Volume, Transport)
        VALUES ('$user', '$title', '$desc', '$image', '$wilaya1', '$wilaya2', '$type', '$weight', '$volume', '$moyen')";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }
}

class profile_model extends accueil_l_model{
    public function update_model($first, $last, $mobile, $adress, $email, $password, $id){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "UPDATE users SET First_Name='$first', Last_Name='$last', Phone='$mobile', Adress='$adress', Email='$email', Password='$password' WHERE Id_user='$id'";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function get_user_annonce_model($id)
    {
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from annonce WHERE User_id='$id'";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function get_annonce_user_model($id_ann){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT *,weights.Weight,type_transport.Type,transport.Transport,volume.Volume from annonce
        INNER JOIN weights ON annonce.Weight=weights.Id_type 
        INNER JOIN type_transport ON annonce.Type=type_transport.Id_type
        INNER JOIN transport ON annonce.Transport=transport.Id_transport
        INNER JOIN volume ON annonce.Volume=volume.Id_volume
        WHERE annonce.Id_annonce='$id_ann'";    
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r->fetch();
    }
    public function update_an_model($id, $title, $desc, $wilaya1, $wilaya2, $type, $weight, $volume, $moyen)
    {
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "UPDATE annonce SET Title='$title', Description='$desc', Type='$type', Start='$wilaya1', End='$wilaya2', Weight='$weight', Volume='$volume', Transport='$moyen', etat='non_valide' WHERE Id_annonce='$id'";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function archive_an_model($id)
    {
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "UPDATE annonce SET etat='archive' WHERE Id_annonce='$id'";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }
}

class login_model extends vtc_model{
    public function validate_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from adminlogin";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }
}

class admin_user_model extends profile_model{
    public function get_users_model()
    {
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from users";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function get_users_d_model()
    {
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from users WHERE Role='transporte' AND Certification='2'";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function admin_update_model($first, $last, $mobile, $adress, $email, $password, $id){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "UPDATE users SET First_Name='$first', Last_Name='$last', Phone='$mobile', Adress='$adress', Email='$email', Password='$password' WHERE Id_user='$id'";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function admin_update_t_model($first, $last, $mobile, $adress, $email, $password, $certification, $id){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "UPDATE users SET First_Name='$first', Last_Name='$last', Phone='$mobile', Adress='$adress', Email='$email', Password='$password', Certification='$certification' WHERE Id_user='$id'";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function admin_deleteuser_model($id){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "DELETE FROM users WHERE Id_user='$id'";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);

        $cnx = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtff = "DELETE FROM annonce WHERE User_id='$id'";
        $rq = $this->request($cnx, $qtff);
        $this->disconnection($cnx);

        return $r;
    }

    public function admin_add_user_t_model($role, $first, $last, $mobile, $adress, $email, $password, $certification){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "INSERT INTO users (Role,First_Name, Last_Name, Phone, Adress, Email, Password, Certification)
        VALUES ('$role', '$first', '$last', '$mobile', '$adress', '$email', '$password', $certification)";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);

        return $r;
    }

    public function admin_add_user_model($role, $first, $last, $mobile, $adress, $email, $password){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "INSERT INTO users (Role,First_Name, Last_Name, Phone, Adress, Email, Password)
        VALUES ('$role', '$first', '$last', '$mobile', '$adress', '$email', '$password')";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);

        return $r;
    }
}

class admin_ann_model extends profile_model{
    public function get_annonces_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from annonce";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function admin_deleteann_model($id){
        $cnx = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtff = "DELETE FROM annonce WHERE Id_annonce='$id'";
        $rq = $this->request($cnx, $qtff);
        $this->disconnection($cnx);
    }

    public function admin_update_an_model($id, $title, $desc, $wilaya1, $wilaya2, $type, $weight, $volume, $moyen, $etat)
    {
        $prix = rand($wilaya1*10000,$wilaya2*10000);
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "UPDATE annonce SET Title='$title', Description='$desc', Type='$type', Start='$wilaya1', End='$wilaya2', Weight='$weight', Volume='$volume', Transport='$moyen', etat='$etat', Price='$prix' WHERE Id_annonce='$id'";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }
}


class admin_news_model extends vtc_model{
    public function admin_getnews_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from news";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function admin_insertnews_model($title, $description, $image){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $datee = time();
        $currentDate = date('Y-m-d', $datee);
        $qtf = "INSERT INTO news (Image, Title, Description, Date)
        VALUES ('$image', '$title', '$description', '$currentDate')";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function admin_deletenews_model($id){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "DELETE FROM news WHERE Id='$id'";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function admin_news_model($id){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * FROM news WHERE Id='$id'";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r->fetch();
    }

    public function admin_updatenews_model($id, $title, $description, $image){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "UPDATE news SET Title='$title', Description='$description', Image='$image' WHERE Id='$id'";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }
}

class admin_contenu_model extends vtc_model{

    public function get_presentation_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * FROM presentation";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r->fetch();
    }

    public function set_presentation_model($desc, $image, $video){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "UPDATE presentation SET Video='$video', Description='$desc', Image='$image' WHERE Id_presentation='1'";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function get_diapo_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * FROM diaporama";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function set_diapo_model($id, $image, $link){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "UPDATE diaporama SET Link='$link', Src='$image' WHERE Id_image='$id'";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function get_messages_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * FROM messages";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }

    public function get_contact_model(){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "SELECT * from contact";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r->fetch();
    }

    public function set_contact_model($location, $phone, $mail){
        $c = $this->connection($this->dbname, $this->host, $this->user, $this->password);
        $qtf = "UPDATE contact SET location='$location', phone='$phone', mail='$mail' WHERE Id_contact='1'";
        $r = $this->request($c, $qtf);
        $this->disconnection($c);
        return $r;
    }
}

?>