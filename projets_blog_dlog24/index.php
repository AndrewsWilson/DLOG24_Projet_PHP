<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
#j'appel mon PDO contenant les information de connexion a ma database
include 'config/database.php';

# ************************ #
// infos sur les différents types de requettes : // 
    # REQUETTE SQL EXEC permet d'executer une requette mais renvoie juste le nbre de ligne affectés (interessant pour : insert, delete, update)
    # REQUETTE SQL PREPARE permet de faire une requette préparer
    # REQUETTE SQL QUERY execute une requette SQL et retourne le resultat dans PDO statement
# ************************ #


# == Frontcontroller == #
//#### stockage $_get['action'] dans action ####
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if (empty($action)) {
    $action = 'home';
}
if (isset($id)) {
    if (empty($id)) {
        $action = 'home';
    }
}


## Ici je stock toutes la/les requettes GET['action'] dans la variable $action


$routes = [
    # Crée un tableau un tableau associatif dans lequel je stock toutes les root possible avec une clé définit
    //'' => 'home.php',
    'home' => 'app/controllers/homeController.php',
    'blogpost' => 'app/controllers/blogPostController.php',
    'create' => 'app/controllers/blogPostCreateController.php',
    'blogpostmodify' => 'app/controllers/blogPostModifyController.php',
    'contact' => 'contact.php',
    'about' => 'about.php',

    // ajouter des 'clés' => 'routes' routes ici
];



//####SI $action != routes[] ALORS affichage page error404.php ####
//#### SINON $page -> routes[$action] affichage $page ####
if (!array_key_exists($action,$routes)) {
    echo 'ERROR 404';
} else {

    $page = $routes[$action];
    include $page;
}