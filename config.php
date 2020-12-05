<?php

/**
 * @property string host
 * @property string user
 * @property string pass
 * @property string db
 */
class config {
	function __construct() {
		$this->host = "localhost";
		$this->user  = "root";
		$this->pass = "";
		$this->db = "rabit-trial-task";
	}
}