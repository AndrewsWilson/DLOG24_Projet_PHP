<?php


//################# import header template #################
include 'header.tpl.php';


//################# $post stock les 10 dernier articles récupéré par lastBlogposts() #################
//################# SI $post est vide alors affichage "il n'y a pas d'articles" #################
if (empty($post = lastBlogPosts($pdo))) :
    ?>
    <div>il n'y a pas d'articles</div>
<?php
else :
//################# Sinon affichage de chaque index avec MEF HTML #################
    echo '<div class="d-flex flex-wrap justify-content-center">';
    foreach ($post as $key){
        ?>

                <div class="card m-4" style="width: 18rem;">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>
                    <div class="card-body">
                        <h5 class="card-title"><?=$key['title']?></h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div class="d-flex">
                            <a href="http://blog.local/?action=blogpost&id=<?=$key['id']?>" class="btn btn-primary">Voir article</a>
                            <a href="http://blog.local/?action=blogpostmodify&id=<?=$key['id']?>" class="ms-auto btn btn-success">Modifier article</a>
                        </div>
                    </div>
                </div>

        <?php
    }
    echo '</div>';
endif;

//################# import FOOTER template #################
include 'ressources/views/footer.tpl.php';