<?php
require('dbconnect.php');
// Utilisez la connexion à la base de données établie dans dbconnect.php

/*
- Ecrivez la requête qui récupère la liste des genres
- éxécutez là (avec PDO)
- affichez le résultat sous forme d'une liste html
*/
$sql = "select * from genres;";
$query=$db->query($sql);
$genres = $query->fetchAll();
foreach($genres as $un_genre){
    echo '<li>' . $un_genre['name'] . '</li>';
}
/*
Reprenez cette requête, mais affichez aussi le nombre de films associés à chaque genre
*/

$sql = "SELECT name ,count(movies.id) as nb_films FROM `genres`, `movie_genre`, `movies` WHERE genres.id=movie_genre.genre_id and movie_genre.movie_id=movies.id GROUP BY genres.id;";
$query=$db->query($sql);
$genres = $query->fetchAll();
foreach($genres as $un_genre){
    echo '<li>' . $un_genre['name'] . ' - ' . $un_genre['nb_films'] . '</li>';
}
