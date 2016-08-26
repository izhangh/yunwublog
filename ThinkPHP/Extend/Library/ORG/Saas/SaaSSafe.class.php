<?php 
	include_once 'DES.php';
	class SaaSSafe{
		private $iv;
		
		function set_iv($i){
			if($i != ''){
				$this->iv = $i;
			}
		}
		
		public function Encode($o_string){
			$md5_string = md5($o_string);
//			echo $md5_string.'<br>';
			$body_string = $md5_string.$o_string;
//			echo $body_string.'<br>';
			$key = $this->makeKey($this->iv);
//			echo $key.'<br>';
			$des_body_string = $this->desEn($body_string, $this->iv, $key);
//			echo $des_body_string.'<br>';
			$ret = base64_encode($des_body_string);
//			echo $ret.'<br>';
			return $ret;
		}
		
		public function Decode($o_string){
			
			$de_base_string = base64_decode($o_string);
			$key = $this->makeKey($this->iv);
			$de_des_string = $this->desDe($de_base_string, $this->iv, $key);
			$ret = substr($de_des_string, 32);
			return $ret;	
		}
		
		function odd($o_string){
			$ret = '';
			for ($i=0; $i<strlen($o_string); $i++){
				if($i%2 == 0){
					$ret.=substr($o_string, $i,1);
				}
			}
			return $ret;
		}
		
		function makeKey($iv){
			if ($iv != ''){
				return $this->odd(substr(md5($iv),8,16));
			}
		}
		
		private function desEn($o_string, $iv, $key){
			$des = new DES($key, $iv);
			$ret = $des->encrypt($o_string);
			return $ret;
		}
		
		private function desDe($o_string, $iv, $key){
			$des = new DES($key, $iv);
			$ret = $des->decrypt($o_string);
			return $ret;
		}
	}
?>
