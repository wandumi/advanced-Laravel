@extends('layouts.app')

@section('content')
    <div class="container">

    <div class="row justify-content-center mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tasks</div>
                    {{--@include('admin.common.errors')--}}
                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="task" class="col-md-4 col-form-label text-md-right">Add Task</label>

                                <div class="col-md-6">
                                    <input id="email" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Add Task
                                    </button>

                                    {{--@if (Route::has('password.request'))--}}
                                        {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                            {{--{{ __('Forgot Your Password?') }}--}}
                                        {{--</a>--}}
                                    {{--@endif--}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>

    <div class="row justify-content-center mt-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Current Task</div>

                <div class="card-body">
                    @if($tasks->count())
                        <table class="table table-striped">
                            <thead>
                                <th>Task</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td>{{$task->name}}</td>
                                        <td>
                                            <form method="post" action="{{ route('tasks.destroy', $task->id) }}">
                                                @csrf
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger">
                                                    Delete
                                                </button>
                                                {{-- <a href="" onclick="
                                                if(confirm('Are you sure you want to add a New User?')){
                                                    event.preventDefault();
                                                    document.getElementById('add-{{ $user->id }}').submit();
                                                }else{
                                                    event.preventDefault();
                                                }">
                                                <span class="btn btn-success">Add User</span>
                                            </a> --}}
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>You have no tasks!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
