<?php
namespace Views;
class View {
 
	static function displayMenu($str) 
	{
            echo $str;
	}
	
	static function buttonsView()
	{
            echo "<script> document.getElementById('comment').style.display = 'none'; </script>";
			echo "<button class='add_comment' onclick=\"refresh()\" >��������</button>";
	}
	
	static function displayFormMenu($str) 
	{
			if ($str == false){
				echo "<h2>������ ������� ���� �������!</h2><br>��������� �������������� �������� ����!";
			} else {
				echo "<form method='POST' action='index.php' >\r\n";
				echo "������� ���:<br>";
				echo "<input type='text' name='FIO' value=''><br>\r\n";
				echo $str;
			}
	}
	
	static function getOrder($doubleMass,$message) 
	{
			echo '��������� '.$doubleMass[person][0].'!<br><br>';
            echo '�� ��������:<br><br>';
			echo '<table border>';
			echo '<tr><td>����:</td><td>���������:</td><td>�</td>'
				.'<td>������������:</td><td>���-��</td><td>����:</td>'
				.'<td>���-�� ��.:</td></tr>';
				
			for ($i=1;$i<=count($doubleMass)-2;$i++){
				
				echo '<tr>';
				for ($j=0;$j<7;$j++){
				    echo '<td>'.$doubleMass[$i][$j].'</td>';
				}
				echo '</tr>';	
			}
			
			echo '</table>';
			echo "<br>�����: ".$doubleMass[itog][0].' ���.';
			echo "<form method='POST' action='index.php' ><br>";
			echo "<input type='submit' name='confirm' value='�����������'>";
			echo "<input type='hidden' name='zakaz' value='$message'>";
            echo "</form>";
	}
 

	static function displayError($error) 
	{
            echo "<b>������:</b> {$error}<br>";
	}
	
	static function Send() 
	{
            echo "<b>�������!</b><br>";
			echo "<b>��� ����� ���������.</b><br><br>";
	}

 
	
 
} // class VIEW
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />