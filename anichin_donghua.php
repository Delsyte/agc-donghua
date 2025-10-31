<?php

ini_set('max_execution_time', 0);

date_default_timezone_set('Asia/Jakarta');

require_once __DIR__ . '/config.php';

// ===== AUTO DETECT DOMAIN =====

$CANDIDATES = [

  'https://anichin.team',

  'https://anichin.watch',

  'https://anichin.best',

  'https://anichin.date',

  'https://anichin.cafe'

];

function check_domain_alive($url) {

  $ctx = stream_context_create(['http'=>['timeout'=>10,'header'=>"User-Agent: Mozilla/5.0\r\n"]]);

  $html = @file_get_contents($url.'/category/donghua/', false, $ctx);

  if (!$html) return false;

  if (stripos($html, '404') !== false) return false;

  if (stripos($html, 'dialihkan ke Web Anichin') !== false) return false;

  return true;

}

$active = null;

foreach ($CANDIDATES as $base) {

  echo "🔍 Mengecek: $base\n";

  if (check_domain_alive($base)) {

    $active = $base;

    break;

  }

  sleep(1);

}

if ($active) {

  echo "✅ Domain aktif: $active\n";

  $BASE_URL = $active;

} else {

  echo "❌ Tidak ada domain aktif yang bisa diakses.\n";

  exit;

}

// lanjut ke bagian scraping dari versi sebelumnya…

require_once __DIR__ . '/core_scraper.php';