
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">


  
  </head>

  <body>

    <?php include 'header.php'; ?>

    <main role="main" class="container">

      <div class="starter-template" style="margin-top:100px;">
        <h1>Résultat pour la recherche de Train suivante</h1>
        <p class="lead">Départ : <?php echo $_GET['departure']; ?><br>
            Arrivée : <?php echo $_GET['arrival']; ?><br>
            Heure de départ : <?php echo $_GET['arrivalHour']; ?></p>
      </div>

    <div class="row">
        <div class="col col-md-12">
        <?php


        if(isset($_GET['departure']) || isset($_GET['arrival']) || isset($_GET['arrivalHour'])){
            if(!empty($_GET['arrivalHour'])){
                $horaire = explode(':', $_GET['arrivalHour']);
                $heureDepart = $horaire[0].$horaire[1];
            }else{
                $heureDepart = '';
            }
            $url = 'http://localhost:8080/RESTExo2/webresources/trains/search?departure='.$_GET['departure'].'&arrival='.$_GET['arrival'].'&arrivalhour='.$heureDepart;
            //echo $url;
            
          $file = file_get_contents($url);
          /*echo $file;
          print('<pre>');
          print_r($file);
          print('</pre>');*/
          $object = simplexml_load_string($file); 
          if(!empty($object)){
                echo '<table>';
                echo '<thead>';
                echo '<tr><th>Numéro train</th><th>Heure de départ</th><th>Ville de départ</th><th>Ville d\'arrivée</th></tr>';
                echo '</thead>';
                echo '<tbody>';
                foreach ($object->train as $key => $train) {
                  # code...
                  //echo '<tr><td>'.$object->numTrain . '</td><td>'.$object->heureDepart . '</td><td>'.$object->villeDepart . '</td><td>'.$object->villeArrivee . '</td></tr>';
                    echo '<tr><td>'.$train->numTrain . '</td><td>' .substr($train->heureDepart, 0, 2).':'.substr($train->heureDepart, -2) . '</td><td>'.$train->villeDepart . '</td><td>'.$train->villeArrivee . '</td></tr>';

                }
                echo '</tbody>';
                echo '</table>';
          }else{
              echo '<p>Aucun résultats</p>';
          }

          
        }

        ?>
         </div>
        </div>
        
    </main><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
  </body>
</html>
