@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-8 mx-auto">
        <h1>Sukurti straipsni</h1>
        <h1 style="color: green">{{$message=Session::get('fail')}}</h1> 

            <form method="post" action="{{route('news.store')}}" enctype="multipart/form-data">
                {{-- <input type="hidden" - cia perduodame duomenu bazei vartotojo id --}}
                {{-- analogisku budu id galime perduoti NewsController kontroleriui --}}
            <input type="hidden" value="{{Auth::user()->id}}" name="user">
            @csrf
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Antraste" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                    <textarea class="form-control" name="content" cols="100%" rows="10">{{ old('content') }}</textarea>
            </div>
            
                <div class="input-group mb-3">
                    <select class="custom-select" id="inputGroupSelect02" name="select_cat" value="{{ old('select_cat') }}">
                      <option value="" selected disabled>Pasirinkite kategorija...</option>
                        @foreach ($Cat as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                      <label class="input-group-text" for="inputGroupSelect02">Options</label>
                    </div>
                  </div>
            
            <div class=" input-group">
                <div class="custom-file">
                    <label for="" class="custom-file-label">Pasirinkite antrastes paveiksleli</label>
                    <input type="file" class=" custom-file-input" name="image">
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