<?php
require('dbconnect.php');
// Utilisez la connexion à la base de données établie dans dbconnect.php


/*
- écrire les requêtes demandées (qui doivent toutes renvoyer un ensemble de films)
(commentez vos requêtes au fur et à mesure)
*/

// 1: Tous les films, par popularité décroissante
$sql = "";

// 2: les 20 films les plus récents
$sql = "";

// 3: les 10 films les plus populaires du genre Western
$sql = "";

// 4: tous les films dont le nom contient "star"
$sql = "";

// 5: les films qui ne sont pas encore sortis
$sql = "";

/*
Récupérer le résultat de la requête
*/
$query = $db->query($sql);
$movies = $query->fetchAll();


/*
- écrire le code qui permet d'afficher le résultat de votre requête
*/
foreach ($movies as $movie) {

}
