<?php 

# $post stocke les donnée récupéré(de la BDD) via la fonction lasstBlogPosts
# Il y a ici une condition qui dit 
# ---- SI $value est vide ALORS -> affiche "il n'y a pas d'articles"
# ---- SINON boucle foreach pour afficher chaques articles mis en page avec une HTML

if (empty($post = lastBlogPosts($pdo))) :
    ?>
    <div>il n'y a pas d'articles</div>
<?php
else :
    echo '<div class="d-flex flex-wrap justify-content-center">';
    foreach ($post as $key){
        ?>
            <a class="text-decoration-none text-dark p-4" href="http://blog.local/?action=blogpost&id=<?=$key['id']?>">
                <div class="card" style="width: 18rem;">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>
                    <div class="card-body">
                        <h5 class="card-title"><?=$key['title']?></h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div href="#" class="btn btn-primary">voir l'article</div>
                    </div>
                </div>
            </a>
        <?php
    }
    echo '</div>';
endif;
