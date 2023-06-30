<?php 

# $value réucupère la valeur de la fonction lastBlogPosts
# Il y a ici une condition qui dit 
# ---- SI $value est vide ALORS -> affiche "il n'y a pas d'articles"
# ---- SINON il la valeur de chaques key du tableau $value

if (empty($value = lastBlogPosts($pdo))) :
    echo "il n'y a pas d'articles";
else :   
    foreach ($value as $key) {
        echo '<pre>';
        print_r($key);
        echo'</pre>';
    }
endif;