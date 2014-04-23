<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class HeadersHelper {

    private $log;

    public function __construct() {
        $this->log = new Logger('HeadersHelper');
        $this->log->pushHandler(new StreamHandler('log-file.log', Logger::INFO));
    }

    private function get_http_headers() {
        $headers = '';
        foreach ($_SERVER as $header => $value) {
            if (substr($header, 0, 5) == 'HTTP_') {
                $header = substr($header, 5);
                $header = str_replace('_', ' ', $header);
                $header = strtolower($header);
                $header = ucwords($header);
                $header = str_replace(' ', '-', $header);
                $headers[$header] = $value;
            }
        }
        $this->log->addDebug('headers', $headers);
        return $headers;
    }

    public function getHost() {
        $host = "";
        foreach ($this->get_http_headers() as $header => $value) {
            if ($header == "Host") {
                $host = $value;
                if (strpos($host, "www.") === 0) {
                    $host = substr($host, 4);
                }
            }
        }
        return $host;
    }
}
?>
