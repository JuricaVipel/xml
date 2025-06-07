<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Rezervacije | The Place</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
  <header>
    <img src="slike/logo.png" alt="The Place Logo" class="logo" />
    <nav>
      <ul>
        <li><a href="index.html">Početna</a></li>
        <li><a href="rezervacije.php">Rezervacije</a></li>
        <li><a href="dogadaji.php">Događaji</a></li>
        <li><a href="info.php">Info</a></li>
      </ul>
    </nav>
  </header>

  <section class="rez">
    <h2>Rezerviraj svoj stol</h2>
    <form method="post" action="">
      <?php $odabrani = isset($_GET['dogadaj']) ? $_GET['dogadaj'] : ''; ?>
      <input type="text" name="dogadaj" placeholder="Događaj" value="<?= htmlspecialchars($odabrani) ?>" required />
      <input type="text" name="ime" placeholder="Ime i prezime" required />
      <input type="number" name="broj_gostiju" placeholder="Broj gostiju" required min="1" />
      <button type="submit">Rezerviraj</button>
    </form>

    <?php

    libxml_use_internal_errors(true);
    $xml = simplexml_load_file("podaci.xml");
    if ($xml === false) {
      echo "<p>Greška u XML-u:</p><ul>";
      foreach (libxml_get_errors() as $error) {
        echo "<li>" . $error->message . "</li>";
      }
      echo "</ul>";
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $dogadaj = htmlspecialchars($_POST["dogadaj"]);
      $ime = htmlspecialchars($_POST["ime"]);
      $broj = htmlspecialchars($_POST["broj_gostiju"]);
      echo "<p>Hvala, $ime. Vaša rezervacija za $broj osoba na $dogadaj je zaprimljena.</p>";
    }

    ?>
  </section>
</body>

</html>