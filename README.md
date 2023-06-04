# Tour Company Booking System

This project is a tour company booking system that allows clients to book various products such as excursions, custom packages, cruises, and transfers. It is built using Laravel framework and PostgreSQL as the database.

## Table of Contents

-   [Features](#features)
-   [Requirements](#requirements)
-   [Installation](#installation)
-   [Usage](#usage)
-   [API Endpoints](#api-endpoints)
-   [Contributing](#contributing)
-   [License](#license)

## Features

-   Clients can book products based on availability and booking capacity.
-   Products have limitations on the number of times they can be booked.
-   Client and Product data can be managed through the API.
-   API endpoints for retrieving bookings, creating bookings, and managing client and product data.
-   Implementation of SOLID principles and "Fat Model, Slim Controller" concept.

## Requirements

-   PHP 8.1 or higher
-   Laravel 10.x
-   PostgreSQL 15.3

## Installation

1. Clone the repository:

```sh
git clone https://github.com/dusan-mitroivic/tour-booking.git
```

2. Navigate to the project directory:

```sh
cd tour-booking
```

3. Install dependencies using Composer:

```sh
composer install
```

4. Copy the `.env.example` file and rename it to `.env`. Update the database connection settings:

```sh
DB_CONNECTION=pgsql
DB_HOST=your-database-host
DB_PORT=your-database-port
DB_DATABASE=your-database-name
DB_USERNAME=your-database-username
DB_PASSWORD=your-database-password
```

5. Generate the application key:

```sh
php artisan key:generate
```

6. Run database migrations and seeders to create the necessary tables and seed initial data:

```sh
php artisan migrate --seed
```

7. Start the development server:

```sh
php artisan serve
```

The application should now be running on `http://localhost:8000`.

## Usage

You can now use the API to interact with the booking system. Refer to the API Endpoints section below for more details on available routes and requests.

## API Endpoints

-   `GET /api/clients`: Retrieve a list of all clients.
-   `POST /api/clients`: Create a new client.
-   `GET /api/products`: Retrieve a list of all products.
-   `GET /api/bookings`: Retrieve a list of all bookings.
-   `POST /api/bookings`: Create a new booking.

Refer to the API testing result by Postman in `tour-booking.postman_collection.json` for detailed information on request and response formats.

## Contributing

Contributions are welcome! If you encounter any issues or have suggestions for improvements, please open an issue or submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE).
