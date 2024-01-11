<?php
session_start();
require_once('src/model.php');

$userModel = new UserModel();
$error = '';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = trim($path, '/');
$segments = explode('/', $path);

$page = $segments[0] ?: 'dashboard';

switch ($page) {
    case 'dashboard':
        require_once('src/pages/dashboard/dashboard_controller.php');
        break;

    case 'gestion-comptes':
        require_once('src/pages/gestion_comptes/gestion_comptes_controller.php');
        break;

    case 'parametre':
        require_once('src/pages/parametre/parametre_controller.php');
        break;

    case 'profil':
        require_once('src/pages/profil/profil_controller.php');
        break;
    
    case 'discussion':
        require_once('src/pages/discussion/discussion_controller.php');
        break;

    case 'connexion':
        require_once('src/pages/connexion/connexion_controller.php');
        break;

    case 'mdp-forget':
        require_once('src/pages/mdp_forget/mdp_forget_controller.php');
        break;

    case 'reset':
        require_once('src/pages/reset_mdp/reset_mdp_controller.php');
        break;

    case 'actualite':
        require_once('src/pages/actualite/actualite_controller.php');
        break;

    case 'agenda':
        require_once('src/pages/agenda/agenda_controller.php');
        break;
    
    case 'vie-scolaire':
        require_once('src/pages/vie_scolaire/vie_scolaire_controller.php');
        break;
    
    case 'outils':
        require_once('src/pages/outils/outils_controller.php');
        break;
    
    case 'cours':
        require_once('src/pages/cours/cours_controller.php');
        break;
    
    case 'mentions-legales':
        require_once('src/pages/mentions_legales/mentions_legales.php');
        break;

    case 'start_conversation':
        require_once('src/pages/discussion/start_conversation.php');
        break;

    case 'send_message':
        require_once('src/pages/discussion/send_message.php');
        break;

    case 'upload-pdp':
        require_once('src/pages/parametre/upload.php');
        break;
}
?>
