<?php
namespace App\Services;
use MailchimpMarketing\ApiClient;

class Newsletter
{
	public function subscrib(string $email){
		$mailchimp = new ApiClient();
		$mailchimp->setConfig([
			'apiKey' => config('services.mailchimp.key'),
			'server' => 'us9'
		]);

		return $mailchimp->lists->addListMember('e95d9d94fd', [
			'email_address' =>$email,
			'status'=>'subscribed'
		]);
	}
}
