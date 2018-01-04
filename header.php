

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
      <a class="nav-link" href="http://localhost/~Geoffroy/CTrain/booktrain">Reserver Trains</a>
    </li>

  </ul>
  <form method="POST" action="search.php" class="form-inline my-2 my-lg-0 col col-sm-7">
      <input class="form-control col col-sm-2 mr-sm-2" type="text" placeholder="Départ" aria-label="Départ">
      <input class="form-control col col-sm-2 mr-sm-2" type="text" placeholder="Arrivée" aria-label="Arrivée">
      <input class="form-control col col-sm-3 mr-sm-2" type="text" placeholder="Heure d'arrivée" aria-label="Heure d'arrivée">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher un train</button>
  </form>
</div>
</nav>