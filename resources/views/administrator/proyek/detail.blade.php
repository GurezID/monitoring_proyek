@extends('main_blade.main')


@section('conten')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-3">

                        @error('name_proyek')
                            <span class="text-tiny+ text-danger">{{ $message }}</span>
                        @enderror
                        <div class="card" style="width: 18rem;">
                            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                                <span>PROYEK</span>
                                <button type="button" class="badge bg-primary ml-auto" data-toggle="modal"
                                    data-target="#exampleModa">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path
                                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c-21.9-21.9-21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3-32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                    </svg>
                                </button>
                            </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <span class="font-weight-bold">NAMA PROYEK :</span> {{ $proyek->name_proyek }}
                                </li>
                                <li class="list-group-item">
                                    <span class="font-weight-bold">NAMA KLIEN :</span> {{ $proyek->klien }}
                                </li>
                                <li class="list-group-item">
                                    <span class="font-weight-bold">NAMA PENGAWAS :</span> {{ $proyek->pengawas }}
                                </li>
                                <li class="list-group-item">
                                    <span class="font-weight-bold">NAMA MENEJER :</span> {{ $proyek->manager }}
                                </li>
                                <li class="list-group-item">
                                    <span class="font-weight-bold">WAKTU PENGERJAAN :</span>
                                    {{ \Carbon\Carbon::parse($proyek->time_str)->format('Y-m-d') }} s/d
                                    {{ \Carbon\Carbon::parse($proyek->time_end)->format('Y-m-d') }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-8 ml-3 mr-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="ml-2 font-weight-bold">RENCANA KERJA</h5>

                            <button type="button" class="btn btn-primary mb-1" data-toggle="modal"
                                data-target="#exampleModal">
                                + BUAT RENCANA
                            </button>
                        </div>
                        <!-- Modal Rencana -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">DATA PROYEK</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="/administrator/rencana">
                                        @csrf
                                        <div class="modal-body">

                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Nama Proyek"
                                                    name="proyek_id" id="proyek_id" value="{{ $proyek->id }}" hidden>
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text">PEKERJAAN :
                                                    </label>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('pekerjaan') is-invalid @enderror"
                                                    placeholder="Nama Pekerjaan" name="pekerjaan" id="pekerjaan"
                                                    value="{{ old('pekerjaan') }}" required>
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text">ALAT :
                                                    </label>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('alat') is-invalid @enderror"
                                                    placeholder="Nama Alat kerja" name="alat" id="alat"
                                                    value="{{ old('alat') }}">
                                            </div>

                                            <label class="input-group-text">WAKTU PENGERJAAN</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="startDate">Tgl Awal:</label>
                                                </div>
                                                <input type="date" id="time_str" name="time_str" required>

                                                <label class="bold ml-1 badge-info mb-0 text-prepend">s/d</label>

                                                <div class="input-group-prepend ml-1">
                                                    <label class="input-group-text" for="endDate">Tgl Akhir:</label>
                                                </div>
                                                <input type="date" id="time_end" name="time_end" required>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Proyek -->
                        <div class="modal fade" id="exampleModa" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">DATA PROYEK</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="/administrator/proyek/{{ $proyek->id }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text">NAMA PROYEK :
                                                    </label>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('name_proyek') is-invalid @enderror"
                                                    placeholder="Nama Proyek" name="name_proyek" id="name_proyek"
                                                    value="{{ old('name_proyek', $proyek->name_proyek) }}" required>
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text">NAMA
                                                        KLIEN</label>
                                                </div>
                                                <select class="custom-select" name="klien" id="klien">
                                                    @foreach ($klien as $user)
                                                        @if (old('klien', $proyek->klien) == $user->name)
                                                            <option value="{{ $user->name }}" selected>
                                                                {{ $user->name }}</option>
                                                        @else
                                                            <option value="{{ $user->name }}">{{ $user->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">NAMA
                                                        PENGAWAS</label>
                                                </div>
                                                <select class="custom-select" name="pengawas" id="pengawas">
                                                    @foreach ($pengawas as $user)
                                                        @if (old('pengawas', $proyek->pengawas) == $user->name)
                                                            <option value="{{ $user->name }}" selected>
                                                                {{ $user->name }}</option>
                                                        @else
                                                            <option value="{{ $user->name }}">{{ $user->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">NAMA
                                                        MANAGER</label>
                                                </div>
                                                <select class="custom-select" name="manager" id="manager">
                                                    @foreach ($manager as $user)
                                                        @if (old('manager', $proyek->manager) == $user->name)
                                                            <option value="{{ $user->name }}" selected>
                                                                {{ $user->name }}</option>
                                                        @else
                                                            <option value="{{ $user->name }}">{{ $user->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label class="input-group-text">WAKTU PENGERJAAN</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="startDate">Tgl Awal:</label>
                                                </div>
                                                <input type="date" id="time_str" name="time_str"
                                                    value="{{ old('time_str', \Carbon\Carbon::parse($proyek->time_str)->format('Y-m-d')) }}"
                                                    required>

                                                <label class="bold ml-1 badge-info mb-0 text-prepend">s/d</label>

                                                <div class="input-group-prepend ml-1">
                                                    <label class="input-group-text" for="endDate">Tgl Akhir:</label>
                                                </div>
                                                <input type="date" id="time_end" name="time_end"
                                                    value="{{ old('time_end', \Carbon\Carbon::parse($proyek->time_end)->format('Y-m-d')) }}"
                                                    required>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">PEKERJAAN</th>
                                    <th scope="col">ALAT KERJA</th>
                                    <th scope="col">WAKTU PENGERJAAN</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">EDIT</th>
                                    <th scope="col">HAPUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proyek->rencana as $rencana)
                                    <tr>
                                        @php
                                            $iterationCounter = $iterationCounter ?? 1;
                                        @endphp
                                        <th scope="row">
                                            {{ $loop->index + 1 }}
                                        </th>
                                        <td>{{ $rencana->pekerjaan }}</td>
                                        <td>{{ $rencana->alat }}</td>
                                        <td>{{ \Carbon\Carbon::parse($rencana->time_str)->format('Y-m-d') }} s/d
                                            {{ \Carbon\Carbon::parse($rencana->time_end)->format('Y-m-d') }}</td>
                                        <td>
                                            <div class="input-group justify-content-center mt-1">
                                                @if ($rencana->status == 1)
                                                    <div class="input-group-text bg-success">
                                                        <input type="checkbox" checked disabled aria-disabled="true">
                                                    </div>
                                                @else
                                                    <div class="input-group-text">
                                                        <input type="checkbox" disabled aria-disabled="true">
                                                    </div>
                                                @endif
                                            </div>


                                        </td>
                                        <td>
                                            <a href="/administrator/proyek/{{ $rencana->id }}">
                                                <button type="button" class="badge badge-info text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                                    </svg>
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="/administrator/proyek/{{ $rencana->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="badge badge-danger text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                        viewBox="0 0 448 512">
                                                        <path
                                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="ml-2 font-weight-bold">LAPORAN KERJA</h5>
                    </div>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">PEKERJAAN</th>
                                <th scope="col">SURVEI</th>
                                <th scope="col">INSIDEN</th>
                                <th scope="col">WAKTU LAPORAN</th>
                                <th scope="col">DETAIL</th>
                                <th scope="col">EDIT</th>
                                <th scope="col">HAPUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proyek->rencana as $rencana)
                                <tr>
                                    @php
                                        $iterationCounter = $iterationCounter ?? 1;
                                    @endphp
                                    <th scope="row">
                                        {{ $loop->index + 1 }}
                                    </th>
                                    <td>{{ $rencana->pekerjaan }}</td>
                                    <td>
                                        <a href="/administrator/proyek/{{ $rencana->id }}">
                                            <button type="button" class="badge badge-info text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM112 256H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/administrator/proyek/{{ $rencana->id }}">
                                            <button type="button" class="badge badge-info text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM112 256H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                                            </button>
                                        </a>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($rencana->time_str)->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="/administrator/proyek/{{ $rencana->id }}">
                                            <button type="button" class="badge badge-info text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                    viewBox="0 0 576 512">
                                                    <path
                                                        d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                                </svg>
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/administrator/proyek/{{ $rencana->id }}">
                                            <button type="button" class="badge badge-info text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                                </svg>
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="/administrator/proyek/{{ $rencana->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="badge badge-danger text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                    viewBox="0 0 448 512">
                                                    <path
                                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
