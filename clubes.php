
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
            Times da Liga
            <?php
              $idchamp = $_GET['idchamp'];
              $uri = "http://api.football-data.org/v2/competitions/$idchamp/teams";
              $reqPrefs['http']['method'] = 'GET';
              $reqPrefs['http']['header'] = 'X-Auth-Token: c710e33b71fe486c949abef77404ed69';
              $stream_context = stream_context_create($reqPrefs);
              $response = file_get_contents($uri, false, $stream_context);
              $clubes = json_decode($response);
            ?>
          </p>
          <p class="subtitle">
            Desafio Dev Elo Verde
          </p>
        </div>
      </div>
    </section>
    <div class="box cta">
      <p class="has-text-centered">
        <a href="index.php">Retornar</a>
      </p>
    </div>
    <section class="container">
      <?php
        if(count($clubes->teams)) {
          $i = 0;
        foreach($clubes->teams as $Clubes){
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
            $idtime = $Clubes->id;
            echo '
            <a href = "time.php?idtime='.$idtime.'">
              <figure class="image is-128x128">
              <img src="<?=$Campeonato->emblemUrl?>" > 
              </figure>
            </a>';
            ?>
            </div>
            <div class="card-content has-text-centered">
              <div class="content">
                <h4><?=$Clubes->name?></h4>
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