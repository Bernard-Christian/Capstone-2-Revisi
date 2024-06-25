<x-guest-layout>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />

            <select id="role" class="block mt-1 w-full" name="role" required autofocus>
                <option value="admin">Admin</option>
                <option value="prodi">Program Studi</option>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="fakultas">Fakultas</option>
            </select>
        </div>

        <!-- Prodi -->
        <div>
            <x-input-label for="prodi" :value="__('Prodi')" />
            <x-text-input id="prodi" class="block mt-1 w-full" type="text" name="prodi" :value="old('prodi')" required autofocus autocomplete="prodi" />
            <x-input-error :messages="$errors->get('prodi')" class="mt-2" />
        </div>

        <!-- Fakultas -->
        <div>
            <x-input-label for="fakultas" :value="__('Fakultas')" />
            <x-text-input id="fakultas" class="block mt-1 w-full" type="text" name="fakultas" :value="old('fakultas')" required autofocus autocomplete="fakultas" />
            <x-input-error :messages="$errors->get('fakultas')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
