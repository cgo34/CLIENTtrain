
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

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="http://localhost/~Geoffroy/CTrain/">BookingTrain.com</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="http://localhost/~Geoffroy/CTrain/">Accueil <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/~Geoffroy/CTrain/trains">Trains</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/~Geoffroy/CTrain/addtrain">Ajouter Trains</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/~Geoffroy/CTrain/booktrain">Reserver Trains</a>
          </li>
        
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher un train</button>
        </form>
      </div>
    </nav>

    <main role="main" class="container">

      <div class="starter-template" style="margin-top:100px;">
        <h1>Liste des trains</h1>
        <p class="lead">Découvrez toutes les horaires et les destinations.</p>
      </div>
    
        <div class="col large-12">
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
              echo '<tr><td>'.$train->numTrain . '</td><td>'.$train->heureDepart . '</td><td>'.$train->villeDepart . '</td><td>'.$train->villeArrivee . '</td></tr>';
               
            }
            echo '</tbody>';
            echo '</table>';

          ?>

        </div>
    </main><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
  </body>
</html>
