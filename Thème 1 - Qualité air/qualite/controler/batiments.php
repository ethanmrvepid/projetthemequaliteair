<?php

class batiments extends authentification {

    private $model;

    public function __construct() {

        parent::__construct();

        require_once("./model/batiments_model.php");

        $this->model = new batiments_model();
    }

    public function index()
    {
        require_once("./view/vue_accueil.php");

        if ($GLOBALS['auth'] == "admin")
        {
            $batiments = $this->model->findBatiments();
            $data['batiments'] = $batiments;

            $sites = $this->model->findSites();
            $data['sites'] = $sites;

            require_once("./view/vue_batiments.php");
        }

        require_once("./view/vue_footer.php");
    }

    public function create()
    {
        require_once("./view/vue_accueil.php");

        if ($GLOBALS['auth'] == "admin")
        {
            if (!$this->model->create_batiment($_POST['nom_batiment'], $_POST['gps_lat'], $_POST['gps_lon'], $_POST['id_site'])) {
                $data['erreur'] = "impossible de creer ce batiment";
            }

            $batiments = $this->model->findBatiments();
            $data['batiments'] = $batiments;

            $sites = $this->model->findSites();
            $data['sites'] = $sites;

            require_once("./view/vue_batiments.php");
        }

        require_once("./view/vue_footer.php");
    }

    public function action()
    {
        require_once("./view/vue_accueil.php");

        if ($GLOBALS['auth'] == "admin")
        {
            if ($_POST['choix'] == 'suprimer_batiment')
            {
                if ($this->model->delete_batiment($_POST['id_batiments'])) {
                    $data['erreur'] = "impossible de supprimer ce batiment";
                }

                $batiments = $this->model->findBatiments();
                $data['batiments'] = $batiments;

                $sites = $this->model->findSites();
                $data['sites'] = $sites;

                require_once("./view/vue_batiments.php");
            }

            if ($_POST['choix'] == 'modifier_batiment')
            {
                $data['info'] = $this->model->findBatimentbyId($_POST['id_batiments']);
                $sites = $this->model->findSites();
                $data['sites'] = $sites;

                require_once("./view/vue_mod_batiments.php");
            }

            if ($_POST['choix'] == 'enregistrer_batiment')
            {
                $this->model->modif_batiment($_POST['id_batiments'], $_POST['nom_batiment'], $_POST['gps_lat'], $_POST['gps_lon'], $_POST['id_site']);

                $batiments = $this->model->findBatiments();
                $data['batiments'] = $batiments;

                $sites = $this->model->findSites();
                $data['sites'] = $sites;

                require_once("./view/vue_batiments.php");
            }
        }

        require_once("./view/vue_footer.php");
    }
}

?>
