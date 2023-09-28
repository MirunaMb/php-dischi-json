<?php
// LEGGO IL JSON - che adesso sono stringhe,le metto in una variabile
$string_value = file_get_contents('./dischi.json');

// PRENDO LE STRINGHE E CON JSON_DECODE LE TRASFORMO IN ARRAY,e inglobo tutto in una variabile
//Metto true perche voglio ottenere un array associativo,per poter accedere piu facilmente all'array
$array_dischi = json_decode($string_value, true);

//  Invio come risposta JSON
header('Content-Type: application/json');
echo json_encode($array_dischi);
?>