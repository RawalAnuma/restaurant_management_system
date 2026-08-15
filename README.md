# Restaurant Management System - Backend

## About the Project

Restaurant Management System is a REST API backend developed using Laravel for managing restaurant operations.

The backend provides APIs for authentication, food management, category management, and order management. It is designed to work with the Flutter Admin Application.

## Features

- Admin authentication
- Food CRUD operations
- Category CRUD operations
- Order management
- Order status updates
- Food image upload
- API Resources
- Repository Pattern
- Form validation
- Token-based authentication

## Technologies Used

- Laravel
- PHP
- MySQL
- Laravel Sanctum
- REST API
- Eloquent ORM

## Getting Started

```bash
Clone the repository:

git clone https://github.com/RawalAnuma/restaurant_management_system.git
```

- Navigate to the project:

cd restaurant_management_system


- Install dependencies:

composer install


- Create the environment file:

cp .env.example .env


- Generate the application key:

php artisan key:generate


- Configure your MySQL database in the `.env` file.


- Run migrations:

php artisan migrate


- Run seeders:

php artisan db:seed


- Start the Laravel server:

php artisan serve


## API

The backend provides REST APIs for:

- Authentication
- Foods
- Categories
- Orders

The API can be tested using Postman or consumed by the Flutter Admin Application.

## Database

The application uses MySQL.

Main entities include:

- Users
- Foods
- Categories
- Orders
- Order Items

## Authentication

The API uses Laravel Sanctum for token-based authentication.

- Authenticated requests require:

Authorization: Bearer <token>

## Project Architecture

The project follows the Repository Pattern to separate business logic and data access responsibilities.

Controller → Repository → Model → Database

API Resources are used to structure API responses.

## Related Project

### Flutter Admin Application

<your-flutter-repository-link>

## Author

Anuma Rawal - B.Sc. (Hons) Computing
