#!/usr/bin/php
<?

$GLOBALS['THRIFT_ROOT'] = 'lib/php/src';

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TPhpStream;
use Thrift\Transport\TBufferedTransport;

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