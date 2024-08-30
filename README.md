# Task

This is a PHP-based application that allows users to manage buyers, including adding, viewing buyers.

## Prerequisites

Before you begin, ensure you have met the following requirements:

- **PHP**: Make sure PHP is installed on your machine. The minimum required version is PHP 7.4.
- **Composer**: You need Composer to install dependencies. If you don't have Composer installed, [download it here](https://getcomposer.org/).
- **Database**: A database like MySQL is required.

## Setup Instructions

Follow these steps to set up the project on your local machine:

### 1. Clone the Repository

First, clone the repository to your local machine using Git:

```bash
git clone https://github.com/csemazharul/buyer-registration.git
```

### 2. Install Dependencies

Navigate into the project directory and install the PHP dependencies using Composer:

```bash
cd buyer-registration
```

```bash
composer install
```

### 3. Configure Environment Variables

Create a new file named `.env` in the project root and copy the contents of `.env.example` into it:

```bash
cp .env.example .env
```

#### Application URL

Set the `APP_URL` variable in the `.env` file to the URL of the application:

#### Database Configuration

Configure your database connection details:

`DB_CONNECTION`= The type of database (e.g., mysql).

`DB_HOST`= The hostname of your database server (e.g., 127.0.0.1 for local)

`DB_DATABASE`= The name of your database.

`DB_USERNAME`= Your database username.

`DB_PASSWORD`= Your database password.








