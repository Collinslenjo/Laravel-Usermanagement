@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update User</div>

                <div class="panel-body">

            @if(count($errors)>0)

            <ul class="alert alert-danger">

            @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

            @endforeach

            </ul>

            @endif
                
                 {!! Form::model($user,array('route'=>['manager.update',$user->id],'method'=>'PUT')) !!}

                <div class="formgroup">
                {!! Form::label('name', 'Name') !!} 
                {!! Form::text('name', null,['class'=>'form-control']) !!}                
                </div>

                <div class="formgroup">
                {!! Form::label('email', 'Email Address') !!} 
                {!! Form::email('email', null,['class'=>'form-control']) !!}                
                </div>

                <div class="formgroup">
                {!! Form::label('password', 'Password') !!} 
                {!! Form::password('password', null,['class'=>'form-control']) !!}                
                </div>

                <div class="formgroup">
                {!! Form::label('password_confirmation', 'Confirm Password') !!} 
                {!! Form::password('password_confirmation', null,['id'=>'password-confirm','class'=>'form-control']) !!}                
                </div>
                <br>

                <div class="formgroup"> 
                {!! Form::button('Update',['type'=>'submit','class'=>'btn btn-primary']) !!}                
                </div>

                {!! Form::close() !!}


                </div>
            </div>

        </div>
    </div>
</div>
@endsection
