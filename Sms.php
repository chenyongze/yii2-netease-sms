<?php
namespace bikerr;
use linslin\yii2\curl\Curl;
class Sms {

	private $AppKey = '852a8de556b5f646a34c760a52661b10';
	private $AppSecret = 'df6a01417758';
	
	private $Nonce = '1322023123456103123156';
	private $CurTime = '';
	private $CheckSum = '';
	
	public  $header = [];
	
	public function __construct(  ) {
// 		$this->AppKey = $appkey;
// 		$this->Nonce = $appkey;
// 		$this->CurTime = $curtime;
		$this->CheckSum = $this->setChecksum();
		$this->CurTime = $this->setCurTime();
		
		$this->header = $this->setHeader();
	}
	
	private  function setCurTime() {
		return time();
	}
	
	private function setChecksum() {
		return sha1($this->AppSecret . $this->Nonce . $this->CurTime);
	}
	
	private function setHeader() {
		$header = [];
		$header['AppKey'] 	=	$this->AppKey;
		$header['Nonce']	=	$this->Nonce;
		$header['CurTime']	=	$this->CurTime;
		$header['CheckSum']	=	$this->CheckSum;
		return $header;
	}

	public function sendVerificationCode( $mobile ) {
		$url = 'https://api.netease.im/sms/sendcode.action';
		$curl = new Curl();
		$curl->setOption(CURLOPT_HTTPHEADER, $this->header)
				->setOptions(['mobile' => $mobile])
				->post($url);
	}

	public function sendMessage() {
		$url = 'www.baidu.com';
		$curl = new Curl();
		$result = $curl->get($url);
		var_dump($result);
	}
}

$model = new Sms();
$model->sendMessage();


