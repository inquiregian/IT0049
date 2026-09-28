# CodeIgniter POS Application

A Point-of-Sale application built with CodeIgniter 4 and MySQL. The application supports customer and user account creation, validation, editing, and user avatar uploads.

## Pages

- `/` - Landing page
- `/about` - About page
- `/customers` - Customer Accounts listing
- `/customers/new` - New Customer form
- `/customers/{id}/edit` - Edit Customer form
- `/users` - User Accounts listing
- `/users/new` - New User form
- `/users/{id}/edit` - Edit User and avatar-upload form

## Features

- MySQL-backed customer and user records
- Separate controllers, models, and views
- Create and edit workflows for customers
- Required customer full name
- Required and valid customer email address
- Create and edit workflows for users
- Required and unique usernames
- Required user full name
- JPG and PNG avatar uploads
- Maximum avatar size of 2 MB
- Uploaded images resized and cropped to 300 by 300 pixels
- Randomized avatar filenames
- Only avatar filenames stored in the database
- Placeholder avatar for users without uploaded images
- Validation errors and previously entered values displayed after invalid submissions
- Responsive shared CSS styling
- CSRF-protected forms

## Requirements

- PHP 8.1 or newer
- PHP GD extension
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

6. Import the database export through phpMyAdmin:

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

8. Make sure the PHP GD extension is enabled in `php.ini`:

   ```ini
   extension=gd
   ```

9. Start the CodeIgniter development server:

   ```bash
   php spark serve
   ```

10. Open the application:

    ```text
    http://localhost:8080
    ```

## Avatar Uploads

Uploaded and prepared avatars are stored in:

```text
public/uploads/avatars
```

The placeholder avatar is stored in:

```text
public/images/avatar-placeholder.svg
```

## Live Application

https://sarmiento-pos.great-site.net

## GitHub Repository

https://github.com/inquiregian/IT0049

## Database Export

The updated MySQL database export is available at:

```text
database/pos_database.sql
```