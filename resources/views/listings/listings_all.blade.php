@extends('layouts.app')

@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Current business listings</h2></div>

                    <div class="card-body">

                        @if(count($listings))
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">Website</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Description</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($listings as $listing)
                                    <tr>
                                        <td><a href="/listings/{{$listing->id}}" target="_blank" class="nav-link">{{$listing->name}}</a></td>
                                        <td>{{$listing->address}}</td>
                                        <td>{{$listing->website}}</td>
                                        <td>{{$listing->email}}</td>
                                        <td>{{$listing->phone}}</td>
                                        <td>{{$listing->bio}}</td>
                                        <td><a href="/listings/{{$listing->id}}/edit" class="nav-link">Edit</a></td>
                                        <td>
                                            {!! Form::open(['action'=>['ListingsController@destroy', $listing->id], 'method'=>'POST', 'onsubmit'=>'return confirm("Delete this listing?")']) !!}

                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class'=>'nav-link'])}}

                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                        @else
                            <h5>There are currently no listings.</h5>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
