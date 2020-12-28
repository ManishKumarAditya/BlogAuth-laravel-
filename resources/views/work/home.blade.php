@extends(' work.base')
@section('title')
this is|homepage
@endsection
@section('content')
<div class="cover" style="background-image: url('manishk.jpg')">
<div class="container">
    <div class="row">
        <div class="col-lg-9 mx-auto">
            @foreach ($record as $i)
            <div class="card mt-5">
                <div class="card-header bg-secondary text-white text-center">Detaills </div>
                <div class="card-body bg-light">
                    <div class="row">
                        <div class="col-lg-7">
                            <h4 class=""> Title:- {{$i->title}}</h4>

                            <h5 class="text-danger">Author:- <h5 class="lead">{{$i->author}}</h5></h5>
                            <hr>
                            <h5 class="text-warning">Description:- <h6 class="lead">{{$i->body}}</h6></h5>
                           
                            <form action="{{route('post.destroy',['post'=>$i->id])}}" class="form-inline" method="POST">
                                @method('delete')
                                @csrf
                                <a href="{{route('post.show',['post'=>$i->id])}}" class="btn btn-dark">View</a>
                                <a href="{{route('post.edit',['post'=>$i->id])}}" class="btn btn-warning">Edit</a>
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        
                        </div>
                        <div class="col-lg-3">
                            <img src="{{asset('images/'. $i->image)}}" alt="" height="200px" width="300px" class="mr-2">
                        </div>

                    </div>

                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
</div>
@endsection
