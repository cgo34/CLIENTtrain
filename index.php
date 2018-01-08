
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
        
      </div>
        <div class="row">
            <div class="col col-md-6">
                <?php include 'liste-trains.php'; ?>
            </div>
            <?php
            
            $Listoftrains = file_get_contents('http://localhost:8080/RESTExo2/webresources/trains');
            $object = simplexml_load_string($Listoftrains);     

            ?>
            <div class="col col-md-6">
                <h2>Ajouter un train</h2>
                <p class="lead">Utilisez le formulaire ci-dessus pour ajouter un train.</p>
                <form method="POST" action="addTrain.php">
                    <p><label for="numTrain">Num Train</label>
                    <input type="text" name="numTrain" value=""/>
                    <label for="heureDepart">Heure départ</label>
                    <input type="text" name="heureDepart" value=""/></p>
                    <p><label for="villeDepart">Ville départ</label>
                    <input type="text" name="villeDepart" value=""/>
                    <label for="villeArrivee">Ville arrivée</label>
                    <input type="text" name="villeArrivee" value=""/></p>
                    <input type="submit" name="add" value="ajouter">
                </form>
                <h2>Supprimer un train</h2>
                <form method="POST" action="deletetrain.php">
                    <label for="numTrain">Sélectionnez un train</label>
                    <select name="numTrain">
                      <option value="0">Sélectionnez un train</option>
                      <?php

                      foreach ($object->train as $key => $train) {
                        echo '<option value="'.$train->numTrain.'">'.$train->numTrain.'</option>';
                      }

                      ?>
                    </select>
                    <input type="submit" name="delete" value="Supprimer"/>
                </form>
            </div>
            <?php
            
            $Listoftrains = file_get_contents('http://localhost:8080/RESTExo2/webresources/trains');
            $object = simplexml_load_string($Listoftrains);     

            ?>
            <div class="row">
                <div class="col col-md-12">
                    <form method="POST" action="http://localhost/~Geoffroy/CTrain/viewtrain.php">
                        <h2>Réservez un train</h2>
                        <label for="choosetrain">Sélectionnez un train pour réserver votre/vos place(s)</label>
                        <select name="choosetrain">
                          <option value="0">Sélectionnez un train</option>
                          <?php
                          
                          foreach ($object->train as $key => $train) {
                            echo '<option value="'.$train->numTrain.'">'.$train->numTrain.'</option>';
                          }
                          
                          ?>
                        </select>
                        <input type="submit" value="Réserver"/>
                    </form>
                </div>
            </div>
        </div>

        
        </div>
    </main><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
  </body>
</html>
