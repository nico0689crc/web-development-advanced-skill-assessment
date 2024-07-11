# Stage 1: Base Stage
FROM php:8.2-fpm AS base

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
  build-essential \
  libpng-dev \
  libjpeg62-turbo-dev \
  libfreetype6-dev \
  locales \
  zip \
  jpegoptim optipng pngquant gifsicle \
  vim \
  unzip \
  git \
  curl \
  libonig-dev \
  libzip-dev \
  libpq-dev \
  nodejs \
  npm \
  supervisor \
  && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install gd

# Install Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Stage 2: Development Stage
FROM base AS development

# Install additional PHP extensions for development
RUN pecl install xdebug \
  && docker-php-ext-enable xdebug

# Copy existing application directory contents
COPY . /var/www

# Set permissions for the Laravel storage and cache directories
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Install dependencies
RUN composer install --prefer-dist --no-scripts --no-autoloader && \
  composer dump-autoload --optimize



# Copy the entrypoint script
COPY ./docker-entrypoint.sh /usr/local/bin/

# Make the entrypoint script executable
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

RUN npm ci

RUN npm run build

EXPOSE 3000

ENTRYPOINT ["docker-entrypoint.sh"]

CMD ["php", "artisan", "serve", "--port=3000", "--host=0.0.0.0"]

# Stage 3: Production Stage
FROM base AS production

# Set environment variable
ENV APP_ENV=production

# Copy existing application directory contents
COPY . /var/www

# Set permissions for the Laravel storage and cache directories
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Install dependencies
RUN composer install --no-dev --optimize-autoloader && \
  composer dump-autoload --optimize

# Copy the entrypoint script
COPY ./docker-entrypoint.sh /usr/local/bin/

# Make the entrypoint script executable
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

RUN npm ci

RUN npm run build

# Expose port 3000 and start php-fpm server
EXPOSE 3000

ENTRYPOINT ["docker-entrypoint.sh"]

CMD ["php", "artisan", "serve", "--port=3000", "--host=0.0.0.0"]
