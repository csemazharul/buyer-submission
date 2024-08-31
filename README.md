# Buyer submission

This is a PHP-based application that allows users to manage buyers, including adding, viewing buyers.

## Prerequisites

Before you begin, ensure you have met the following requirements:

- **PHP**: Make sure PHP is installed on your machine. The minimum required version is PHP 7.4.
- **Composer**: You need Composer to install dependencies. If you don't have Composer installed, [download it here](https://getcomposer.org/).
- **Database**: A database like MySQL is required.

## Setup Instructions

Follow these steps to set up the project on your local machine:

## 1. Clone the Repository

1. Open your `terminal` or command prompt.

2. Navigate to the directory where you want to store your PHP application.

3. Run the following command to clone the repository:

```bash
git clone https://github.com/csemazharul/buyer-registration.git
```

## 2. Install Dependencies

Navigate into the project directory and install the PHP dependencies using Composer:

```bash
cd buyer-registration
```

```bash
composer install
```

## 3. Configure Environment Variables

Create a new file named `.env` in the project root and copy the contents of `.env.example` into it:

```bash
cp .env.example .env
```

#### Application URL

Set the `APP_URL` variable in the `.env` file to the URL of the application on your local machine. For example: ``http://buyer-registration.xyz``.


#### Database configuration

1. Create a new `database` in your MySQL.

2. Update the `.env` file with the newly created database credentials.








