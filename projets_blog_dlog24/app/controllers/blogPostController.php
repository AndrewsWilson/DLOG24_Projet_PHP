<?php
#################
include 'ressources/views/header.tpl.php';
#################

# j'importe le contenu de blogPostData.php qui contient mes deux fonction
# une qui : récupère le contenu des articles & leurs auteurs
# une autre qui : récupère les commentaires des articles et leurs auteurs
include 'app/persistences/blogPostData.php';

# j'importe le contenu de home.tpl.php qui s'occupe d'afficher le contenu que je lui ai demander.
include 'ressources/views/blogPost.tpl.php';

#################
include 'ressources/views/footer.tpl.php';
#################