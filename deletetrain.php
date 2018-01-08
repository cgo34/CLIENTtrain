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
            <div class="row">
                <div class="col col-md-12">
                    <?php
echo 'here';
                      if($_POST['delete']){
                          echo 'here';
                          if(isset($_POST['numTrain'])){
                            echo 'here';
                              $url = "http://localhost:8080/RESTExo2/webresources/trains/deleteTrain-".$_POST['numTrain'];

                                $xml ='';
                                $ch = curl_init();
                                curl_setopt( $ch, CURLOPT_URL, $url );
                                //curl_setopt( $ch, CURLOPT_POST, true );
                                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
                                curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
                                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                                //curl_setopt( $ch, CURLOPT_POSTFIELDS, $xml );
                                $result = curl_exec($ch);
                                curl_close($ch);
                                 print_r($result);
                              echo '<p>Le train N°'.$_POST['numTrain'].' à bien été supprimé !</p>';

                          }
                      }


                      ?>
                </div>
            </div>
        </div>
    </main><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
  </body>
</html>
