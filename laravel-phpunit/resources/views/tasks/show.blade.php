@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="page-header">
                    <h2>Task Detail</h2>
                </div>
                <div class="card">
                    <div class="card-header">{{$task->title}}</div>

                    <div class="card-body">
                        {{$task->description}}
                    </div>

                    <div class="card-footer">
                        @can('update', $task)
                            <a href="{{ route('tasks.edit',$task->id) }}" class="btn btn-warning">Edit Task</a>
                        @endcan

                        <form style="float:right" method="POST" action="/tasks/{{$task->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
