@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-head">
        <h3 class="card-header">All movies</h3>
    </div>
    <div class="card-body">
     <table class="table table-bordered">
        <thead>
            <th>Title</th>  <th></th>
        </thead>
        <tbody>
            @foreach ($movies as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td><a href="{{ route('admin.show',['id' => $item->_id]) }}">View</a></td>
            </tr>
            
            @endforeach
        </tbody>
     </table>

    </div>
</div>
@endsection