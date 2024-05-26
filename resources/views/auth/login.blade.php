<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Sistem Informasi Karang Taruna PSR</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="flex flex-col lg:flex-row h-screen">
        <!-- Left Side -->
        <div class="bg-gray-600 lg:w-1/2 py-16 flex justify-center items-center">
            <div class="w-16 h-16 lg:w-64 lg:h-64 overflow-hidden ">
                <img src="{{ asset('asset/dist/kartar.png') }}" alt="Logo" class="w-full h-full object-cover">
            </div>
        </div>
        <!-- Right Side -->
        <div class="flex flex-col justify-center items-center lg:w-1/2 py-12 px-5 md:px-20">
            <form action="{{ route('login') }}" method="POST" class="w-full max-w-sm md:w-full">
                @csrf
                <div class="text-center mb-6">
                    <div class="font-medium text-xl lg:text-3xl">Login</div>
                    <div class="text-xs lg:text-sm">Selamat Datang di SIM Kartar Permata Safira Regency</div>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-base mb-1">Email</label>
                    <input type="email" name="email" id="email" required
                        class="w-full border border-gray-400 rounded focus:border-primary focus:ring-0 focus:outline-none px-3 py-2">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-base mb-1">Password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full border border-gray-400 rounded focus:border-primary focus:ring-0 focus:outline-none px-3 py-2">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block my-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-primary shadow-sm focus:ring-primary-500 dark:focus:ring-primary-600 dark:focus:ring-offset-gray-800"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-primary hover:bg-primary-700 text-white py-2 rounded transition duration-300 ease-in-out">
                        Login
                    </button>
                </div>

                <div class="mt-4 text-center">
                    <a href="#" class="text-sm text-primary hover:underline">Back to Home</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
