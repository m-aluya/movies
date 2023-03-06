@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white fw-bold">   <h5 class="card-title">ADD A NEW FILM</h5></div>
    <div class="card-body">
     
      <form action="{{ route('add.post') }}" method="post">
        @csrf
        @include('layouts.flash')
       <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label class="mb-0">TITLE</label>
              <input type="text" name="title" required class="form-control" id="title">
            </div>    
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label class="mb-0">YEAR</label>
              <input type="text" name="year" required class="form-control" id="year">
            </div>    
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="mb-0">KIND</label>
              <input type="text" name="kind" required class="form-control" id="kind">
            </div>    
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label class="mb-0">COUNTRY</label>
              <input type="text" name="country" required class="form-control" id="kind">
            </div>    
        </div>

        <div class="col-md-2">
            <button type="submit" class="btn btn-primary mt-4">ADD FILM</button>
        </div>
       </div>
      </form>
    </div>
</div>
@endsection