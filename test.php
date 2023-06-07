<?php
$apiUrl = 'https://andenne-formulaires.guichet-citoyen.be/api/forms/andenne-candidature-spontanee-etudiant-ete-2023/85/';
$accessId = 'phpadmin';
$accessKey = '47948345-69e6-4bd9-96b9-55d2613aa055';

$curl = curl_init();

// Configuration de la requête cURL
curl_setopt_array($curl, [
    CURLOPT_URL => $apiUrl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_USERPWD => "$accessId:$accessKey",
    CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
]);

// Exécution de la requête cURL
$response = curl_exec($curl);

// Vérification des erreurs
if (curl_errno($curl)) {
    $error = curl_error($curl);
    echo "Erreur lors de la requête : $error";
    // Gérer l'erreur selon vos besoins
} else {
    // Analyse de la réponse JSON
    $data = json_decode($response, true);

    // Afficher les données
    print_r($data['fields']['cv_file']['url']);
    $url = $data['fields']['cv_file']['content'];
?>

    <h1 style="color: red"><?= $url ?></h1>

<?php
}

// Fermeture de la requête cURL
curl_close($curl);

?>