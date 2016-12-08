@extends('layouts.master')
@section('content')
    <h1>Create New Course</h1>
    {!! Form::open(['url' => 'courses']) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::text('description',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('price', 'Price:') !!}
        {!! Form::text('price',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('participant_limit', 'Seats Available:') !!}
        {!! Form::text('participant_limit',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('instructor', 'Instructor:') !!}
        {!! Form::text('instructor',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('courseType', 'Course Type:') !!}
        {!! Form::text('courseType',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop
