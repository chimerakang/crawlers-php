<?php

$GLOBALS['THRIFT_ROOT'] = './Thrift';

 // Load up all the thrift stuff
require_once $GLOBALS['THRIFT_ROOT'].'/Transport/TTransport.php';  
require_once $GLOBALS['THRIFT_ROOT'].'/Transport/TSocket.php';  
require_once $GLOBALS['THRIFT_ROOT'].'/Transport/TPhpStream.php';  
require_once $GLOBALS['THRIFT_ROOT'].'/Protocol/TProtocol.php';  
require_once $GLOBALS['THRIFT_ROOT'].'/Protocol/TBinaryProtocol.php';  
require_once $GLOBALS['THRIFT_ROOT'].'/Transport/TBufferedTransport.php';  
require_once $GLOBALS['THRIFT_ROOT'].'/Type/TMessageType.php';  
require_once $GLOBALS['THRIFT_ROOT'].'/Factory/TStringFuncFactory.php';  
require_once $GLOBALS['THRIFT_ROOT'].'/StringFunc/TStringFunc.php';  
require_once $GLOBALS['THRIFT_ROOT'].'/StringFunc/Core.php';  
require_once $GLOBALS['THRIFT_ROOT'].'/Type/TType.php';  


use Thrift\Protocol\TBinaryProtocol;  
use Thrift\Transport\TSocket;  
use Thrift\Transport\TSocketPool;  
use Thrift\Transport\TFramedTransport;  
use Thrift\Transport\TBufferedTransport; 
use Thrift\Transport\TPhpStream;

$GEN_DIR = 'gen-php';


require_once $GEN_DIR . '/BaseService.php';

class CrawlerService implements BaseServiceIf {
  /**
   * @throws \RequestException
   * @throws \TimedOutException
   */
  public function ConnectDB()
  {
  }
  /**
   * @return int
   */
  public function Ping()
  {
  	return 0;
  }
  /**
   * @param \ServiceInfo $s
   * @throws \RequestException
   */
  public function ServiceLogin(\ServiceInfo $s)
  {
  }
  /**
   * @param \ServiceInfo $s
   * @throws \RequestException
   */
  public function ServiceLogout(\ServiceInfo $s)
  {
  }
}

header('Content-Type', 'application/x-thrift');

$handler   = new CrawlerService();
$processor = new BaseServiceProcessor($handler);

$transport = new TBufferedTransport(new TPhpStream(TPhpStream::MODE_R | TPhpStream::MODE_W));

$protocol = new TBinaryProtocol($transport, true, true);

$transport->open();
$processor->process($protocol, $protocol);
$transport->close();