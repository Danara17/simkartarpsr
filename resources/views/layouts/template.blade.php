<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('link-css')
</head>

<body class="bg-admin relative">

    <div class="flex">
        <!-- Sidebar -->
        <div id="sidebar"
            class="sidebar transform -translate-x-full lg:translate-x-0 transition-transform duration-300 bg-white w-64 fixed lg:relative z-20 min-h-screen">
            <div class="p-4">
                <div class="flex items-center justify-between">
                    <a class="flex gap-2 items-center" href="{{ route('dashboard') }}">
                        <div class="w-10">
                            <img src="{{ asset('asset/dist/kartar.png') }}" alt="Kartar Dashboard" class="">
                        </div>
                        <div class="">
                            <div class="font-medium lg:hidden">SIM Kartar</div>
                            <div class="hidden lg:block font-medium text-xs">Sistem Informasi Manajemen</div>
                            <div class="hidden lg:block text-xs">Karang Taruna Permata Safira Regency</div>
                        </div>
                    </a>
                    <button type="button" class="ml-3 lg:hidden" id="close-sidebar">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.2881 2.77374C16.9627 2.4483 16.435 2.4483 16.1096 2.77374L10.0309 8.8524L3.95229 2.77374C3.62686 2.4483 3.09922 2.4483 2.77378 2.77374C2.44834 3.09918 2.44834 3.62682 2.77378 3.95225L8.85242 10.0309L2.7738 16.1095C2.44836 16.435 2.44836 16.9626 2.7738 17.2881C3.09923 17.6135 3.62687 17.6135 3.95231 17.2881L10.0309 11.2094L16.1096 17.2881C16.435 17.6135 16.9627 17.6135 17.2881 17.2881C17.6135 16.9626 17.6135 16.435 17.2881 16.1096L11.2094 10.0309L17.2881 3.95225C17.6135 3.62682 17.6135 3.09918 17.2881 2.77374Z"
                                fill="#333333" />
                        </svg>
                    </button>
                </div>
                <nav class="mt-4">
                    <div class="py-3 border-b border-slate-200">
                        <div class="font-normal text-sm text-slate-500 mb-2">
                            Dashboard
                        </div>
                        <a href="{{ route('dashboard') }}"
                            class="rounded-lg {{ $page == 'dashboard' ? 'bg-red-600 hover:bg-red-700' : 'hover:bg-slate-200' }} flex space-x-2 p-3">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.52131 10.0805H6.79875C6.39926 10.0772 6.01482 10.2328 5.73001 10.5129C5.44519 10.793 5.28332 11.1748 5.28003 11.5743V17.2277C5.28742 18.0592 5.96724 18.7275 6.79875 18.7205H9.52131C9.92077 18.7239 10.3052 18.5683 10.5901 18.2882C10.8749 18.0081 11.0368 17.6263 11.04 17.2267V11.5743C11.0368 11.1748 10.8749 10.793 10.5901 10.5129C10.3052 10.2328 9.92077 10.0772 9.52131 10.0805Z"
                                    stroke="{{ $page == 'dashboard' ? 'white' : 'black' }}" stroke-width="1"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.52131 4.32059H6.79875C5.98396 4.29799 5.3046 4.93913 5.28003 5.75387V6.72731C5.3046 7.54205 5.98396 8.18319 6.79875 8.16059H9.52131C10.3361 8.18319 11.0155 7.54205 11.04 6.72731V5.75387C11.0155 4.93913 10.3361 4.29799 9.52131 4.32059Z"
                                    stroke="{{ $page == 'dashboard' ? 'white' : 'black' }}" stroke-width="1"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14.4787 12.9606H17.2003C17.6 12.9641 17.9847 12.8087 18.2697 12.5286C18.5547 12.2484 18.7168 11.8665 18.72 11.4668V5.81431C18.7168 5.41483 18.5549 5.03302 18.2701 4.75288C17.9852 4.47275 17.6008 4.31723 17.2013 4.32055H14.4787C14.0793 4.31723 13.6948 4.47275 13.41 4.75288C13.1251 5.03302 12.9633 5.41483 12.96 5.81431V11.4668C12.9633 11.8663 13.1251 12.2481 13.41 12.5282C13.6948 12.8083 14.0793 12.9639 14.4787 12.9606Z"
                                    stroke="{{ $page == 'dashboard' ? 'white' : 'black' }}" stroke-width="1"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14.4787 18.7206H17.2003C18.0155 18.7437 18.6954 18.1024 18.72 17.2873V16.3139C18.6954 15.4991 18.0161 14.858 17.2013 14.8806H14.4787C13.664 14.858 12.9846 15.4991 12.96 16.3139V17.2863C12.984 18.1015 13.6636 18.7431 14.4787 18.7206Z"
                                    stroke="{{ $page == 'dashboard' ? 'white' : 'black' }}" stroke-width="1"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="{{ $page == 'dashboard' ? 'text-white' : 'text-black' }}">
                                Dashboard
                            </div>
                        </a>
                    </div>
                    <div class="py-3">
                        <div class="font-normal text-sm text-slate-500 mb-2">
                            Workspace
                        </div>
                        <a href="{{ route('meeting.index') }}"
                            class="rounded-lg flex space-x-2 p-3
                            {{ $page == 'meeting.index' ? 'bg-red-600 hover:bg-red-700' : 'hover:bg-slate-200' }}">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_74_166)">
                                    <rect width="24" height="24" fill="none" />
                                    <path
                                        d="M10.8844 2.52187H11.2875V9.7125C11.2875 10.2656 11.7375 10.7156 12.2906 10.7156H21.8437C22.3969 10.7156 22.8469 10.2656 22.8469 9.7125V2.52187H23.25C23.5125 2.52187 23.7187 2.30625 23.7187 2.05312C23.7187 1.8 23.5031 1.58437 23.25 1.58437H22.425C22.4062 1.58437 22.3875 1.575 22.3781 1.575C22.3594 1.575 22.3406 1.58437 22.3312 1.58437H11.8125C11.7937 1.58437 11.775 1.575 11.7656 1.575C11.7469 1.575 11.7281 1.58437 11.7187 1.58437H10.8937C10.6312 1.58437 10.425 1.8 10.425 2.05312C10.425 2.30625 10.6219 2.52187 10.8844 2.52187ZM21.9094 9.7125C21.9094 9.75 21.8812 9.77812 21.8437 9.77812H12.2906C12.2531 9.77812 12.225 9.75 12.225 9.7125V2.52187H21.9V9.7125H21.9094Z"
                                        fill="{{ $page == 'meeting.index' ? '#ffffff' : '#000000' }}" />
                                    <path
                                        d="M22.8469 19.3406C22.2281 19.0312 21.1031 18.6281 20.55 18.4406V18.4219C20.8406 18.1594 21.0469 17.8219 21.1688 17.4469C21.4688 17.3531 21.7219 17.1281 21.8531 16.8281C21.9375 16.6594 21.9844 16.4719 21.9844 16.2844C21.9844 16.1531 21.9656 16.0312 21.9188 15.9094C21.8813 15.7594 21.8063 15.6281 21.7031 15.525C21.8156 14.85 21.6469 14.1656 21.225 13.6312C20.7469 13.0125 20.0063 12.6469 19.2 12.6281C19.1625 12.6281 19.125 12.6281 19.1063 12.6281C19.0688 12.6281 19.0313 12.6281 18.9844 12.6281C18.1781 12.6469 17.4375 13.0125 16.9594 13.6312C16.5375 14.175 16.3688 14.8594 16.4813 15.525C16.3781 15.6281 16.3031 15.7594 16.2656 15.9094C16.2188 16.0312 16.2 16.1531 16.2 16.2844C16.2 16.4719 16.2469 16.6594 16.3313 16.8281C16.4625 17.1281 16.7156 17.3531 17.0156 17.4469C17.1281 17.8219 17.3438 18.1594 17.6344 18.4219V18.4406C17.1469 18.6094 16.2 18.9469 15.5438 19.2469C14.9063 18.9562 13.95 18.6094 13.4531 18.4406V18.4219C13.7438 18.1594 13.95 17.8219 14.0719 17.4469C14.3719 17.3531 14.625 17.1281 14.7563 16.8281C14.8406 16.6594 14.8875 16.4719 14.8875 16.2844C14.8875 16.1531 14.8688 16.0312 14.8219 15.9094C14.7844 15.7594 14.7094 15.6281 14.6063 15.525C14.7188 14.85 14.55 14.1656 14.1281 13.6312C13.65 13.0125 12.9094 12.6469 12.1031 12.6281C12.0656 12.6281 12.0281 12.6281 12.0094 12.6281C11.9719 12.6281 11.9344 12.6281 11.8875 12.6281C11.0813 12.6469 10.3406 13.0125 9.86251 13.6312C9.44064 14.175 9.27189 14.8594 9.38439 15.525C9.28126 15.6281 9.20626 15.7594 9.16876 15.9094C9.12189 16.0312 9.10314 16.1531 9.10314 16.2844C9.10314 16.4719 9.15001 16.6594 9.23439 16.8281C9.36564 17.1281 9.61876 17.3531 9.91876 17.4469C10.0313 17.8219 10.2469 18.1594 10.5375 18.4219V18.4406C10.0406 18.6094 9.09376 18.9562 8.44689 19.2469C7.80939 18.9562 6.85314 18.6094 6.35626 18.4406V18.4219C6.64689 18.1594 6.85314 17.8219 6.97501 17.4469C7.27501 17.3531 7.52814 17.1281 7.65939 16.8281C7.74376 16.6594 7.79064 16.4719 7.79064 16.2844C7.79064 16.1531 7.77189 16.0312 7.72501 15.9094C7.68751 15.7594 7.61251 15.6281 7.50939 15.525C7.62189 14.85 7.45314 14.1656 7.03126 13.6312C6.55314 13.0125 5.81251 12.6469 5.00626 12.6281C4.96876 12.6281 4.93126 12.6281 4.91251 12.6281C4.87501 12.6281 4.83751 12.6281 4.79064 12.6281C3.98439 12.6469 3.24376 13.0125 2.76564 13.6312C2.34376 14.175 2.17501 14.8594 2.28751 15.525C2.18439 15.6281 2.10939 15.7594 2.07189 15.9094C2.02501 16.0312 2.00626 16.1531 2.00626 16.2844C2.00626 16.4719 2.05314 16.6594 2.13751 16.8281C2.26876 17.1281 2.52189 17.3531 2.82189 17.4469C2.93439 17.8219 3.15001 18.1594 3.44064 18.4219V18.4406C2.88751 18.6281 1.76251 19.0406 1.14376 19.3406C0.768762 19.5281 0.496887 19.8844 0.431262 20.3062C0.290637 21.1312 0.262512 22.4719 0.262512 22.5281C0.262512 22.7906 0.468762 23.0062 0.731262 23.0062H0.740637C0.993762 23.0062 1.20939 22.8 1.20939 22.5375C1.20939 22.5281 1.23751 21.2156 1.35939 20.4562C1.37814 20.3344 1.45314 20.2312 1.56564 20.175C2.32501 19.8 4.04064 19.2187 4.05939 19.2094C4.25626 19.1437 4.37814 18.9656 4.37814 18.7594V18.1781C4.37814 18.0281 4.31251 17.8875 4.19064 17.8031L4.14376 17.7656C3.90001 17.5875 3.74064 17.3062 3.68439 17.0062L3.67501 16.9406C3.63751 16.7062 3.44064 16.5375 3.20626 16.5375H3.15939C3.07501 16.5375 3.01876 16.4812 3.00001 16.425C2.99064 16.4062 2.98126 16.3875 2.97189 16.3781C2.95314 16.3406 2.94376 16.3031 2.94376 16.2656C2.94376 16.2469 2.94376 16.2187 2.95314 16.2C2.95314 16.1906 2.96251 16.1812 2.96251 16.1812L3.05626 16.125C3.23439 16.0219 3.31876 15.8156 3.27189 15.6187L3.23439 15.4406C3.13126 15 3.22501 14.55 3.50626 14.1937C3.80626 13.8 4.28439 13.575 4.80939 13.5562H4.90314H4.97814C5.50314 13.5656 5.97189 13.8 6.28126 14.1937C6.56251 14.55 6.65626 14.9906 6.55314 15.4406L6.51564 15.6187C6.46876 15.8156 6.55314 16.0219 6.73126 16.125L6.82501 16.1812C6.82501 16.1906 6.83439 16.2 6.83439 16.2C6.84376 16.2187 6.84376 16.2469 6.84376 16.2656C6.84376 16.3031 6.83439 16.3406 6.81564 16.3781C6.80626 16.3969 6.79689 16.4156 6.78751 16.425C6.76876 16.4719 6.71251 16.5375 6.62814 16.5375H6.58126C6.34689 16.5375 6.15001 16.7062 6.11251 16.9406L6.10314 17.0062C6.05626 17.3062 5.88751 17.5875 5.65314 17.7656L5.60626 17.8031C5.48439 17.8969 5.41876 18.0281 5.41876 18.1781V18.7594C5.41876 18.9656 5.55001 19.1437 5.73751 19.2094C5.75626 19.2187 7.47189 19.7906 8.21251 20.1656C8.35314 20.2406 8.52189 20.2406 8.66251 20.175C9.42189 19.8 11.1375 19.2187 11.1563 19.2094C11.3531 19.1437 11.475 18.9656 11.475 18.7594V18.1781C11.475 18.0281 11.4094 17.8875 11.2875 17.8031L11.2406 17.7656C10.9969 17.5875 10.8375 17.3062 10.7813 17.0062L10.7719 16.9406C10.7344 16.7062 10.5375 16.5375 10.3031 16.5375H10.2563C10.1719 16.5375 10.1156 16.4812 10.0969 16.425C10.0875 16.4062 10.0781 16.3875 10.0688 16.3781C10.05 16.3406 10.0406 16.3031 10.0406 16.2656C10.0406 16.2469 10.0406 16.2187 10.05 16.2C10.05 16.1906 10.0594 16.1812 10.0594 16.1812L10.1531 16.125C10.3313 16.0219 10.4156 15.8156 10.3688 15.6187L10.3313 15.4406C10.2281 15 10.3219 14.55 10.6031 14.1937C10.9031 13.8 11.3813 13.575 11.9063 13.5562H12H12.075C12.6 13.5656 13.0688 13.8 13.3781 14.1937C13.6594 14.55 13.7531 14.9906 13.65 15.4406L13.6125 15.6187C13.5656 15.8156 13.65 16.0219 13.8281 16.125L13.9219 16.1812C13.9219 16.1906 13.9313 16.2 13.9313 16.2C13.9406 16.2187 13.9406 16.2469 13.9406 16.2656C13.9406 16.3031 13.9313 16.3406 13.9125 16.3781C13.9031 16.3969 13.8938 16.4062 13.8844 16.425C13.8656 16.4719 13.8094 16.5375 13.725 16.5375H13.6781C13.4438 16.5375 13.2469 16.7062 13.2094 16.9406L13.2 17.0062C13.1531 17.3062 12.9844 17.5875 12.7406 17.7656L12.6938 17.8031C12.5719 17.8969 12.5063 18.0281 12.5063 18.1781V18.7594C12.5063 18.9656 12.6375 19.1437 12.825 19.2094C12.8438 19.2187 14.5594 19.7906 15.3188 20.175C15.45 20.25 15.6188 20.2406 15.7594 20.175C16.5188 19.8 18.2344 19.2187 18.2531 19.2094C18.45 19.1437 18.5719 18.9656 18.5719 18.7594V18.1781C18.5719 18.0281 18.5063 17.8875 18.3844 17.8031L18.3375 17.7656C18.0938 17.5875 17.9344 17.3062 17.8781 17.0062L17.8688 16.9406C17.8313 16.7062 17.6344 16.5375 17.4 16.5375H17.3531C17.2688 16.5375 17.2125 16.4812 17.1938 16.425C17.1844 16.4062 17.175 16.3875 17.1656 16.3781C17.1469 16.3406 17.1375 16.3031 17.1375 16.2656C17.1375 16.2469 17.1375 16.2187 17.1469 16.2C17.1469 16.1906 17.1563 16.1812 17.1563 16.1812L17.25 16.125C17.4281 16.0219 17.5125 15.8156 17.4656 15.6187L17.4281 15.4406C17.325 15 17.4188 14.55 17.7 14.1937C18 13.8 18.4781 13.575 19.0031 13.5562H19.0969H19.1719C19.6969 13.5656 20.1656 13.8 20.475 14.1937C20.7563 14.55 20.85 14.9906 20.7469 15.4406L20.7094 15.6187C20.6625 15.8156 20.7469 16.0219 20.925 16.125L21.0188 16.1812C21.0188 16.1906 21.0281 16.2 21.0281 16.2C21.0375 16.2187 21.0375 16.2469 21.0375 16.2656C21.0375 16.3031 21.0281 16.3406 21.0094 16.3781C21 16.3969 20.9906 16.4156 20.9813 16.425C20.9625 16.4719 20.9063 16.5375 20.8219 16.5375H20.775C20.5406 16.5375 20.3438 16.7062 20.3063 16.9406L20.2969 17.0062C20.25 17.3062 20.0813 17.5875 19.8469 17.7656L19.8 17.8031C19.6781 17.8969 19.6125 18.0281 19.6125 18.1781V18.7594C19.6125 18.9656 19.7438 19.1437 19.9313 19.2094C19.95 19.2187 21.6656 19.7906 22.425 20.175C22.5375 20.2312 22.6125 20.3344 22.6313 20.4469C22.7625 21.2062 22.7813 22.5094 22.7813 22.5281C22.7906 22.7906 23.0156 22.9969 23.2594 22.9969C23.5219 22.9875 23.7281 22.7812 23.7281 22.5187C23.7281 22.4625 23.7 21.1219 23.5594 20.2969C23.4938 19.8937 23.2219 19.5281 22.8469 19.3406Z"
                                        fill="{{ $page == 'meeting.index' ? '#ffffff' : '#000000' }}" />
                                    <path
                                        d="M0.74062 11.775C0.993745 11.7844 1.21875 11.5781 1.22812 11.3156C1.2375 10.9219 1.28437 9.71249 1.37812 9.15937C1.39687 9.02812 1.48125 8.91562 1.60312 8.85937C2.4 8.45624 4.2 7.85624 4.21875 7.84687C4.41562 7.78124 4.5375 7.60312 4.5375 7.39687V6.78749C4.5375 6.64687 4.47187 6.50624 4.35937 6.41249L4.30312 6.36562C4.05 6.16874 3.87187 5.86874 3.81562 5.54062L3.80625 5.47499C3.76875 5.24999 3.57187 5.08124 3.3375 5.08124H3.29062C3.1875 5.08124 3.12187 5.01562 3.09375 4.94999C3.08437 4.94062 3.08437 4.92187 3.075 4.91249C3.05625 4.87499 3.04687 4.82812 3.04687 4.78124C3.04687 4.75312 3.05625 4.72499 3.06562 4.69687C3.06562 4.68749 3.075 4.67812 3.075 4.66874L3.17812 4.61249C3.35625 4.50937 3.44062 4.30312 3.39375 4.10624L3.34687 3.93749C3.23437 3.45937 3.3375 2.99062 3.6375 2.61562C3.95625 2.20312 4.4625 1.95937 5.00625 1.94062H5.20312C5.75625 1.94999 6.2625 2.19374 6.58124 2.60624C6.88125 2.99062 6.98437 3.45937 6.87187 3.93749L6.83437 4.11562C6.7875 4.31249 6.88125 4.51874 7.04999 4.62187L7.14374 4.67812C7.15312 4.69687 7.15312 4.70624 7.1625 4.72499C7.17187 4.74374 7.17187 4.76249 7.17187 4.79062C7.17187 4.83749 7.1625 4.88437 7.14374 4.91249C7.13437 4.93124 7.125 4.94999 7.11562 4.96874C7.0875 5.04374 7.0125 5.09999 6.92812 5.09999H6.87187C6.62812 5.09999 6.43125 5.27812 6.40312 5.52187V5.56874C6.34687 5.88749 6.17812 6.18749 5.90625 6.39374L5.85 6.43124C5.7375 6.52499 5.67187 6.65624 5.67187 6.80624V7.40624C5.67187 7.61249 5.80312 7.79062 5.99062 7.85624C6.00937 7.86562 7.80937 8.46562 8.60625 8.86874C8.72812 8.92499 8.8125 9.03749 8.83125 9.16874C8.925 9.72187 8.9625 10.9312 8.98125 11.325C8.99062 11.5781 9.19687 11.7844 9.45 11.7844C9.45937 11.7844 9.45937 11.7844 9.46875 11.7844C9.73125 11.775 9.9375 11.5594 9.92812 11.2969C9.9 10.575 9.8625 9.56249 9.76875 9.01874C9.70312 8.58749 9.42187 8.22187 9.0375 8.02499C8.39062 7.69687 7.19062 7.27499 6.61874 7.06874V7.02187C6.91875 6.74999 7.14375 6.39374 7.26562 5.99999C7.58437 5.90624 7.84687 5.67187 7.97812 5.36249C8.07187 5.19374 8.11874 4.99687 8.11874 4.79999C8.11874 4.65937 8.1 4.52812 8.05312 4.40624C8.01562 4.25624 7.94062 4.11562 7.82812 4.01249C7.95 3.30937 7.77187 2.58749 7.33124 2.02499C6.83437 1.38749 6.06562 1.01249 5.22187 0.993744H5.00625C4.17187 1.01249 3.40312 1.39687 2.90625 2.03437C2.46562 2.59687 2.29687 3.30937 2.41875 4.01249C2.30625 4.12499 2.23125 4.25624 2.18437 4.40624C2.14687 4.52812 2.11875 4.65937 2.11875 4.79062C2.11875 4.98749 2.16562 5.18437 2.25 5.35312C2.39062 5.66249 2.65312 5.89687 2.97187 5.99062C3.09375 6.38437 3.31875 6.74062 3.61875 7.01249V7.05937C3.04687 7.25624 1.85625 7.68749 1.2 8.00624C0.81562 8.19374 0.53437 8.56874 0.45937 8.99062C0.36562 9.54374 0.318745 10.5562 0.299995 11.2781C0.27187 11.55 0.47812 11.7656 0.74062 11.775Z"
                                        fill="{{ $page == 'meeting.index' ? '#ffffff' : '#000000' }}" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_74_166">
                                        <rect width="24" height="24" fill="none" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <div class="{{ $page == 'meeting.index' ? 'text-white' : 'text-black' }}">
                                Rapat
                            </div>
                        </a>
                        <a href="#" class="rounded-lg hover:bg-slate-200 flex space-x-2 p-3">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 6H3" stroke="#333333" stroke-width="1.2" stroke-linecap="round" />
                                <path d="M10 11H3" stroke="#333333" stroke-width="1.2" stroke-linecap="round" />
                                <path d="M10 16H3" stroke="#333333" stroke-width="1.2" stroke-linecap="round" />
                                <path d="M14 13.5L16.1 16L20 11" stroke="#333333" stroke-width="1.2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="text-black">
                                Absensi
                            </div>
                        </a>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Dark overlay -->
        <div id="overlay" class="hidden lg:hidden fixed inset-0 bg-black opacity-50 z-10"></div>

        <!-- Main content -->
        <div class="flex-auto">
            <div class="flex items-center justify-between lg:justify-end shadow-sm bg-white p-5">
                <button id="menu-button" class="lg:hidden">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.16669 10H16.6667" stroke="#333333" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M4.16669 14.1667H16.6667" stroke="#333333" stroke-width="1.5"
                            stroke-linecap="round" />
                        <path d="M4.16669 5.83337H16.6667" stroke="#333333" stroke-width="1.5"
                            stroke-linecap="round" />
                    </svg>
                </button>
                <div class="relative flex items-center space-x-4">
                    <button id="avatar-button" type="button" class="overflow-hidden rounded-full"
                        style="width: 40px; height: 40px">
                        <img src="{{ url('https://ui-avatars.com/api/?name=' . auth()->user()->name . '&font-size=0.4&background=' . substr(md5(auth()->user()->name), 0, 6) . '&color=fff') }}"
                            alt="Avatar" class="w-full h-full object-cover">
                    </button>
                    <!-- Dropdown Menu -->
                    <div id="dropdown-menu"
                        class="hidden absolute right-0 top-10 mt-2 w-48 bg-white rounded-md shadow-lg z-20 transition-all duration-200 ease-in-out opacity-0 transform scale-95">
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();this.closest('form').submit();"
                                class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Logout</a>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Main content area -->
            @yield('content')

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.getElementById('menu-button');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const closeSideBar = document.getElementById('close-sidebar');
            const avatarButton = document.getElementById('avatar-button');
            const dropdownMenu = document.getElementById('dropdown-menu');

            menuButton.addEventListener('click', () => {
                sidebar.classList.toggle('translate-x-0');
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            });

            closeSideBar.addEventListener('click', () => {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0');
                overlay.classList.add('hidden');
            });

            overlay.addEventListener('click', () => {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0');
                overlay.classList.add('hidden');
            });

            avatarButton.addEventListener('click', () => {
                if (dropdownMenu.classList.contains('hidden')) {
                    dropdownMenu.classList.remove('hidden');
                    setTimeout(() => {
                        dropdownMenu.classList.add('opacity-100', 'scale-100');
                        dropdownMenu.classList.remove('opacity-0', 'scale-95');
                    }, 10);
                } else {
                    dropdownMenu.classList.add('opacity-0', 'scale-95');
                    dropdownMenu.classList.remove('opacity-100', 'scale-100');
                    dropdownMenu.addEventListener('transitionend', () => {
                        dropdownMenu.classList.add('hidden');
                    }, {
                        once: true
                    });
                }
            });

            document.addEventListener('click', (event) => {
                if (!avatarButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('opacity-0', 'scale-95');
                    dropdownMenu.classList.remove('opacity-100', 'scale-100');
                    dropdownMenu.addEventListener('transitionend', () => {
                        dropdownMenu.classList.add('hidden');
                    }, {
                        once: true
                    });
                }
            });
        });
    </script>

    @yield('script-js')

</body>

</html>
