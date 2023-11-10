<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" :setting="$setting"/>
            </a>
        </x-slot>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        @if (Auth::user()->role == 'admin')
        <form method="POST" action="{{ route('register') }}">
            @csrf

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

            <!-- Role -->
            <div class="mt-4">
                <x-label for="role" :value="__('Role')" />
                <select name="role" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option selected disabled>Choose a role</option>
                    <option :value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>admin</option>
                    <option :value="user" {{ old('role') == 'user' ? 'selected' : '' }}>user</option>
                </select>
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

            <!-- Status -->
            <div class="mt-4">
                <x-label for="status" :value="__('Status')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="status" value="active" disabled autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('admin.index') }}">
                    {{ __('Back to dashboard') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>

        @elseif (Auth::user()->role == 'user')
        <style type="text/css">
            .alert {
              position: relative;
              padding: 0.75rem 1.25rem;
              margin-bottom: 1rem;
              border: 1px solid transparent;
              border-radius: 0.35rem;
              }
              .alert-danger {
                  color: #78261f;
                  background-color: #fadbd8;
                  border-color: #f8ccc8;
              }
              .alert-dismissible {
                  padding-right: 4rem;
              }

              .alert-dismissible .close {
                  position: absolute;
                  top: 0;
                  right: 0;
                  z-index: 2;
                  padding: 0.75rem 1.25rem;
                  color: inherit;
              }
        </style>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            Area Khusus Admin pale!
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('user.index') }}">
                {{ __('Back to dashboard') }}
            </a>
        </div>
        @endif
    </x-auth-card>
</x-guest-layout>
