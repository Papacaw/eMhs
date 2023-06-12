<div>
    <form wire:submit.prevent="simpan">
        <div class="form-group">
            <label>JUDUL</label>
            <input wire:model="judul" type="text" class="form-control" placeholder="Masukkan Judul">
        </div>
        <div class="form-group">
            <label>NAMA</label>
            <input wire:model="nama" type="text" class="form-control" placeholder="Masukkan Nama">
        </div>
        <div class="form-group">
            <textarea wire:model="deskripsi" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info">SUBMIT</button>
        </div>
    </form>
</div>
