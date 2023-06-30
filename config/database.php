<?php

$DB_CONFIG = [
    'DSN' => 'mysql:host=localhost;dbname=blog',
    'USER' => 'andrews',
    'PASS' => 'P22041985p'
];



try{
    #j'instancie ma PDO en la stockant dans ma variable $PDO que je pourrais utiliser plus tard
    $pdo = new PDO($DB_CONFIG['DSN'],$DB_CONFIG['USER'],$DB_CONFIG['PASS']);
}

catch(PDOException $pe)
{
    #si erreur il y a cela affichera erreur : $pe(qui contiendra le message d'erreur)
    echo 'ERREUR : ' . $pe->getMessage();
}
