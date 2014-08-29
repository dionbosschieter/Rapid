<?php

class GlobalMail {

	const SENDERADRES = "bob@example.nl";

	public static function passwordReset($user, $randombits) {
		$link = "http://example.nl/wwreset.php?answer=$randombits";

        $userfullname = $user->getName();
        $username = $user->getUserName();
        $useremail = $user->getEmail();

        $subject = "Password reset mail";
        $message = "
          <html>
          <head>
          </head>
          <body>
            <p>
              <h1>Password reset mail</h1>
              name: $userfullname<br />
              uname: $username<br />
              e-mail: $useremail<br />
              ip request: {$_SERVER['REMOTE_ADDR']}<br />
                <br />
                <a href='$link'>$link<a/>
            </p>
          </body>
          </html>
        ";

        //verstuur de mail nogmaals maar nu naar de gebruiker zelf
        $headers  = GlobalMail::getHeader();
        GlobalMail::sendMail($useremail, $subject, $message, $headers);
	}

	public static function sendMail($useremail, $subject, $message, $headers) {
		mail($useremail, $subject, $message, $headers);
	}

	public static function getHeader() {
		return 'MIME-Version: 1.0' . "\r\n" .
        'Content-type: text/html; charset=utf-8' . "\r\n" .
        "From: ".GlobalMail::SENDERADRES."" . "\r\n" .
        "Reply-To: ".GlobalMail::SENDERADRES."";
	}
}
