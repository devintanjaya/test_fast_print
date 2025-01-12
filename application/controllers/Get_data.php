<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_data extends CI_Controller {

	function __construct() {
		parent::__construct();
    }

	public function index()
	{

		$source_url = "https://recruitment.fastprint.co.id/tes/api_tes_programmer";

		$username = "tesprogrammer120125C10";
		$password = "20d9c74411e2684a9ee34d43767b6a06" ;

		$header = array(
			"content-type" => "application/json",
		);
		
		/*
		$header = array(
			"content-type" => "application/json"
		);
		*/

		$body = array(
			"username" => $username,
			"password" => $password,
		);

		$ch = curl_init();
		//curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
		curl_setopt($ch, CURLOPT_NOBODY, false);
		curl_setopt($ch, CURLOPT_URL, $source_url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_POST,1 );
		curl_setopt($ch, CURLOPT_POSTFIELDS, $body); 

		$html = curl_exec($ch);

		$headerSent = curl_getinfo($ch);
		//print_r($headerSent);
		//echo "<br/><br/>";

		if (!curl_errno($ch)) {
			$datas['http_code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			if ($datas['http_code'] == 200) {
				$datas['result'] = $html;
				//print_r($html);
			}
		} else {
			/*
			echo "<br/><br/>";
			echo 'Error: ';
			print_r(curl_error($ch));
			exit;
			*/
		}

		curl_close($ch);

		echo "<br/><br/>";
		echo "substring data ditemukan di index : " . strpos($datas['result'], 'data');
		echo "<br/><br/>";

		$data_barang = explode('"data"', $datas['result']);
		print_r($datas['result']);


		/*
		$data['viewoptions']['page'] = "Get API Data";
		$data['viewoptions']['title'] = "";
		$data['heading'] = "Master Barang";
		$this->load->view('general/header',$data);
    	$this->load->view('content/home',$data);
    	$this->load->view('content/script/home-script',$data);
    	$this->load->view('general/footer',$data);
    	*/

	}

	
}
