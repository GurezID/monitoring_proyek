@extends('main_blade.main')

@section('conten')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal">
                                                @if ($user->role == 0)
                                                    Client
                                                @elseif($user->role == 1)
                                                    Administrator
                                                @elseif($user->role == 2)
                                                    Pengawas
                                                @elseif($user->role == 3)
                                                    Manajer Proyek
                                                @endif
                                            </button></td>
                                        <td>{{ $user->role }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/administrator/{{ $user->id }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Role</label>
                            </div>
                            <select class="custom-select" name="role" id="role">
                                <option selected>Ubah Role?</option>
                                <option value="0">Client</option>
                                <option value="1">Administrator</option>
                                <option value="2">Pengawas</option>
                                <option value="3">Manajer Proyek</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
