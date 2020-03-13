@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
           {{-- <h2 style="color: green">{{$message=Session::get('success')}}</h2>  --}}
           <br>
           @guest

           <a class="btn btn-warning btn-block" href="{{ route('login') }}">Noredami tvarkyti straipsnius prasome prisijungti</a>
           @endguest
            
            @if($NewsItem->count())

            @foreach($NewsItem as $item)
        
                <div class="card">
                <img class="card-img-top" src="{{asset('uploads/photos/' . $item->image)}}">
                    <div class="card-body">
                       <a href="{{ route('news.show', $item->id) }}"><h5 class="card-title">{{ $item->title }}</h5></a> 
                        <p class="card-text">{{ $item->content }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">Komentaru skacius: <div class="btn btn-warning">{{$item->comment->count()}}</div></li>
                        <li class="list-group-item">Paskelbta: {{ $item->created_at }}</li>
                        <li class="list-group-item">Naujienos kategorija: <b>{{ $item->cat->name }}</b></li>
                    </ul>

                    @auth

                    <div class="card-body list-inline">
                        <a class="list-inline-item btn btn-info" href="{{route('news.edit', $item->id )}}" class="card-link">Redaguoti straipsni</a>
                        <form class="list-inline-item" action="{{ route('news.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal-{{ $item->id }}">Trinti straipsni</button>
                        </form>
                        @include('project.delete_news_modal')
                    </div>

                     @endauth

                </div>

            @endforeach

        @else

        <h3 class="alert alert-info">Siuo metu naujienu nera... :(</h3>

    @endif

    </div>

    <div class="col-md-4">
        <table class="table">
            <thead>
                   <h6 class="text-center">Aktualijos</h6>
            </thead>
            <tbody>
                <tr>
                    <td> <small><strong>Trinti</strong></small> </td>
                    <td> <small><strong>Redaguoti</strong></small></td>
                    <td><small>Kategorija</small></td>
                    
                </tr>
                @foreach ($Cat as $cats)
                <tr>
                    <td>
                        @auth
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal-{{ $cats->id }}">&#10008;</button>
                            @include('project.delete_cats_modal')
                        @endauth
                    </td>
                    <td>
                        @auth
                        <a class="btn btn-info" href="{{route('categories.edit', $cats->id )}}">&#8630;</a>
                        @endauth
                    </td>
                    <td>
                        <a style="color: grey;" href="{{route('categories.show', $cats->id )}}">{{$cats->name}}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        {{-- <div class="pagination-lg mx-auto" sstyle="width: 200px;">{{$NewsItem->links()}}</div>  --}}
    </div>    
</div>

@endsection










