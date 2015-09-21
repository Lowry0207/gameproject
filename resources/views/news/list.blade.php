@extends('app')

@section('h1')
	Новости
@endsection

@section('content')

	@foreach($news as $item)
	 <div class="col-md-8 news-list">
	<?
		# Если урл новости не задан передаем в качестве урла ид 
		if($item['url'] == null)
			$item['url'] = 'id'.$item['id'];

		# Путь к изображениям
		$img_path = $config['path.news.image'];
	?>
		
<div class="row">
  <div class="col-xs-12  col-sm-5 col-md-5 col-lg-5 img-news">
    <a href="/news/{{$item['url']}}" class="thumbnail">
      <img src="{{$img_path}}/{{$item['images']}}" alt="..." style="max-height: 245px;">
    </a>
  </div>
  <div class="news-title"><a href="/news/{{$item['url']}}">{{$item['name']}}</a></div>	
  <div class="news-descr">{!!$item['body']!!}</div>
  {{$item['created_at']}}
  <a href="/news/{{$item['url']}}" class="btn btn-primary news-view-button">Читать далее</a>
</div>
		
		
		
	</div>

	@endforeach

@endsection