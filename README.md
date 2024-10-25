
# Laravel-SQL Database

### E. Use Xampp or Laragon 
start server

start sql

---
### 1. Create Database on SQL
Create a new database named `bookStore` for your project.

---


### 2. Create a Laravel Project
```bash
composer create-project laravel/laravel example-app
```
Or, if cloning from a repository:
```bash
git clone <repository-link>
composer install
```

- Create the `.env` file and generate a secret key:
```bash
php artisan key:generate
```

---

### 3. Run Application on a Different Port
```bash
php artisan serve 
```
if not work or port is used in another services: use --port=8080

---

### 4.Create or Update `.env` File for Database Configuration
```plaintext
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bookStore
DB_USERNAME=root
DB_PASSWORD=
```

---

### 5. Create Model, Factory, Controller, and Migration
```bash
php artisan make:model Book -cfm
```
Or manually create a controller:
```bash
php artisan make:controller BookController --resource
```

---

### 6. Define the Database Schema in the Migration File
Update the `up` function in the migration file for `books` table as follows:

```php
public function up()
{
   Schema::create('books', function (Blueprint $table) {
       $table->id();
       $table->string('title', 255);
       $table->string('author', 255);
       $table->string('isbn', 13)->unique();
       $table->integer('stock')->default(0);
       $table->decimal('price', 8, 2);
       $table->timestamps();
   });
}
```

---

### 7. Run Migrations
```bash
php artisan migrate
```
To rollback, reset, or refresh migrations:
```bash
php artisan migrate:rollback
php artisan migrate:reset
php artisan migrate:refresh
```

---

### 8. Define the Factory for Seed Data
To generate test data, create a factory for the `Book` model:
```bash
php artisan make:factory BookFactory
```

Define the `definition` function in the `BookFactory` file:
```php
public function definition(): array
{
    return [
        'title' => $this->faker->sentence,
        'author' => $this->faker->name,
        'isbn' => $this->faker->isbn13,
        'stock' => $this->faker->numberBetween(0, 200),
        'price' => $this->faker->randomFloat(2, 5, 200),
    ];
}
```

---

### 9. Create a Seeder for the Book Table
```bash
php artisan make:seeder BookSeeder
```

In the `BookSeeder` file, define the `run` function as follows:
```php
use App\Models\Book;

public function run(): void
{
    Book::truncate();
    Book::factory(200)->create();
}
```

Run the seeder:
```bash
php artisan db:seed --class=BookSeeder
```

---

### 10. Configure Routes

```php
use 
in web.php class;

App\Http\Controllers\BookController;
Route::resource('books', BookController::class);
```

---

### 11. Modify Book Model
In `Book.php`, set the `$fillable` fields:
```php
protected $fillable = ['title', 'author', 'isbn', 'stock', 'price'];
```

---

### 12. Create Blade Views
- Create a `books` folder inside `resources/views`.
- Set up layout file `app.blade.php` in the `layouts` folder.

---

### 13. Serve Application on a Different Port
```bash
php artisan serve --port=8080
```

---

### 14. Refresh and Seed the Database
To refresh migrations and reseed:
```bash
php artisan migrate:refresh --seed
```

Now add Method and functionality in Controller and create view in Resources/views/books.

 Add route in routes/web.php and complete CRUD with paginatoin.

 # For pagination:
 Providers/AppserviceProvider and add

 ```bash
use Illuminate\Pagination\Paginator;
```
 ```bash
public function boot(): void
    {
        Paginator::useBootstrap();
    }
```