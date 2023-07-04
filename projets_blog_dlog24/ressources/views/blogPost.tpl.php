<?php
//# $post réucupère la valeur de la fonction blogPostById
//# Il y a ici une condition qui dit
//# ---- SI $post est vide ALORS -> affiche "l'article n'existe pas"
//# ---- SINON il affiche la valeur de chaques key du tableau $post

if (empty($post = blogPostById($pdo,$id))) {
    echo "L'ARTICLE N'EXISTE PLUS";
}
?>

<!--# $comment réucupère la valeur de la fonction commentByBlogPOst-->
<!--# Il y a ici une condition qui dit-->
<!--# ---- SI $comment est vide ALORS -> affiche "il n'y a aucuns commentaires"-->
<!--# ---- SINON il affiche la valeur de chaques key du tableau $comment-->

<div class="card container-sm w-75">
    <svg class="bd-placeholder-img card-img-top mt-3 px-5" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
    <div class="card-body">
        <h3 class="card-text px-5 text-center"><?=$post['title']?></h3>
        <p class="card-text px-5"><?=$post['text']?></p>
        <div class=" px-5 d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary"> Auteur : <?=$post['pseudo']?>  </button>
            </div>
            <div class="text-body-secondary"> Date de publication : <?=$post['start_date']?> </div>
        </div>
    </div>
</div>

<div class="my-5 text-center d-flex flex-wrap justify-content-center">
<?php
if (empty($comment = commentsByBlogPost($pdo,$id))) :
echo "Aucuns commentaires";
else :
foreach ($comment as $key) {
echo '<div class="w-75">';
    echo '<div>' . $key['pseudo'] . '</div>';
    echo '<div>' . $key['date'] . '</div>';
    echo '<div>' . $key['text'] . '</div>';
    echo '</div>';
}
endif;
?>
</div>
<div class="py-5 d-flex justify-content-center">
    <a href="http://blog.local/" type="button" class="btn btn-success">RETOUR AU SOMMAIRE</a>
</div>