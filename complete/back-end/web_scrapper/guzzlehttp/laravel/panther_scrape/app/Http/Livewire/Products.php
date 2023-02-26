<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Products extends Component
{
    public $products = [];

    public function mount()
    {
        $this->products = [
            [
                "id" => 1,
                "title" => "Sprite Waterlymon 425 mL",
                "price" => "5.100",
                "product_url" => "https://shopee.co.id/Sprite-Waterlymon-425-mL-i.127192295.4501804525",
                "image_url" => "https://cf.shopee.co.id/file/feeab4341caa2c43b104a995709df777_tn"
            ],
            [
                "id" => 2,
                "title" => "Sprite Waterlymon 425 mL",
                "price" => "5.100",
                "product_url" => "https://shopee.co.id/Sprite-Waterlymon-425-mL-i.127192295.4501804525",
                "image_url" => "https://cf.shopee.co.id/file/feeab4341caa2c43b104a995709df777_tn"
            ],
            [
                "id" => 3,
                "title" => "Sprite Waterlymon 425 mL",
                "price" => "5.100",
                "product_url" => "https://shopee.co.id/Sprite-Waterlymon-425-mL-i.127192295.4501804525",
                "image_url" => "https://cf.shopee.co.id/file/feeab4341caa2c43b104a995709df777_tn"
            ]
        ];
    }

    public function render()
    {
        return view('livewire.products');
    }
}
