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
                Integrantes do Time
            </p>
            <?php
                $idtime = $_GET['idtime'];
                $uri = "http://api.football-data.org/v2/teams/$idtime";
                $reqPrefs['http']['method'] = 'GET';
                $reqPrefs['http']['header'] = 'X-Auth-Token: c710e33b71fe486c949abef77404ed69';
                $stream_context = stream_context_create($reqPrefs);
                $response = file_get_contents($uri, false, $stream_context);
                $time = json_decode($response);
            ?>
          <p class="subtitle">
            Desafio Dev Elo Verde
          </p>
        </div>
      </div>
    </section>
    <div class="box cta">
      <p class="has-text-centered">
        <a href="index.php">Ligas</a><br><a href="clubes.php">Times</a>
      </p>
    </div>
    <section class="container">
      <div class="columns features">
        <div class="column">
          <div class="card">
            <div class="card-image has-text-centered">
              <figure class="image is-128x128">
                <img src="<?=$time->crestUrl?>">
              </figure>
              
            </div>
            <div class="card-content">
              <div class="content">
                <h4><?=$time->name?></h4>
                <table class="table table-striped">
                <tr>
                    <th>Nome</th>
                    <th>Posição</th>              
                </tr>
                <?php foreach ($time->squad as $player) {
                ?>
                <tr>
                    <td><?php echo $player->name; ?></td>
                    <td><?php if($player->position=='Goalkeeper') echo 'Goleiro'; 
                            else if($player->position=='Defender') echo 'Zagueiro';
                            else if($player->position=='Midfielder') echo 'Meio-Campo';
                            else if($player->position=='Attacker') echo 'Atacante';
                            
                    ?></td>       
                </tr>
                <?php } ?>
            </table>                
              </div>
            </div>
          </div>
        </div>
    </section>
  </body>
</html>