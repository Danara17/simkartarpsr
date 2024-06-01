@extends('layouts.template')

@section('link-css')
    <!--Regular Datatables CSS-->
    <link href="{{ url('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="{{ url('https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css') }}" rel="stylesheet">

    <style>
        /* Ukuran font untuk pencarian */
        .dataTables_filter input {
            font-size: 14px;
            /* Sesuaikan ukuran font sesuai kebutuhan */
        }

        /* Ukuran font untuk "Show x entries" */
        .dataTables_length select {
            font-size: 14px;
            /* Sesuaikan ukuran font sesuai kebutuhan */
        }

        /* Styling untuk tombol "Search" */
        .dataTables_filter label::after {
            content: '';
            /* Menghilangkan default text "Search:" */
        }

        /* Styling untuk "Show x entries" */
        .dataTables_length label::after {
            content: '';
            /* Menghilangkan default text "Show x entries:" */
        }

        /* Ukuran tombol halaman */
        .paginate_button {
            font-size: 12px;
            /* Sesuaikan ukuran font sesuai kebutuhan */
            padding: 5px 10px;
            /* Sesuaikan ukuran padding sesuai kebutuhan */
        }
    </style>
@endsection

@section('content')
    <div class="p-4">
        <div class="flex items-center space-x-5 justify-between shadow-sm bg-white px-3 py-5 rounded-md mb-4">
            <div class="font-medium text-base lg:text-xl">
                Halaman Rapat
            </div>
            <a href="{{ route('meeting.create') }}"
                class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4 md:mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M4 12H20M12 4V20" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </g>
                </svg>
                <div class="hidden md:block">
                    Buat Rapat
                </div>
            </a>
        </div>

        <div class="shadow-sm bg-white px-3 py-5 rounded-md overflow-x-auto">

            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <span class="font-medium">Sukses!</span> {{ session('success') }}
                </div>
            @endif

            <table id="example" class="stripe hover min-w-full" style="width:100%;">
                <thead>
                    <tr class="text-xs">
                        <th data-priority="1" class="lg:table-cell">ID</th>
                        <th data-priority="2" class="lg:table-cell">Judul Rapat</th>
                        <th data-priority="3" class="lg:table-cell">Tanggal</th>
                        <th data-priority="4" class="lg:table-cell">Durasi</th>
                        <th data-priority="5" class="lg:table-cell">Lokasi</th>
                        <th data-priority="5" class="lg:table-cell">Status</th>
                        <th data-priority="6" class="w-0 lg:table-cell">Operasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($meetings as $meeting)
                        <tr class="text-xs">
                            <td class="text-center lg:table-cell">{{ $meeting->id }}</td>
                            <td class="text-center lg:table-cell">{{ $meeting->meeting_title }}</td>
                            <td class="text-center lg:table-cell">{{ $meeting->meeting_date }}</td>
                            <td class="text-center lg:table-cell">
                                {{ $meeting->start_time . ' - ' . $meeting->end_time }}
                            </td>
                            <td class="text-center lg:table-cell">{{ $meeting->location }}</td>
                            <td class="text-center lg:table-cell">{{ $meeting->status }}</td>
                            <td class="text-center lg:table-cell">
                                <a href="{{ route('meeting.edit', $meeting->id) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    Edit
                                </a>
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script-js')
    <!-- jQuery -->
    <script type="text/javascript" src="{{ url('https://code.jquery.com/jquery-3.4.1.min.js') }}"></script>

    <!--Datatables -->
    <script src="{{ url('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
@endsection
