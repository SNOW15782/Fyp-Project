
# CO-Z-Proj (Laravel)

Welcome to CO-Z-Proj! This is a brief guide on how to get started with the project.

## Installation

Follow these simple steps to set up and run CO-Z Project on your local machine:
- Be sure to have PHP, Composer, Node.js(npm) 

1. **Clone the repository**

    ```bash
    https://github.com/peyadbot/FYP-Proj.git
    ```
    ```bash
    cd your-repo
    ```

2. **Install PHP Dependencies**
    ```bash
    composer install
    ```

3. **Install Node.js and npm Dependencies (including Tailwind CSS)**
    ```bash
    npm install -D tailwindcss postcss autoprefixer
    ```
    ```bash
    npx tailwindcss init -p
    ```

4. **Generate Application Key**
    ```bash
    php artisan key:generate
    ```

5. **Configure Database .env.example**
    ```bash
    Rename the .env.example to .env

    - Inside the .env configure DB_DATABASE

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=database-name
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6. **Run Migrations**
    ```bash
    php artisan storage:link
    ```
php artisan migrate

7. **Install npm Dependencies and Compile Assets**
    ```bash
    npm install
    npm run dev
    ```

8. **Install Laravel Breeze (if not installed)**
    ```bash
    composer require laravel/breeze --dev
    php artisan breeze:install
    ```

9. **Serve the Application**
    ```bash
    php artisan serve
    ```

10. **Enjoy ^-^**

