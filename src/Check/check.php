<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	function check($value1,$value2) 
	{
		if ( ($value1=='admin') && ($value2=='123456') ){
		return true;
		} else {
		return false;
		}
	}
	
if ( isset($_GET['login']) && isset($_GET['pass']) ){
	if ( check($_GET['login'],$_GET['pass']) == true ){	
		echo "<h2>����� ����������!</h2><br>";
        echo '<form method=POST action=index.php >';
        echo '������� ����� ������ ���� DOC-����� � http://www.vkusomania.com/site/menu.html :<br>';
        echo "<input type='text' size='65' name='filepath' value='' > ";
        echo "<input type='submit' name='send' value='���������'>";
        echo "</form><br><hr>";
	}else{
		echo "�� ��������� ������ ����� ��� ������!<br>";
	}	
} 

	
?>