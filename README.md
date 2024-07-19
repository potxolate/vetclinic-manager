# VetClinicAdmin

## Overview
**VetClinicAdmin** is an administration panel designed to manage veterinary clinics and their employees. This mini-CRM system provides functionalities for CRUD operations on clinics and employees, with basic authentication for administrators.

## Features
- **Basic Authentication**: Admin login with seeder for the initial user.
- **CRUD Functionality**: Manage clinics and employees.
- **Database Migrations**: Create and update database schemas.
- **Validation**: Form requests for data validation.
- **Pagination**: List clinics/employees with pagination (10 entries per page).

## Installation

### Prerequisites
- PHP >= 7.3
- Composer
- MySQL
- Node.js & npm

### Steps
1. **Clone the repository**
   ```bash
   git clone https://github.com/potxolate/vetclinic-manager.git
    ```
2. **Install dependencies:**
    ```bash
    composer install
    npm install
    ```

3. **Copy the .env.example file to .env and configure your environment variables, including Mailgun settings:**
    ```bash
    cp .env.example .env
    ```

4. **Generate an application key:**
    ```bash
    php artisan key:generate
    ```

5. **Run migrations:**
    ```bash
    php artisan migrate
    ```

6. **Serve the application:**
    ```bash
    php artisan serve
    ```

## Usage

- Access the application at `http://127.0.0.1:8000`
- Use the top right menu to change the language