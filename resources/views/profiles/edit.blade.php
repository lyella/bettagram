@extends('layouts.app')

@section('content')
<div class="container">
   
   <form action="/profile/ {{ $user->id }}" method="post" enctype="multipart/form-data">
<!-- this is the certificate token of the Laravel -->
    @csrf 
    @method('PATCH')

    <div class="col-8 offset-2">

        <div class="row">
                <h1>Edit Profile</h1>
        </div>
         <div class="form-group row">

            <label for="description">Description: </label>
            <textarea name="description" cols="30" rows="5" class="form-control @error('title') is-invalid @enderror"
            autocomplet e ="description" autofocus>{{ old('description') ?? $user->profile->description }}
            </textarea> 

            @error ('description')

            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>

            @enderror

        </div>
        <div class="form-group row">

            <label for="title">Ttitle: </label>
            <input 
            type="text" 
            id="caption" 
            class="form-control @error('title') is-invalid @enderror" 
            name="title" 
            value="{{ old('title') ?? $user->profile->title }}"
            autocomplete="title"autofocus> 

            @error ('title')

            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>

            @enderror

        </div>


        <div class="form-group row">

            <label for="description">Description: </label>
            <textarea name="description" cols="30" rows="5" class="form-control @error('title') is-invalid @enderror"
            autocomplet e ="description" autofocus>{{ old('description') ?? $user->profile->description }}
            </textarea> 

            @error ('description')

            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>

            @enderror

        </div>

        <div class="form-group row">

        <label for="">URL/Website: </label>
        <input type="text"
        id="caption" 
        class="form-control @error('url') is-invalid @enderror"
        name="url"
        value="{{ old('url') ?? $user->profile->url}}"
        autocomplete ="url" autofocus>

        @error ('url')

        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>

        @enderror

        </div>




    <div class="row">

        <!-- for the image -->
        <label for="image">Profile Image</label>
        <input type="file" name="image" id="image" class="form-control-file">

    </div>

        @error ('image')
        <strong>{{ $message }}</strong>
        @enderror

        <div class="row pt-4">

            <button type="submit" class="btn btn-primary">Update Profile</button>

        </div>


        </div>        
   </form>

</div>
@endsection
