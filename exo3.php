<?php
require('dbconnect.php');
// Utilisez la connexion à la base de données établie dans dbconnect.php


/*
Bonus SQL: requêtes variées!
Ecrire les requêtes suivantes, et les afficher sous la forme qui vous semble la plus pertinente (si pas d'idées... var_dump au moins, pour vérifier que c'est bon!)
*/

// 1: les 10 mots clés auxquels le plus de films sont associés
echo "exo3";
$sql = "SELECT name ,count(keywords.id) as nb_key FROM `keywords`, `movie_keyword`, `movies` WHERE keywords.id=movie_keyword.keyword_id and movie_keyword.movie_id=movies.id GROUP BY keywords.id ORDER BY nb_key DESC LIMIT 0, 10;";
$query=$db->query($sql);
$keys = $query->fetchAll();
foreach($keys as $un_key){
    //echo '<li>' . $un_key['name'] . ' - ' . $un_key['nb_key'] . '</li>';
}


// 2: pour tous les films, les noms et postes des personnes qui ont travaillé dessus (crew)
//      (title; person name; job)
echo "exo2";
$sql = "SELECT title, name, job_name FROM `movies`, `movie_crew`, `job`, `persons` WHERE movie_crew.movie_id=movies.id and movie_crew.person_id=persons.id and movie_crew.job_id=job.id ORDER BY movies.title;";
$query=$db->query($sql);
$keys = $query->fetchAll();
foreach($keys as $un_key){
    //echo '<li>' . $un_key['title'] . ' - ' . $un_key['name'] . ' - ' . $un_key['job_name'] . '</li>';
}

// 3: L'équipe de travail (avec jobs et departments) du film "back to the future" (ordonné par departments)
echo "exo3";
$sql = "SELECT title, name, job_name, dpt_name  FROM `movies`, `movie_crew`, `job`, `persons`, `department` WHERE movie_crew.movie_id=movies.id and movie_crew.person_id=persons.id and movie_crew.job_id=job.id and movies.title='back to the future' ORDER BY department.dpt_name;";
$query=$db->query($sql);
$keys = $query->fetchAll();
foreach($keys as $un_key){
    //echo '<li>' . $un_key['title'] . ' - ' . $un_key['name'] . ' - ' . $un_key['job_name'] . ' - ' . $un_key['job_name'] . '</li>';
}

// 4: les acteurs de la saga Star Wars (le titre contient "star wars")
echo "exo4";
$sql = "SELECT name from persons, movies, movie_crew where movie_crew.movie_id=movies.id and movie_crew.person_id=persons.id and movies.title like '%star wars%';
";
$query=$db->query($sql);
$keys = $query->fetchAll();
foreach($keys as $un_key){
    //echo '<li>' . $un_key['name'] . '</li>';
}
// 5: les 3 rôles les plus importants (= avec les order_credit les plus bas) du film Star Wars (I)
echo "exo5";
$sql = "SELECT name, character_name, order_credit from persons, movies, movie_cast where movie_cast.movie_id=movies.id and movies.id in (select id from movies where movies.title like '%star wars%') and movie_cast.person_id=persons.id order by order_credit ASC LIMIT 0,3;';
";
$query=$db->query($sql);
$keys = $query->fetchAll();
foreach($keys as $un_key){
    echo '<li>' . $un_key['name'] .' - ' . $un_key['character_name'] . '</li>';
}
