<?php
//################# CONTROLER PAGE blogPost#################
// - traitement des fonctions PDO pour récupération des donnée de l'article selectionné
// - traitement de l'affichage via blogpost.tpl.php
// - Renvoie de la page sur index.php



//################# valeur de title & description #################
$meta_description = 'les articles';
$meta_title = 'Articles';


//################# import fonctions PDO utilisation : blogPostById() & commentByBlogPost  #################
//  - une qui : récupère le contenu des articles & leurs auteurs
//  - une autre qui : récupère les commentaires des articles et leurs auteurs
include 'app/persistences/blogPostData.php';



//################# Si article existe pas/plus inlude page article HS + retour sommaire #################
//################# Sinon affichage view avec article concerner #################
//################# + stockage de la valeur de la PDO blogPostById dans $post #################
if (empty($post = blogPostById($pdo,$id))) {
    echo "L'ARTICLE N'EXISTE PLUS";
} else {
    include 'ressources/views/blogPost.tpl.php';
}



