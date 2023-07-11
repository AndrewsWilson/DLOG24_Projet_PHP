<?php

function lastBlogPosts(PDO $pdo)
{
    # je fait une requette SQL avec ma PDO stocker dans la variable $pdo en utilisant la methode prepare()
    # ma requette est stocker dans $request qui appel le fichier lastBlogPosts.sql
    # je récupère le statement dans une variable que j'ai apeller $statement
    $request = file_get_contents('database/lastBlogPosts.sql');
    $statment = $pdo->query(
        $request
    );
    # Si il y a une erreur dans ma requette le PDO statement peux me retourner "false"
    # Je met une condition pour si query est egale a false il me retourne un erreur SQL
    # utilisation de la méthode "errorInfo" pour récupéré les info d'erreur et les afficher a l'utilisateur
    if ($statment === false) {
        var_dump($pdo->errorInfo());
        die('Erreur SQL');
    }
    # Si le query fonctionne correctement on obtient un statement qui permet de representer une requette
    # Et les résultat associés
    # J'utilise ensuite la méthode fetchAll pour récupéré tout les résultats dans la variable $post
    $post = $statment->fetchAll();
    return $post;
}
###########################################################################################
function blogPostById(PDO $pdo, int $id) : array
{
    # je fait une requette SQL avec ma PDO stocker dans ma variable $pdo avec la méthode prepare
    # la méthode prepare execute une ma requette en récupérant la valeur de id dans le tableau définit dans
    # la fonction execute(), qui elle même récupère la valeur de id dans la variable $id qui stocke la valeur de
    # la requette $_GET['id']
    # ma requette est stocker dans $request qui est appel le fichier $blogPost.sql
    $request = file_get_contents('database/blogPost.sql');
    $statment = $pdo->prepare(
        $request
    );
    $statment->execute(['id' => $id]);
    # Si il y a une erreur dans ma requette le PDO statement me retournera "false"
    # Je met une condition pour si prepare est egale a false il me retourne un erreur SQL
    # utilisation de la méthode "errorInfo" pour récupéré les info d'erreur et les afficher a l'utilisateur
    if ($statment === false) {
        var_dump($pdo->errorInfo());
        die('Erreur SQL');
    }
    # Si le query fonctionne correctement on obtient un statement qui permet de representer une requette
    # Et les résultat associés
    # J'utilise ensuite la méthode fetchAll pour récupéré tout les résultats que je stock dans $post[0]
    # car cette fonction retournera toujours les donnée d'un seul article (celui dont l'id aura été demander)
    # j'ai rajouter une condition SI : valeur ne correspond pas a un id valide, retourne un tableau vide
    $post = $statment->fetchAll();
    if (empty($post)) return [];
    return $post[0];
}
//######################################################################################################################
function commentsByBlogPost(PDO $pdo, $id) : array
{
    # je fait une requette SQL dans $pdo avec la méthode "prepare" prépare et me retourne le resultat de ma requette
    # la méthode prepare execute une ma requette en récupérant la valeur de id dans le tableau définit dans
    # la fonction execute(), qui elle même récupère la valeur de id dans la variable $id qui stocke la valeur de
    # la requette $_GET['id']
    # ma requette est stocker dans $request qui est appel le fichier $blogPost.sql
    # je stocke le statement de ma PDO dans ma variable $post que return

    $request = file_get_contents('database/commentBlogPost.sql');
    $statment = $pdo->prepare(
        $request
    );
    $statment->execute(['id' => $id]);
    # Si il y a une erreur dans ma requette le PDO statement peux me retourner "false"
    # Je met une condition pour si query est egale a false il me retourne un erreur SQL
    # utilisation de la méthode "errorInfo" pour récupéré les info d'erreur et les afficher a l'utilisateur
    if ($statment === false) {
        var_dump($pdo->errorInfo());
        die('Erreur SQL');
    }
    # Si le query fonctionne correctement on obtient un statement qui permet de representer une requette
    # Et les résultat associés
    # J'utilise ensuite la méthode fetchAll pour récupéré tout les résultats
    $post = $statment->fetchAll();
    return $post;
}

