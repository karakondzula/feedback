<?php

class FeedbackController extends BaseController {

	public function getAddFeedback(){
		return View::make('feedbacks/add');
	}

	public function getComment($id){
		return View::make('feedbacks/add')
			->with('project',Project::find($id));
	}

	public function postAddFeedback(){
		// Declare the rules for the form validation
		$rules = array(
			'name'    => 'required',
			'comment' => 'required',
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			return Redirect::to('feedback/'.Input::get('pid'))->withErrors($validator);
		}

		
		Feedback::create(array(
			'project_id' => Input::get('pid'),
			'visitor'=>Input::get('name'),
			'feedback'=>Input::get('comment'),
			'approved'=>0
			));

		echo "Accepted";
		//return View::make('feedbacks');
	}

	public function getShowNewComments(){
		if ( ! Sentry::check())
		{
			return Redirect::to("auth/signin")->with('error', 'You need to be logged in!');
		}

		$data = Feedback::where('user_id','=',Sentry::getUser()->id);

		return View::make('feedbacks/judge')->with('feeds',$data);
	}

}