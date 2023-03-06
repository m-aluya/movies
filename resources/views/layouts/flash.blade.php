@if($errors->any())
<div class="alert alert-danger p-3">
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
@endif


@if (session('success'))
    <div class="alert alert-success alert-dismissible text-center p-2" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session('success') }}
    </div>
    
@endif