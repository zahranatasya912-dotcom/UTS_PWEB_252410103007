@extends('layouts.app')

@section('title', 'Login - UTS Pemrograman Web')

@section('content')
<div class="max-w-md mx-auto mt-6 bg-white p-6 rounded-lg shadow-md border border-gray-200">
    <h2 class="text-xl font-bold text-gray-800 text-center mb-6">Form Login</h2>

    <form action="{{ route('login.process') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
            <input type="text" 
                   name="username" 
                   id="username" 
                   value="Natasya Zulaikha" 
                   required
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                   placeholder="Masukkan username">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" 
                   name="password" 
                   id="password" 
                   value="12345" 
                   required
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                   placeholder="Masukkan password">
        </div>

        <button type="submit" 
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md transition">
            Login
        </button>
    </form>
</div>
@endsection
