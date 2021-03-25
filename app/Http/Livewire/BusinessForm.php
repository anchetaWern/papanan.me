<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Business;
use Livewire\WithFileUploads;
use Str;

class BusinessForm extends Component
{

    use WithFileUploads;

    public $name = '';
    public $url = '';
    public $address = '';
    public $phone_number = '';
    public $email = '';
    public $description = '';

    public $website_url = '';
    public $facebook = '';
    public $instagram = '';

    public $card_image = '';
    public $cover_image = '';

    public $opening_hours;
    public $amenities = ['has_parking', 'has_outdoor_dining', 'has_event_accommodation', 'has_wifi', 'accepts_credit_card', 'has_food_delivery'];

    public $amenities_values;

    public function __construct()
    {
        parent::__construct();

        $business = auth()->user()->business;
        $this->name = $business->name;
        $this->url = $business->url;
        $this->address = $business->address;
        $this->phone_number = $business->phone_number;
        $this->email = $business->email;
        $this->description = $business->description;

        $this->website_url = $business->website_url;
        $this->facebook = $business->facebook;
        $this->instagram = $business->instagram;

        $this->card_image = $business->card_image;
        $this->cover_image = $business->cover_image;
        $this->opening_hours = $business->opening_hours;

        $amenities = $business->amenities;

        $this->amenities_values = [
            'has_parking' => $amenities->has_parking,
            'has_outdoor_dining' => $amenities->has_outdoor_dining,
            'has_event_accommodation' => $amenities->has_event_accommodation,
            'has_wifi' => $amenities->has_wifi,
            'accepts_credit_card' => $amenities->accepts_credit_card,
            'has_food_delivery' => $amenities->has_food_delivery,
        ];
    }


    public function render()
    {
        return view('livewire.business-form');
    }

    public function save()
    {
        $validated = $this->validate([
            'name' => 'required',
            'url' => 'required|unique:businesses,url,' . auth()->user()->id,
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'description' => 'nullable',
            'card_image' => 'required|image|max:10240',
            'cover_image' => 'required|image|max:10240',
        ]);

        $card_image = Str::random(10);
        $cover_image = Str::random(10);

        $this->card_image->storeAs('photos', $card_image);
        $this->cover_image->storeAs('photos', $cover_image);

        $validated['card_image'] = $card_image;
        $validated['cover_image'] = $cover_image;

        auth()->user()
            ->business->update($validated);

        session()->flash('message', 'Business info updated!');

    }

    public function saveElsewhere()
    {
        $validated = $this->validate([
            'website_url' => 'url',
            'facebook' => 'url',
            'instagram' => 'url',
        ]);

        auth()->user()
            ->business->update($validated);

        session()->flash('elsewhere_message', 'Social media updated!');
    }

    public function saveOpeningHours()
    {
        auth()->user()
            ->business->update([
                'opening_hours' => $this->opening_hours
            ]);

        session()->flash('opening_hours_message', 'Opening hours updated!');
    }

    public function saveAmenities()
    {
        auth()->user()
            ->business->amenities->update([
                'has_parking' => $this->amenities_values['has_parking'],
                'has_outdoor_dining' => $this->amenities_values['has_outdoor_dining'],
                'has_event_accommodation' => $this->amenities_values['has_event_accommodation'],
                'has_wifi' => $this->amenities_values['has_wifi'],
                'accepts_credit_card' => $this->amenities_values['accepts_credit_card'],
                'has_food_delivery' => $this->amenities_values['has_food_delivery'],
            ]);

        session()->flash('amenities_message', 'Amenities updated!');
    }
}
