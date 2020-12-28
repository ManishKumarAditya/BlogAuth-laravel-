@extends(' work.base')
@section('title')
this is|homepage
@endsection
@section('content')
<div class="cover" style="background-image: url('mkaditya.jpg')">
<div class="container">
    <div class="row">
        <div class="col-lg-9 mx-auto">
        
            <div class="card mt-5">
                <div class="card-header bg-secondary text-white text-center">Detaills </div>
                <div class="card-body bg-light">
                    <div class="row">
                        <div class="col-lg-7">
                            <h4 class="">Title:- {{$req->title}}</h4>

                            <h5 class="text-danger">Author:- <h5 class="lead">{{$req->author}}</h5></h5>
                            <hr>
                            <h5 class="text-warning">Description:- <h6 class="lead">{{$req->body}}</h6></h5>
                           
                           
                        </div>
                        <div class="col-lg-3">
                            <img src="{{asset('images/'. $req->image)}}" alt="" height="200px" width="300px" class="mr-2">
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
</div>
@endsection
