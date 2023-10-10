FROM php:8.1-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y libpng-dev libzip-dev zip unzip git && \
    docker-php-ext-install pdo_mysql bcmath calendar ctype curl fileinfo filter iconv json mbstring tokenizer xml zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js and npm
RUN apt-get install -y nodejs npm

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Install Composer and npm dependencies
RUN composer install
RUN npm install
RUN npm run build

# Expose port 8000 and start php-fpm server
EXPOSE 8000
CMD ["php-fpm"]
