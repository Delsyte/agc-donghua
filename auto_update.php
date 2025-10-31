<?php

ini_set('max_execution_time', 0);

date_default_timezone_set('Asia/Jakarta');

require_once __DIR__ . '/config.php';

// jalankan mode ringan

$MAX_PAGES = 5;

$_GET['mode'] = 'daily';

require_once __DIR__ . '/anichin_donghua.php';