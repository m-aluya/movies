@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-head">
        <h3 class="card-header">All movies</h3>
    </div>
    <div class="card-body">
    <div class="">
        <h4>Average ranking</h4>
        <p>{{ $rate }}</p>
    </div>

    </div>
</div>
@endsection