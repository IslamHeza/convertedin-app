# Convertedin App

## Setup Instructions

To run the app locally, please follow these steps:

### 1. Create a Local Database

Create a database locally named `convertedin_islam_task` like the .env.example file, or change it if you want.

### 3. Clone the Project

```bash
git clone https://github.com/IslamHeza/convertedin-app.git
```

### 4. Configure Environment

```bash
cd convertedin-app
cp .env.example .env
```

### 5. Install Dependencies

```bash
composer install
```

### 6. Generate Application Key
```bash
php artisan key:generate
```

### 7. Start the Application
This will run the database migrations then seeds by 10000 users and 100 admins.
```bash
php artisan app:start
```



