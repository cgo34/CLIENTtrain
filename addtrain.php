<?php
$url = "http://localhost:8080/RESTExo2/webresources/trains/add";
/*$xml_str = "<train><heureDepart>0830</heureDepart><numTrain>TR111</numTrain><villeArrivee>Paris</villeArrivee><villeDepart>Montpellier</villeDepart></train>";
$post_data = array('xml' => $xml_str);
$stream_options = array(
    'http' => array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded' . "\r\n",
        'content' =>  http_build_query($post_data)));

$context  = stream_context_create($stream_options);
$response = file_get_contents($url, null, $context);
echo $response;*/



?>
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
        <h1>Ajouter un trains</h1>
        <p class="lead">Utilisez le formulaire ci dessous pour ajouter un train.</p>
      </div>
    <div class="col large-12">
        <form method="POST" action="">
            <p><label for="">Num Train</label><br>
            <input type="text" name="numTrain" value=""/></p>
            <p><label for="">Heure départ</label><br>
            <input type="text" name="heureDepart" value=""/></p>
            <p><label for="">Ville départ</label><br>
            <input type="text" name="villeDepart" value=""/></p>
            <p><label for="">Ville arrivée</label><br> 
            <input type="text" name="villeArrivee" value=""/></p>
            <input type="submit" name="submit" value="ajouter">
        </form>
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
            $header .= "Connection: open \r\n\r\n"; 
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

    </main><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
  </body>
</html>
