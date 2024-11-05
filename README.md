# User Management System

A Laravel application for managing users and roles with image upload functionality.

## Features

- User Create with profile image
- Profile image upload and management
- Form validation with real-time feedback
- AJAX-based form submissions for smooth user experience

## Technologies Used

- Laravel 11.9
- PHP 8.2
- SQLite

## Setup Instructions

Follow these steps to set up the project locally:

1. **Clone the Repository**
   ```bash
   git clone https://github.com/SushantSinghRajput03/form-submit.git
   cd form-submit
   ```

2. **Install PHP Dependencies**
   ```bash
   composer install
   ```

3. **Environment Setup**
   ```bash
   cp .env.example .env
   ```
   Edit the `.env` file to configure your database settings

4. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

5. **Run Database Migrations**
   ```bash
   php artisan migrate
   ```

6. **Seed the Database**
   ```bash
   php artisan db:seed
   ```

7. **Set Up File Storage**
   ```bash
   php artisan storage:link
   ```
   Creates a symbolic link for public file storage

8. **Install Frontend Dependencies**
   ```bash
   npm install
   ```

9. **Compile Assets**
   ```bash
   npm run dev
   ```
   For development, or `npm run build` for production

10. **Start the Development Server**
    ```bash
    php artisan serve
    ```
    Access the application at `http://localhost:8000`

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct and the process for submitting pull requests.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.
