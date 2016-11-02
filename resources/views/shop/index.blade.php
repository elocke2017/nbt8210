@extends('layouts.master')

@section('title')

Nebraska Business Training

@endsection

@section('content')
    @if(Session::has('success'))
        <div class="row">
            <div class="col-sm6 col-md-4 col-md-offset-4 col-sm-offset-3">
                <div id="charge-message" class="alert alert-success">
                   {{ Session::get('success') }}
             </div>
            </div>
        </div>
    @endif
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
		 <a href="{{ route('course.addToCart', ['id' => $course->id]) }}" class="btn btn-success pull-right" role="button">Add To Cart</a>
		 <a href="#" class="btn btn-success pull-right" role="button">Course Description</a>
		</div>
      </div>
    </div>
  </div>
		@endforeach
  </div>
	@endforeach
@endsection

