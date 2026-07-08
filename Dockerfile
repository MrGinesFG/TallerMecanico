FROM php:8.2-cli

# 1. Instalamos dependencias de sistema, Node.js y npm
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    unzip \
    git \
    libzip-dev \
    curl \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install pdo pdo_sqlite zip

# 2. Instalamos Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# 3. Le damos memoria ilimitada a Composer
ENV COMPOSER_MEMORY_LIMIT=-1

# 4. Instalamos dependencias de PHP
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# 5. Instalamos dependencias de Node y compilamos los assets
RUN npm install
RUN npm run build

# 6. Permisos y ejecución
RUN chmod +x start.sh
CMD ["./start.sh"]