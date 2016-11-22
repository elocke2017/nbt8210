@extends('layouts.master')
@section('content')
    <h1>Update Course</h1>
    {!! Form::model($investment,['method' => 'PATCH','route'=>['courses.update',$course->email]]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::text('description',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('price', 'Price:') !!}
        {!! Form::text('price',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('participants', 'Participants Enrolled:') !!}
        {!! Form::text('participants',null,['class'=>'form-control']) !!}
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
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop
