@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white fw-bold">   <h5 class="card-title">RATE-> {{ $movie->title }}</h5></div>
    <div class="card-body">

      <form action="{{ route('rate.post',['id' => $movie->_id]) }}" method="post">
        @csrf
        @include('layouts.flash')
       <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="mb-0">FILM</label>
              <p class="form-control">{{ $movie->title }}</p>
            </div>    
        </div>

     <div class="col-md-12">
      <div class="mb-3 form-group">
        <label for="" class="mb-0">Comment</label>
        <textarea name="comment" class="form-control"></textarea>
      </div>
     </div>

        <input type="hidden" name="id" value="{{ $movie->_id }}">

        <div class="col-md-4">
            <div class="form-group">
                <label class="mb-0">GRADE</label>
              <input type="number" min="1" max="5" autofocus name="rating"  required class="form-control" id="year">
            </div>    
        </div>

      

    

        <div class="col-md-10">
            <button type="submit" class="btn btn-primary mt-4 px-5">VALID</button>
        </div>
       </div>
      </form>
    </div>
</div>
@endsection