@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">Users</div>

                <div class="panel-body">

                    <table class="table">
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>

                        @foreach($users as $user)

                            <tr>
                                <td>{{ link_to_route('manager.show',$user->name,[$user->id]) }}</td>
                                <td>{{ link_to_route('manager.show',$user->email,[$user->id]) }}</td>
                                <td>

                                 {!! Form::open(array('route'=>['manager.destroy',$user->id],'method'=>'DELETE','onsubmit' => "return prompt('Enter Password to delete?')",)) !!}
                                            {{ link_to_route('manager.edit','Edit',[$user->id],['class'=>'btn btn-primary']) }}

                                            {!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit']) !!}
                                  {!! Form::close() !!}
                                </td>
                            </tr>

                        @endforeach

                    </table>

                </div>
            </div>

            {{ link_to_route('manager.create','Add new user', null,['class'=>'btn btn-success']) }}

        </div>
    </div>
</div>
@endsection
