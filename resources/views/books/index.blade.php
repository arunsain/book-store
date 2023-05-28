@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer mt-3 p-5">
    <a class="btn btn-success btn-xs mb-2" href="{{ route('book.create')}}">Add Book</a>
      <div class="row justify-content-center">
          <div class="col-md-12">
          @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
             
                  <table class="table table-striped">
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Price</th>
        <th>Category</th>
        <th>Author</th>
        <th>Add Review</th>
      </tr>
    </thead>
    <tbody>
      @if(isset($books))
        @foreach($books as $book)
        <tr>
        <td>{{ $book->title}}</td>
        <td>{{ $book->description}}</td>
        <td>{{ $book->price}}</td>
        <td>@if(isset($book->category)) {{ $book->category->name}}  @endif</td>
        <td>@if(isset($book->authors) && !$book->authors->isEmpty())
            <ul>
            @php $authors= $book->authors @endphp
            @foreach($authors as $author)
            <li> {{ $author->name}}</li>
            @endforeach
</ul>
            @endif
        </td>
        <td>
        @if(Auth::user())
         <a href="{{route('add-review',['book_id'=> $book->id])}}" class="btn btn-primary btn-xs">Add Review</a>
        @else
        <a href="{{route('login')}}" class="btn btn-primary btn-xs">Add Review</a>
        @endif
        <a href="{{route('book-detail',['id'=> $book->id])}}" class="btn btn-primary btn-xs mt-2">Book Detail</a>
        <a href="{{route('edit-book',['id'=> $book->id])}}" class="btn btn-primary btn-xs mt-2">Edit</a>
       
        </td>
      </tr>
        @endforeach
        @endif
     
      
    </tbody>
  </table>
                     
<!--                         
                  </div>
              </div>
          </div> -->
      </div>
  </div>
</main>
@endsection


