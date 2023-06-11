<pre>
<?php
require_once "vendor/autoload.php";

use \IEXBase\TronAPI\Provider\HttpProvider;


$fullNode     = new HttpProvider('https://api.shasta.trongrid.io');
$solidityNode = new HttpProvider('https://api.shasta.trongrid.io');
$eventServer  = new HttpProvider('https://api.shasta.trongrid.io');

$api = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer);

$address = $api->generateAddress();
var_dump($address);

$address = $address->getAddress(true);

$balance = $api->getBalance($address, true);
var_dump($balance);


$txs = $api->getManager()
           ->request("v1/accounts/$address/transactions/?limit=200", [], 'get')
;
var_dump($txs);


$latestBlocks = $api->getLatestBlocks();
var_dump($latestBlocks);

$tx = $api->getManager()
          ->request('/wallet/gettransactioninfobyid', ['value' => $tx_id], 'post')
;
var_dump($tx);
