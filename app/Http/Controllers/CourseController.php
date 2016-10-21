<?php

namespace App\Http\Controllers;

use App\Course;

use Illuminate\Http\Request;

use App\Http\Requests;

class CourseController extends Controller
{
    public function getIndex()
	{
	$courses = Course::all();
	return view('shop.index', ['courses' => $courses]);
	}
}
