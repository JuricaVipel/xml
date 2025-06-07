<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8" />
    <title>Info | The Place</title>
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

    <section>
        <h2>The Place DJ-evi</h2>
        <div class="kartice">
            <?php
            $xml = simplexml_load_file("podaci.xml");
            foreach ($xml->djevi->dj as $dj) {
                echo "<div class='kartica'>";
                echo "<h3>{$dj->ime}</h3>";
                echo "<p><strong>Žanr:</strong> {$dj->zanr}</p>";
                echo "<p><strong>Država:</strong> {$dj->drzava}</p>";
                echo "</div>";
            }
            ?>
        </div>
    </section>

    <section>
        <h2>Recenzije posjetitelja</h2>
        <div class="kartice">
            <?php
            $recenzije = simplexml_load_file("podaci.xml");
            foreach ($recenzije->recenzije->recenzija as $r) {
                echo "<div class='kartica'>";
                echo "<p><strong>{$r->autor}</strong> (Ocjena: {$r->ocjena}/5)</p>";
                echo "<p>{$r->tekst}</p>";
                echo "</div>";
            }
            ?>
        </div>
    </section>

</body>

</html>