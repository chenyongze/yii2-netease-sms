<?php

namespace bikerr;

/**
 * This is just an example.
 */
class Sms {

	private $appkey = '';
	private $nonce = '';
	private $curtime = '';
	private $checksum = '';
	
	public function __construct( $appkey , $nonce , $curtime  ) {
		$this->appkey = $appkey;
		$this->nonce = $appkey;
		$this->curtime = $curtime;
		$this->checksum = $this->getChecksum();
		
	}
	
	
	public function getChecksum() {
		return sha1($this->appkey . $this->nonce . $this->curtime);
	}
	
	
	
}
