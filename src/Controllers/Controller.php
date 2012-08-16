<?php 
namespace Controllers;
use Models\Model;
use Views\View;

class Controller{

	private $error=false;
	private $result=false;
    private $massD;
	private $email;
	 
	#������ �����������
	function processData()
	{
			$this->userRequest();
			if ($this->error!="") {
				View::displayError($this->error); 
				$str = Model::fullMenu();
				View::displayFormMenu($str);
			} elseif ( $this->massD && $this->email ) {
				View::getOrder($this->massD,$this->email);
			} elseif (isset($_POST['send'])) {
				$str = Model::fullMenu();
				View::displayMenu($str);
				View::buttonsView();
				
			} else {	
				$str = Model::showDate();
				View::displayFormMenu($str);
			}
	}

	function userRequest() 
	{
			if (isset($_POST['send'])){
				$this->validate();
				if (!$this->error) {
					$model = new Model();
					$model->calculate($_POST['filepath']);
				} 
			}
			if (isset($_POST['order'])){
				$bool = $this->checkout();
				if ( $bool == true ){
						$model = new Model();
						$model->orderDetail($_POST);
						$doubleMass = $model->getDoubleMass();
						$this->massD =$doubleMass;
						$message    = $model->getMail();
						$this->email = $message;
				}				
			}
			if (isset ($_POST['confirm'])){
				$model = new Model();
				$model->sendMail($_POST['zakaz']);
				View::Send();
			}
	}
		
	function checkout()
	{
			$it=(count($_POST)-2)/2;
			$check = false;

			for ($i=1; $i<=$it; $i++){
			
				if ( !empty($_POST[$i]) ){
					$check = true;
					if ( !preg_match( "/^[0-9]{1,2}+$/", $_POST[$i] ) ){
						$this->error .=" ".$_POST[$i]."-������ �������� �� �������� ����������. ������� �����, ��������� �� ����� ��� ���� ����!<br>";
					}	
				}	
			}
			
			if ($check == false){
				$this->error = "�� �� ������� �� ���� ����� �� ����!<br>";
			}
					
			if (!preg_match( "/[�-��-�]{3,}+/", $_POST['FIO'] )){
				$this->error .= "���� � ��� ��������� ������� �� ���������. ��������� �������!<br>";
			}

			if (empty($_POST['FIO'])){
				$this->error .= "�� �� ������� ��� ���������!<br>";
			}
				
			if ( ($check == true) && (!empty($_POST['FIO'])) ){
				return true;
			} else {
				return false;
			}
	}
		# ��������
	function validate() 
	{	 
			if (isset($_POST['send']) && empty($_POST['filepath'])) {
				$this->error = '�� ������ ���� � �����!';
			}
	}
	 
} // class Controller

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />