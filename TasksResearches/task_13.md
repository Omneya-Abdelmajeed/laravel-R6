# Middleware in Laravel

## What is Middleware?

Middleware is a part of programming it act as layer that handles HTTP requests and responses or we can say it acts like layers that HTTP requests pass through, with each layer able to inspect or reject the request. It can modify requests before they reach your application or modify responses before they go back to the client.
As an example:
when a user try to login to your App. or page and this page need access or approval; Middleware play its rule as to approve if login (authenticated) the request continues or redirect to login page.

## Defining Middleware:

To create a new middleware in Laravel, use the *`make:middleware`* command:
```php 
php artisan make:middleware EnsureTokenIsValid;
```
This command generates a new class in app/Http/Middleware. The middleware checks if a provided token matches a specific value. If not, it redirects the user; if it matches, the request proceeds.

## Registering Middleware

### 1. Global Middleware

- It is the Middleware that runs for every request to your application; and to ensure its run for every HTTP request in laravel, it should be added to the global middleware in the *`bootstrap/app.php`* or *`app/Http/Kernel.php`*.
- The **append** method adds the middleware to the end of the list. To add it to the beginning, use the **prepend** method.
 - To manually Managing Default Global Middleware by using `use` method and adjust it as needed 
 - **Example:**
 ```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->use([
        // \Illuminate\Http\Middleware\TrustHosts::class,
        \Illuminate\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Http\Middleware\ValidatePostSize::class,
        \Illuminate\Foundation\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ]);
})
```
### 2. Assigning Middleware to routes:

- It is Middleware that runs only for specific routes.
- To assign middleware to specific routes, use the middleware method:
- **How to Register**:
    ```php
    use App\Http\Middleware\EnsureTokenIsValid;

    Route::get('/profile', function () {
        // ...
    })->middleware(EnsureTokenIsValid::class);

    ```
- You can also assign multiple middleware by passing an array:
```php
Route::get('/', function () {
    // ...
})->middleware([First::class, Second::class]);
```
- To exclude middleware from certain routes within a group, use withoutMiddleware:
```php
    use App\Http\Middleware\EnsureTokenIsValid;
    
    Route::middleware([EnsureTokenIsValid::class])->group(function () {
        Route::get('/', function () {
            // ...
        });
    
        Route::get('/profile', function () {
            // ...
        })->withoutMiddleware([EnsureTokenIsValid::class]);
    });
```

### 3. Middleware Groups

- In Laravel, you can group multiple middleware together and apply them to routes and also can be applied to all web routes. This makes managing middleware easier, especially when multiple routes need the same set of middleware.
- Laravel's default Middleware groups for `routes/web.php`:
- **`Illuminate\Cookie\Middleware\EncryptCookies`**: Encrypts cookies sent with the response.
- **`Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse`**: Adds cookies to the response that were queued during request handling.
- **`Illuminate\Session\Middleware\StartSession`**: Starts the session for the request.
- **`Illuminate\View\Middleware\ShareErrorsFromSession`**: Shares session error messages with the view.
- **`Illuminate\Foundation\Http\Middleware\ValidateCsrfToken`**: Validates the CSRF token for incoming requests.
- **`Illuminate\Routing\Middleware\SubstituteBindings`**: Substitutes route model bindings.

### 4. Middleware Aliases
- It simply refers that you can use short alias (names) which give hint or describtion the use of Middleware for a given Middleware with long class name.
- Once the middleware alias has been defined in your application's bootstrap/app.php file, you may use the alias when assigning the middleware to routes:
```php
Route::get('/profile', function () {
    // ...
})->middleware('subscribed');
```
- there are some laravel's built-in middleware are aliased by default as `auth`	**`Illuminate\Auth\Middleware\Authenticate`**
which is used to ensure that a user is authenticated before they can access certain routes.

### 5. Sorting Middleware
- Rarely, you may need your middleware to execute in a specific order but you can make it by using `priority` method.

## Where to use and write Middleware:
### Middleware in web.php
- We can apply Middleware to routes to manage authentication before the user access to certain routes as related to admin dashboard; which also secure your data, and handels tasks like logging; it also checks and manages requests and response.
- **Example from sessions:**
```php
Route::group([
    'prefix' => 'cars',
    'controller' => CarController::class,
    'as' => 'cars.',
    'middleware' => 'verified',
], function() {
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('', 'store')->name('store');
    Route::get('{id}/edit', 'edit')->name('edit');
});
```
### Using Middleware in Controllers 

- In Laravel, you can use middleware in Controllers to manage access or execute specific actions before or after controller methods. Using middleware in controllers allows you to Protect Controller actions and excute specific operations such as permission checks and data modifications.
- **Example from laravel HomeController**:
    ```php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class HomeController extends Controller
    {
        /**
        * Create a new controller instance.
        *
        * @return void
        */
        public function __construct()
        {
            $this->middleware('auth');
        }

        /**
        * Show the application dashboard.
        *
        * @return \Illuminate\Contracts\Support\Renderable
        */
        public function index()
        {
            return view('home');
        }
    }

