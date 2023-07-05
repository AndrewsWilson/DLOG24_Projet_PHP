<?php
//################# CONTROLER PAGE HOME#################
// - traitement des fonctions PDO pour récupération des 10 derniers articles VIA BlogPostData
// - traitement de l'affichage via home.tpl.php
// - Renvoie de la page sur index.php

//################# définition valeur meta title et meta description #################
$meta_title ="articles";
$meta_description ="liste des articles";


//################# imports fonctions PDO BDD #################
include 'app/persistences/blogPostData.php';



//################# affichage view 10 derniers articles#################
include 'ressources/views/home.tpl.php';

