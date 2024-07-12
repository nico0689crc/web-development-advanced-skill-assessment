## Steps
- create .env file
- composer install
- npm install
- npm run build
- php artisan key:generate
- php artisan migrate
- php artisan db:seed


## Steps Memebers:
- php artisan make:model Member -m
- php artisan make:seeder MemberSeeder
- php artisan make:factory MemberFactory --model=Member
- php artisan make:seeder MemberSeeder


- php artisan vendor:publish --tag=laravel-pagination

## Dockerfile Optimization

### Overview

This update optimizes the Dockerfile used to build the Laravel application, reducing the need to reinstall dependencies every time the application code changes. The Dockerfile has been divided into multiple stages, leveraging Docker's layer caching to improve build times and efficiency.

### Detailed Explanation of Changes

1. **Base Stage**
   - **Purpose**: To set up the base environment with all the necessary system dependencies for running the Laravel application.
   - **Changes**:
     - The base stage installs system packages and PHP extensions needed for the Laravel application.

3. **Dependencies Stage**
   - **Purpose**: To install PHP and NPM dependencies separately, allowing Docker to cache these layers and avoid reinstalling dependencies when only the application code changes.
   - **Changes**:
     - Copies composer.json and composer.lock to install PHP dependencies.
     - Copies package.json and package-lock.json to install NPM dependencies.

4. **Development Stage**
   - **Purpose**: To set up the development environment with additional tools like Xdebug.
   - **Changes**:
     - Installs Xdebug for development.
     - Copies the application code.
     - Copies the previously installed dependencies from the dependencies stage.
     - Sets the necessary permissions for Laravel directories.
     - Builds frontend assets.

5. **Production Stage**
   - **Purpose**: To set up the production environment.
   - **Changes**:
     - Copies the application code.
     - Copies the previously installed dependencies from the dependencies stage.
     - Sets the necessary permissions for Laravel directories.
     - Builds frontend assets.

