<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Emails Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used for various emails that
    | we need to display to the user. You are free to modify these
    | language lines according to your application's requirements.
    |
    */

    /*
     * Activate new user account email.
     *
     */

    'activationSubject'  => 'Aktivierung notwendig',
    'activationGreeting' => 'Wilkommen!',
    'activationMessage'  => 'Du musst dein Konto aktivieren, befor du alle unsere Dienste nutzen kannst.',
    'activationButton'   => 'Aktivieren',
    'activationThanks'   => 'Danke, dass du unsere App nutzt!',

    /*
     * Goobye email.
     *
     */
    'goodbyeSubject'  => 'Tut uns leid dich gehen zu sehen...',
    'goodbyeGreeting' => 'Hallo :username,',
    'goodbyeMessage'  => 'Tut uns leid dich gehen zu sehen. Dein Konto wurde deaktiviert. Du hast '.config('settings.restoreUserCutoff').' Tage zeit um das Konto wiederherzustellen.',
    'goodbyeButton'   => 'Konto wiederherstellen',
    'goodbyeThanks'   => 'Wir hoffen dich wieder zu sehen!',

];
