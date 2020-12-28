@extends('work.base')
@section('title')
    this|editpage
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-7 mt-5 mx-auto">
            <div class="card">
                <div class="card-header text-center bg-dark text-white">Insert page</div>
                <div class="card-body bg-light ">
            <form action="{{route('post.update',['post'=>$data->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="mb-3">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" value="{{$data->title}}">
                <small class="text-danger">{{$errors->first('title')}}</small>
            </div>
            <div class="mb-3">
                <label for="">image</label>
                <input type="file" name="image" class="form-control">
                <small class="text-danger">{{$errors->first('image')}}</small>
            </div>
            <div class="mb-3">
                <label for="">author</label>
                <input type="text" name="author" class="form-control" value="{{$data->author}}">
             @error('author')
                 <span class="text-danger small">{{$message}}</span>
             @enderror
            </div>
            <div class="mb-3">
                <label for="">body</label>
                <textarea name="body" id=""  rows="10" class="form-control">{{$data->body}}</textarea>
                <small class="text-danger">{{$errors->first('body')}}</small>
            </div>
            <div class="mb-3">
            
                <input type="submit" name="send" class="btn btn-danger">
                
            </div>

            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
