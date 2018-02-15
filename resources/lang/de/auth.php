<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed'   => 'Diese Daten stimmen nicht mit unseren überein.',
    'throttle' => 'Zu viele Versuche. Bitte Probiere es in :seconds Sekunden noch einmal.',

	// Activation items
	'sentEmail'        => 'Wir haben eine Mail an :email gesendet.',
	'clickInEmail'     => 'Bitte Clicke auf den Link um dein Konto zu aktivieren.',
	'anEmailWasSent'   => 'Eine Mail wurde am :date an die Adresse :email gesendet.',
	'clickHereResend'  => 'Klicke hier um noch eine Mail zu senden.',
	'successActivated' => 'Dein Konto wurde erfolgreich aktiviert.',
	'unsuccessful'     => 'Your account could not be activated; please try again.',
	'notCreated'       => 'Your account could not be created; please try again.',
	'tooManyEmails'    => 'Too many activation emails have been sent to :email. <br />Please try again in <span class="label label-danger">:hours hours</span>.',
	'regThanks'        => 'Thank you for registering, ',
	'invalidToken'     => 'Invalid activation token. ',
	'activationSent'   => 'Activation email sent. ',
	'alreadyActivated' => 'Already activated. ',

	// Labels
	'whoops'          => 'Hoppla! ',
	'someProblems'    => 'Es ist ein Problem mit deiner eingabe aufgetreten.',
	'email'           => 'E-Mail Adresse',
	'password'        => 'Passwort',
	'rememberMe'      => ' Eingelogt bleiben',
	'login'           => 'Login',
	'forgot'          => 'Passwort vergessen?',
	'forgot_message'  => 'Probleme mit dem Passwort?',
	'name'            => 'Benutzername',
	'first_name'      => 'Vorname',
	'last_name'       => 'Nachname',
	'confirmPassword' => 'Passwort bestätigen',
	'register'        => 'Registrieren',

	// User flash messages
	'sendResetLink' => 'Passwort Reset Link versenden',
	'resetPassword' => 'Passwort zurücksetzen',
	'loggedIn'      => 'Du wurdest eingelogt!',

	// email links
	'pleaseActivate'    => 'Please activate your account.',
	'clickHereReset'    => 'Click here to reset your password: ',
	'clickHereActivate' => 'Click here to activate your account: ',

	// Validators
	'userNameTaken'    => 'Username is taken',
	'userNameRequired' => 'Username is required',
	'fNameRequired'    => 'First Name is required',
	'lNameRequired'    => 'Last Name is required',
	'emailRequired'    => 'Email is required',
	'emailInvalid'     => 'Email is invalid',
	'passwordRequired' => 'Password is required',
	'PasswordMin'      => 'Password needs to have at least 6 characters',
	'PasswordMax'      => 'Password maximum length is 20 characters',
	'captchaRequire'   => 'Captcha is required',
	'CaptchaWrong'     => 'Wrong captcha, please try again.',
	'roleRequired'     => 'User role is required.',

	'reset_password' => 'Passwort zurücksetzen',
];
