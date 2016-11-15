@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               @if( Auth::check() )
                    <div class="panel-heading">Welcome {{ Auth::user()->name }}</div>

                    <div class="panel-body">
                    <h4>{{ Auth::user()->name }}</h4>
                    <h4>{{ Auth::user()->email }}</h4>

                    <br>

                        {{ link_to_route('manager.index','Manage Users', null,['class'=>'btn btn-primary']) }}

                    </div>
                    @endif

                    @if ( Auth::user()->isAdmin )
                        <p>Yay! I'm Admin! :P</p>
                    
                    @else
                    <p>NO! I'm not Admin!</p>
                    @endif
        </div>
    </div>
</div>
@endsection
