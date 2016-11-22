@extends('layouts.master')
@section('content')
    <h1>Course </h1>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Course Title</td>
                <td><?php echo ($course['title']); ?></td>
            </tr>
            <tr>
                <td>Course Description</td>
                <td><?php echo ($course['description']); ?></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><?php echo ($course['price']); ?></td>
            </tr>
            <tr>
                <td>Participants Enrolled</td>
                <td><?php echo ($course['participants']); ?></td>
            </tr>
            <tr>
                <td>Seats Available</td>
                <td><?php echo ($course['participant_limit']); ?></td>
            </tr>
            <tr>
                <td>Instructor</td>
                <td><?php echo ($course['instructor']); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
@stop
