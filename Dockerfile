FROM php:8.2-cli

# 1. Instalamos git, libzip y las extensiones necesarias
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    unzip \
    git \
    libzip-dev \
    && docker-php-ext-install pdo pdo_sqlite zip

# 2. Instalamos Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# 3. Le damos memoria ilimitada a Composer
ENV COMPOSER_MEMORY_LIMIT=-1

# 4. Instalamos dependencias ignorando requerimientos de plataforma 
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# 5. Permisos y ejecución
RUN chmod +x start.sh
CMD ["./start.sh"]