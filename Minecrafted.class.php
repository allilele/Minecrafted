<?php

class Minecrafted
{
	private $_motd = '';
	private $_ip = '0.0.0.0';
	private $_port = 0000;
	private $_OnP = null;
	private $_MaxP = null;
	private $_ping = 0;

	public function setIp($ip){
		$this->_ip = '';
		$ipArray = str_split($ip);
		foreach ($ipArray as $var) {
			if ($var =='.')
			{
				$this->_ip .= $var;
			}
			elseif(is_numeric($var))
			{
				$this->_ip .= $var;
			}
		}
	}

	public function setPort($port){
		if ($port < 65535){$this->_port = $port;}
	}
	public function getPort(){
		return $this->_port;
	}
	public function getIp(){
		return $this->_ip;
	}
	public function getMotd(){
		return $this->_motd;
	}
	public function getOnPlyrs(){
		return $this->_OnP;
	}
	public function getMaxPlyrs(){
		return $this->_MaxP;
	}
	public function getPing(){
		return $this->_ping;
	}

	public function connect()
	{
		$host = $this->_ip;
		$port = $this->_port;
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		$connected = socket_connect($socket, $host, $port);
		if ($connected) {
		    $ping_start = microtime(true);
		    socket_send($socket, "\xFE", 1, 0);
		    $data = "";
		    $result = socket_recv($socket, $data, 1024, 0);
		    $ping_end = microtime(true);
		    socket_close($socket);

		    if ($result != false && substr($data, 0, 1) == "\xFF") {
		        $info = explode("\xA7", mb_convert_encoding(substr($data,1), "iso-8859-1", "utf-16be"));
		        $this->_motd = substr($info[0], 1);
		        $this->_OnP = $info[1];
		        $this->_MaxP = $info[2];
		        $this->_ping = round(($ping_end - $ping_start) * 1000);                
		    } else {
		        return false;
		    }
		} else {
		    return false;
		}
	}
	public function __construct($ip = '0.0.0.0',$port = 25565){
		$this->setIp($ip);	
		$this->setPort($port);
	}
}