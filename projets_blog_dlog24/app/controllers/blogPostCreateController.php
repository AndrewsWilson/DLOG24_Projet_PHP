<?php
//################# CONTROLER PAGE create article #################
// - traitement des fonctions PDO pour vérification existence author sinon création et affecation ID
// - traitement de l'affichage via blogpostcreate.tpl.php
// - Renvoie de la page sur index.php


//################# valeur de title & description #################
$meta_description = 'N\'éhsitez pas a nous contacter !';
$meta_title = 'Nous contacter';



//################# variable stockant les valeurs  des input_post #################
$pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$startDate = filter_input(INPUT_POST, 'start_date', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$endDate = filter_input(INPUT_POST, 'end_date', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$degree = filter_input(INPUT_POST, 'degree', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$envoyer = filter_input(INPUT_POST, 'envoyer', FILTER_SANITIZE_FULL_SPECIAL_CHARS);



//################# récupération du fichier fonction PDO BDD #################
include 'app/persistences/blogPostData.php';



//################# condition SI $envoyer est cliquer = #################
//  Fonction authorsBypseudo =  recherche/création de l'auteur et renvoie son ID
//  Fonction createArticle = création de l'article et le rattache a l'ID de l'auteur
if($envoyer === 'Envoyer') {
    $id = authorsByPseudo($pdo, $pseudo, $name, $firstname);
    createArticle($pdo,$title,$text,$startDate,$endDate,$degree,$id);
}



//################ view du formulaire article ################
include 'ressources/views/blogPostCreate.tpl.php';

