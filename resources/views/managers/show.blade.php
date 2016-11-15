@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $user->name }}</div>

                    <div class="panel-body">
                    <h5>No Smokkies Here. Not today or Tommorrow.</h5>
                    <h4>Die Bustard Die('hahahahaha')</h4>
                    
                        <h3>{{ $user->name }}</h3>
                        <br>
                        <h3>{{ $user->email }}</h3>

                        {{ link_to_route('manager.index','Back', null,['class'=>'btn btn-primary']) }}

                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection