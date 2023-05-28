@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">{{ __('Edit Book') }}</div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('update-book',['id'=> $book->id]) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <div class="form-group row">
                              <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                              <div class="col-md-6">
                                  <input type="text" id="title" class="form-control" name="title" value="{{ $book->title }}"  autofocus>
                                  @if ($errors->has('title'))
                                      <span class="text-danger">{{ $errors->first('title') }}</span>
                                  @endif
                              </div>
                          </div>
                         
                          <div class="form-group row">
                              <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                              <div class="col-md-6">
                                  <input type="text" id="description" class="form-control" name="description" value="{{ $book->description }}" >
                                  @if ($errors->has('description'))
                                      <span class="text-danger">{{ $errors->first('description') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="price" class="col-md-4 col-form-label text-md-right">price</label>
                              <div class="col-md-6">
                                  <input type="number" id="description" class="form-control" value="{{ $book->price }}" name="price" >
                                  @if ($errors->has('price'))
                                      <span class="text-danger">{{ $errors->first('price') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>
                              <div class="col-md-6">
                              <select class="form-control" id="category" name="category" >
                                @foreach($categorys as $category)
                                    <option @if($category->id == $book->category_id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                  
                                </select>
                                 
                                  @if ($errors->has('category'))
                                      <span class="text-danger">{{ $errors->first('category') }}</span>
                                  @endif
                              </div>
                          </div>


                          <div class="form-group row">
                              <label for="author" class="col-md-4 col-form-label text-md-right">Author</label>
                              <div class="col-md-6">
                             @php $fetchAuthor = $book->authors @endphp
                                @foreach($authors as $author)
                                  
                                    <div class="ml-3"><input @foreach($fetchAuthor as $singleAuthor) @if( $singleAuthor->id == $author->id ) checked @endif @endforeach type="checkbox" class="form-check-input" name="author[]" value="{{ $author->id }}">{{ $author->name }}</div>
                                    @endforeach
                                  
                             
                                 
                                  @if ($errors->has('author'))
                                      <span class="text-danger">{{ $errors->first('author') }}</span>
                                  @endif
                              </div>
                          </div>


                         
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Create
                              </button>
                          </div>
                      </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection