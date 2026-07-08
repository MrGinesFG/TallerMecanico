#!/usr/bin/env bash

# Crear el archivo SQLite si no existe
touch database/database.sqlite

# Correr migraciones y seeders
php artisan migrate --force
php artisan db:seed --force

# Iniciar Laravel en el puerto que Render asigne dinámicamente (por defecto usa el 10000)
PORT=${PORT:-10000}
php artisan serve --host=0.0.0.0 --port=$PORT
