<?php

#  Ví dụ này mình bind class vào service container ở route ?!
// để cho dễ hiểu, thực tế sẽ cho vào service provider
//
    /* Bind a class with the service container */
    // ở đây lấy ví dụ là bind class App\Billing\Stripe này vô service container
    //
    //App::bind('App\Billing\Stripe', function() {
        // when the user request the instance of Stripe
        // we're gonna call this function and return whatever necessary here
        // giống như 1 'xưởng sx' (đại loại thế)

        //return new \App\Billing\Stripe(config('services.stripe.secret'));

        // ngoài bind có singleton, dù resolve bao nhiêu lần đi nữa cũng chỉ tạo ra 1 instance duy nhất.
    //});

    /* If the user tries to resolve something out of the service container */
    // Sau khi đk lớp kèm dependency vào service container
    // Bất cứ khi nào cần instance of Stripe chỉ cần resolve nó là có đầy đủ các dependency kèm theo
    // Trong ví dụ này là có sẵn secret key trong đó luôn!!!
    // Thực tế thì các dependency phức tạp cỡ nào đi nữa thì cũng chỉ đk 1 lần rồi xài quài.
    # Way 1
    //$stripe = App::make('App\Billing\Stripe');
    # Way 2
    //$stripe = resolve('App\Billing\Stripe');
    # Way 3
    //$stripe = app('App\Billing\Stripe');

    # Xài class này ở bất kỳ đâu, ở đây demo nhẹ cái này:
//    dd(resolve('App\Billing\Stripe'));




Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store')->name('posts.store');
Route::get('/posts/{post}', 'PostsController@show');

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
