# Laravel G

- composer create-project laravel/laravel example-app
- cd example-app
- php artisan serve
 
## Additional
- Blade: is the template engine that Laravel uses. 

## Snippets

### routes folder

#### routes/web.php (Create Routes)
```php
Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return response('<h2>Hello World</h2>', 200)
        ->header('Content-Type', 'text/plain')
        ->header('foo', 'bar');
});

Route::get('/post/{id}', function ($id) {
    ddd($id); // Dump, Die, Debug
    return response('Post ' . $id);
})->where('id', '[0-9]+');

Route::get('/search', function (Request $request) {
    // dd($request->name . ' ' . $request->city);
    return $request->name . ' ' . $request->city;
});
```
<br/>

#### routes/api.php (Create an API)

```php
Route::get('/posts', function () {
    return response()->json([
        'posts' => [
            [
                'title' => 'Post one'
            ]
        ]
    ]);
});
```

### Looping 

```php
// web.php
Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listings',
        'listings' => [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'Some description in here',

            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => 'Some description in here',

            ],
        ]
    ]);
});
```

```php
// listings.php
<h1><?php echo $heading;?></h1>
<?php foreach($listings as $listing):?>
    <h2><?php echo $listing['title']; ?></h2>
    <p><?php echo $listing['description']; ?></p>
<?php endforeach; ?>
```
```php
// listings.blade.php
<h1>{{$heading;}}</h1>

@if(count($listings) == 0)
<p>No listings found</p>
@endif 

@foreach($listings as $listing)
    <h2>{{$listing['title']}}</h2>
    <p>{{$listing['description']}}</p>
@endforeach
```

### Seeding database 

- php artisan db:seed
- php artisan migrate:refresh
- php artisan migrate:refresh --seed (To do both at the same time)

### Model 

- php artisan make:model Listing

### Factory

- php artisan make:factory ListingFactory 

```php
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'tags' => 'laravel, api, backend',
            'company' => $this->faker->company(),
            'email' => $this->faker->companyEmail(),
            'website' => $this->faker->url(),
            'location' => $this->faker->city(),
            'description' => $this->faker->paragraph(5),
        ];
    }
}
```