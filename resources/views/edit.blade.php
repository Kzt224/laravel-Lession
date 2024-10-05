@extends('Layout')

@section('content')
     <div class="container mt-5">
          <div class="card mb-3">
            <div class="card-header"style="text-align: center">
               Edit Post
            </div>
            <div class="card-body" >
            
               <form action="/posts/{{$post->id}}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="mb-3">
                     <label for="Name" class="form-label">Name</label>
                     <input type="text" value="{{old('name', $post->name)}}" class="form-control" id="Name" aria-describedby="emailHelp" name="name" placeholder="Name" >
                     @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="mb-3">
                     <label for="Description" class="form-label">Description </label>
                     <textarea name="description" class="form-control" placeholder="Enter Description" id="Description" >{{old('description', $post->description)}}</textarea>
                     @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="mb-3">
                      <select name="category_id" id="" class="form-control">
                        <option value="">Select Category</option>
                         @foreach($categories as $value)
                         <option value="{{$value->id}}" {{ $value->id === $post->category_id ? 'selected': ''}}>{{$value->name}}</option>
                         @endforeach
                      </select>
                      @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <input type="hidden" name="user_id" value="{{ $user_id }}">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="/posts" class="btn btn-warning ">Back</a>
               </form>
            </div>
        </div>
     
     </div>

 
@endsection

