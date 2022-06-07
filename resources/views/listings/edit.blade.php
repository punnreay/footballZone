
<html lang="en">
    <head>
        
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
                  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
                  crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
            <title>Football Zone</title>
            <link rel="shortcut icon" type="image/png" href="{{asset('images/no-image.png')}}">
            <link rel="stylesheet" href="{{asset('images/style.css')}}" type="text/css"/>
        
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
    <body class="mb-38">
        <nav class="flex justify-between items-center mb-4">
            <a href="/"
                ><img class="w-52" src="{{asset('images/logo.png')}}" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                <li>
                    <a href="manage.html" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i> Manage Gigs</a
                    >
                </li>
                <li>
                    <form action="index.html">
                        <button>
                            <i class="fa-solid fa-door-closed"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>

        <main>
            <div class="mx-4">
                <div
                    class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
                >
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Edit a Field
                        </h2>
                        <p class="mb-4">Edit: {{$listing->fieldName}}</p>
                    </header>

                    <form method="POST" action="/listings/{{$listing->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label for="title" class="inline-block text-lg mb-2"
                                >Club name</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="fieldName"
                                placeholder="Example: Senior Laravel Developer"
                                value="{{$listing->fieldName}}"
                            />@error('fieldName')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p> 
                         @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="location"
                                class="inline-block text-lg mb-2"
                                >Location</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="location"
                                placeholder="Example: Remote, Boston MA, etc"
                                value="{{$listing->location}}"
                            />@error('location')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p> 
                         @enderror
                        </div>
                        <div class="mb-6">
                            <label
                                for="phone"
                                class="inline-block text-lg mb-2"
                                >Phone</label
                            >
                            <input
                                type="number"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="phone"
                                placeholder="Example: Remote, Boston MA, etc"
                                value="{{$listing->phone}}"
                            />@error('phone')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p> 
                         @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="map"
                                class="inline-block text-lg mb-2"
                            >
                                Map link/ URL
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="map"
                                value="{{$listing->map}}"
                            />@error('map')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p> 
                         @enderror
                        </div>


                        <div class="mb-6">
                            <label for="logo" class="inline-block text-lg mb-2">
                                Field Pic
                            </label>
                            <img
                            class="w-48 mr-6 mb-6"
                            src="{{$listing->fieldPic ? asset('storage/'. $listing->fieldPic) :  asset('/images/no-image.png')}}"
                            alt=""
                        />
                            @error('fieldPic')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p> 
                         @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="description"
                                class="inline-block text-lg mb-2"
                            >
                                Field Description
                            </label>
                            <textarea
                                class="border border-gray-200 rounded p-2 w-full"
                                name="description"
                                rows="10"
                                placeholder="Include tasks, requirements, salary, etc"
                                
                            >{{$listing->description}}</textarea>@error('description')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p> 
                         @enderror
                        </div>

                        <div class="mb-6">
                            <button
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                            >
                                Edit Field
                            </button>

                            <a href="/" class="text-black ml-4"> Back </a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </body>
    <footer class="bg-success text-center text-lg-start text-white">
        <div class="container p-5">
            <div class="row">
                <div class="col-lg-3 col-md-12 mb-4 mb-md-0">
                    <h4 class="text fw-bold py-4">Contact Us</h4>
                    <p>+855  966506158</p>
                    <p>+855  911289302</p>
                    <p>+855  690378923</p>
                </div>
                <div class="col-lg-3 col-md-12 mb-4 mb-md-0">
                    <h4 class="text fw-bold py-4">About Us</h4>
                    <p>##provide  field to play for player</p>
                    <p>enhance marketing for club</p>
                </div>
                <div class="col-lg-3 col-md-12 mb-4 mb-md-0">
                    <h4 class="text fw-bold py-4">Address</h4>
                    <p>#Stem Building , RUPP</p>
                    <p>Phnom Penh</p>
                </div>
                <div class="col-lg-3 col-md-12 mb-4 mb-md-0">
                    <h4 class="text fw-bold py-4">Follow Us</h4>
                    <div class="social-links">
                        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="#" class="twitter"><i class="bx bxl-telegram"></i></a>
                        <a href="#" class="google"><i class="bx bxl-google"></i></a>
                        <a href="#" class="github"><i class="bx bxl-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            @2022.<span style="color:#00C800">Footballzone</span> are built by ITE_Team 10
            <a class="text-dark" href="#"></a>
            <div class="pull-right d-flex">
                <b>FE, RUPP</b>
            </div>
        </div>
    </footer>
</html>

