<?php
class PhpByte{
	
	//字符串转数组
	public static function getBytes($string) { 
	$bytes = array(); 
	for($i = 0; $i < strlen($string); $i++){ 
	$bytes[] = ord($string[$i]); 
	} 
	return $bytes; 
   }
   
   
   	/**
	
	* 将字节数组转化为String类型的数据
	
	* @param $bytes 字节数组
	
	* @param $str 目标字符串
	
	* @return 一个String类型的数据
	
	*/
	 
	public static function toStr($bytes) {
		$str = '';
		foreach($bytes as $ch) {
			$str .= chr($ch);
		}
		 
		return $str;
	}
   

   /* 转换一个int为byte数组 
     
* @param $byt 目标byte数组 
     
* @param $val 需要转换的字符串 
     
* 
     
*/
  
    public static function integerToBytes($val) { 
        $byt = array(); 
        $byt[0] = ($val & 0xff); 
        $byt[1] = ($val >> 8 & 0xff); 
        $byt[2] = ($val >> 16 & 0xff); 
        $byt[3] = ($val >> 24 & 0xff); 
        return $byt; 
    } 

	
	/** 
     
* 从字节数组中指定的位置读取一个Integer类型的数据 
     
* @param $bytes 字节数组 
     
* @param $position 指定的开始位置 
     
* @return 一个Integer类型的数据 
     
*/
  
    public static function bytesToInteger($bytes, $position) { 
        $val = 0; 
        $val = $bytes[$position + 3] & 0xff; 
        $val <<= 8; 
        $val |= $bytes[$position + 2] & 0xff; 
        $val <<= 8; 
        $val |= $bytes[$position + 1] & 0xff; 
        $val <<= 8; 
        $val |= $bytes[$position] & 0xff; 
        return $val; 
    } 
	
}




    $cmdLenth = strlen('L/LoginDataUpDateTrue');
   $a1 = PhpByte::integerToBytes($cmdLenth);  //INT 2 bytes
   $a2 = PhpByte::bytesToInteger($a1,0);     //BYTES 2 INT
   $a3 = PhpByte::getBytes('L/LoginDataUpDateTrue');  //STRING 2 BYTES
   
   var_dump($a1);

  // var_dump(PhpByte::intToBytes2(strlen('L/LoginDataUpDateTrue')));
   echo '</br>';
  // var_dump(PhpByte::toStr(PhpByte::intToBytes2(strlen('L/LoginDataUpDateTrue'))));
  var_dump($a2);
     echo '</br>';
	 var_dump(array_merge($a1,$a3));