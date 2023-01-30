@extends('layouts.app')

    @section('content')

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
    
    
     <h2 style="text-align:center">Contact details </h2>

    <div class="card">
      <img src="https://lh3.googleusercontent.com/p/AF1QipMkj29k-i3_qQ8-uUWAjak9GMeRbehT1wBh9qZi=s680-w680-h510" alt="John" style="width:100%">
      <h1>@php echo $contacts->name @endphp </h1
      <p class="title"> @php echo $contacts->email @endphp </p>
      <p>@php echo $contacts->contact @endphp </p>
    </div>


  @endsection