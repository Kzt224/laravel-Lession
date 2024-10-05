@extends('Layout')

@section('content')
     <div class="container mt-5">
          <div class="card mb-3">
            <div class="card-header"style="text-align: center">
               Featured
            </div>
            <div class="card-body" >
              <h5 class="card-title">{{$post['name']}}</h5>
              <p class="card-text">{{$post['description']}}</p>
              <p class="card-text"><span style="font-weight: bold;">Category:</span>{{$post->categories->name}}</p>
              <a href="/posts" class="btn btn-primary">Back</a>
            </div>
        </div>
     </div>
@endsection

