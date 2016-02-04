#!/usr/bin/env bash
composer install
phpunit --bootstrap autoloader.php Tests/