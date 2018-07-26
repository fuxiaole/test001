<?php
class PhpByte{
	
	//�ַ���ת����
	public static function getBytes($string) { 
	$bytes = array(); 
	for($i = 0; $i < strlen($string); $i++){ 
	$bytes[] = ord($string[$i]); 
	} 
	return $bytes; 
   }
   
   
   	/**
	
	* ���ֽ�����ת��ΪString���͵�����
	
	* @param $bytes �ֽ�����
	
	* @param $str Ŀ���ַ���
	
	* @return һ��String���͵�����
	
	*/
	 
	public static function toStr($bytes) {
		$str = '';
		foreach($bytes as $ch) {
			$str .= chr($ch);
		}
		 
		return $str;
	}
   

   /* ת��һ��intΪbyte���� 
     
* @param $byt Ŀ��byte���� 
     
* @param $val ��Ҫת�����ַ��� 
     
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
     
* ���ֽ�������ָ����λ�ö�ȡһ��Integer���͵����� 
     
* @param $bytes �ֽ����� 
     
* @param $position ָ���Ŀ�ʼλ�� 
     
* @return һ��Integer���͵����� 
     
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