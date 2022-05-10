@extends('layouts.app')
@section('content')
    <div class="flex bg-gray-100 border-b border-gray-300 py-4">
        <div class="container mx-auto flex justify-between">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <router-link class="mr-4" to='/' exact>Home</router-link>
                        <router-link class="mr-4" to='/about'>About</router-link>
                        <router-link class="mr-4" to='/register'>Register</router-link>
                        @if(@auth()->user()->id == null)
                        <router-link class="mr-4" to='/login' exact>Login</router-link>
                        @else 
                        <router-link to='/dashboard'>Dashboard</router-link>
                        @endif
                    </li>
                   
                  </ul>
                </div>
              </nav>
        </div>
    </div>
    <div class="container mx-auto py-2">
        <router-view></router-view>
    </div>
    
@endsection