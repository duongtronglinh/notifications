<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lesson;
use App\Notification;
use App\Notifications\NewLessonNotification;

class LessonController extends Controller
{
    public function __construct() 
    {
    	$this->middleware('auth');
    }

    public function newLesson()
    {
    	$lesson = new Lesson;
    	$lesson->users_id = auth()->user()->id;
    	$lesson->title = 'Laravel Notification 2';
    	$lesson->body = 'This is my notification';
    	$lesson->save();

    	$user = User::where('id', '!=', auth()->user()->id)->get();

    	if(\Notification::send($user, new NewLessonNotification(Lesson::latest('id')->first()))){
    		return back();
    	}
    }

    public function notification()
    {
        return auth()->user()->unreadNotifications;
    }
}
