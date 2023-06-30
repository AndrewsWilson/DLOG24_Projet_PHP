<?php

function lastBlogPosts(PDO $pdo)
{
    # je fait une requette SQL dans $pdo avec "query" qui me retourne retoure le resultat dans
    # je récupère le statement dans une variable que j'ai apeller $query
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
    # J'utilise ensuite la méthode fetchAll pour récupéré tout les résultats
    $post = $statment->fetchAll();
    return $post;
}
