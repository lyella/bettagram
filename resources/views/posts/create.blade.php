@extends('layouts.app')

@section('content')
<div class="container">
   
   <form action="/post" method="post" enctype="multipart/form-data">
<!-- this is the certificate token of the Laravel -->
    @csrf 

    <div class="col-8 offset-2">

        <div class="row">
                <h1>Showcase your Betta here</h1>
        </div>

        <div class="form-group row">

            <label for="caption">Describe you betta: </label>
            <input 
            type="text" 
            id="caption" 
            class="form-control @error('caption') is-invalid @enderror" 
            name="caption" 
            value="{{ old('caption') }}"
            autocomplete="caption"autofocus> 

            @error ('caption')

            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>

            @enderror

        </div>

    <div class="row">

        <!-- for the image -->
        <label for="image">Post your betta here</label>
        <input type="file" name="image" id="image" class="form-control-file">

    </div>

        @error ('image')
        <strong>{{ $message }}</strong>
        @enderror

        <div class="row pt-4">

            <button type="submit" class="btn btn-primary">Showcase your betta fish!</button>

        </div>


        </div>        
   </form>

</div>
@endsection
