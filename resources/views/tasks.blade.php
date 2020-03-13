@extends("layouts.app")

    @section("content")
<div class="container">

    <div class="col-md-6 mx-auto">

        {{-- Message START --}}
        

        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Done !!! </strong>{{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        {{-- Message END --}}

        <h1>Todo List</h1>
            <form method="POST" action={{route('task.index')}}>
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Enter Task">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning btn-block">&#9993; Add</button>
                </div>
            </form>
            <hr>
            <h4>Pending</h4>
            <hr>
            @if($all->count())
                <table class="table text-center">
                    <tr>
                        <td><b>Task:</b></td>
                        <td><b>Action:</b></td>
                    </tr>
                    @foreach($tasks_false as $false)
                    <tr>
                        <td>{{ $false->name }}</td>
                        <td><a class="btn btn-success" href="{{route('task.completed', $false->id )}}">&#10004; Done</a></td>
                    </tr>
                    @endforeach
                </table>
            @else
                <h1 style="color: red" class="text-center">No tasks are aded</h1>
            @endif
                <hr>
        <h4>Completed</h4>
        <hr>
                <table class="table text-center">
                    <tr>
                        <td><b>Task:</b></td>
                        <td><b>Action:</b></td>
                    </tr>
                    @foreach($tasks_true as $true)
                    <tr>
                        <td>{{ $true->name }}</td>
                        <td>
                            <a class="btn btn-danger" href="{{route('task.deleted', $true->id )}}">&#10008; Delete</a>
                            <a class="btn btn-info" href="{{route('task.return', $true->id )}}">&#8626; Return</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
        </div>
</div>
@endsection