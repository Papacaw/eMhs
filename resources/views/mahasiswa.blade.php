@extends('layouts.main')
@section('title' ,'mahasiswa')
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <a href="/mahasiswa/formtambah" class="btn btn-primary" role="button"><i class="bi bi-plus-square"></i> Mahasiswa</a>
            <form action="/mahasiswa/pencarian" method="GET" class="form-inline my-2 my-lg-0 float-right">
                <input name="q" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
        </div>
        <div class="card-body">
            @if (session('flash'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>{{ session('flash') }}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIM</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Minat</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($mhs as $idx => $maha)
                    <tr>
                        <th scope="row">{{ $mhs->firstItem()+$idx }}</th>
                        <td>{{ $maha->nim }}</td>
                        <td>{{ $maha->nama }}</td>
                        <td>{{ $maha->gender }}</td>
                        <td>{{ $maha->prodi }}</td>
                        <td>{{ $maha->minat }}</td>
                        <td>{{ $maha->aksi }}
                          <a href="{{url('mahasiswa/formedit', $maha->id)}}" class="btn btn-success" role="button"><i class="bi bi-pencil-square"></i> EDIT</a>
                          <a href="{{url('mahasiswa/delete', $maha->id)}}" class="btn btn-danger" role="button"><i class="bi bi-trash-fill"></i> DELETE</a>
                        </td>
                      </tr>
                    @endforeach 
                </tbody>
              </table>
              <span>{{ $mhs->currentPage() }}</span>
              <span class="float-right">{{ $mhs->links() }}</span>
        </div>
    </div>
@endsection