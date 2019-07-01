@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <orders></orders>
            <queued-orders></queued-orders>
        </div>
    </div>
</div>

@endsection