//######################################################################################################################
function authorsByPseudo(PDO $pdo, string $pseudo, string $name, string $firstname) : int
{
    $request = file_get_contents('database/searchAuthor.sql');
    $statment = $pdo->prepare(
        $request
    );
    $statment->execute(['pseudo' => $pseudo]);
    if ($statment === false) {
        var_dump($pdo->errorInfo());
        die('Erreur SQL');
    }

    $post = $statment->fetchAll();
    if (empty($post)) {
        $request = file_get_contents('database/createAuthor.sql');
        $statment = $pdo->prepare(
            $request
        );
        $statment->execute(['pseudo' => $pseudo, 'name' => $name, 'firstname' => $firstname]);
//      fonction lastInsertId permettant de retourner le dernier ID crée dans la BDD
        return $pdo->lastInsertId();
    };
    return $post[0]['id'];
}

function createArticle(PDO $pdo, string $title, string $text, string $startDate, string $endDate, string $degree, string $id)
{
    $request = file_get_contents('database/creatArticle.sql');
    $statment = $pdo->prepare(
        $request
    );
    $statment->execute(['title'=>$title, 'text'=>$text, 'start_date'=>$startDate, 'end_date'=>$endDate, 'degree'=>$degree, 'authors_id'=>$id]);

    if ($statment === false) {
        var_dump($pdo->errorInfo());
        die('Erreur SQL');
    }
}

function selectBlogPostById(PDO $pdo, string $id) : array
{
    # je fait une requette SQL avec ma PDO stocker dans ma variable $pdo avec la méthode prepare
    # la méthode prepare execute une ma requette en récupérant la valeur de id dans le tableau définit dans
    # la fonction execute(), qui elle même récupère la valeur de id dans la variable $id qui stocke la valeur de
    # la requette $_GET['id']
    # ma requette est stocker dans $request qui est appel le fichier $blogPost.sql
    $request = file_get_contents('database/selectArticle.sql');
    $statment = $pdo->prepare(
        $request
    );
    $statment->execute(['id' => $id]);
    # Si il y a une erreur dans ma requette le PDO statement me retournera "false"
    # Je met une condition pour si prepare est egale a false il me retourne un erreur SQL
    # utilisation de la méthode "errorInfo" pour récupéré les info d'erreur et les afficher a l'utilisateur
    if ($statment === false) {
        var_dump($pdo->errorInfo());
        die('Erreur SQL');
    }
    # Si le query fonctionne correctement on obtient un statement qui permet de representer une requette
    # Et les résultat associés
    # J'utilise ensuite la méthode fetchAll pour récupéré tout les résultats que je stock dans $post[0]
    # car cette fonction retournera toujours les donnée d'un seul article (celui dont l'id aura été demander)
    # j'ai rajouter une condition SI : valeur ne correspond pas a un id valide, retourne un tableau vide
    $post = $statment->fetchAll();
    if (empty($post)) return [];
    return $post[0];
}

function updateArticle(PDO $pdo, string $title, string $text, string $startDate, string $endDate, string $degree, string $id)
{
    $request = file_get_contents('database/updateArticle.sql');
    $statment = $pdo->prepare(
        $request
    );
    $statment->execute(['title'=>$title, 'text'=>$text, 'start_date'=>$startDate, 'end_date'=>$endDate, 'degree'=>$degree, 'id'=>$id]);

    if ($statment === false) {
        var_dump($pdo->errorInfo());
        die('Erreur SQL');
    }
}

function deleteArticle(PDO $pdo, string $id)
{
    $request = file_get_contents('database/deleteArticle.sql');
    $statment = $pdo->prepare(
        $request
    );
    $statment->execute(['id'=>$id]);

    if ($statment === false) {
        var_dump($pdo->errorInfo());
        die('Erreur SQL');
    }
}