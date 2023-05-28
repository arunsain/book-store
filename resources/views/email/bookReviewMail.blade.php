<!DOCTYPE html>
<html>
<head>
<title>Review Email</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">   
<center>
<h2 style="padding: 23px;background: #b3deb8a1;border-bottom: 6px green solid;">
    <a href="{{ route('/')}}">Review Detail</a>
</h2>
</center>

<table class="table table-bordered">
   
    <tbody>
      <tr>
        <th>Book :</th>
        <td>{{ $details->book->title}}</td>
       
      </tr>
      <tr>
      <th>User Name :</th>
        <td>{{ $details->user->name}}</td>
      </tr>
      <tr>
      <th>Review</th>
        <td>{{ $details->review}}</td>
      </tr>
      <tr>
      <th>Rating</th>
        <td>{{ $details->rating}}</td>
      </tr>
      <tr>
      <th>Author</th>
      <td>@if(isset($details->book->authors) && !$details->book->authors->isEmpty())
            <ul>
            @php $authors= $details->book->authors @endphp
            @foreach($authors as $author)
            <li> {{ $author->name}}</li>
            @endforeach
</ul>
            @endif
        </td>
      </tr>
    </tbody>
  </table>
  
<strong>Thank you Sir. :)</strong>
</div>
</body>
</html>

