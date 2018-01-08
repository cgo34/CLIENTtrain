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

    <?php include 'header.php'; ?>

    <main role="main" class="container">
        <div class="row">
            <div class="col col-md-12">
                <?php

                  if($_POST['submit']){
                      if(isset($_POST['heureDepart']) && isset($_POST['numTrain']) && isset($_POST['villeArrivee']) && isset($_POST['villeDepart'])){

                          $url = "http://localhost:8080/RESTExo2/webresources/trains/";

                          $xml = '<?xml version="1.0" encoding="UTF-8"?>
                                      <train>
                                          <heureDepart>'.$_POST['heureDepart'].'</heureDepart>
                                          <numTrain>'.$_POST['numTrain'].'</numTrain>
                                          <villeArrivee>'.$_POST['villeArrivee'].'</villeArrivee>
                                          <villeDepart>'.$_POST['villeDepart'].'</villeDepart>
                                      </train>';

                          $ch = curl_init();
                          curl_setopt( $ch, CURLOPT_URL, $url );
                          curl_setopt( $ch, CURLOPT_POST, true );
                          curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
                          curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                          curl_setopt( $ch, CURLOPT_POSTFIELDS, $xml );
                          $result = curl_exec($ch);
                          curl_close($ch);

                          echo '<p>Le train N°'.$_POST['numTrain'].' à bien été ajouté !</p>';

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
