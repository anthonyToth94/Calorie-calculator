FROM php:8-apache
RUN cp /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/
