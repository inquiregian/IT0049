# CodeIgniter POS Application

A database-backed Point-of-Sale application built with CodeIgniter 4 and MySQL. The application supports customer and user management, validated forms, avatar uploads, sessions, login authentication, protected routes, and logout.

## Pages

### Public Pages

- `/` - Landing page
- `/about` - About page
- `/login` - Staff login page

### Protected Pages

The following pages require a logged-in user:

- `/customers` - Customer Accounts listing
- `/customers/new` - New Customer form
- `/customers/{id}/edit` - Edit Customer form
- `/users` - User Accounts listing
- `/users/new` - New User form
- `/users/{id}/edit` - Edit User and avatar-upload form

## Features

- MySQL-backed customer and user records
- Separate controllers, models, views, and filters
- Create and edit workflows for customers and users
- Required and valid customer information
- Required and unique usernames
- Password confirmation and minimum password length
- Passwords securely stored using `password_hash()`
- Login passwords verified using `password_verify()`
- Session-based authentication
- Session ID regeneration after successful login
- Authentication Filter protecting Customer and User routes
- Logout workflow that destroys the session
- Validation errors and previously entered values displayed after invalid submissions
- JPG and PNG avatar uploads
- Maximum avatar size of 2 MB
- Uploaded images resized and cropped to 300 by 300 pixels
- Randomized avatar filenames
- Only avatar filenames stored in the database
- Placeholder avatar for users without uploaded images
- Responsive shared CSS styling

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