@extends('layouts.app')

@section('content')


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Edit listing</h2>
                    <a href="/home" style="float: right" class="btn btn-sm btn-secondary my-3">back</a>
                </div>


                <div class="card-body">

                    {!! Form::open(['action'=>['ListingsController@update', $listing->id], 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}

                        <div class="form-group">
                            {{Form::label('company', 'Company name')}}
                            {{Form::text('company', $listing->name, ['class'=>'form-control', 'required'])}}

                        </div>
                        <div class="form-group">
                            {{Form::label('address', 'Address')}}
                            {{Form::text('address', $listing->address, ['class'=>'form-control'])}}

                        </div>

                        <div class="form-group">
                            {{Form::label('website', 'Website')}}
                            {{Form::text('website', $listing->website, ['class'=>'form-control', 'required'])}}

                        </div>

                        <div class="form-group">
                            {{Form::label('email', 'Email')}}
                            {{Form::text('email', $listing->email, ['class'=>'form-control', 'required'])}}

                        </div>
                        <div class="form-group">
                            {{Form::label('phone', 'Phone')}}
                            {{Form::text('phone', $listing->phone, ['class'=>'form-control', 'required'])}}

                        </div>

                        <div class="form-group">
                            {{Form::label('bio', 'Description')}}
                            {{Form::textarea('bio', $listing->bio, ['class'=>'form-control'])}}

                        </div>
                        {{Form::hidden('_method', 'PUT')}}
                        {{Form::submit('Submit', ['class'=>'btn btn-success'])}}

                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>

@endsection
