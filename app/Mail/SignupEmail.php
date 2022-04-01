<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SignupEmail extends Mailable {
	use Queueable, SerializesModels;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($data) {

		$this->email_data = $data;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {

		return $this->from(env('MAIL_USERNAME'), 'MeraJob')->subject("Welcome To MeraJob Portal")->view('mail.signup-email', ['email_data' => $this->email_data]);
	}
}
