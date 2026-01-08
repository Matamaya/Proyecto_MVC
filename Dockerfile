FROM php:8.2-apache
# Instalar extensión para conectar con PDO MySQL y activar mod_rewrite para el router (para que las URLs amigables (MVC) funcionen)
RUN docker-php-ext-install pdo pdo_mysql && a2enmod rewrite