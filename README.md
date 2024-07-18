# ECommerce API

This is a simple CRUD API for managing products in an ECommerce shopping website.

## Technologies Used
- PHP
- Laravel
- MySQL
- Docker
- Git

## Setup Instructions
1. Clone the repository:
   ```bash
   git clone https://github.com/bariabhi/ecommerce-api-task.git
   cd ecommerce-api-task
2. Install dependencies:
   composer install
3. Configure the environment variables:
   Copy .env.example to .env
   Update the database credentials
4. Run migrations and seeders:
   php artisan migrate --seed
5. Run the application:
   php artisan serve

## API Endpoints
GET /api/products - List all products
POST /api/products - Create a new product
GET /api/products/{id} - Get a single product
PUT /api/products/{id} - Update a product
DELETE /api/products/{id} - Delete a product
## View Documentation:
Visit http://127.0.0.1:8000/api/documentation

## Docker Setup
Build and run the containers:
   docker-compose up -d
