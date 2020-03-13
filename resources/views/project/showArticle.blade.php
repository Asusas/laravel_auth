@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <img class="card-img-top" src="{{asset('uploads/photos/' . $NewsItem->image)}}">
                <div class="card-body">
                   <h5 class="card-title">{{ $NewsItem->title }}</h5>
                    <p class="card-text">{{ $NewsItem->content }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Komentaru skacius: {{$NewsItem->comment->count()}}</li>
                    <li class="list-group-NewsItem">Paskelbta: {{ $NewsItem->created_at }}</li>
                </ul>
            </div>
            <div class="col-6 mx-auto mt-3" style="width:200px">
                <form method="post" action="{{route('comments.store')}}">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" type="hidden" value="{{$NewsItem->id}}" name="news_id">
                        <input class="form-control" type="text" name="user" placeholder="Vartotojo vardas">
                        <textarea class="form-control" name="area" id="" cols="30" rows="10" placeholder="Jusu komentaras"></textarea>
                        <input type="submit" value="Komentuoti" class="btn btn-success btn-block">
                    </div>
                </form> 
            </div>
            @foreach ($NewsItem->comment as $item)
            <form style="width:100%">
                <div class="form-group">
                    <h5>Vartotojo {{$item->name}} komentaras:</h5>
                    <h6>--Paskelbtas: {{$item->created_at}}</h6>
                    <div style="height:100px" class=" form-control" >{{$item->comment}}</div>
                </div>
            </form>
            @endforeach
    </div>
</div>
@endsection