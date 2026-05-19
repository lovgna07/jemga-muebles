#!/bin/bash
set -e

echo "==> Configurando Apache en puerto ${PORT:-10000}..."
sed -i "s/Listen 80/Listen ${PORT:-10000}/" /etc/apache2/ports.conf
sed -i "s/*:80/*:${PORT:-10000}/" /etc/apache2/sites-enabled/*.conf 2>/dev/null || true

echo "==> Corriendo migraciones..."
php artisan migrate --force

echo "==> Sembrando datos iniciales (idempotente)..."
php artisan db:seed --force

echo "==> Creando storage link..."
php artisan storage:link || true

echo "==> Cacheando configuración..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "==> Iniciando Apache..."
apache2-foreground
