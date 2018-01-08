<h2>Liste des trains</h2>
<p class="lead">Découvrez toutes les horaires et les destinations.</p>
<?php

$trains = file_get_contents('http://localhost:8080/RESTExo2/webresources/trains');
$object = simplexml_load_string($trains);            
echo '<table>';
echo '<thead>';
echo '<tr><th>Numéro train</th><th>Heure de départ</th><th>Ville de départ</th><th>Ville d\'arrivée</th></tr>';
echo '</thead>';
echo '<tbody>';
foreach ($object->train as $key => $train) {
  # code...
    if(strlen($train->heureDepart) == 4){
        echo '<tr><td>'.$train->numTrain . '</td><td>' .substr($train->heureDepart, 0, 2).':'.substr($train->heureDepart, -2) . '</td><td>'.$train->villeDepart . '</td><td>'.$train->villeArrivee . '</td></tr>';
    }else{
        echo '<tr><td>'.$train->numTrain . '</td><td>0' .substr($train->heureDepart, 0, 1).':'.substr($train->heureDepart, -2) . '</td><td>'.$train->villeDepart . '</td><td>'.$train->villeArrivee . '</td></tr>';
    }

}
echo '</tbody>';
echo '</table>';

?>