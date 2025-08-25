<?php
if (!is_dir('/tmp/cache')) {
    mkdir('/tmp/cache', 0755, true);
}
// Forward Vercel requests to normal index.php
require __DIR__ . '/../public/index.php';
