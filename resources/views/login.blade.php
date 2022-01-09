@extends('layouts.main')
@section('content')
     <div class="container custom-login">
         <div class="row">
             <div class="col-sm-4 offset-md-4">
                <form action="{{route('loginForm')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                    </div>
                 
                    <button type="submit" class="btn btn-primary">Login</button>
                  </form>
                  <p>Dont have an account?<a href="/registering">register</a></p>
             </div>
         </div>
     </div>


   @push('scripts')

   <script>


   </script>    
       
   @endpush
@endsection