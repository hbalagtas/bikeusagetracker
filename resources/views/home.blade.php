@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if ( Auth::user()->bikes->count() == 0 )
                    <p>Start by adding bikes</p>
                    @else
                        @foreach (Auth::user()->bikes as $bike)                            
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">{{$bike->name}} - {{$bike->distance}} {{Auth::user()->unit}} </h3>
                                </div>
                                <div class="panel-body">
                                    <p>{{$bike->brand->name}} - {{$bike->model}}</p>
                                    <p><pre>{!!$bike->notes!!}</pre></p>

                                    @if ($bike->components()->count() == 0)
                                        <a href="{{url('/select-components')}}/{{$bike->id}}" class="btn btn-primary">Add Components</a>
                                    @else 
                                        {{ $bike->components }}
                                    @endif
                                   
                                </div>
                            </div>
                        @endforeach                    
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
