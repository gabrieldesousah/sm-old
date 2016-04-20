<?php
	$meu_array = array("fruta" => "5", "laranja" => 10); // meu array
	 
    $meu_array = json_encode($meu_array); //serializando o array, eu posso transmiti-lo num cookie
    var_dump($meu_array);
	$obj = json_decode($meu_array); 
	var_dump($obj);
    setcookie("meu_cookie",$meu_array,time()+24*30); //criando um cookie com o meu array
    
    //recebendo o cookie, se ele tiver sido criado
    $meu_array = isset($_COOKIE["meu_cookie"]) ? $_COOKIE["meu_cookie"] : "";
    echo(json_decode($meu_array->fruta)); //decodificando o cookie e mostrando o array
    
    var_dump($meu_array);
    

	//string json contendo os dados de um funcionário ]
	$json_str = '{"nome":"Jason Jones", "idade":38, "sexo": "M"}'; 
	//faz o parsing na string, gerando um objeto PHP 
	var_dump($json_str);
	$obj = json_decode($json_str); 
	var_dump($obj);
	
	//imprime o conteúdo do objeto 
	echo "nome: $obj->nome<br>"; echo "idade: $obj->idade<br>"; echo "sexo: $obj->sexo<br>"; 
?>







<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Calendário</title>
</head>
<?php
    
    date_default_timezone_set('America/Sao_Paulo');
   	$date = date('Y-m-d H:i:s', time());
   	echo $date;
   	
   	$mes=date('m', time());
    $ano=date('Y', time());
    switch($mes){
    	case 1: 
    		$dias=31;
	    	$nome="Janeiro";
	    	break;
	    case 2:
	    	if ($ano % 400 == 0) {
				$dias=29;
			}
			elseif (($ano % 4 == 0) AND ($ano % 100 == 0)){
				$dias=28;
			}
			elseif (($ano%4 == 0) AND ($ano%100 != 0)){
				$dias=29;
			}else{
				$dias=28;
			}
	    	$nome="Fevereiro";
	    	break;
	    case 3:
	    	$dias=31;
	    	$nome="Março";
	    	break;
	    case 4:
	    	$dias=30;
	    	$nome="Abril";
	    	break;
	    case 5:
	    	$dias=31;
	    	$nome="Maio";	
    		break;
    	case 6:
    		$dias=30;
	    	$nome="Junho";
	    	break;
    	case 7:
    		$dias=31;
	    	$nome="Julho";
    		break;
    	case 8:
    		$dias = 31;
    		$nome = "Agosto";
    		break;
    	case 9:
    		$dias = 30;
    		$name = "Setembro";
    		break;
    	case 10:
    		$dias = 31;
    		$name = "Outubro";
    		break;
    	case 11:
    		$dias = 30;
    		$name = "Novembro";
    		break;
    	case 12:
    		$dias = 31;
    		$name = "Dezembro";
    		break;
    }
?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
    	    <table class="table-condensed table-bordered table-striped">
                <thead>
                    <tr>
                      <th colspan="7" >
                        <a class="btn"><i class="icon-chevron-left"></i></a>
                        <a class="btn"><?php echo "<br>" . $nome . " de " . $ano;?> </a>
                        <a class="btn"><i class="icon-chevron-right"></i></a>
                      </th>
                    </tr>
                    <tr>
						<td width=30><center>D</center></td>
						<td width=30><center>S</center></td>
						<td width=30><center>T</center></td>
						<td width=30><center>Q</center></td>
						<td width=30><center>Q</center></td>
						<td width=30><center>S</center></td>
						<td width=30><center>S</center></td>
					</tr>
					<tbody>
<?php
    echo "<tr>";
    for($i=1;$i<=$dias;$i++)    {
	    $diadasemana = date("w",mktime(0,0,0,$mes,$i,$ano));
	    $cont = 0;
	    if($i == 1)    {
		    while($cont < $diadasemana){
			    echo "<td></td>";
			    $cont++;
		    }
	    }
	    

	    if($i == date('d', time())){
	    	echo "<td width=30 style='background: #ccc'><center>";
			echo $i;
	    }else{
	    	echo "<td width=30><center>";
	    	echo $i;
	    }
	    
	    echo "</center></td>";
	    if($diadasemana == 6) {
	    echo "</tr>";
	    echo "<tr>";
	    }
    }
    echo "</tr>";
    ?>
			</tbody>
            </table>    
		</div>
	</div>
</div>