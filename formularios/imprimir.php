  <?php
  
  //Incluir a conexao
  include_once('../Class/conexao.php');

$posto = $_GET['posto'];
$cod = $_GET['id'];


$qrp = "SELECT posto.contacto, posto.endereco FROM  posto WHERE posto.posto ='$posto' LIMIT 1 ";

$cnsp = $mysqli->query($qrp) or die($mysqli->error);

 $lnp = $cnsp-> fetch_object();
 $endereco=$lnp->endereco;
 $telefone=$lnp->contacto;

  ////////////////// 
  $htm = '<table style="float:right;" class="mb-1" colspan="6">';
  $htm .= '<tbody>';
  $htm .='<tr><td colspan="8">' .$posto. "</td></tr>";
  $htm .= '</tbody>';
  $htm .= '</table';
////////////////////////

  $ht = '<table>';
  $ht .='<thead>';
  $ht .='<tr>';
  $ht .='<td>';
  $ht .='<img style="height:30px;width:100px; border-radius:(0px,45px,0px,45px);" src="imagem.jfif">';
  $ht .='</td>';
  $ht .='</tr>';
  $ht .='<tr><td style="text-align:center;" colspan=4>
  <p style="text-align: left; font-size:9px;">Empresa</p></td></tr>';

  $ht .= '</tbody>';
  $ht .= '</table';
//////////////////////////// 
  $qr2 = $mysqli->prepare("SELECT produtos, total FROM orders WHERE posto ='$posto' and  id='$cod' ");
$qr2->execute();
$query = $qr2->get_result();
////////////////////////////////////////////
 $qr = $mysqli->prepare("SELECT *, date(Data) as data, time(Data) as horas FROM orders WHERE posto ='$posto' and  
  id='$cod' ");
$qr->execute();
$ln = $qr->get_result();
 $linha2 = $ln->fetch_assoc();
 ///////////////////////////////
  $html = '<table>';
  $html .='<thead>';
  $html .='<tr>';
  $html .='<td>Produto(s)</td>';
  //$html .='<td>Desc.</td>';
  $html .='<td>Total</td>';

  $html .='</tr>';
  $html .='</thead>';

while($linha = $query->fetch_assoc() ){

  $html .= '<tbody>';
  $html .= '<tr><td>'.$linha['produtos']."</td>"; 
  //$html .= '<td>'.$linha['descricao']."</td>";                                 
  $html .= '<td>'.$linha['total']." Mt</td><tr>";
                                                                  
}

  $html .= '</tbody>';
  $html .= '</table><br>';
  $html .= '<p>Pagamento:' .$linha2['pagamento']. "</p>";
  $html .= '<p>Valor pago:' .$linha2['dinheiro']. 'Mt'."</p>";
  $html .= '<p>Trocos:' .$linha2['trocos']. 'Mt'."</p>";
   
  $html .= '<p>Data :' .$linha2['data']."</p>";
  $html .= '<p>Horas :' .$linha2['horas']."</p>";
  $html .= '<p>Telefone :' .$telefone."</p><br>";
  $html .= '<p style="text-align:center;">Nota :' .'Quantidade explicita entre parenteses.'."</p>";
  //referenciar o DomPDF com namespace
  use Dompdf\Dompdf;

  // include autoloader
  require_once("../dompdf/autoload.inc.php");

  //Criando a Instancia
  $dompdf = new DOMPDF();
  
  $dompdf->set_paper(array(10,0,200,450));

  // Carrega seu HTML
  $dompdf->load_html('
       
        '. $htm .'
        '. $ht .'
      '. $html .'

      
    ');

  //Renderizar o html
  $dompdf->render();

  //Exibibir a página
  $dompdf->stream(
    "comprovante.pdf", 
    array(
      "Attachment" => false //Para realizar o download somente alterar para true
    )
  );


  ?>