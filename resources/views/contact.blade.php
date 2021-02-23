@extends('layout')

@section( 'content')

<form 
    method="POST"
    action="/contact"
    class="bg-white p-6 rounded shadow-md"
    style="width: 300px"
>
    @csrf

    <div class="mb-5">
        <label
            for="email"
            class="block text-xs uppercase font-semibold mb-1"
        >
            Email Address 
        </label>

        <input
            type="email"
            id="email"
            name="email"
            class="border px-2 py-1 text-sm w-full"
            required
        />

        @error('email')
            <div class="text-red-500 text-xs" style="color: red">{{ $message }}</div>
        @enderror

            <label
            for="topic"
            class="block text-xs uppercase font-semibold mb-1"
        >
            Topic: 
        </label>

        <input
            type="text"
            id="topic"
            name="topic"
            class="border px-2 py-1 text-sm w-full"
            value = "{{old('topic')}}"
            required
        />

        @error('topic')
            <div class="text-red-500 text-xs" style="color: red">{{ $message }}</div>
        @enderror


        <button
            type="submit"
        >
            Email Me 
        </button>

        @if(session('message'))
            <div>
                {{ session('message') }}
            </div>
        @endif  
    </div>
</form>

@endsection