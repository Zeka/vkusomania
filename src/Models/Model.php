<?php
namespace src\Models
{
use vendor\obninsk\obninsk_doc;
class Model {
 
	private $data;
	private $doubleMass;
	private $mail;

	function calculate($filepath) 
	{
			copy($filepath,"menu.doc");

			$s="";     
			$fp = fopen("menu.doc",'rb');    

			while (($fp != false) && !feof($fp)){
				$s.=fread($fp,filesize("menu.doc")); 
			}            
			fclose($fp);
			$obrabotka = new obninsk_doc;
			$this->data= $obrabotka->doc($s,0,1);
			$f = fopen('menu.txt', 'w');
			fwrite($f, $this->data);
			$this->data = $this->massive();    
	}
        
    function massive()
    {
			$array = file('menu.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
				
			foreach ($array as $line){
				if ($line=="�" or  strrpos($line, "0@Pa��")) {
					break;
				} else {
					rtrim($line);
					rtrim($line, "\n");
					$main[] = $line;
				}
			}
				
			for ($i=0; $i<count($main)-1; $i++){
				if ( preg_match('/�������/i',$main[$i]) ) {
					while ( !preg_match('/�����������/i',   $main[$i]) ){
						$data[] = $main[$i];
						unset($main[$i]);
						$i++;
					}
				}
			}
			$main = array_merge ($main, $data);
			return $main;
    }
	 
	function orderDetail($mass)
	{
			$it=(count($mass)-2)/2;
			$ordernum = 1;
			
			$this->doubleMass[person][0] = $mass['FIO'];
			
			for ($i=1; $i<=$it; $i++){
				if ( !empty($_POST[$i]) ){
					$StrArr = explode("||",$mass[a_.$i]);
					$StrArr[] = $mass[$i];
					
					for ($j=0;$j<7;$j++){
						$this->doubleMass[$ordernum][$j] = $StrArr[$j];
					}
					
					$itogo += $this->doubleMass[$ordernum][5]*$this->doubleMass[$ordernum][6];
					$ordernum++;
				}	
			}
			
			$this->doubleMass[itog][0] = $itogo;
			$mailText  = '��� ���������: '.$this->doubleMass[person][0]."!\n";
			$mailText .= "������ ����:\n\n";
				
			$num = count($this->doubleMass)-2;
				
			for ($i=1;$i<=$num;$i++){
				$mailText .= $i.")";
				
				for ($j=0;$j<7;$j++){
					if ($j == 6){
						$mailText .=$this->doubleMass[$i][$j]." ��. \n";
					} else {
						$mailText .=$this->doubleMass[$i][$j]."\n";
					}
					 
				}
				
				$mailText .= "\n";	
			}
			
			$mailText .= "�����: ".$this->doubleMass[itog][0]." ���.";
			$this->mail = $mailText;
	}	
	
	function sendmail($send)
	{
			mail ('svyatoslav_maslov@mail.ru','������ ������ ����������',$send);
	}
	
	function getData() 
	{
			if ($this->data) {
				return $this->data;
			} else {
				return '������ ���������� DOC �����!';
			}
	}
	
	function getDoubleMass() 
	{
			if ($this->doubleMass) {
				return $this->doubleMass;
			} else {
				return '������! ����� �� �����������.';
			}
	}
	
    function getMail() 
	{
			if ($this->mail) {
				return $this->mail;
			} else {
				return '������! ������ �� ��������������.';
			}
	}

} // class Model
}
?>
