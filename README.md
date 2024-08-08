# Working Steps:

## Eloquent
- DB::all()
- DB::find($id)
- DB::findOrFail($id)
- DB::orderByDesc('created_at')->get()
- DB::orderBy('title')->get()
- DB::create('title') => create and push in db
- $car = DB::make('title') => create ; $car->save() push in db

-------
- $post->update($validated) => $post->fill($validated)->save()
-------

## Step 1 (CRUD):
- composer create-project laravel/laravel:^10.0 lavr
- php artisan serve  
- php artisan make:controller Posts --resource  
- env->DB_CONNECTION=sqlite
- php artisan migrate    
- php artisan make:model Post --migration
- php artisan migrate  
- `pattern Active Records` 
- in Laravel controllers work trough `ReflectionClass` therefore the parameters can be obtained in any order or gets not only primitives (Models, Requests).

## Step 2 (BLADE)
- php artisan make:request Posts/Save

## Step 3
- `https://github.com/protonemedia/laravel-form-components`
- added config('app-cars.transmissions')
- `php artisan make:migration update_cars_table_add_vin`
- `php artisan migrate`
- homework:
  - `php artisan make:migration update_cars_table_add_soft_delete`
  - `php artisan migrate`
  - added config alerts
- `php artisan make:model Brand --migration`
- `php artisan make:controller Brands --model Brand`
- `php artisan make:request Brands/StoreRequest`
- `php artisan make:migration aupdate_cars_table_change_brand_to_brand_id`
- `belongTo, hasMany`
- Eager Loading: `Car::with('brand')` -> make a couple of requests instead of plenty
- hm:
  - `php artisan make:model Tags --migration`
  - `php artisan make:migration create_car_tag_table`
  - many-to-many -> create: `$car->tags()->sync($request['tags'])`

## Step 4
- `php artisan make:seeder Tags`
- `php artisan db:seed Tags`
- `php artisan migrate:rollback --step 2`
- `php artisan db:seed Tags`
- `php artisan:make migration update_append_status_to_cars_table`
- `php artisan migrate`
- added [cast](https://laravel.com/docs/10.x/eloquent-mutators) => status and dynamic [attribute](https://laravel.com/docs/10.x/eloquent-mutators) => getCanDeleteAttribute in Car model
- added [scope](https://laravel.com/docs/10.x/eloquent#local-scopes) scopeOfActive in Cars
- hm(polymorph one-to-many):
  - `php artisan make:model Comment -m` 
  - `php artisan make:controller Comments`
  - `php artisan make:request Comments/StoreRequest`