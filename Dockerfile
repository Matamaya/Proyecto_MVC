FROM php:8.2-apache
# Instalar extensión PDO MySQL y activar mod_rewrite para el router
RUN docker-php-ext-install pdo pdo_mysql && a2enmod rewrite