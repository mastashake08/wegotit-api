@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <venue :venue="{{json_encode($business)}}"></venue>        
        </div>
    </div>
</div>

@endsection
