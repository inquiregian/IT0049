# CodeIgniter POS Database Application

A four-page Point-of-Sale application created with CodeIgniter 4. This version replaces the static PHP arrays from TFA1 with records retrieved from a MySQL database through CodeIgniter Models and Query Builder.

## Pages

- `/` - Landing page
- `/about` - About page
- `/customers` - Customer Accounts page
- `/users` - User Accounts page

## Features

- Four working routes
- Separate controllers, models, and views
- MySQL database containing customer and user records
- CustomerModel and UserModel for retrieving database records
- Query Builder through the `findAll()` Model method
- Five customer records
- Five user records
- Navigation links connecting all four pages
- Shared CSS styling

## Requirements

- PHP 8.1 or newer
- Composer
- MySQL or XAMPP
- CodeIgniter 4

## Setup Instructions

1. Clone or download this repository.

2. Open the project folder in a terminal.

3. Install the dependencies:

   ```bash
   composer install
   ```

4. Copy the `env` file and rename the copy to `.env`.

5. Create a MySQL database named:

   ```text
   pos_database
   ```

6. Import the following database export through phpMyAdmin:

   ```text
   database/pos_database.sql
   ```

7. Configure the database section of `.env`:

   ```ini
   database.default.hostname = localhost
   database.default.database = pos_database
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   database.default.DBPrefix =
   database.default.port = 3306
   ```

8. Start the CodeIgniter development server:

   ```bash
   php spark serve
   ```

9. Open the application in a browser:

   ```text
   http://localhost:8080
   ```

## Live Application

https://sarmiento-pos.great-site.net

## GitHub Repository

https://github.com/inquiregian/IT0049

## Database Export

The MySQL database export is available at:

```text
database/pos_database.sql
```