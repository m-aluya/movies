@extends('layouts.app')
@section('content')
@include('layouts.flash')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">AVAILABLE FILMS</h5>
        <form action="" method="get">
            <div class="row">
                <div class="col-md-8">

                    <div class="form-group">
                        <label class="mb-0">FILM</label>
                        <select name="" id="movies" class="custom-select">
                            <option value="" selected disabled>---</option>
                            @foreach ($movies as $movie)
                            <option data-id="{{ $movie->_id }}" value="{{ $movie->_id }}">{{ $movie->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('add') }}" class="btn btn-primary mt-4 px-5">ADD FILM</a>
                </div>

            </div>
        </form>

        <div class="mt-5 d-none" id="details">
            <div class="row mt-5">

                <div class="col-md-3">
                    <label class="mb-0">Title</label>
                    <div class="form-control" id="title"></div>
                </div>

                <div class="col-md-3">
                    <label class="mb-0">Year</label>
                    <div class="form-control" id="year"></div>
                </div>

                <div class="col-md-3">
                    <label class="mb-0">Kind</label>
                    <div class="form-control" id="kind"></div>
                </div>

                <div class="col-md-3">
                    <label class="mb-0">Grade</label>
                    <div class="form-control" id="grade"></div>
                </div>


            </div>
            <div class="mt-4">
                <div class="row">
                    <div class="col-md-6">
                        <label class="mb-0">Comments</label>
                        <div id="comments_section"></div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="row">
                            <div class="col">
                                <a href="" id="rate" class="btn btn-primary w-100">Rate</a>
                            </div>
                            <div class="col">

                                <a href="" id="delete" class="btn btn-danger w-100">Delete</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#movies").change(function(){
        $("#comments_section").html("");
        let movie_id = $(this).val();
   
        $.ajax({
            type: "GET",
            url : "show/" + movie_id,
            success:function(resp){
                $("#title").html(resp.title);
                $("#year").html(resp.year);
                $("#kind").html(resp.kind);
              
                $("#rate").attr("href", "rate/" + movie_id);
                $("#delete").attr("href", "delete/" + movie_id);

                let rate = 0;
                let nrate = 0;
                $.each( resp.rating, function( index, value ){
    //console.log(value.comment);
    $("#comments_section").prepend('<div class="list-group-item rounded">--'+  value.comment  +'</div>');
    rate = rate + value.rating;
    nrate = nrate + 1;
    
    
});

let averageRating = parseFloat(rate/nrate);
$("#grade").html(averageRating);


                $("#details").removeClass('d-none');
            
        
        }
        });

    });

    
</script>
@endsection