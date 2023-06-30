<?php

#j'appel mon PDO contenant les information de connexion a ma database
include 'config/database.php';

# ************************ #
// infos sur les différents types de requettes : // 
    # REQUETTE SQL EXEC permet d'executer une requette mais renvoie juste le nbre de ligne affectés (interessant pour : insert, delete, update)
    # REQUETTE SQL PREPARE permet de faire une requette préparer
    # REQUETTE SQL QUERY execute une requette SQL et retourne le resultat dans PDO statement
# ************************ #
# == Frontcontroller == #
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if (empty($action)) {
    $action = 'home';
}
## Ici je stock toutes la/les requettes GET['action'] dans la variable $action

$routes = [
    # Crée un tableau un tableau associatif dans lequel je stock toutes les root possible avec une clé définit
    //'' => 'home.php',
    'home' => 'app/controllers/homeController.php',
    'contact' => 'contact.php',
    'about' => 'about.php',
    // ajouter des 'clés' => 'routes' routes ici
];

if (!array_key_exists($action,$routes)) {
    //echo 'ERROR 404';
    #Si la valeur $action ne correspond a aucunes des clés dans $route ALORS 
    #l'action n'existe pas
    #affichage page 404
} else {
    # SINON SI LA VALEUR $action = est égale a des clés de route[]
    # la variable page prendra la valeur de la clés qui correspond a la variable $action dans le tableau $routes
    $page = $routes[$action];
    include $page;
}