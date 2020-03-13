@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class=" col-md-6">
            <form method="post" action="{{route('categories.update', $category->id)}}">
                @csrf
                @method('put')
                <div class=" form-group">
                <label>Redaguoti kategorija</label>
                <input class=" form-control" type="text" name="category" value="{{$category->name}}" required>
                <br>
                <input class="btn btn-success" type="submit" value="Tvirtinti">
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
