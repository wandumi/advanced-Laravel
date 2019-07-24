@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List of Phone Number</div>

                    <div class="card-body">
                        @if($phoneNumber->count())
                            <table class="table">
                                <thead>
                                     <th>Name</th>
                                     <th>Surname</th>
                                     <th>Phone Number</th>
                                </thead>
                                <tbody>
                                    @foreach($phoneNumber as $phoneNumbers)
                                        <td>Belongs to {{ $phoneNumbers->user()->first()->name }}</td>
                                        <td>Belongs to {{ $phoneNumbers->user->name }}</td>
                                        <td>{{ $phoneNumbers->phone_number }}</td>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            There are no Phone Numbers...
                        @endif

                    </div>
                </div>
            </div>
        </div>


@endsection
