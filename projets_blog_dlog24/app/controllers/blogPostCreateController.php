<?php
//################# CONTROLER PAGE create article #################
// - traitement des fonctions PDO pour vérification existence author sinon création et affecation ID
// - traitement de l'affichage via blogpostcreate.tpl.php
// - Renvoie de la page sur index.php

//################# valeur de title & description #################
$meta_description = 'Création d\'un nouvelle article';
$meta_title = 'Nouvelle article';

//################# variables stockant les valeurs  des input_post #################
include 'ressources/views/layouts/filter_input.php';
//################# récupération du fichier fonction PDO BDD #################
include 'app/persistences/blogPostData.php';

//#### condition SI $envoyer est cliquer = ####
//  Fonction authorsBypseudo =  recherche/création de l'auteur et renvoie son ID
//  Fonction createArticle = création de l'article et le rattache a l'ID de l'auteur
if($envoyer === 'Envoyer') {
    $id = authorsByPseudo($pdo, $pseudo, $name, $firstname);
    createArticle($pdo,$title,$text,$startDate,$endDate,$degree,$id);
}

//##### view du formulaire article ####
$action= "?action=create";
$formTitle = "Poster un article";
include 'ressources/views/blogPostCreate.tpl.php';

