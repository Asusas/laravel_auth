@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9">
            @foreach($filter->news as $item)
                <div class="card">
                <img class="card-img-top" src="{{asset('uploads/photos/' . $item->image)}}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ $item->content }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                       
                        <li class="list-group-item">Komentaru skaicius</li>
                        <li class="list-group-item">Paskelbta: {{ $item->created_at }}</li>
                    </ul>
                    <div class="card-body list-inline">
                        <a class="list-inline-item btn btn-info" href="{{route('news.edit', $item->id )}}" class="card-link">Redaguoti straipsni</a>
                        <form class="list-inline-item" action="{{ route('news.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="Trinti straipsni" />
                        </form>
                    </div>
                </div>
        @endforeach
    </div>
    <div class="col-md-3">
        <div class="card" >
                <div class="card-body">
                <h5 class="card-title">Kategorijos</h5>
                    <ul class="list-group">
                        @foreach ($Cat as $cats)
                            <a href="{{route('categories.show', $cats->id )}}"><li class="list-group-item"> {{$cats->name}} </li></a> 
                        @endforeach
                        <a class="list-group-item" href="{{route('news.index')}}"> <strong>VISI STRAIPSNIAI</strong> </a> 
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection









