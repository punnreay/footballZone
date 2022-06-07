@extends('layout')
@section('content')

{{-- <!DOCTYPE html> --}}
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#00C800",
                        },
                    },
                },
            };
        </script>
    </head>
    <main>
    <body class="mb-38">

            <a href="/" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a>

            <div class="mx-4">
                <div class="bg-gray-60 border border-gray-200 p-10 rounded">
                    <div class="flex flex-col items-center justify-center text-center"
                    >
                        <img
                            class="w-48 mr-6 mb-6"
                            src="{{$listing->fieldPic ? asset('storage/'. $listing->fieldPic) :  asset('/images/no-image.png')}}"
                            alt=""
                        />

                        <h3 class="text-2xl mb-2">{{$listing->fieldName}}</h3>
                        <div class="text-xl font-bold mb-2"><i class="fa-solid fa-phone"></i> {{$listing->phone}}</div>
                        <div class="text-lg my-2">
                            <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                        </div>
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Field Description
                            </h3>
                            <div class="text-lg space-y-6">
                                {{$listing->description}}

                                <br><br><br><br>
                                <a href="booking/booking.html" class="btn btn-success">Booking Now</a>
                                <a
                                    href="{{$listing->map}}"
                                    target="_blank"
                                    class="block bg-laravel text-white py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-map"></i> Google Map</a
                                >
                            </div>
                            <br>

                            <a href="/listings/{{$listing->id}}/edit">
                                <i class="fa-solid fa-pencil"> </i> Edit
                                 </a>
                                 <br>
                                 <form method="POST" action="/listings/{{$listing->id}}">
                                 @csrf
                                 @method('DELETE')
                                 <br>
                                 <button class="text-red-500">
                                     <i class="fa-solid fa-trash"> DELETE</i>
                                 </button>
             
             
                                 </form>
             
                        </div>
                    </div>
                </div>
            </div>

    </body>
    </main>
</html>

@endsection