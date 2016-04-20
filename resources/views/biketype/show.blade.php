@extends('layouts.master')

@section('content')

    <h1>Biketype</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $biketype->id }}</td> <td> {{ $biketype->name }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection