<?php
 
class authentification {
    private $auth_model;
    public function __construct() {
    session_start();
    if (isset($_SESSION['nom'])) $GLOBALS['auth']=$_SESSION['nom'];
    require_once './model/authentification_model.php';
    $this->auth_model= new authentification_model();
   
    }
   
protected function quit()
{
$_SESSION['nom']="";
$GLOBALS['auth']="";
session_unset();
session_destroy();
 
}
 
protected function validate($user,$password)
{
$role=$this->auth_model->findUser($user,$password);
$result=false;
 
if ($role==1)
{
$_SESSION['nom']="admin";
$GLOBALS['auth']="admin";
$result=true;
}
if ($role==2)
{
$_SESSION['nom']="user";
$GLOBALS['auth']="user";
$result=true;
}
return $result;
}
}
 
 
?>
 