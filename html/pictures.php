<?php
// Fotogaleria: responzivna mriezka nahladov + lightbox (GLightbox, html/vendor/glightbox) namiesto popup okna viewer.php.
// Pouzitie zo stranok sekcii: nastavit $sub_class a $odkaz (cislo sekcie v site.php?x=) a require("pictures.php").
// Zoradenie: POST order_by 1 = autor A-Z, 2 = autor Z-A, 3 = datum vzostupne, 4 (predvolene) = datum zostupne.

$orderBy = isset($x) && in_array((string) $x, ['1', '2', '3', '4'], true) ? (string) $x : '4';
$orderSql = ['1' => 'author ASC, id ASC', '2' => 'author DESC, id ASC', '3' => 'date ASC, id ASC', '4' => 'date DESC, id DESC'][$orderBy];
$labels = ['1' => 'Mena A-Z', '2' => 'Mena Z-A', '3' => 'Dátumu 0-9', '4' => 'Dátumu 9-0'];

$fotky = psw_mysql_query("SELECT id, author, name, description, date, destination FROM pictures WHERE sub_class = '" . mysql_real_escape_string($sub_class) . "' ORDER BY " . $orderSql);
$pocet = $fotky ? $fotky->num_rows : 0;
?>
<div class="galeria-hlavicka">
  <form action="site.php?x=<?php echo htmlspecialchars((string) $odkaz, ENT_QUOTES, 'UTF-8'); ?>" method="post" class="galeria-zoradenie">
    <label for="order_by"><b>Zoradiť podľa:</b></label>
    <select name="order_by" id="order_by" onchange="this.form.submit()">
      <?php foreach ($labels as $k => $l): ?>
        <option value="<?php echo $k; ?>"<?php echo $k === $orderBy ? ' selected' : ''; ?>><?php echo $l; ?></option>
      <?php endforeach; ?>
    </select>
    <noscript><input type="submit" value=">"></noscript>
  </form>
  <span class="galeria-pocet"><?php echo $pocet; ?> fotiek</span>
</div>

<?php if ($pocet > 0): ?>
<div class="galeria">
  <?php $i = 0; while ($f = $fotky->fetch_assoc()): $i++;
    $big   = $f['destination'] . $f['name'];
    $small = $f['destination'] . 'small/' . $f['name'];
    $autor = htmlspecialchars((string) $f['author'], ENT_QUOTES, 'UTF-8');
    $popis = htmlspecialchars((string) $f['description'], ENT_QUOTES, 'UTF-8');
    $datum = date('d.m.Y', (int) $f['date']);
    $titulok = $autor . ($popis !== '' ? ' &ndash; ' . $popis : '');
  ?>
  <a class="galeria-polozka glightbox" href="<?php echo htmlspecialchars($big, ENT_QUOTES, 'UTF-8'); ?>"
     data-gallery="<?php echo htmlspecialchars((string) $sub_class, ENT_QUOTES, 'UTF-8'); ?>"
     data-title="<?php echo $titulok; ?>" data-description="<?php echo $datum . ' &middot; ' . $i . '/' . $pocet; ?>">
    <span class="galeria-foto"><img src="<?php echo htmlspecialchars($small, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo $autor; ?>" loading="lazy" decoding="async"></span>
    <span class="galeria-popis" title="<?php echo $titulok; ?>"><?php echo $popis !== '' ? $popis : $autor; ?></span>
  </a>
  <?php endwhile; ?>
</div>
<?php else: ?>
<p class="galeria-prazdna">Zatiaľ tu nie sú žiadne fotky.</p>
<?php endif; ?>
