@extends('layouts.app')

    @section('content')
       @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
    @if (\Session::has('error'))
        <div class="alert alert-danger">
            <ul>
                <li>{!! \Session::get('error') !!}</li>
            </ul>
        </div>
    @endif

    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
        	<h4 class="card-title mt-3 text-center">Create new contact</h4>
        
        	<form action = "submitContact" method = "POST">
            @csrf
        	<div class="form-group input-group">
        		<div class="input-group-prepend">
        		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
        		 </div>
                <input name="name" class="form-control" placeholder="Name" type="text" required>
            </div> 
            <div class="form-group input-group">
            	<div class="input-group-prepend">
        		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
        		 </div>
                <input name="email" class="form-control" placeholder="Email address" type="email" required>
            </div> 
            <div class="form-group input-group">
            	<div class="input-group-prepend">
        		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
        		</div>
        
            	<input type="text" pattern="\d*" minlength="9" maxlength="9" name="contact" type="text" placeholder="Phone number" required>
            </div> 
                <button type="submit" class="btn btn-primary btn-block"> Create contact  </button>
            </div>  
        </form>
        </article>
    </div> 


  @endsection