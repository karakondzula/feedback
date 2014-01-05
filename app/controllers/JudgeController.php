<?php

class JudgeController extends BaseController {
	
	public function postJudge(){
			if ( !Sentry::check())
		{
			return Redirect::to("auth/signin")->with('error', 'You need to be logged in!');
		}

		if(Input::get('judge')=='1')
		{
			Feedback::where('id','=',(int)Input::get('fid'))->update(array('approved'=>1));
		}
		else
		{
			Feedback::where('id','=',(int)Input::get('fid'))->update(array('approved'=>2));
		}

		return Redirect::route('judge/feedback')->with('success','Updated');
	}
}