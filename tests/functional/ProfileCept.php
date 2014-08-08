<?php

$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('View my profile');

$I->signIn();
$I->postAStatus('My new status.');

$I->click('My Profile');
$I->seeCurrentUrlEquals('/@foobar');

$I->see('My new status.');
