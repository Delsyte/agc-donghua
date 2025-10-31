<?php

/**

 * Template Output satu judul Donghua

 * Variabel tersedia: $DATA (array)

 *  - title, cover, thumb, sinopsis, genres[], status, rating, episodes[], link

 */

// contoh include layout lama (opsional)

$header = __DIR__ . '/../header.php';

$footer = __DIR__ . '/../footer.php';

$tian   = __DIR__ . '/../tian.php';

if (file_exists($tian))   require_once $tian;

if (file_exists($header)) require_once $header;

?>

<?php if (!file_exists($header)): ?>

<!doctype html>

<html lang="id">

<head>

  <meta charset="utf-8">

  <title><?= htmlspecialchars($DATA['title']) ?></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>

    body{font-family:system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,'Helvetica Neue',Arial,sans-serif;margin:0;padding:20px;background:#0b0b0b;color:#f3f3f3}

    .wrap{max-width:980px;margin:0 auto}

    .head{display:flex;gap:16px;align-items:flex-start}

    .cover{width:200px;aspect-ratio:2/3;object-fit:cover;border-radius:8px}

    .meta{flex:1}

    .pill{display:inline-block;padding:6px 10px;border-radius:999px;background:#1e1e1e;margin:4px 6px 0 0}

    a{color:#7dd3fc;text-decoration:none}

    .eps{margin-top:24px}

    .eps a{display:block;padding:10px 12px;border-radius:8px;background:#141414;margin-bottom:8px}

    .grid{display:grid;grid-template-columns:1fr 1fr;gap:24px}

    @media(max-width:720px){.head{flex-direction:column}.grid{grid-template-columns:1fr}}

  </style>

</head>

<body><div class="wrap">

<?php endif; ?>

  <div class="head">

    <?php if(!empty($DATA['cover'])): ?>

      <img class="cover" src="<?= htmlspecialchars($DATA['cover']) ?>" alt="<?= htmlspecialchars($DATA['title']) ?>">

    <?php endif; ?>

    <div class="meta">

      <h1><?= htmlspecialchars($DATA['title']) ?></h1>

      <div>       <?php if(!empty($DATA['status'])): ?><span class="pill">Status: <?= htmlspecialchars(ucfirst($DATA['status'])) ?></span><?php endif; ?>

        <?php if(!empty($DATA['rating'])): ?><span class="pill">Rating: <?= htmlspecialchars($DATA['rating']) ?></span><?php endif; ?>

      </div>

      <?php if(!empty($DATA['genres'])): ?>

        <p><?php foreach($DATA['genres'] as $g): ?><span class="pill"><?= htmlspecialchars($g) ?></span><?php endforeach; ?></p>

      <?php endif; ?>

    </div>

  </div>

  <?php if(!empty($DATA['sinopsis'])): ?>

  <div class="grid" style="margin-top:20px">

    <div>

      <h3>Sinopsis</h3>

      <p><?= nl2br(htmlspecialchars($DATA['sinopsis'])) ?></p>

    </div>

    <div>

      <h3>Info</h3>

      <ul>

        <?php if(!empty($DATA['link'])): ?><li>Sumber: <a href="<?= htmlspecialchars($DATA['link']) ?>" rel="nofollow noopener" target="_blank">Anichin</a></li><?php endif; ?>

        <li>Diupdate: <?= htmlspecialchars(date('d M Y H:i', strtotime($DATA['updated_at'] ?? 'now'))) ?></li>

      </ul>

    </div>

  </div>

  <?php endif; ?>

  <?php if(!empty($DATA['episodes'])): ?>

  <div class="eps">

    <h2>Daftar Episode</h2>

    <?php foreach($DATA['episodes'] as $ep): ?>

      <a href="<?= htmlspecialchars($ep['link']) ?>" rel="nofollow noopener" target="_blank">

        <?= htmlspecialchars($ep['title']) ?><?php if(!empty($ep['ep'])): ?> — Ep <?= (int)$ep['ep'] ?><?php endif; ?>

      </a>

    <?php endforeach; ?>

  </div>

  <?php endif; ?>

<?php if (!file_exists($footer)): ?>

</div></body></html>

<?php else: ?>

<?php require_once $footer; ?>

<?php endif; ?>
