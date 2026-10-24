# PHP2Shell demo target — do NOT deploy long-term
# Pops with the UNMODIFIED public tool (github.com/alvarodh5/php2shell)
# against PHP 8.5.11 / mod_php / single prefork worker.
FROM php:8.5.11-apache
COPY php.ini /usr/local/etc/php/conf.d/zz-target.ini
COPY prefork.conf /etc/apache2/mods-available/mpm_prefork.conf
COPY index.php /var/www/html/index.php
EXPOSE 80
