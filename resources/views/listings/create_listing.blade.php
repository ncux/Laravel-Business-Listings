@extends('layouts.app')

@section('content')


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Create a new listing</h2>
                    <a href="/home" style="float: right" class="btn btn-sm btn-secondary my-3">back</a>
                </div>

                <div class="card-body">

                    {!! Form::open(['action'=>'ListingsController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}

                        <div class="form-group">
                            {{Form::label('company', 'Company name')}}
                            {{Form::text('company', '', ['class'=>'form-control', 'required'])}}

                        </div>
                        <div class="form-group">
                            {{Form::label('address', 'Address')}}
                            {{Form::text('address', '', ['class'=>'form-control'])}}

                        </div>

                        <div class="form-group">
                            {{Form::label('website', 'Website')}}
                            {{Form::text('website', '', ['class'=>'form-control', 'required'])}}

                        </div>

                        <div class="form-group">
                            {{Form::label('email', 'Email')}}
                            {{Form::text('email', '', ['class'=>'form-control', 'required'])}}

                        </div>
                        <div class="form-group">
                            {{Form::label('phone', 'Phone')}}
                            {{Form::text('phone', '', ['class'=>'form-control', 'required'])}}

                        </div>

                        <div class="form-group">
                            {{Form::label('bio', 'Description')}}
                            {{Form::textarea('bio', '', ['class'=>'form-control'])}}

                        </div>

                        {{Form::submit('Submit', ['class'=>'btn btn-success'])}}

                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>

@endsection
