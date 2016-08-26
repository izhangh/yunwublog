<?php 
class DES {
    var $key;
    var $iv;


    function DES($key, $iv) {
        
        $this->key = $key;
      
        $this->iv = $iv; 
    }

    function encrypt($str) {
       
        $size = mcrypt_get_block_size(MCRYPT_DES, MCRYPT_MODE_CBC);
        $str = $this->pkcs5Pad($str, $size);
//        echo $size.'<br>';
//        echo $str."<br>";
//        echo $this->key.'<br>';
//        echo $this->iv.'<br>';
        return mcrypt_cbc(MCRYPT_DES, $this->key, $str, MCRYPT_ENCRYPT, $this->iv);
    }

    function decrypt($str) {
        
        $strBin = $str;
        $str = mcrypt_cbc(MCRYPT_DES, $this->key, $strBin, MCRYPT_DECRYPT, $this->iv);
        $str = $this->pkcs5Unpad($str);
        return $str;
    }


    function pkcs5Unpad($text) {
        $pad = ord($text{strlen($text) - 1});
        if ($pad > strlen($text)) return false;
        if (strspn($text, chr($pad), strlen($text) - $pad) != $pad) return false;
        return substr($text, 0, -1 * $pad);
    }


    function pkcs5Pad($text, $blocksize) {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }

}
?>
