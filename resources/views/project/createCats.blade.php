@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row">
        <div class=" col-md-6 mx-auto">
            <form method="post" action="{{route('categories.store')}}">
                @csrf
                <div class=" form-group">
                <label>Kategorija:</label>
                <input class=" form-control" type="text" name="category" value="{{old('category')}}" placeholder="Iveskite kategorijos pavadinima">
                <br>
                <input class="btn btn-success btn-block" type="submit" value="Tvirtinti">
            </div>
            </form>
        </div>
    </div>
</div>

@endsection