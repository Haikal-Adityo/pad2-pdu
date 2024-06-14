@extends('layouts.layout')

<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="shadow-box login-card">
            <div class="row justify-content-center align-items-center mb-3">
                <div class="text-center">
                    <img src="{{ asset('assets/img/logo-big.png') }}" alt="Logo PDU">
                    <p class="bodytext gray mt-2">Create your account</p>
                </div>
            </div>

            <!-- Name -->
            <div class="mt-3">
                <x-input-label for="name" :value="__('Name')" /><br>
                <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-3">
                <x-input-label for="email" :value="__('Email')" /><br>
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-3">
                <x-input-label for="password" :value="__('Password')" /><br>
                <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-3">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" /><br>
                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            
            <!-- Company Dropdown -->
            <div class="mt-3">
                <x-input-label for="company_id" :value="__('Company')" /><br>
                <select id="company_id" name="company_id" class="form-control" required>
                    <option value="" disabled selected>Select your company</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->company_id }}">{{ $company->company_name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('company_id')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="button-primary mb-4">
                    {{ __('Register') }}
                </x-primary-button>

                <div class="text-center my-4">
                    Already have an account?
                    <a href="{{ route('login') }}" class="btn btn-warning" style="text-decoration: none;">
                        {{ __('Login') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>
