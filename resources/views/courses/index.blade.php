@extends('layouts.master')

@section('content')
    <h1>Course</h1>
    <a href="{{url('/courses/create')}}" class="btn btn-success">Create Course</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Participants Enrolled</th>
            <th>Participant Limit</th>
            <th>Instructor</th>

            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($courses as $course)
            <tr>
                <td>{{ $course->title }}</td>
                <td>{{ $course->description }}</td>
                <td>{{ $course->price }}</td>
                <td>{{ $course->participants }}</td>
                <td>{{ $course->participant_limit }}</td>
                <td>{{ $course->instructor }}</td>
                <td><a href="{{route('courses.show',$course->id)}}" class="btn btn-primary">Read</a></td>
                <td><a href="{{route('courses.edit',$course->id)}}" class="btn btn-warning">Update</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['courses.destroy', $course->id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection
