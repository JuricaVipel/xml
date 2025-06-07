<!DOCTYPE html>
<html lang="hr">

<head>
  <meta charset="UTF-8" />
  <title>Događaji | The Place</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    .gumbi {
      display: flex;
      justify-content: center;
      gap: 16px;
      margin-top: 12px;
    }
  </style>
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

  <section>
    <h2 class="naslov-section">Nadolazeći događaji</h2>
    <div class="kartice">
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

      $slike = [
        "event1.jpg",
        "event2.jpg",
        "event3.jpg",
        "event4.jpg",
        "event5.jpg",
        "event6.jpg",
        "event7.jpg",
        "event8.jpg",
        "event9.jpg",
        "event10.jpg"
      ];

      $today = date("Y-m-d");
      $nadolazeci = [];
      $prosli = [];

      foreach ($xml->dogadaji->dogadaj as $d) {
        $datum = (string) $d->datum;
        if ($datum >= $today) {
          $nadolazeci[] = $d;
        } else {
          $prosli[] = $d;
        }
      }

      $i = 0;
      foreach ($nadolazeci as $d) {
        $img = isset($slike[$i]) ? $slike[$i] : "default.jpg";
        echo "<div class='kartica'>";
        echo "<img src='slike/$img' alt='Slika događaja' />";
        echo "<h3>{$d->naslov}</h3>";
        echo "<p>{$d->opis}</p>";
        echo "<p class='datum'><strong>Datum:</strong> {$d->datum}</p>";
        echo "<div class='gumbi'>";
        echo "<a class='cta-button' href='rezervacije.php?dogadaj=" . urlencode($d->naslov) . "'>Rezerviraj</a>";
        echo "</div>";
        echo "</div>";
        $i++;
      }
      ?>
    </div>
  </section>
</body>

</html>