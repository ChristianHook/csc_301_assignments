<?php

class File {
	static public function read($file, $type) {
		return (fopen($file, $type));
	}

	static public function write($opened_file, $email, $password, $type) {
		return (fwrite($opened_file, $email.';'.$password.$type));
	}


}