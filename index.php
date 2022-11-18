<?php
require "Database.class.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Intéraction avec une base de données en POO</title>
</head>
<body>

<?php
// On instancie la classe avec les infos requises (host, id utilisateur de la base de données, le nom de la base de données et le mot de passe utilisateur de la base de données)
$database = new Database("localhost", "root", "villes_france", "");

// Appel de la méthode pour se connecter à la BDD
$database->connect();
// // On crée une requête. En second paramètre, on peut éventuellement lui passer un tableau de paramètres qui vont être fournis à la fonction execute() et qui viendront remplacer les "?" ou les variables dans la requête.
$database->prepReq("SELECT * FROM departement");
// // On ramène les données
$departements = $database->fetchData();
// echo "<pre>";
// var_dump($departements[0]["departement_nom"]);
// echo "</pre>";

// On construit une liste de nom de départements avec un foreach
echo "<ul>";
foreach ($departements as $departement)
{
    $nomDepartement = $departement['departement_nom'];
    echo "<li>$nomDepartement</li>";
}
echo "</ul>";
?>

</body>
</html>