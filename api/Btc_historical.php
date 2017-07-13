<?php


class Btc_historical {


private $data;
private $historical_datelist;
private $historicalvalues;


public function __construct(){

	$this->data = $this->get_bitcoin_csv_data();

	$this->set_historical_dates($this->data[0]);

	$this->set_historical_values($this->data[1]);
}


public function get_bitcoin_csv_data(){


	$file = fopen("http://api.coindesk.com/v1/bpi/historical/close.csv?start=2010-07-18&end=".date('Y-m-d')."&index=USD","r");

	$exchange_log_date = [];

	$exchange_log_rate = [];

	while (($line = fgetcsv($file)) !== FALSE) {

	  if($line[0]!=='close' && $line[0]!=='Date' && !empty($line[0]) && $line[0]!=='This data was produced from the CoinDesk price page.'  && $line[0]!=='http://www.coindesk.com/price/'){

	  	array_push($exchange_log_rate, $line[1]);
	  	array_push($exchange_log_date, date('F j  Y',strtotime($line[0])));
	  }

	}

	fclose($file);

	return array($exchange_log_date,$exchange_log_rate);

}


private function set_historical_dates($historicaldates){

	$this->historical_datelist = $historicaldates;
}

private function set_historical_values($historicalvalues){

	$this->historicalvalues = $historicalvalues;

}



public function get_historical_dates(){

	return "'" . implode("','", $this->historical_datelist) . "'";
}

public function get_historical_values(){

	return implode(',',$this->historicalvalues);
}


}