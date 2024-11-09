@extends('http.layout.base')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100 pt-20 pb-10">
    <div class="max-w-sm bg-white rounded-lg shadow-md p-6 w-full">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="relative">
                    @if($user->getFirstMediaUrl('avatar'))
                        <img class="rounded-full w-20 h-20 object-cover"
                             src="{{$user->getFirstMediaUrl('avatar')}}" alt="Profile Image" onclick="onClickUpload()">
                    @else
                        <img class="rounded-full w-20 h-20 object-cover"
                         src="https://placehold.co/100" alt="Profile Image" onclick="onClickUpload()">
                    @endif
                    <div class="absolute bottom-0 right-0">

                        <img class="w-5 h-5"
                             src="https://cdn-icons-png.freepik.com/256/1159/1159633.png" alt="Profile Image" onclick="onClickUpload()">

                    </div>
                </div>

                <div>
                    <h2 class="text-lg font-semibold">
                        {{$user->name}}
                    </h2>
                    <p class="text-gray-500 text-sm">
                        {{$user->email}}
                    </p>
                </div>
            </div>
        </div>

        <form action="{{route('user.profile.update')}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="mt-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file"
                           class="mt-1 block w-full px-3 py-2 rounded-md text-gray-700 focus:outline-none focus:border-blue-500" id="file" name="avatar" accept="image/*">
                    @error('avatar')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text"
                           class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:border-blue-500"
                           placeholder="Your name" value="{{$user->name}}" name="name">
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Email
                        account</label>
                    <input type="email"
                           class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:border-blue-500"
                           placeholder="Email account" value="{{$user->email}}" name="email">
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Mobile
                        number</label>
                    <input type="tel"
                           class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:border-blue-500"
                           placeholder="Add number" value="{{$user->phone}}" name="phone">
                    @error('phone')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Location</label>
                    <input type="text"
                           class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:border-blue-500"
                           placeholder="Location" value="{{$user->location}}" name="location">
                    @error('location')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6">
                <button
                    class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600" type="submit">
                    Save Change
                </button>
            </div>
        </form>

    </div>
</div>

@endsection

@push('scripts')
    <script>
        function onClickUpload() {
            document.getElementById('file').click();
        }

        document.getElementById('file').addEventListener('change', function (e) {
            var file = e.target.files[0];
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('img').src = e.target.result;
                //add class to image
                document.querySelector('img').classList.add('rounded-full w-15 h-15');
            };
            reader.readAsDataURL(file);
        });
    </script>
@endpush
