<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Business;

class BusinessForm extends Component
{

    public $name = '';
    public $url = '';
    public $address = '';
    public $phone_number = '';
    public $email = '';
    public $description = '';

    public $website_url = '';
    public $facebook = '';
    public $instagram = '';


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
        ]);

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
}
