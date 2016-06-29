<?php

/*
service PhpRemote{
 bool processFunc(1: string inMethod, 2:string inParams),
 string getFunc(1: string inMethod, 2:string inParams),
}
*/
	error_reporting(E_ALL);
	//$thriftLib = '/jqm/smarthome/thrift/thrift-0.9.3/lib/php/lib';
	$SoaRoot = '/mnt/hgfs/linux_code/wap/app/Soa';
	require_once $SoaRoot. '/Thrift/ClassLoader/ThriftClassLoader.php';
	require_once $SoaRoot. '/idl/gen-php/GenericAgentIdl.php';
	require_once $SoaRoot. '/idl/gen-php/Types.php';


	// 没有设置路径就直接把文件夹拷贝到当前目录下
	use Thrift\ClassLoader\ThriftClassLoader;
	use Thrift\Protocol\TBinaryProtocol;
	//use Thrift\Protocol\TCompactProtocol;
	//use Thrift\Transport\TSocket;
	use Thrift\Transport\TPhpStream;
	use Thrift\Transport\TBufferedTransport;


	// Load
	$loader = new ThriftClassLoader();
	$loader->registerNamespace('Thrift',$SoaRoot. '/');
	$loader->registerDefinition('gen-php',$SoaRoot. '/idl/gen-php');
	$loader->register();
	if (php_sapi_name() == 'cli') {
  		ini_set("display_errors", "stderr");
	}

	
	class PhpRemoteServer implements GenericAgentIdlIf
	{

		/**
		 * @return int
		 */
		public function checkAlive(){}
		/**
		 * @return string
		 */
		public function getReply(){
			$result = 'getreply';
			return $result;
		}
		/**
		 * @param string $command
		 * @return string
		 */
		public function sendCommand($command){}
		/**
		 * @param string $reply
		 */
		public function sendReply($reply){}

	};

	$handler = new PhpRemoteServer();
	$processor = new GenericAgentIdlProcessor($handler);
	$phpStream = new TPhpStream(TPhpStream::MODE_R | TPhpStream::MODE_W);
	$transport = new TBufferedTransport($phpStream);
	$protocol = new TBinaryProtocol($transport, true, true);
	//$protocol = new TCompactProtocol($transport, true, true);
	$transport->open();
	$processor->process($protocol, $protocol);
	$transport->close();
?>
