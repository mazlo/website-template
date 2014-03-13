<?php

class GuestController extends BaseController 
{

	public function contactForm()
	{
		$member = Input::get( 'to' );

		return View::make( 'dialogContact' )->with( 'member', $member );
	}

	public function sendEmailAction()
	{
		if ( !Input::has( 'to') )
			return;

		$member = Input::get( 'to' );

		$s_subject = Input::get( 'sbj' );
		$s_email = Input::get( 'eml' );
		$s_text = Input::get( 'txt' );

		$data = array( 'text' => $s_text );

		Mail::send( 'emails.contact', $data, function( $message ) use( $member, $s_subject, $s_email )
		{
		    // TODO ZL replace this by the requested mail receiver
		    $message->to( 'info@ttc-benrath.de' );
		    $message->subject( '[Contact] '. $s_subject );
		    $message->replyTo( $s_email, $s_email );
		});

		return '1';
	}
}
