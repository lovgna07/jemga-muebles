FROM php:8.3-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite headers

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev libpq-dev libzip-dev \
    zip unzip git curl \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions (pdo_pgsql para PostgreSQL)
RUN docker-php-ext-install \
    pdo pdo_pgsql pgsql \
    mbstring exif bcmath gd zip pcntl

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copiar e instalar dependencias PHP primero (cache de capas)
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --ignore-platform-reqs

# Copiar todo el proyecto
COPY . .

# Terminar instalación de Composer
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Buildear assets Vite
RUN npm ci && npm run build && rm -rf node_modules

# Crear carpetas necesarias y permisos
RUN mkdir -p storage/app/public storage/framework/cache storage/framework/sessions \
        storage/framework/views storage/logs bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Configurar Apache para servir desde /public y escuchar en $PORT
COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

# Script de inicio
COPY docker/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

EXPOSE 10000

CMD ["/usr/local/bin/start.sh"]
