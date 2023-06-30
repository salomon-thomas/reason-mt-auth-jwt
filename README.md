# Reason Auth JWT - Local Setup Guide

This guide provides step-by-step instructions on how to set up the project locally. Please follow the instructions carefully to ensure a successful setup.

## Prerequisites

Before proceeding with the setup, ensure that you have the following installed on your system:

- PHP (version >= 8.1)
- Composer (https://getcomposer.org)
- MySQL or any other compatible database server
- Git (https://git-scm.com)

## Installation Steps

1. Clone the project repository using Git:
   ```
   git clone https://github.com/salomon-wst/reason-mt-auth-jwt.git
   ```

2. Navigate to the project directory:
   ```
   cd reason-mt-auth-jwt
   ```

3. Install project dependencies using Composer:
   ```
   composer install
   ```

4. Create a copy of the `.env.example` file and rename it to `.env`:
   ```
   cp .env.example .env
   ```

5. Generate an application key:
   ```
   php artisan key:generate
   ```

6. Configure the database connection in the `.env` file:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```
7. Update the WEATHER_KEY filed in .env with value fetched from the weatherapi.com portal

8. Run the database migrations and seeders:
   ```
   php artisan migrate
   ```

9. Optionally, if the project relies on any vendor files that need to be published, run the following command:
   ```
   php artisan vendor:publish
   ```

10. Start the development server:
   ```
   php artisan serve
   ```

11. Access the application by visiting `http://localhost:8000` in your web browser.

## Additional Notes

- Ensure that your system meets the minimum requirements specified in the Laravel documentation.
- If you encounter any issues during the setup process, refer to the Laravel documentation or seek assistance from the project team.

Congratulations! You have successfully set up the project locally. Enjoy working on the project!