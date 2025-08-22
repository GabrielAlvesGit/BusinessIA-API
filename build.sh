#!/bin/bash
# Instalar dependências do sistema (PHP e curl)
apt-get update
apt-get install -y php-cli php-mbstring php-xml php-sqlite3 curl unzip

# Instalar Composer
curl -sS https://getcomposer.org/installer -o /tmp/composer-installer.php
php /tmp/composer-installer.php --install-dir=/usr/local/bin --filename=composer

# Instalar dependências do Laravel e do frontend
composer install
npm install

# Compilar assets do frontend
npm run build

# Executar migrações e seeders
composer run-script vercel