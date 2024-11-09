@extends('http.layout.base')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">

            <div class="hidden lg:mt-0 lg:col-span-7 lg:flex">
                <img src="https://img.freepik.com/free-vector/access-control-system-abstract-concept_335657-3180.jpg" alt="hero image">
            </div>
            <div class="mr-auto place-self-center lg:col-span-5 w-full">
                <form action="{{route('user.postLogin')}}" class="max-w-sm mx-auto space-y-8" method="POST">
                    @csrf
                    <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Login</h1>
                    <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">Welcome back! Please login to your account.</p>
                    <div class="mt-6">
                        <label for="email" class="block text-sm text-gray-800 dark:text-gray-200">Email Address</label>
                        <input type="email" id="email" name="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 focus:border-purple-400 focus:outline-none focus:ring">
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between">
                            <label for="password" class="block text-sm text-gray-800 dark:text-gray-200">Password</label>
{{--                            <a href="#" class="text-sm text-purple-600 dark:text-purple-400 hover:underline">Forgot your password?</a>--}}
                        </div>
                        <input type="password" id="password" name="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 focus:border-purple-400 focus:outline-none focus:ring">
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="w-full px-4 py-2 text-sm font-semibold text-white bg-purple-600 rounded-md hover:bg-purple-700 focus:outline-none focus:ring">Login</button>
                    </div>
                    <p class="mt-4 text-sm text-gray-600 dark:text-gray-300">Don't have an account? <a href="#" class="text-purple-600 dark:text-purple-400 hover:underline">Register</a></p>
                </form>
            </div>
        </div>
    </section>
@endsection
