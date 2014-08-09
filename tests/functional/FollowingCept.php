<?php 
$I = new FunctionalTester($scenario);

$I->am('a Larabook user.');
$I->wantTo('follow other users.');

// setup
$I->haveAnAccount(['username' => 'OtherUser']);
$I->signIn();

//action
$I->click('Browse Users');
$I->click('OtherUser');

// expectations
$I->seeCurrentUrlEquals('/@OtherUser');
$I->click('Follow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');
$I->see('You are following OtherUser');
$I->dontSee('Follow OtherUser');