@extends('layout')
@section('content')
@include('partials/_search')
<div class="background">
    <div class="container" id="card-field">
        <div class="row row-cols-1 row-cols-md-3 g-5">
           
@unless(count($listings)==0)


@foreach ($listings as $listing)
<div class="col">
    <div class="card" style="width: 25rem;">
        <img src="{{$listing->fieldPic ? asset('storage/'. $listing->fieldPic) :  asset('/images/no-image.png')}}" class="card-img-top" alt="Downtown">
        <div class="card-body">
            <h5 class="card-title"><a href="/listings/{{$listing->id}}">{{$listing->fieldName}}</a></h5>
            <div class="location pt-2">
                <i class="bi bi-geo-alt"></i>
                {{$listing->location}}
            </div>
            <div class="telephone py-3">
                <i class="bi bi-telephone"></i>
                {{$listing->phone}}
            </div>
            <div class="small-ratings">Rating:
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star"></i>
            </div>
            <a href="/booking" class="btn btn-success">Booking Now</a>
        </div>
    </div>
</div>
    
@endforeach

@else
<p> No listings found</p>
@endunless


        </div>
        
    </div>
    
</div>
<div class="container">{{$listings->links()}}</div>
    

@endsection

