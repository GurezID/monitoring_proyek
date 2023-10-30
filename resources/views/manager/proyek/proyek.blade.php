@extends('main_blade.main')

@section('conten')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">

                        @can('Administrator')
                            <div class="col-sm-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">MANAGER</label>
                                    </div>
                                    <select class="custom-select" id="nameManager" name="nameManager">
                                        <option selected>Pilih manager ...</option>
                                        @foreach ($users as $user)
                                            <option data-url="/manager/proyek/{{ $user->name }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        @endcan

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">NAMA KLIEN</th>
                                    <th scope="col">NAMA PROYEK</th>
                                    <th scope="col">PENGAWAS</th>
                                    <th scope="col">MENEJER</th>
                                    <th scope="col">WAKTU PENGERJAAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proyeks as $proyek)
                                <tr data-href="/manager/proyek/{{ $proyek->id }}/edit">
                                    <th scope="row"> <a class="text-dark"
                                        href="/manager/proyek/{{ $proyek->id }}/edit">{{ $proyek->id }} </a>
                                </th>

                                <td><a class="text-dark"
                                        href="/manager/proyek/{{ $proyek->id }}/edit">{{ $proyek->klien }}</a>
                                </td>
                                <td><a class="text-dark"
                                        href="/manager/proyek/{{ $proyek->id }}/edit">{{ $proyek->name_proyek }}</a>
                                </td>
                                <td><a class="text-dark"
                                        href="/manager/proyek/{{ $proyek->id }}/edit">{{ $proyek->pengawas }}</a>
                                </td>
                                <td><a class="text-dark"
                                        href="/manager/proyek/{{ $proyek->id }}/edit">{{ $proyek->manager }}</a>
                                </td>
                                <td><a class="text-dark"
                                        href="/manager/proyek/{{ $proyek->id }}/edit">{{ \Carbon\Carbon::parse($proyek->time_str)->format('Y-m-d') }}
                                        s/d
                                        {{ \Carbon\Carbon::parse($proyek->time_end)->format('Y-m-d') }}</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const nameManagerSelect = document.getElementById("nameManager");

            nameManagerSelect.addEventListener("change", function() {
                const selectedOption = nameManagerSelect.options[nameManagerSelect.selectedIndex];
                const url = selectedOption.getAttribute("data-url");
                if (url) {
                    window.location.href = url;
                }
            });
        });
    </script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var tableRows = document.querySelectorAll("tbody tr");

        tableRows.forEach(function(row) {
            row.addEventListener("click", function() {
                var href = row.getAttribute("data-href");
                if (href) {
                    window.location = href;
                }
            });
        });
    });
</script>

@endsection
