@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Select components for {{$bike->brand->name}} - {{$bike->model}}</div>

                <div class="panel-body">    
                        
                        @foreach ($componenttypes as $type)                          
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">          
                        <div class="checkbox inline">                            
                            <label class="inline">
                                <input type="checkbox" value="{{$type->id}}">
                                {{$type->name}} 
                            </label>                            
                        </div>      
                        </div>                               
                        
                        @endforeach   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
