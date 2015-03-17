<?php

use Laracasts\Commander\CommanderTrait;

class BaseController extends Controller {

    use CommanderTrait;

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if ( ! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }

        /**
         * Share information about the current user or if a user is signed in with all views
         */
        View::share('currentUser', Auth::user());
        View::share('signedIn', Auth::check());
    }



}
