@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8 mx-auto">
        <h1>Redaguoti straipsni</h1>
            <form method="post" action="{{route('news.update', $NewsItem->id)}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                {{-- <input type="hidden" - cia perduodame duomenu bazei vartotojo id --}}
            <input type="hidden" value="{{Auth::user()->id}}" name="user">
            <div class="form-group">
            <input class="form-control" type="text" name="title" value="{{$NewsItem->title}}" required>
            </div>
            <div class="form-group">
                    <textarea class="form-control" name="content" cols="100%" rows="10" required> {{$NewsItem->content}} </textarea>
            </div>
            <div class=" input-group">
                <div class="custom-file">
                    <label for="" class="custom-file-label">Pasirinkite antrastes paveiksleli</label>
                    <input type="file" class=" custom-file-input" name="image" value="{{asset('uploads/photos/'. $NewsItem->image)}}"> >
                </div>
            </div>
            <br>
            <div class="form-group">
                <input class="btn btn-success btn-block form-control" type="submit" value="Irasyti">
            </div>
        </form>
    </div>
</div>

@endsection