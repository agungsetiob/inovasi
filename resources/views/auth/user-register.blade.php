<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            atau klik <a class="text-primary" target="_blank" href="https://api.whatsapp.com/send?phone=6282225976594&text=Halo admin saya melakukan pendaftaran akun web rsud, mohon diaktifkan akun saya. Terimakasih">disini</a>
            @php
            Session::forget('success');
            @endphp
            
        </div>
        @endif

        <form method="POST" action="{{ route('register-user') }}" enctype="multipart/form-data">
            @csrf

            <div class="text-center">
                <h4
                class="
                text-3xl
                font-normal
                text-primary
                relative
                inline-flex
                "
                >
                Registration Form
            </h4>
        </div>

        <!-- Name -->
        <div>
            <x-label for="name" :value="__('Name')" />

            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
        </div>

        <!-- skpd -->
        <div class="mt-4">
            <x-label for="skpd_id" :value="__('SKPD')" />

            <select name="skpd_id" id="skpd_id" class="form-control @error('skpd_id') is-invalid @enderror" required>
                <option value="" disabled selected>Pilih SKPD</option>
                @foreach ($skpds as $s)
                <option value="{{ $s->id }}" {{ old('category') == $s->id ? 'selected' : ''}}>{{ $s->nama }}</option>
                @endforeach
            </select>
        </div>

        <!-- Username -->
        <div class="mt-4">
            <x-label for="username" :value="__('Username')" />

            <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-label for="password" :value="__('Password')" />

            <x-input id="password" class="block mt-1 w-full"
            type="password"
            name="password"
            required autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-input id="password_confirmation" class="block mt-1 w-full"
            type="password"
            name="password_confirmation" required />
        </div>

        {{-- profile photo
        <div class="form-group mt-4">
            <x-label for="avatar" :value="__('Avatar')" />
            <div class="input-group">
                <label class="input-group-btn">
                    <span class="btny btn-outline-primary">Browse
                        <input accept="image/*" id="avatar" type="file" style="display: none;" multiple name="avatar">
                    </span>
                </label>
                <input id="uploadFile" type="text" class="form-control @error('avatar') is-invalid @enderror" readonly placeholder="Choose an image">
            </div>
        </div>
        <script type="text/javascript">
            document.getElementById("avatar").onchange = function ()
            {
                document.getElementById("uploadFile").value = this.value;
            }
        </script> --}}

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-button class="ml-4">
                {{ __('Register') }}
            </x-button>
        </div>
    </form>
</x-auth-card>
</x-guest-layout>
