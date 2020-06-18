<?php
    exec('composer dump-autoload');
    exec('php artisan route:clear');
    exec('php artisan config:clear');
    exec('php artisan cache:clear');
?>
