<?php

class ProjectController extends BaseController {

	//project controler

	//show add project form
	public function getAddProject()
	{
		return View::make('projects/add');
	}

	//show all projects
	public function getShowProjects(){
		return View::make('projects/show')
			->with('projects',Project::orderBy('name')->get());
	}

	//process add project form
	public function postAddProject()
	{
		// The user needs to be logged in, make that check please
		if ( ! Sentry::check())
		{
			return Redirect::to("auth/signin")->with('error', 'You need to be logged in to add projects!');
		}

		

		// Declare the rules for the form validation
		$rules = array(
			'name'        => 'required',
			'description' => 'required',
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			return Redirect::route('add')->withErrors($validator);
		}

		Project::create(array(
			'user_id' => Sentry::getUser()->id,
			'name'=>Input::get('name'),
			'description'=>Input::get('description')
			));

		return Redirect::route('add')->with('success','Project submitted');
	}

}
