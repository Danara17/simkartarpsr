@extends('layouts.template')

@section('content')
    <div class="p-4">
        <div class="flex items-center space-x-5 justify-between shadow-sm bg-white px-3 py-5 rounded-md mb-4">
            <a href="{{ route('meeting.index') }}"
                class="py-2.5 px-5 me-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                <div class="hidden md:block">
                    Kembali
                </div>
            </a>
        </div>
        <div class="shadow-sm bg-white px-3 py-5 rounded-md overflow-x-auto">
            <form action="{{ route('meeting.store') }}" method="POST" class="w-full">
                @csrf

                <div class="mb-4">
                    <label for="meeting_title" class="block text-base mb-1">Judul Rapat</label>
                    <input type="text" name="meeting_title" id="meeting_title" value="{{ old('meeting_title') }}"
                        required
                        class="w-full border border-gray-400 rounded focus:border-primary focus:ring-0 focus:outline-none px-3 py-2">
                    <x-input-error :messages="$errors->get('meeting_title')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <label for="meeting_description" class="block text-base mb-1">Deskripsi Rapat</label>
                    <textarea name="meeting_description" id="meeting_description"
                        class="w-full border border-gray-400 rounded focus:border-primary focus:ring-0 focus:outline-none px-3 py-2">{{ old('meeting_description') }}</textarea>
                    <x-input-error :messages="$errors->get('meeting_description')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <label for="meeting_date" class="block text-base mb-1">Tanggal Rapat</label>
                    <input type="date" name="meeting_date" id="meeting_date" value="{{ old('meeting_date') }}" required
                        class="w-full border border-gray-400 rounded focus:border-primary focus:ring-0 focus:outline-none px-3 py-2">
                    <x-input-error :messages="$errors->get('meeting_date')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <label for="start_time" class="block text-base mb-1">Waktu Mulai</label>
                    <input type="time" name="start_time" id="start_time" value="{{ old('start_time') }}" required
                        class="w-full border border-gray-400 rounded focus:border-primary focus:ring-0 focus:outline-none px-3 py-2">
                    <x-input-error :messages="$errors->get('start_time')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <label for="end_time" class="block text-base mb-1">Waktu Selesai</label>
                    <input type="time" name="end_time" id="end_time" value="{{ old('end_time') }}" required
                        class="w-full border border-gray-400 rounded focus:border-primary focus:ring-0 focus:outline-none px-3 py-2">
                    <x-input-error :messages="$errors->get('end_time')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-base mb-1">Status</label>
                    <select name="status" id="status" required
                        class="w-full border border-gray-400 rounded focus:border-primary focus:ring-0 focus:outline-none px-3 py-2">
                        <option value="">Pilih Status</option>
                        <option value="Dijadwalkan" {{ old('status') == 'Dijadwalkan' ? 'selected' : '' }}>
                            Dijadwalkan
                        </option>
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <label for="location" class="block text-base mb-1">Lokasi</label>
                    <input type="text" name="location" id="location" value="{{ old('location') }}" required
                        class="w-full border border-gray-400 rounded focus:border-primary focus:ring-0 focus:outline-none px-3 py-2">
                    <x-input-error :messages="$errors->get('location')" class="mt-2" />
                </div>


                <div class="flex justify-end">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Buat Rapat
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
