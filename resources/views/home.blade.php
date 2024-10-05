@extends('Layout')

@section('content')
     <div class="container mt-5">
     <a href="/posts/create" class="btn btn-success mb-3" type="btn">Add Posts</a>
     <a href="/logout"  class="btn btn-warning mb-3" type="btn">Logout</a>
      <a href="" style="float: right" class="text-decoration-none"><ion-icon name="person-circle-outline" class="text-dark fs-6"></ion-icon>{{Auth::user()->name}}</a>
       @if (session('status'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success !</strong>{{session('status')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
       @endif
       @foreach($data as $key => $value)
          <div class="card mb-3">
            <div class="card-header"style="text-align: center">
               Content{{$key+1}}
            </div>
            <div class="card-body" >
              <h5 class="card-title">{{$value['name']}}</h5>
              <p class="card-text">{{$value['description']}}</p>
              <a href="/posts/{{$value->id}}" class="btn btn-primary">View </a>
              <a href="/posts/{{$value['id']}}/edit" class="btn btn-warning" type="btn">Edit </a>
              <form action="/posts/{{$value->id}}" method="post">
                 @csrf
                 @method('DELETE')
                 <button class="btn btn-danger mt-2 " type="sbmit">Delete</button>
              </form>
            </div>
        </div>
        @endforeach
     </div>
    
 
@endsection

