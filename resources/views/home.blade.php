@extends('Layout')

@section('content')
     <div class="container mt-5">
       @foreach($data as $key => $value)
          <div class="card mb-3">
            <div class="card-header"style="text-align: center">
               Content{{$key+1}}
            </div>
            <div class="card-body" >
              <h5 class="card-title">{{$value['name']}}</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="info" class="btn btn-primary">View Detail</a>
            </div>
        </div>
        @endforeach
     </div>
    
 
@endsection

