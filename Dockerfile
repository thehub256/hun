# Use an official PHP 8.2 runtime as a parent image
FROM php:8.2-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the application code into the container
COPY . .

# Update package manager and install required system dependencies
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        gd \
        intl \
        mbstring \
        mysqli \
        pdo \
        pdo_mysql \
        zip \
        opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install Laravel application dependencies
RUN composer install --no-dev --optimize-autoloader

# Set proper permissions for Laravel storage and cache directories
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Expose port 80 to the outside world
EXPOSE 80

# Enable Apache rewrite module for Laravel
RUN a2enmod rewrite

# Define the command to run the Apache server
CMD ["apache2-foreground"]

