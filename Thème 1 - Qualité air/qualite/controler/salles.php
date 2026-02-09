<?php

class salles extends authentification {

    private $model;

    public function __construct() {

        parent::__construct();

        require_once("./model/salles_model.php");

        $this->model = new salles_model();
    }

    public function index()
    {
        require_once("./view/vue_accueil.php");

        if ($GLOBALS['auth'] == "admin")
        {
            $salles = $this->model->findSalles();
            $data['salles'] = $salles;

            $batiments = $this->model->findBatiments();
            $data['batiments'] = $batiments;

            require_once("./view/vue_salles.php");
        }

        require_once("./view/vue_footer.php");
    }

    public function create()
    {
        require_once("./view/vue_accueil.php");

        if ($GLOBALS['auth'] == "admin")
        {
            if (!$this->model->create_salle($_POST['nom_salle'], $_POST['id_batiments'])) {
                $data['erreur'] = "impossible de creer cette salle";
            }

            $salles = $this->model->findSalles();
            $data['salles'] = $salles;

            $batiments = $this->model->findBatiments();
            $data['batiments'] = $batiments;

            require_once("./view/vue_salles.php");
        }

        require_once("./view/vue_footer.php");
    }

    public function action()
    {
        require_once("./view/vue_accueil.php");

        if ($GLOBALS['auth'] == "admin")
        {
            if ($_POST['choix'] == 'suprimer_salle')
            {
                if ($this->model->delete_salle($_POST['id_salles'])) {
                    $data['erreur'] = "impossible de supprimer cette salle";
                }

				$salles = $this->model->findSalles();
            	$data['salles'] = $salles;

                $batiments = $this->model->findBatiments();
                $data['batiments'] = $batiments;

                require_once("./view/vue_salles.php");
            }

    

            if ($_POST['choix'] == 'enregistrer_salle')
            {
                $salles = $this->model->findSalles();
                $data['salles'] = $salles;

                $batiments = $this->model->findBatiments();
                $data['batiments'] = $batiments;

                require_once("./view/vue_salles.php");
            }
        }

        require_once("./view/vue_footer.php");
    }
}

?>
