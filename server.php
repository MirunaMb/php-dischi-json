<?php
// LEGGO IL JSON - che adesso sono stringhe,le metto in una variabile
$string_value = file_get_contents('./dischi.json');

// PRENDO LE STRINGHE E CON JSON_DECODE LE TRASFORMO IN ARRAY,e inglobo tutto in una variabile
//Metto true perche voglio ottenere un array associativo,per poter accedere piu facilmente all'array
$dischi_array = json_decode($string_value, true);

if (isset($_GET['choise'])) {
    $results = [
        "results" => $dischi_array[$_GET['choise']],
        "success" => true
    ];
} else {
    $results = [
        "results" => $dischi_array,
        "success" => true
    ];

}

//  Invio come risposta JSON
header('Content-Type: application/json');
echo json_encode($results);
?>