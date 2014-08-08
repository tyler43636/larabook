<?php

use Larabook\Forms\SignInForm;

class SessionsController extends \BaseController {

    /**
     * @var SignInForm
     */
    private $signInForm;

    function __construct(SignInForm $signInForm)
    {
        $this->beforeFilter('guest', ['except' => 'destroy']);
        $this->signInForm = $signInForm;
    }


    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $formData = Input::only('email', 'password');
        $this->signInForm->validate($formData);

        if(Auth::attempt($formData))
        {
            Flash::message('Welcome Back!');
            return Redirect::intended('/statuses');
        }
	}


	/**
	 * Log user out of Larabook
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
        Flash::message('You have successfully logged out.');
        return Redirect::home();
	}


}
