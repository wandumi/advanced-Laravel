@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('roles.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name">
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" name="email">
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                    <label for="assign_role">Assign Roles</label>

                    @if($roles->count() > 0)
                        @foreach($roles as $role)
                            <div class="col-md-3">
                                <div class="checkbox">
                                    <label for=""><input type="checkbox" value="role[]"> {{ $role->name }}</label>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 alert alert-info">
                            <p>Ther are no Roles for this user</p>
                        </div>
                    @endif
                    </div>
                </div>


            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">

                <small id="password" class="text-muted">
                    Must be 6-20 characters long.
                </small>
            </div>

            <div class="form-group">
                <label for="passwoord">Retype - Password</label>
                <input type="password" name="password_confirmation" class="form-control">

                <small id="password" class="text-muted">
                    It should match with the Password above.
                </small>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add User</button>
            </div>
        </form>
    </div>
@endsection