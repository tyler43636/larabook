<?php

use Larabook\Users\FollowUserCommand;
use Larabook\Users\UnfollowUserCommand;

class FollowsController extends \BaseController {

	/**
	 * Follow a user
	 *
	 * @return Response
	 */
	public function store()
	{
        // @todo add input grabber to base controller
        $input = Input::get();
        $input['userId'] = Auth::id();

        $this->execute(FollowUserCommand::class, $input);

        Flash::success('You are now following this user.');

        return Redirect::back();
	}


    /**
     * Unfollow a user
     *
     * @param $userIdToUnfollow
     * @internal param $idOfUserToUnfollow
     * @return Response
     */
	public function destroy($userIdToUnfollow)
	{
        $input = array_add(Input::get(), 'userId', Auth::id());

		$this->execute(UnfollowUserCommand::class, $input);

        Flash::success('You have unfollowed this user.');

        return Redirect::back();
	}


}
