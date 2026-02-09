<?php



class sites extends authentification {

	private $model;
       public function __construct() {

       parent::__construct();

       require_once("./model/sites_model.php");

       $this->model= new sites_model();

       



    

}

public function index()

{

require_once("./view/vue_accueil.php");

if ($GLOBALS['auth']=="admin")

       {

       $sites=$this->model->findSites();

       $data['sites']=$sites;

       require_once("./view/vue_sites.php");

       }

require_once("./view/vue_footer.php");

}



public function create()

{

require_once("./view/vue_accueil.php");

if ($GLOBALS['auth']=="admin")

       {

       if(!$this->model->create_site($_POST['nom_site'],$_POST['gps_lat'],$_POST['gps_lon'],$_POST['adresse'])) $data['erreur']="impossible de creer ce site";

       $sites=$this->model->findSites();

       $data['sites']=$sites;

       require_once("./view/vue_sites.php");

       }

require_once("./view/vue_footer.php");

}
public function action()

{


{

require_once("./view/vue_accueil.php");

if ($GLOBALS['auth']=="admin")

       {

       if($_POST['choix']=='suprimer_site')

       {

       if ($this->model->delete_site($_POST['id_site'])) $data['erreur']="impossible de supprimer ce site";

       

       $sites=$this->model->findSites();

       $data['sites']=$sites;

       require_once("./view/vue_sites.php");

       }

       }

       if($_POST['choix']=='modifier_site')

       {

       $data['info']=$this->model->findSitesbyId($_POST['id_site']);

       require_once("./view/vue_mod_sites.php");

       }

       if($_POST['choix']=='enregistrer_site')

       {

       $this->model->modif_site($_POST['id_sites'], $_POST['nom_site'],$_POST['gps_lat'],$_POST['gps_lon'],$_POST['adresse']);

       $sites=$this->model->findSites();

       $data['sites']=$sites;

       require_once("./view/vue_sites.php");

       }

       

       

require_once("./view/vue_footer.php");

}


}
}
?>
