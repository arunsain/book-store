@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">{{ __('Add Book Review') }}</div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('review.store') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="review" class="col-md-4 col-form-label text-md-right">Review</label>
                              <div class="col-md-6">
                                  <input type="text" id="review" class="form-control" name="review"  autofocus>
                                  @if ($errors->has('review'))
                                      <span class="text-danger">{{ $errors->first('review') }}</span>
                                  @endif
                              </div>
                          </div>
                            <input type="hidden" name="book_id" id="book_id" value="{{ $_GET['book_id']}}">
                          <div class="form-group row">
                              <label for="rating" class="col-md-4 col-form-label text-md-right">Rating</label>
                              <div class="col-md-6">
                                  
                                  <select name="rating" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="4">5</option>
                                    </select>
                                  @if ($errors->has('rating'))
                                      <span class="text-danger">{{ $errors->first('rating') }}</span>
                                  @endif
                              </div>
                          </div>
  
                         
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Save
                              </button>
                          </div>
                      </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection