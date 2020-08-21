@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">
        <div class="col-3 p-5"> <!-- This is the avatar section, where your profile picture is located/displayed.  -->
            <img src="{{ $user->profile->profileImage()  }}" class="w-100 rounded-circle">
        </div>
        <div class="col-9 p-5"> <!--This is the profile section  -->

           <div class= "d-flex justify-content-between align-items-baseline">

                <div class="d-flex align-items:center pb-4">  
                        <h1>{{ $user->username}}</h1> 

                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>

                    @can('update', $user->profile)
                    <a href="/post/create" class="btn btn-primary">Showcase your betta here</a> 
                    @endcan
           </div>
           @can('update', $user->profile) <!---This is called templating and it prohibits the other user to edit or create a new post in your profile--->
            <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex"><!--This is where the information about your profile is located. -->
                <div class="pr-5"><strong> {{ $user->posts->count() }} </strong>Betta Showcases</div>
                <div class="pr-5"><strong>{{ $user->profile->followers->count()  }} </strong>Followers </div>
                <div class="pr-5"><strong>{{ $user->following->count()  }}  </strong>Following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>    
            <div>{{ $user->profile->description }}</div>
            <div class ="#">{{ $user->profile->url }}</div>
        </div>
    </div>
    <div class="row">
    <!-- This is where your posts are located. -->
    @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/post/{{ $post->id }}">
            <img src="/storage/{{ $post->image }}" class="w-100">
            </a>

        </div>
    @endforeach
    </div>
</div>
@endsection
