@extends('layouts.master')

@section('title')

Nebraska Business Training

@endsection

@section('content')
	@foreach($courses->chunk(3) as $courseChunk)
	<div class="row">
		@foreach($courseChunk as $course)
		<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="{{ $course->imagePath}}" alt="..." class="img-responsive">
      <div class="caption">
        <h3>{{ $course->title}}</h3>
        <p class="description">{{ $course->description}}</p>
        <div class="clearfix">
		<div class="pull-left price">${{ $course->price}}</div>
		 <a href="#" class="btn btn-success pull-right" role="button">Add To Cart</a>
		</div>
      </div>
    </div>
  </div>
		@endforeach
  </div>
	@endforeach
@endsection

