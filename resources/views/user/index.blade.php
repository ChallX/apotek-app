@extends('layouts.template')

@section('content')


            @if (Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::get('deleted'))
                <div class="alert alert-danger">{{ Session::get('deleted') }}</div>
            @endif
            <a href="{{route('user.create')}}">
                <button type="button" class="btn mb-3  float-end" style="background-color: #0b525b; color:#ffffff;"> <b>Tambah Pengguna</b></button>
            </a>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="background-color: #240046; color: #ffffff">No</th>
                        <th style="background-color: #240046; color: #ffffff">Nama</th>
                        <th style="background-color: #240046; color: #ffffff">Email</th>
                        <th style="background-color: #240046; color: #ffffff">Role</th>
                        <th style="background-color: #240046; color: #ffffff" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($user as $item)
                            <tr>
                                <td><b>{{ $no++ }}</b></td>
                                <td><b>{{ $item['name'] }}</b></td>
                                <td><b>{{ $item['email'] }}</b></td>
                                <td><b>{{ $item['role'] }}</b></td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('user.edit', $item['id']) }}" class="btn btn-primary mx-3" style="width: 75px;"> <b>Edit</b> </a>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $item->id }}">
                                       <b>Hapus</b> 
                                      </button>

                                      <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                              Apakah anda yakin akan menghapus?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('user.delete', $item['id']) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                              <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
@endsection


<!-- Button trigger modal -->

  
  <!-- Modal -->
