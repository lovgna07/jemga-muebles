#!/bin/bash
set -e

PORT="${PORT:-10000}"
echo "==> Puerto: $PORT"

# ── APP_KEY ───────────────────────────────────────────────────────────────────
if [ -z "$APP_KEY" ] || [[ "$APP_KEY" != base64:* ]]; then
    echo "==> Generando APP_KEY..."
    php artisan key:generate --force --no-interaction
fi

# ── Permisos ──────────────────────────────────────────────────────────────────
mkdir -p storage/app/public \
         storage/framework/{cache,sessions,views} \
         storage/logs \
         bootstrap/cache
chmod -R 775 storage bootstrap/cache

# ── Migraciones ───────────────────────────────────────────────────────────────
echo "==> Migraciones..."
php artisan migrate --force

# ── Seed inicial (idempotente) ────────────────────────────────────────────────
echo "==> Seed..."
php artisan db:seed --force

# ── Storage link ──────────────────────────────────────────────────────────────
echo "==> Storage link..."
php artisan storage:link --force 2>/dev/null || true

# ── Cache ─────────────────────────────────────────────────────────────────────
echo "==> Cache..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# ── Servidor ──────────────────────────────────────────────────────────────────
echo "==> Iniciando en http://0.0.0.0:$PORT"
exec php artisan serve --host=0.0.0.0 --port="$PORT"
