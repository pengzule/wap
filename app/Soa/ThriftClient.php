<?php
namespace App\Soa;
use App\Soa\idl\PhpRemote\PhpRemoteClient;
use App\Soa\idl\PhpRemote\PhpRemote_getFunc_args;
use Log;
	error_reporting(E_ALL);
	//$thriftLib = '/jqm/smarthome/thrift/thrift-0.9.3/lib/php/lib';
	//$SoaRoot = '/jqm/smarthome/smarthome_v1/public/Soa';
	require_once $GLOBALS['G_CONFIG']['SoaRoot']. '/Thrift/ClassLoader/ThriftClassLoader.php';
	require_once $GLOBALS['G_CONFIG']['SoaRoot']. '/idl/PhpRemote/PhpRemote.php';
	require_once $GLOBALS['G_CONFIG']['SoaRoot']. '/idl/PhpRemote/Types.php';

	// 没有设置路径就直接把文件夹拷贝到当前目录下
	use Thrift\ClassLoader\ThriftClassLoader;
	use Thrift\Protocol\TBinaryProtocol;
	//use Thrift\Protocol\TCompactProtocol;
	use Thrift\Transport\TSocket;
	use Thrift\Transport\TBufferedTransport;
	use Thrift\Transport\THttpClient;


	class ThriftClient //implements SoaService
	{
	    /**
	     * @var object thrift对象
	     */
	    private $thriftClient;

	    /**
	     * @var string 服务名称
	     */
	    private $service;

	    /**
	     * @var string url地址
	     */
	    private $url;

	    /**
	     * @var array  错误信息
	     */
	    private $error;

	    /**
	     * @var array  重试次数
	     */
	    private $retryNum;

	     /**
	     * @var TBufferedTransport  thrift
	     */
	    private $transport;
	    /**
	     * @var PhpRemoteClient  thrift
	     */
	    private $client;

	    /**
	     * 构造函数
	     *
	     * @param $baseUrl      string  基本的url
	     * @param $service      string  调用的服务
	     * @param $retryNum     int     重试次数
	     */
	    public function __construct($baseUrl, $service, $retryNum){

		// Load
		$loader = new ThriftClassLoader();
		$loader->registerNamespace('Thrift',$GLOBALS['G_CONFIG']['SoaRoot']. '/');
		$loader->registerDefinition('PhpRemote',$GLOBALS['G_CONFIG']['SoaRoot']. '/idl/PhpRemote');
		$loader->register();

		$this->service  = $service;

		if(!is_int($retryNum) || $retryNum < 0){
		    $retryNum = 3;
		}elseif($retryNum > 10){
		    $retryNum = 10;
		}

		$this->retryNum     = $retryNum;
		$this->url          = $baseUrl;
		//$this->url        = $baseUrl . 'ThriftService';

		// $baseUrl = http://10.10.20.205:2002
		list($http, $IpPortStr) = explode("//",strval($baseUrl),2); 		
		list($IpStr, $PortStr) = explode(":",strval($IpPortStr),2);
		echo $baseUrl.'{Test}';
		//if (array_search('--http', $argv)) {
			  echo '--1--';
			$socket = new THttpClient((string)$IpStr, (int)$PortStr, '/Soa/ThriftServer.php');
			//$socket = new THttpClient((string)$IpStr, (int)$PortStr, '/test');
  	   	//} else {
    			//$socket = new TSocket('127.0.0.1', 6666);
  	  	//}
			echo '--2--';
		$socket->setTimeoutSecs(2);
			echo '--3--';
		$transport = new TBufferedTransport($socket, 1024, 1024);
			echo '--4--';
		$protocol = new TBinaryProtocol($transport);
			echo '--5--';
		//$protocol = new TCompactProtocol($transport);
		$client = new PhpRemoteClient($protocol);
			echo '--6--';
		$this->transport = $transport;
		$this->client = $client;
	    }

	    /**
	     * 用于远程方法调用
	     *
	     * @param $method string 调用的方法名
	     * @param $params array  调用的参数
	     *
	     * @return mixed 远程方法返回的值
	     */
	    public function getAndSet($method, $params){
			// 需要添加日志
			$this->transport->open();
			$result = '{result:null}';
			echo '--7--';
			try {
				echo '--8--';
				Log::info('get');
				$result = $this->client->getFunc($method, $params);
				echo '--9--';
				echo '*************call remote';
				echo ' moethod:';
				echo $method;
				echo ' params:';
				echo $params;
				echo ' result:';
				echo $result;
				echo '*************';
			  } 
			catch (Exception $e){
				echo '--10--';
				echo ' exception';
				echo $e->getMessage();
			    }
			echo '--11--';
			$this->transport->close();

		return $result;
	    }
	}
