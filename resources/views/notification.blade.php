@extends('app')

@section('content')
 <div class="col-md-8 news-detail">
 <h1>{{$msg['theme']}}</h1>
 	{{$msg['message']}}
 </div>
@endsection