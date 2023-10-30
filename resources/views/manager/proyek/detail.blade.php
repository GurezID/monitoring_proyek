@extends('main_blade.main')


@section('conten')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-lg-4">
                        @error('name_proyek')
                            <span class="text-tiny text-danger">{{ $message }}</span>
                        @enderror

                        <div class="card" style="width: 18rem;">
                            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                                <span>PROYEK</span>
                            </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <span class="font-weight-bold">NAMA PROYEK:</span> {{ $proyek->name_proyek }}
                                </li>
                                <li class="list-group-item">
                                    <span class="font-weight-bold">NAMA KLIEN:</span> {{ $proyek->klien }}
                                </li>
                                <li class="list-group-item">
                                    <span class="font-weight-bold">NAMA PENGAWAS:</span> {{ $proyek->pengawas }}
                                </li>
                                <li class="list-group-item">
                                    <span class="font-weight-bold">NAMA MENEJER:</span> {{ $proyek->manager }}
                                </li>
                                <li class="list-group-item">
                                    <span class="font-weight-bold">WAKTU PENGERJAAN:</span>
                                    {{ \Carbon\Carbon::parse($proyek->time_str)->format('Y-m-d') }} s/d
                                    {{ \Carbon\Carbon::parse($proyek->time_end)->format('Y-m-d') }}
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="ml-2 font-weight-bold">RENCANA KERJA</h5>
                        </div>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">PEKERJAAN</th>
                                    <th scope="col">ALAT KERJA</th>
                                    <th scope="col">WAKTU PENGERJAAN</th>
                                    <th scope="col">STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proyek->rencana as $rencana)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="col-sm-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="ml-2 font-weight-bold">LAPORAN KERJA</h5>

                        <button type="button" class="btn btn-primary mb-1" data-toggle="modal"
                            data-target=".bd-example-modal-lg">
                            + BUAT LAPORAN
                        </button>
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
                            @foreach ($proyek->laporan as $laporan)
                                <tr>
                                    @php
                                        $iterationCounter = $iterationCounter ?? 1;
                                    @endphp
                                    <th scope="row">
                                        {{ $loop->index + 1 }}
                                    </th>
                                    <td>{{ $laporan->pekerjaan }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info mb-1" data-toggle="modal"
                                            data-target="#survei">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                                <path
                                                    d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM112 256H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                            </svg>
                                        </button>
                                        <!-- Modal survei -->
                                        <div class="modal fade" id="survei" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">SURVEI</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @forelse ($laporan->survei as $survei)
                                                            <div class="card">
                                                                <h5 class="card-header">{{ $survei->judul }}</h5>
                                                                <div class="card-body">
                                                                    <h5 class="card-title">{{ $survei->detail }}</h5>
                                                                    <a href="#"
                                                                        class="btn btn-primary mt-3">Selengkapnya</a>
                                                                </div>
                                                            </div>
                                                        @empty
                                                            Tidak ada survei
                                                        @endforelse
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target=".bd-buat-insiden-modal-lg">
                                                            Buat
                                                            Survei
                                                        </button>
                                                        <x-modal_buat_survei :laporan="$laporan" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info mb-1" data-toggle="modal"
                                            data-target="#example{{ $laporan->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                                <path
                                                    d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM112 256H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                            </svg>
                                        </button>

                                        <!-- Modal Insiden -->
                                        <div class="modal fade" id="example{{ $laporan->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">INSIDEN</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @forelse ($laporan->insiden as $insiden)
                                                            <div class="card">
                                                                <h5 class="card-header">{{ $insiden->judul }}</h5>
                                                                <div class="card-body">
                                                                    <h5 class="card-title">{{ $insiden->detail }}</h5>
                                                                    <a href="#"
                                                                        class="btn btn-primary mt-3">Selengkapnya</a>
                                                                </div>
                                                            </div>
                                                        @empty
                                                            Tidak ada insiden
                                                        @endforelse
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target=".bd-buat-insiden-modal-lg">
                                                            Buat
                                                            Insiden
                                                        </button>
                                                        <x-modal_buat_insiden :laporan="$laporan" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $laporan->created_at }}</td>
                                    <td>
                                        <a href="/manager/laporan/{{ $laporan->id }}">
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
                                        <a href="/administrator/proyek/{{ $laporan->id }}">
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
                                        <form action="/administrator/proyek/{{ $laporan->id }}" method="POST">
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

    <x-modal_buat_laporan :proyek="$proyek" />





    <script>
        window.addEventListener("DOMContentLoaded", () => Alpine.start());

        // ubah gambar yang akan di gunakan
        function viewImg(inputId) {
            const inputElement = document.getElementById(inputId); // Dapatkan elemen input file dengan ID yang sesuai
            const imgView = document.querySelector(
                `.${inputId}-view`); // Dapatkan elemen gambar tampilan dengan class yang sesuai

            // Pastikan ada file yang dipilih
            if (inputElement.files && inputElement.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Ubah sumber gambar tampilan
                    imgView.src = e.target.result;
                };

                // Baca file yang dipilih sebagai URL data
                reader.readAsDataURL(inputElement.files[0]);
            }
        }

        // auto slug
        const judul = document.querySelector('#judul');
        const url = document.querySelector('#url');

        judul.addEventListener('change', function() {
            fetch('/user/posts/isiUrl?judul=' + judul.value)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => url.value = data.url)
                .catch(error => {
                    console.error('Fetch error:', error);
                    // Tambahkan penanganan kesalahan di sini, seperti menampilkan pesan kepada pengguna
                });
        });
    </script>
@endsection
