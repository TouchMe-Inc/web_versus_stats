<?php

	set_exception_handler(function (Throwable $exception) {
		// get the current date & time
		$time = date('F j, Y, g:i a e O');

		// format the exception message
		$message = "[{$time}] {$exception->getMessage()}\n";

		// append to the error log
		error_log($message, 3, "logs/L_" . date('Ymd') . ".log");

		// show a user-friendly message
		echo "Whoops, looks like something went wrong!";
	});

?>