# E-Commerce Landing Page

A mini e-commerce landing page built with Laravel, featuring product listing, shopping cart, and order management functionality.

## Features

- ✅ User Authentication (Login/Register)
- ✅ Product Listing with Pagination
- ✅ Product Details Page
- ✅ Shopping Cart Functionality
- ✅ Add to Cart with Quantity Management
- ✅ Checkout Process
- ✅ Order Placement and Management
- ✅ Order History
- ✅ Bootstrap 5 UI Design
- ✅ MySQL Database

## Tech Stack

- **Backend**: Laravel 12
- **Frontend**: Blade Templates + Bootstrap 5
- **Database**: MySQL
- **Authentication**: Laravel Breeze (Blade)

## Installation

1. **Clone the repository** (if applicable) or navigate to the project directory

2. **Install PHP dependencies**:
   ```bash
   composer install
   ```

3. **Install Node dependencies**:
   ```bash
   npm install
   ```

4. **Configure Environment**:
   - Copy `.env.example` to `.env` (if not exists)
   - Update database credentials in `.env`:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```

5. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

6. **Run Migrations**:
   ```bash
   php artisan migrate
   ```

7. **Seed Database** (optional - adds sample products):
   ```bash
   php artisan db:seed
   ```

8. **Build Assets**:
   ```bash
   npm run build
   ```

9. **Start Development Server**:
   ```bash
   php artisan serve
   ```

   The application will be available at `http://localhost:8000`

## Default Test User

After running migrations and seeders, you can create a test user:
- Email: `test@example.com`
- Password: (set during registration)

Or register a new account through the registration page.

## Project Structure

```
app/
├── Http/
│   └── Controllers/
│       ├── Auth/
│       │   ├── AuthenticatedSessionController.php
│       │   └── RegisteredUserController.php
│       ├── CartController.php
│       ├── OrderController.php
│       └── ProductController.php
└── Models/
    ├── Cart.php
    ├── Order.php
    ├── OrderItem.php
    └── Product.php

database/
├── migrations/
│   ├── create_products_table.php
│   ├── create_carts_table.php
│   ├── create_orders_table.php
│   └── create_order_items_table.php
└── seeders/
    └── ProductSeeder.php

resources/
└── views/
    ├── layouts/
    │   └── app.blade.php
    ├── auth/
    │   ├── login.blade.php
    │   └── register.blade.php
    ├── products/
    │   ├── index.blade.php
    │   └── show.blade.php
    ├── cart/
    │   └── index.blade.php
    └── orders/
        ├── checkout.blade.php
        ├── index.blade.php
        └── show.blade.php
```

## Routes

- `/` - Home/Product Listing
- `/products` - Product Listing
- `/products/{id}` - Product Details
- `/cart` - Shopping Cart (Auth Required)
- `/checkout` - Checkout Page (Auth Required)
- `/orders` - Order History (Auth Required)
- `/orders/{id}` - Order Details (Auth Required)
- `/login` - Login Page
- `/register` - Registration Page

## Database Schema

- **products**: Stores product information
- **carts**: Stores user cart items
- **orders**: Stores order information
- **order_items**: Stores individual items in each order

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
