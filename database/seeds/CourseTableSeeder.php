<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = new \App\Course([
		'imagePath' =>'http://keys4free.com/wp-content/uploads/2016/05/Microsoft-Dumps-Physical-Office-2.png',
		'title' =>'Microsoft Office',
		'description' =>'All you want to know about MS Office',
		'price' =>120,
        'participants'=>0,  //number of participants enrolled is 0 to start
        'participant_limit'=>30,  //number of participants (seats) available
        'instructor'=>'Bill Gates'
		]);
		$course->save();
		
		$course = new \App\Course([
		'imagePath' =>'https://upload.wikimedia.org/wikipedia/commons/thumb/8/86/Microsoft_Excel_2013_logo.svg/2000px-Microsoft_Excel_2013_logo.svg.png',
		'title' =>'Microsoft Excel',
		'description' =>'All you want to know about MS Excel',
		'price' =>100,
        'participants'=>0,  //number of participants enrolled is 0 to start
        'participant_limit'=>30,  //number of participants (seats) available
        'instructor'=>'Bill Gates'
		]);
		$course->save();
		
		$course = new \App\Course([
		'imagePath' =>'https://learning.linkedin.com/content/dam/me/learning/blog/2016/article-center-posts/PowerPoint.png',
		'title' =>'Microsoft PowerPoint',
		'description' =>'All you want to know about MS PowerPoint',
		'price' =>80,
        'participants'=>0,  //number of participants enrolled is 0 to start
        'participant_limit'=>30,  //number of participants (seats) available
        'instructor'=>'Bill Gates'
        ]);
		$course->save();
		
		$course = new \App\Course([
		'imagePath' =>'http://pupa.global/training.png',
		'title' =>'Office HR Training',
		'description' =>'All you want to know about HR Training',
		'price' =>120,
        'participants'=>0,  //number of participants enrolled is 0 to start
        'participant_limit'=>30,  //number of participants (seats) available
        'instructor'=>'Toby Flenderson'
        ]);
		$course->save();
		
		$course = new \App\Course([
		'imagePath' =>'http://spectrumsafetytraining.com/wp-content/uploads/2014/09/violence.png',
		'title' =>'Workplace Violence Eradication Training',
		'description' =>'All you want to know about a safer workplace',
		'price' =>100,
        'participants'=>0,  //number of participants enrolled is 0 to start
        'participant_limit'=>30,  //number of participants (seats) available
        'instructor'=>'Michael Scott'
		]);
		$course->save();
		
		$course = new \App\Course([
		'imagePath' =>'http://ec.europa.eu/social/BlobServlet?mode=displayPicture&photoId=2420',
		'title' =>'Gender Discrimination Training',
		'description' =>'All you want to know about MS PowerPoint',
		'price' =>80,
        'participants'=>0,  //number of participants enrolled is 0 to start
        'participant_limit'=>30,  //number of participants (seats) available
        'instructor'=>'RuPaul'
		]);
		$course->save();
		
    }
}
