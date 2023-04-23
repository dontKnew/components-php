<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ScraperForm extends Component
{

    public function scrape()
    {
        dd("start fetching");
    }

    public function render()
    {
        return view('livewire.scraper-form');
    }
}
