<?php

/**
 * Reprenez le code de l'exercice précédent et transformez vos requêtes pour utiliser les requêtes préparées
 * la méthode de bind du paramètre et du choix du marqueur de données est à votre convenance.
 */

$nom = "Jocaille";
$prenom = "Amaury";
$email = "aezfzefzedf@gmail.com";
$password = "azerttt";
$adresse = "dfsfezf";
$codePostal = "5566";
$pays = "France";

$title = "titre10";
$prix = 56;
$descripCourte = "ezzafzefz";
$descripLongue = "ezefzfhuzhguziçhçihzeo";



try {
    $db = new PDO("mysql:host=localhost;dbname=table_test_php;charset=utf8", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stm = $db->prepare("
    INSERT INTO utilisateur (nom, prenom, email, password, adresse, code_postal, pays)
    VALUES (?,?,?,?,?,?,?)
");

    $stm->bindParam(1, $nom);
    $stm->bindParam(2, $prenom);
    $stm->bindParam(3, $email);
    $stm->bindParam(4, $password);
    $stm->bindParam(5, $adresse);
    $stm->bindParam(6, $codePostal);
    $stm->bindParam(7, $pays);

    $stm->execute();

    $stm2 = $db->prepare("
    INSERT INTO produit (titre, prix, description_courte, description_longue)
    VALUES (?,?,?,?)
");

    $stm2->bindParam(1, $title);
    $stm2->bindParam(2, $prix);
    $stm2->bindParam(3, $descripCourte);
    $stm2->bindParam(4, $descripLongue);


    $stm2->execute();
}
catch (PDOException $exception) {
    echo "Erreur" . $exception->getMessage();
}
