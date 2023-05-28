@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer p-5">
      <div class="row justify-content-center">
          <div class="col-md-12">
          <h2>Book Detail</h2>

          <table class="table table-bordered">
  
  <tr>
    <th>Title</th>
    <td>{{ $bookDetail->title }}</td>
   
  </tr>
  <tr>
  <th>Description</th>
    <td>{{ $bookDetail->description }}</td>
   
  </tr>
  <tr>
    <th>Price</th>
    <td>{{ $bookDetail->price }}</td>
   
  </tr>

  <tr>
    <th>Category</th>
    <td>{{ $bookDetail->category->name }}</td>
   
  </tr>

  <tr>
    <th>Average Rating</th>
    <td>@if(isset($bookDetail->reviews) && !$bookDetail->reviews->isEmpty() ) {{ $bookDetail->reviews->avg('rating') }} rating @else 0 rating @endif</td>
   
  </tr>
  
  <tr>
    <th>Authors</th>
    <td>@if(isset($bookDetail->authors) && !$bookDetail->authors->isEmpty())
            <ul>
            @php $authors= $bookDetail->authors @endphp
            @foreach($authors as $author)
            <li> {{ $author->name}}</li>
            @endforeach
</ul>
            @endif</td>
   
  </tr>
</table>
          
<h3>Book Review</h3>
<table class="table table-striped">
    <thead>
      <tr>
      <th>Review By</th>
        <th>Book Title</th>
        <th>Review Message </th>
        <th>Rating</th>
      </tr>
    </thead>
    <tbody>
       
    @if(isset($bookDetail->reviews) && !$bookDetail->reviews->isEmpty())
    @php $reviews= $bookDetail->reviews @endphp
    @foreach($reviews as $review)
      <tr>
        <td>{{ $review->user->name}} </td>
        <td>{{ $review->book->title}}</td>
        <td>{{ $review->review}}</td>
        <td>{{ $review->rating}}</td>
      </tr>
      @endforeach
      @endif
     
    </tbody>
  </table>
 
      </div>
  </div>
</main>
@endsection


