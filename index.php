
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
            <div class="col col-md-6">
                <h1>Ajouter un train</h1>
                <p class="lead">Utilisez le formulaire ci-dessus pour ajouter un train.</p>
                <form method="POST" action="">
                    <p><label for="numTrain">Num Train</label>
                    <input type="text" name="numTrain" value=""/>
                    <label for="heureDepart">Heure départ</label>
                    <input type="text" name="heureDepart" value=""/></p>
                    <p><label for="villeDepart">Ville départ</label>
                    <input type="text" name="villeDepart" value=""/>
                    <label for="villeArrivee">Ville arrivée</label>
                    <input type="text" name="villeArrivee" value=""/></p>
                    <input type="submit" name="submit" value="ajouter">
                </form>
            </div>
            <div class="row">
                <div class="col col-md-12">
                    <form method="POST" action="http://localhost/~Geoffroy/CTrain/viewtrain.php">
                        <h2>Réservez un train</h2>
                        <label for="choosetrain">Sélectionnez un train pour réserver votre/vos place(s)</label>
                        <select name="choosetrain">
                          <option value="TR123">TR 123</option>
                          <option value="TR127">TR 127</option>
                          <option value="TR129">TR 129</option>
                        </select>
                        <input type="submit" value="Réserver"/>
                    </form>
                </div>
            </div>
        </div>

        <?php

        if($_POST['submit']){
            if(isset($_POST['heureDepart']) && isset($_POST['numTrain']) && isset($_POST['villeArrivee']) && isset($_POST['villeDepart'])){
                echo $_POST['numTrain'];
                echo $_POST['heureDepart'];
                echo $_POST['villeDepart'];
                echo $_POST['villeArrivee'];

                /*$url = "http://localhost:8080/RESTExo2/webresources/trains/add";
                $xml_str = "<train><heureDepart>".$_POST['heureDepart']."</heureDepart><numTrain>".$_POST['numTrain']."</numTrain><villeArrivee>".$_POST['villeArrivee']."</villeArrivee><villeDepart>".$_POST['villeDepart']."</villeDepart></train>";
                $post_data = array('xml' => $xml_str);
                $stream_options = array(
                    'http' => array(
                        'method'  => 'POST',
                        'header'  => 'Content-type: application/x-www-form-urlencoded' . "\r\n",
                        'content' =>  http_build_query($post_data)));

                $context  = stream_context_create($stream_options);
                $response = file_get_contents($url, null, $context);
                echo $response;*/

                $url = "http://localhost:8080/RESTExo2/webresources/trains/";

                $post_string = '<?xml version="1.0" encoding="UTF-8"?>
                                <train>
                                    <heureDepart>'.$_POST['heureDepart'].'</heureDepart>
                                    <numTrain>'.$_POST['numTrain'].'</numTrain>
                                    <villeArrivee>'.$_POST['villeArrivee'].'</villeArrivee>
                                    <villeDepart>'.$_POST['villeDepart'].'</villeDepart>
                                </train>';


                $header  = "POST HTTP/1.0 \r\n";
                $header .= "Content-type: application/xml \r\n";
                $header .= "Content-length: ".strlen($post_string)." \r\n";
                $header .= "Content-transfer-encoding: text \r\n";
                $header .= "Connection: close \r\n\r\n"; 
                $header .= $post_string;
                print('<pre>');
                print_r($header);
                print('</pre>');
                echo '<hr>';
                $ch = curl_init();
                print('<pre>');
                print_r($ch);
                print('</pre>');
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_TIMEOUT, 4);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $header);
                echo '<hr>';
                $data = curl_exec($ch); 
                print('<pre>');
                print_r($data);
                print('</pre>');
                if(curl_errno($ch))
                    print curl_error($ch);
                else
                    curl_close($ch);
            }
        }


        ?>
        </div>
    </main><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
  </body>
</html>
