# Use official PHP image with Apache support
FROM php:8.1-apache

# Install required PHP extensions (e.g., for MySQL, email, etc.)
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite for clean URLs (optional, but useful)
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy project files into the container
COPY . /var/www/html/

# Set correct permissions (optional, but best practice)
RUN chown -R www-data:www-data /var/www/html

# Expose Apache port
EXPOSE 80
