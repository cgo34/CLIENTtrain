
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
        <h1>Booking Train</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
      </div>

    <div class="row">
        <div class="col col-md-12">
        <?php


        if(isset($_POST['choosetrain'])){
          $file = file_get_contents('http://localhost:8080/RESTExo2/webresources/trains/numTrain-'.$_POST['choosetrain']);
          //echo $file;
          $object = simplexml_load_string($file); 

          echo '<table>';
          echo '<thead>';
          echo '<tr><th>Numéro train</th><th>Heure de départ</th><th>Ville de départ</th><th>Ville d\'arrivée</th></tr>';
          echo '</thead>';
          echo '<tbody>';
          //foreach ($object->train as $key => $train) {
            # code...
            echo '<tr><td>'.$object->numTrain . '</td><td>'.$object->heureDepart . '</td><td>'.$object->villeDepart . '</td><td>'.$object->villeArrivee . '</td></tr>';

          //}
          echo '</tbody>';
          echo '</table>';
        }

        ?>
         </div>
        </div>
        <div style="margin-bottom: 50px;"></div>
        <div class="row">
            <div class="col col-md-12">
                <form method="POST" action="">
                    <label for="">Num Train</label>
                    <input type="text" name="numTrain" value=""/>
                    <label for="">Nombre de place</label>
                    <input type="text" name="nombrePlace" value=""/>
                    <input type="submit" name="submit" value="ajouter">
              </form>
            </div>
        </div>
    </main><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
  </body>
</html>
