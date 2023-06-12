<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Artikel;

class FormArtikel extends Component
{
    public $nama;
    public $judul;
    public $deskripsi;

    public function render()
    {
        return view('livewire.form-artikel');
    }

    public function simpan()
    {
        $artikel = Artikel::create([
            'nama' => $this->nama,
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
        ]);

        $this->resetInput();
        $this->emit('indexArtikel', $artikel);
    }

    public function resetInput()
    {
        $this->nama = null;
        $this->judul = null;
        $this->deskripsi = null;
    }
}
