<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Artikel;

class IndexArtikel extends Component
{
    protected $listeners = [
        'indexArtikel'
    ];

    public function render()
    {
        $art = Artikel::orderBy('id', 'desc')->paginate(10);
        return view('livewire.index-artikel', ['art' => $art]);
    }

    public function indexArtikel($artikel)
    {
        
    }
}
