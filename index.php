<?php
$uri = 'http://api.football-data.org/v2/competitions';
$reqPrefs['http']['method'] = 'GET';
$reqPrefs['http']['header'] = 'X-Auth-Token: c710e33b71fe486c949abef77404ed69';
$stream_context = stream_context_create($reqPrefs);
$response = file_get_contents($uri, false, $stream_context);
$campeonatos = json_decode($response);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../images/fav_icon.png" type="image/x-icon">
    <title>Futebol</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="estilo.css">
  </head>
  <body>
    <section class="hero is-info is-small">
      <div class="hero-body">
        <div class="container has-text-centered">
          <p class="title">
            Competições disponíveis para consulta:
          </p>
          <p class="subtitle">
          Série A; Championship; Premier League; UEFA Champions League; European Championship; Ligue 1;	Bundesliga; Serie A(Itália);	Eredivisie; Primeira Liga; Primera Division; FIFA World Cup.
          </p>
        </div>
      </div>
    </section>
    <div class="box cta">
      <p class="has-text-centered">
        <span class="tag is-danger">GitHub</span> <a target="_blank" href="https://github.com/MarkDev96">Marcos Medeiros</a>
      </p>
    </div>
    <section class="container">
      <?php
        if(count($campeonatos->competitions)) {
          $i = 0;
        foreach($campeonatos->competitions as $Campeonato){
          $i++;
        if($i % 3 == 1) {
      ?>
      <div class="columns features">
      <?php 
        } 
      ?>
        <div class="column is-4">
          <div class="card">
            <div class="card-image has-text-centered">
            <?php

            $idchamp = $Campeonato->id;
            echo '
            <a href = "clubes.php?idchamp='.$idchamp.'">
              <figure class="image is-128x128">
                <img src="$Campeonato->emblemUrl" >
              </figure>
            </a>';
            ?>
            
              
            </div>
            <div class="card-content has-text-centered">
              <div class="content">
                <h4><?=$Campeonato->name?></h4>
              </div>
            </div>
          </div>
        </div>
      <?php if($i % 3 == 0) { ?>
      </div>
      <?php } } }
      ?>
    </section>
  </body>
</html>