@extends('Layout')

@section('content')
     <div class="container mt-5">
          <div class="card mb-3">
            <div class="card-header"style="text-align: center">
               Create New Post
            </div>
            <div class="card-body" >
               <form action="/posts" method="post">
                  @csrf
                  
                  <div class="mb-3">
                     <label for="Name" class="form-label">Name</label>
                     <input type="text" class="form-control" id="Name" aria-describedby="emailHelp" name="name" placeholder="Name" value="{{old('name')}}" >
                     @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="mb-3">
                     <label for="Description" class="form-label">Description </label>
                     <textarea name="description" class="form-control" placeholder="Enter Description" id="Description" value="{{old('name')}}" ></textarea>
                     @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="mb-3">
                      <select name="category_id" id="" class="form-control">
                        <option value="">Select Category</option>
                         @foreach($categories as $value)
                         <option value="{{$value->id}}">{{$value->name}}</option>
                         @endforeach
                      </select>
                      @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <input type="hidden" value="{{$user_id}}" name="user_id">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="/posts" class="btn btn-warning ">Back</a>
               </form>
            </div>
        </div>
     
     </div>

 
@endsection

