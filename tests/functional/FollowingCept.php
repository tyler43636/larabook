<?php 
$I = new FunctionalTester($scenario);

$I->am('a Larabook user.');
$I->wantTo('Follow other users.');

// setup
$I->haveAnAccount(['username' => 'OtherUser']);
$I->signIn();

//action
$I->click('Browse Users');
$I->click('OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');

// When I follow a user...
$I->click('Follow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');
$I->see('Unfollow OtherUser');

// When I unfollow that same user...
$I->click('Unfollow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');
$I->see('Follow OtherUser');
