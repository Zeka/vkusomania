<?php
namespace Views;

class View {
 
	static function displayDefault() 
	{
            echo "<form method='POST' action='index.php' > ";
            echo "������� ����� ������ ���� DOC-����� � http://www.vkusomania.com/site/menu.html :<br><br>";
            echo "<input type='text' size='65' name='filepath' value='' > ";
            echo "<input type='submit' name='send' value='���������'>";
            echo "</form>";
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
			echo "<a href='http://localhost/vkusomania/web/index.php'>��������� �����</a>";
	}
	
	static function Send() 
	{
            echo "<b>�������!</b><br>";
			echo "<b>��� ����� ���������.</b><br>";
			echo "<a href='http://localhost/vkusomania/web/index.php'>��������� �� �������...</a>";
	}

 
	static function displayResults($results) 
	{
            if (is_array($results)){
            
				echo "<form method='POST' action='index.php' > ";
				echo "������� ���:<br>";
				echo "<input type='text' name='FIO' value=''><br>";
				$num = 1;
			
                for ($i=0; $i<count($results)-1; $i++){

                    if( preg_match('/(������)?(����)/i',   $results[$i]) || 
                        preg_match('/(�������)?(����)/i',  $results[$i]) || 
                        preg_match('/(������)?(����)/i',   $results[$i]) ||
                        preg_match('/(��������)?(����)/i', $results[$i]) ) {
						
							$day = $results[$i-1];
							echo "<br><span id='day' >".$results[$i-1]."</span><br>";
							echo "<span id='season' >".$results[$i]."</span><br>";
                        
                    } elseif ( $results[$i] == '������') {
			
                        echo "<br><span id='category' >".$results[$i]."</span><br>";
						echo "<table border>";
						echo '<tr><td>�</td><td>������������:</td>'
							.'<td>���-��:</td><td>����:</td>'
							.'<td>���-�� ��.:</td></tr>';
						$food = $results[$i];			
						$i++;
									
						while ( $results[$i]!='������ �����' ) {
							if ( preg_match('/(�)?([0-9]{1,2})$/', $results[$i]) ) { 
								$str = $results[$i];
								echo "<tr><td>".$results[$i]."</td>";
								$i++;
								$str .='||'.$results[$i];
								echo "<td>".$results[$i]."</td>";
								$i++;
								$str .='||'.$results[$i];
								echo "<td>".$results[$i]."</td>";
								$i++;
								$str .='||'.$results[$i];
								echo "<td>".$results[$i]."</td>";
								$i++;
								echo "<td id='kol'> <input size='2' type='text' name=$num value='' > </td></tr>";
								$info =$day.'||'.$food.'||'.$str;
								echo "<input type='hidden' name='a.$num' value='$info'>";
								$num++;
							} else {
								break 1;
							}
											
						}
						echo "</table>"; 
					} elseif ( $results[$i-1] == '������ �����') {
						$food = $results[$i-1];           
						echo "<br><span id='category' >".$results[$i-1]."</span><br>";
						echo "<table border>";
						echo '<tr><td>�</td><td>������������:</td>'
							.'<td>���-��:</td><td>����:</td>'
							.'<td>���-�� ��.:</td></tr>';	
							
						while ( $results[$i]!=='������ �����' ) {		
							if ( preg_match('/(�)?([0-9]{1,2})$/', $results[$i]) ) { 
								$str = $results[$i];
							    echo "<tr><td>".$results[$i]."</td>";
							    $i++;
							    $str .='||'.$results[$i];
							    echo "<td>".$results[$i]."</td>";
							    $i++;
							    $str .='||'.$results[$i];
							    echo "<td>".$results[$i]."</td>";
							    $i++;
  		 					    $str .='||'.$results[$i];
							    echo "<td>".$results[$i]."</td>";
							    $i++;
							    echo "<td id='kol'> <input size='2' type='text' name='$num' value='' > </td></tr>";
							    $info =$day.'||'.$food.'||'.$str;
							    echo "<input type='hidden' name='a.$num' value='$info'>";
							    $num++;

					        } else {	   
								break 1; 
							}
															
						}				
						echo "</table>";
                        
					} elseif ( $results[$i-1] == '������ �����') {
                        $food = $results[$i-1];
                        echo "<br><span id='category' >".$results[$i-1]."</span><br>";
                        echo "<table border>";
						echo '<tr><td>�</td><td>������������:</td>'
							.'<td>���-��:</td><td>����:</td>'
							.'<td>���-�� ��.:</td></tr>';
											
							while ( !preg_match('/^(�����������)?(�����)^/i', $results[$i]) ) {
							
								if ( preg_match('/(�)?([0-9]{1,2})$/', $results[$i]) ){    
									$str = $results[$i];
									echo "<tr><td>".$results[$i]."</td>";
									$i++;
									$str .='||'.$results[$i];
									echo "<td>".$results[$i]."</td>";
									$i++;
									$str .='||'.$results[$i];
									echo "<td>".$results[$i]."</td>";
									$i++;
									$str .='||'.$results[$i];
									echo "<td>".$results[$i]."</td>";
									$i++;
									echo "<td id='kol'> <input size='2' type='text' name='$num' value='' > </td></tr>";
									$info =$day.'||'.$food.'||'.$str;
									echo "<input type='hidden' name='a.$num' value='$info'>";
									$num++;
								} else {
									break 1;
								}					
							}
										
							echo "</table>";
                        
					} elseif ( preg_match('/(�����������)+\s+(�����)/i', $results[$i-1])) {
						$food = $results[$i-1];
                        echo "<br><span id='category' >".$results[$i-1]."</span><br>";
                        echo "<table border>";
						echo '<tr><td>�</td><td>������������:</td><td>������:</td>'
							.'<td>���-��:</td><td>����:</td>'
							.'<td>���-�� ��.:</td></tr>';
							
							while ( !preg_match("/([0-9]{2}).([0-9]{2}).([0-9]{4})./", $results[$i]) ){
								if ( preg_match('/(�)?([0-9]{1,2})$/', $results[$i]) ){    
									$str = $results[$i];
									echo "<tr><td>".$results[$i]."</td>";
									$i++;
									$str .= '||'.$results[$i].' ';
									$n_main = $results[$i];
									echo "<td rowspan=3>".$results[$i]."</td>";
									$i++;
									$str .= $results[$i];
									echo "<td>".$results[$i]."</td>";
									$i++;
									$str .= '||'.$results[$i];
									echo "<td>".$results[$i]."</td>";
									$i++;
									$str .= '||'.$results[$i];
									echo "<td>".$results[$i]."</td>";
									$i++;
									$info =$day.'||'.$food.'||'.$str;
									echo "<td id='kol'> <input size='2' type='text' name=$num value='' > </td></tr>";
									echo "<input type='hidden' name='a.$num' value='$info'>";
									$num++;
									
										for ($j=1; $j<3; $j++) {
											if ( preg_match('/(�)?([0-9]{1,2})$/', $results[$i]) ){    
												$str = $results[$i];
												echo "<tr><td>".$results[$i]."</td>";
												$i++;
												$str .='||'.$n_main.' � '.$results[$i];
												echo "<td>".$results[$i]."</td>";
												$i++;
												$str .='||'.$results[$i];
												echo "<td>".$results[$i]."</td>";
												$i++;
												$str .='||'.$results[$i];
												echo "<td>".$results[$i]."</td>";
												$i++;
												echo "<td id='kol'> <input size='2'  type='text' name=$num value='' > </td></tr>";
												$info =$day.'||'.$food.'||'.$str;
												echo "<input type='hidden' name='a.$num' value='$info'>";
												$num++;
											} else {   
												break 1; 
											}  
										}
								} else {   
									break 1;
								}											
							}								
							echo "</table>";					
					}
                }
				
				echo "<br><br><input type='submit' name='order' value='��������'>";
				echo "</form>";
            } else {    
				echo $results;
            }
    }
 
} // class VIEW
?>
