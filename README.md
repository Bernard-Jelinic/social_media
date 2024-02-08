# Social Media app

## Usage

### Clone GitHub repo for this project locally

```
git clone https://github.com/Bernard-Jelinic/social-media.git
```

### cd into your project

```
cd social-media
```

### Install Composer Dependencies

```
composer install
```

### Create a copy of your .env file

```
copy .env.example .env or cp .env.example .env
```

### Generate an app encryption key

```
php artisan key:generate
```

### Create an empty database for our application

Create an empty database for your project using the database tools you prefer.
Just create an empty database here, the exact steps will depend on your system setup.

### In the .env file, add database information to allow Laravel to connect to the database

We will want to allow Laravel to connect to the database that you just created in the previous step. To do this, we must add the connection credentials in the .env file and Laravel will handle the connection from there.

In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match the credentials of the database you just created. This will allow us to run migrations and seed the database in the next step.

### Migrations

To create all the nessesary tables and columns, run the following

```
php artisan migrate
```

### Seeding The Database

To add the dummy posts, users and friends, run the following

```
php artisan db:seed
```

### Running Then App

Upload the files to your document root, Valet folder or run

```
php artisan serve
```