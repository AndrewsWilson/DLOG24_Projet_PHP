<?php
//################# valeur de title & description #################
$meta_description = 'Modification d\'article';
$meta_title = 'Modifier';
$action= "?action=blogpostmodify&id=$id";
$formTitle = "modifier article";

//#### variable stockant les valeurs  des input_post #####
include 'ressources/views/layouts/filter_input.php';

//#### appel des fonctions ####
include 'app/persistences/blogPostData.php';

//#### Conditions ####
//### SI $post ne renvoie rien car ID mauvaus ALORS => PAGE ERROR 404###
//#### SINON SI $_POST empty affiche le formulaire pour remplir
//#### SINON SI MODIFY est cliquer poste les données sur BDD et retour sur home
//#### SINON SUPRIMMER L'ARTICLE SELON ID STOCKER et retour sur home
if (empty($post = selectBlogPostById($pdo,$id))) {
    include 'ressources/views/error404.php';
} else if (empty($_POST)) {
    include 'ressources/views/blogPostUpdate.tpl.php';
} else if (!empty($modify)){
    updateArticle( $pdo, $title,  $text, $startDate, $endDate, $degree,  $id);
    header('Location: /');
} else {
    deleteArticle($pdo, $id);
    header('Location: /');
}

