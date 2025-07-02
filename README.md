# Laundry Express - Simple ERP Laundry Management System

Laundry Express is a Laravel-based ERP system designed specifically for managing laundry service operations. It helps streamline customer management, transaction handling, and status tracking within a responsive and user-friendly interface. Built for small-to-medium laundry businesses, Laundry Express aims to improve operational efficiency and customer satisfaction.

[![My Skills](https://skillicons.dev/icons?i=laravel,php,vite,bootstrap,mysql,vscode,windows)](https://skillicons.dev)
## Features

- **Dashboard**: 
  - Displays laundry statistics, recent transactions, and key performance indicators.
  
- **Customer Management**:
  - Add, edit, and delete customer data.
  - Add, edit, and delete service.

- **Laundry Transactions**:
    - Create, update, or delete laundry orders.
    - Track order status (e.g., new, washed, ready, delivered).
    - Manage order types (e.g., regular, express).
    
- **Payment Handling**:
    - Add and confirm payments.
    - View transaction summaries and receipts.

- **Responsive Design**:
  - Fully functional on both desktop and mobile devices.

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript (with Bootstrap framework).
- **Backend**: PHP with Laravel framework.
- **Database**: MySQL.
- **Storage**: Laravel Storage for image and file handling.

## Getting Started

### Prerequisites

Ensure you have the following installed on your system:

- PHP (>=8.1)
- Composer
- Node.js and npm
- MySQL

### Installation

1. Clone this repository:
   ```bash
   git clone https://github.com/username/LaundryExpress.git
   cd LaundryExpress
   ```

2. Install dependencies:
   ```bash
   composer install
   npm install
   ```

3. Copy `.env.example` to `.env` and configure your environment variables:
   ```bash
   cp .env.example .env
   ```

4. Generate an application key:
   ```bash
   php artisan key:generate
   ```

5. Create a symbolic link for storage:
   ```bash
   php artisan storage:link
   ```

6. Build assets:
   ```bash
   npm run dev
   ```

7. Start the development server:
   ```bash
   php artisan serve
   ```

Access the application at `http://localhost:8000`.

---

## Screenshots

### Admin Panel:
#### 1. Dashboard  
![image](https://github.com/user-attachments/assets/e1435537-c56f-4f96-88b5-e67f516c482f)

*Overview of recent laundry orders and statistics.*  

#### 2. Customer
![image](https://github.com/user-attachments/assets/fcd7d4de-d788-4afa-9a64-de53e4f53b84)

*Interface to add, edit, or delete customer data.*  

#### 3. Service
![image](https://github.com/user-attachments/assets/ae2d2277-8642-4d5e-b9cb-5f2af9d915e5)

*Manage laundry service options such as regular, express, and their respective prices.*  

#### 4. Transaksi
![image](https://github.com/user-attachments/assets/d988e26a-daa3-4f0d-92d8-ba5edbef3149)

*Record transactions, track laundry status, and manage the cleaning process.*  

#### 5. Transaction
![image](https://github.com/user-attachments/assets/90967e0f-1f03-4853-bb43-c5c45ebcd959)

*View payment details and print transaction receipts.*  

#### 6. Report
![image](https://github.com/user-attachments/assets/7025258b-d861-49b9-ac62-d9a5b8073039)

*Display transaction reports, revenue summaries, and customer data recaps.*  

---
