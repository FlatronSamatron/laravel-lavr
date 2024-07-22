# Working Steps:

## Eloquent
- DB::all()
- DB::find($id)
- DB::findOrFail($id)

## Step 1:
- composer create-project laravel/laravel:^10.0 lavr
- php artisan serve  
- php artisan make:controller Posts --resource  
- env->DB_CONNECTION=sqlite
- php artisan migrate    
- php artisan make:model Post --migration
- php artisan migrate  
- `pattern Active Records` 
- in Laravel controllers work trough `ReflectionClass` therefore the parameters can be obtained in any order or gets not only primitives (Models, Requests).