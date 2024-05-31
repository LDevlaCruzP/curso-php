<?php
# inicializar una nueva sesion de cURL; ch = cURL handle 
const API_URL = "https://whenisthenextmcufilm.com/api";
$ch = curl_init(API_URL);
// indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* Ejecutar la peticion
y guardamos el resultado */
$result = curl_exec($ch);  // forma 1 de llamar a api
// $result = file_get_contents(API_URL);  // forma 2 de llamar a api -- solo si se quiere hacer GET

$data = json_decode($result, true); // true para que de texto, pase a [{}]

curl_close($ch);

?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La proxima pelicula de marvel</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
</head>


<main>
  <section>
    <img src="<?= $data['poster_url']; ?>" width="300" alt="Poster de <?= $data['title']; ?>" style="border-radius: 16px;">
  </section>

  <hgroup>
    <h3><?= $data['title']; ?> se estrena en <?= $data['days_until']; ?> dias.</h3>
    <p>Fecha de estreno: <?= $data['release_date']; ?></p>
    <p>Siguiente pelicula: <?= $data['following_production']['title']; ?>
      el <?= $data['following_production']['release_date']; ?></p>
  </hgroup>
</main>



<style>
  :root {
    color-scheme: light dark;
  }

  body {
    display: grid;
    place-content: center;
  }

section {
  display: flex;
  justify-content: center;
  text-align: center;
}

hgroup {
  display: flex;
  flex-direction: column;
  justify-content: center;
  text-align: center;
}

img {
  margin: 0 auto;
}

</style>