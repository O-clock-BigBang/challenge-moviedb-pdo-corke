<?php
require('dbconnect.php');
// Utilisez la connexion à la base de données établie dans dbconnect.php


/*
- écrire les requêtes demandées (qui doivent toutes renvoyer un ensemble de films)
(commentez vos requêtes au fur et à mesure)
*/

// 1: Tous les films, par popularité décroissante
//$sql = "SELECT * FROM `movies` order by `popularity`DESC;";

// 2: les 20 films les plus récents
//$sql = "SELECT * FROM `movies` order by `release_date` DESC LIMIT 0, 20;";

// 3: les 10 films les plus populaires du genre Western
//$sql = "SELECT * FROM `movies`, `movie_genre`, `genres` where movie_genre.movie_id=movies.id and movie_genre.genre_id=genres.id and genres.name='western' order by `popularity` DESC LIMIT 0, 10;";

// 4: tous les films dont le nom contient "star"
//$sql = "select * from movies where title like '%star%';";

// 5: les films qui ne sont pas encore sortis
$sql = "SELECT * FROM `movies` where `release_date` > now() order by `release_date` DESC;";

/*
Récupérer le résultat de la requête
*/
$query = $db->query($sql);
$movies = $query->fetchAll();


/*
- écrire le code qui permet d'afficher le résultat de votre requête
*/
foreach ($movies as $movie) {
  //Exo 1
  //echo '<li>'.$movie['title'].' - Popularity Score : '. $movie['popularity'].'</li>';
  //Exo 2
  //echo '<li>'.$movie['title'].' - Release date : '. $movie['release_date'].'</li>';
  //EXO 3
  //echo '<li>'.$movie['title'].' - Genre : '. $movie['name'] . ' - Popularity : '. $movie['popularity'].'</li>';
  //Exo 4
  //echo '<li>'.$movie['title'].'</li>';
  //Exo 5
  echo '<li>'.$movie['title'].' - Release date : '. $movie['release_date'].'</li>';
}
