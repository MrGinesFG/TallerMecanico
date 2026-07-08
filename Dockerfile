FROM php:8.2-cli

# Instalar dependencias para SQLite y Composer
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    unzip \
    && docker-php-ext-install pdo pdo_sqlite

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Dar permisos de ejecución al script
RUN chmod +x start.sh

# Ejecutar el script de inicio
CMD ["./start.sh"]
