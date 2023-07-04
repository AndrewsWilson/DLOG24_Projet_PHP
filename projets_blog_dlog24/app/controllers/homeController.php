<?php
// homeController est le controller de la page d'acceuil du blog, il s'occupe de
// récupéré les 10 derniers articles via le model (la fonction lastBlogPosts)
// envoie ces données dans home.tpl
// ####################################################################

// import HEADER
include 'ressources/views/header.tpl.php';
# j'importe le contenu de blogPostData.php qui contient ma fonction qui s'occupe de faire les requette SQL
include 'app/persistences/blogPostData.php';

# import du contenu de home.tps (le views) qui sert a afficher les données récupéré sur la BDD
include 'ressources/views/home.tpl.php';

// import FOOTER
include 'ressources/views/footer.tpl.php';