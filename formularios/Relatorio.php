	<?php
	//Incluir a conexao
	include_once('../Class/conexao.php');

$posto = $_GET['posto'];
$cod = $_GET['cod_venda'];

$qr2 = "SELECT preco, descricao, nome, quantidade FROM venda WHERE posto ='$posto' and  codigo_venda='$cod'  ";

$cns2 = $mysqli->query($qr2) or die($mysqli->error);

 $total = mysqli_num_rows($cns2);

$qrp = "SELECT posto.contacto, posto.endereco FROM venda, posto WHERE posto.posto ='$posto' and  codigo_venda='$cod'  LIMIT 1 ";

$cnsp = $mysqli->query($qrp) or die($mysqli->error);

 $lnp = $cnsp-> fetch_object();
 $endereco=$lnp->endereco;
 $telefone=$lnp->contacto;

$qr = "SELECT min(trocos) as trocos, date(data_venda) as data,time(data_venda) as hora ,posto, dinheiro, sum(total) as compra, pagamento FROM venda WHERE posto ='$posto' and codigo_venda='$cod' ";

$cns = $mysqli->query($qr) or die($mysqli->error);

 $ln2 = $cns-> fetch_object();

 $troco=$ln2->trocos;

  $dinheiro=$ln2->dinheiro;

   $compra=$ln2->compra;

   $pagamento=$ln2->pagamento;
   $data=$ln2->data;
   $hora=$ln2->hora;
   $posto=$ln2->posto;


	$html = '<table>';
	$html .='<thead>';
	$html .='<tr>';
	$html .='<td>Produto</td>';
	$html .='<td>Desc.</td>';
	$html .='<td>Preco</td>';
	$html .='<td>Quantidade</td>';
	$html .='</tr>';
	$html .='</thead>';

while($linha = mysqli_fetch_assoc($cns2)){
	$html .= '<tbody>';
	$html .= '<tr><td>'.$linha['nome']."</td>"; 
    $html .= '<td>'.$linha['descricao']."</td>";                                 
    $html .= '<td>'.$linha['preco']." Mt</td>";
    $html .= '<td>'.$linha['quantidade']."</td></tr>";
         $html .= '<tr><td align=\"center\"><p style=\"color:darkblue\">Pagamento:</p>' .$pagamento. "</td>";
    $html .= '<td><p style=\"color:darkblue\">Valor pago:</p>' .$dinheiro. Mt"</td>";
       						 
     $html .= '<td><p style=\"color:darkblue\">Trocos:</p>' .$troco. Mt"</td></tr>" ."<br>";
       						      						  
      $html .=  '<tr><td style=\"color:darkblue\"><p>Total:</p>' .$compra. Mt"</td></tr>";
       		                                                     								
}

					  
       						  
$html .= '</tbody>';
$html .= '</table>';

	//Referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	//Incluir autoloader
	require_once('../dompdf/autoload.inc.php');

	//Criando a instancia
	$dompdf =  new DOMPDF();

	$dompdf->load_html('

<p style=\"color:red\">HOTEL DOM FLIKER.</p>

	<p>POSTO: $posto. $endereco.</p>
	<p>CONTACTO: $telefone</p>
	<p>DATA: $data</p>
	<p>HORAS: $hora</p>

	'.$html.'

	<h2 style="font-family: sans-serif; text-align:center; font-size:8px; margin-top: 0% !important;">Obrigado. Volte sempre</h2>
			'
		);

	//Renderizar o html
	$dompdf->render();

	//Exibir a pagina
	$dompdf->stream(
		"comprovante.pdf"

		array(
			"Attachment" =>false //para realzar o download automaticamente altera para ture.
			)
		);
	?>