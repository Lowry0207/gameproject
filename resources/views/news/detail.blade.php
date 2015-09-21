
@extends('app')
@include('news.comments')
	@section('content')
	
	<?
#Путь к изоброжению
		$img_path = $config['path.news.image'];
	?>

		<h1>{{$news['name']}}</h1>

		<div class='news-detail col-xs-12 col-sm-12 col-md-9 col-lg-9'>
	  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="max-width:300px;">
    <a class="thumbnail">
      <img src="{{$img_path}}/{{$news['images']}}" alt="...">
    </a>
  </div>
	{!!$news['body']!!}
	</div>
	
	
@yield('comments')
	
	</div>
	@endsection