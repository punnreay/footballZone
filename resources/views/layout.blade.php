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
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="/">
				<img src="{{asset('images/logo.png')}}" alt="" height="82" width="164"/></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto">
                    {{-- ///////////////// --}}
                    @auth
                    
                    <li class="Welcome">
                        <span >
                            Welcome {{auth()->user()->name}}
                        </span>
                    </li>
                    <li class="Manage">
                        <a href="/listings/manage" 
                            >  
                            Manage Listings</a
                        >
                    </li>
                    <li class="postfield">
				
                        <button type="button" class="btn btn-success me-md-5"><a href="/listings/create">Post Field</a></button>
                      </li>
                    <li class="postfield">
                        <form class="inline" method="POST" action="/logout">
                        @csrf
                        <Button type="submit" type="button" class="btn btn-success me-md-5">
                           logout
    
                        </Button>
                        </form>
                    </li>
                    {{-- /////////////////////// --}}
                    @else
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="/">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="view_club/view_club.html">View Club</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="booking/booking.html">Booking</a>
					</li>
                    <li class="postfield">
				
                        <button type="button" class="btn btn-success me-md-5"><a href="/listings/create">Post Field</a></button>
                      </li>
                    @endauth
				</ul>
               
            </div>
		</div>
	</nav>

<main>
    {{-- view output --}}
    @yield('content')

</main>
<br><br><br>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous">
</script>
<script src="scripts/app.js"></script>
</body>
</html>