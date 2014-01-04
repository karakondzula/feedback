<?php

class FeedbackController extends BaseController {

	public function getAddFeedback(){
		return View::make('feedbacks/add');
	}

	public function getComment($id){
		return View::make('feedbacks/add')
			->with('project',Project::find($id));
	}

	public function postAddFeedback($id){
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
			return Redirect::route('feedback/'.$id)->withErrors($validator);
		}

		
		Feedback::create(array(
			'project_id' => Input::get('pid'),
			'visitor'=>Input::get('name'),
			'feedback'=>Input::get('comment'),
			'approved'=>0
			));

		echo "Komentar je prihvaćen";
		//return View::make('feedbacks');
	}

}