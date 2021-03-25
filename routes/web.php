<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('tor', function() {
    auth()->user()
            ->business->amenities->update([
                'has_parking' => 1, // $this->amenities_values['has_parking'],
                'has_outdoor_dining' => 0, // $this->amenities_values['has_outdoor_dining'],
                'has_event_accommodation' => 1, // $this->amenities_values['has_event_accommodation'],
                'has_wifi' => 0, // $this->amenities_values['has_wifi'],
                'accepts_credit_card' => 1, // $this->amenities_values['accepts_credit_card'],
                'has_food_delivery' => 0, // $this->amenities_values['has_food_delivery'],
            ]);

    return 'ok';
});

Route::get('shin', function() {
    $business = App\Models\Business::find(1);
    return $business->amenities;
});

Route::get('varia', function() {

    $opening_hours = [
        [
            'day' => 'monday',
            'enabled' => false,
            'time_from' => '09:00',
            'time_to' => '16:00',
        ],
        [
            'day' => 'tuesday',
            'enabled' => false,
            'time_from' => '',
            'time_to' => '',
        ],
        [
            'day' => 'wednesday',
            'enabled' => false,
            'time_from' => '',
            'time_to' => '',
        ],
        [
            'day' => 'thursday',
            'enabled' => false,
            'time_from' => '',
            'time_to' => '',
        ],
        [
            'day' => 'friday',
            'enabled' => false,
            'time_from' => '',
            'time_to' => '',
        ],
        [
            'day' => 'saturday',
            'enabled' => false,
            'time_from' => '',
            'time_to' => '',
        ],
        [
            'day' => 'sunday',
            'enabled' => false,
            'time_from' => '',
            'time_to' => '',
        ]
    ];

    DB::table('businesses')
        ->where('id', 1)
        ->update([
            'opening_hours' => $opening_hours
        ]);

    return 'ok';
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/business', function() {
    return view('business');
})->name('business');


require __DIR__.'/auth.php';
