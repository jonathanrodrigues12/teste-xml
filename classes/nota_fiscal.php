<?php
  include '../functions/util.php';
  include '../functions/upload.php';

  function ConectaMysql(){
  $host    = 'robb0527.locaweb.com.br';
  $usuario = 'agenc_care';
  $passwd  = '7561150490!@Artilharia';
  $bd      = 'agencia_care';
  $conn = mysqli_connect("$host", "$usuario", "$passwd", "$bd");
  $conn->set_charset("utf8");
  return $conn;
}

  class NotaFiscal{
    private $id;
    private $numero;
    private $data;
    private $destinatario;
    private $valor;
    private $xml;

    function __construct($id,$numero,$data,$destinatario,$valor,$xml){
      $this -> id              = $id;
      $this -> numero          = $numero;
      $this -> data            = $data;
      $this -> destinatario    = $destinatario;
      $this -> valor           = $valor;
      $this -> xml             = $xml;
    }
    function uploadNota(){
      $conn =ConectaMysql();
      if($this->xml['error'] == 0 ){
        if($this->xml['type'] =='text/xml'){
          $arquivo_xml = upload_arquivo($this->xml,'xml');
          $xml = simplexml_load_file('../uploads/xml/'.$arquivo_xml);
          $xml_json = json_encode($xml);
          $xml_array = json_decode($xml_json, TRUE);
          if(array_key_exists("NFe",$xml_array)){
            $array = $xml_array['NFe']['infNFe'];
          }
          else{
              $array = $xml_array['infNFe'];
          }
          if($array['emit']['CNPJ'] === '09066241000884'){
             if($xml_array['protNFe']['infProt']['nProt'] !=""){
                $numero_nota    = $xml_array['NFe']['infNFe']['ide']['nNF'];
                $data_nota      = $xml_array['NFe']['infNFe']['ide']['dhEmi'];
                $data_nota      = $xml_array['NFe']['infNFe']['ide']['dhEmi'];
                $destinatario   = $xml_array['NFe']['infNFe']['dest']['xNome'];
                $valor_nota     = $xml_array['NFe']['infNFe']['total']['ICMSTot']['vNF'];
                $sql = "INSERT INTO NOTA_FISCAL(NUM_NOTA,DATA_NOTA,DESTINATARIO,VALOR_NOTA,XML)VALUES('$numero_nota','$data_nota','$destinatario','$valor_nota','$arquivo_xml')";
                $query = mysqli_query($conn,$sql)or die(mysqli_erro($query));
                $retorno = array("msg"=>"Cadastrado com sucesso", "success"=>"1");
                return json_encode($retorno);
             }
             else{
               $retorno = array("msg"=>"É necessário que o nProt estar cadastrado na nota fiscal", "success"=>"0");
               return json_encode($retorno);
             }
           }
           else{
             unlink('../uploads/xml/'.$arquivo_xml);
             $retorno = array("msg"=>"CNPJ do emitente não  Permitido", "success"=>"0");
             return json_encode($retorno);
           }
        }
        else{
          $retorno = array("msg"=>"O Arquivo enviado não é um XML", "success"=>"0");
          return json_encode($retorno);
        }
      }
    }

    function listaNotas(){
      $conn =ConectaMysql();
      $ArrayNotas = array();
      $sql = "SELECT ID,NUM_NOTA,DATA_NOTA,DESTINATARIO,VALOR_NOTA,XML FROM NOTA_FISCAL";
      $query = mysqli_query($conn,$sql)or die(mysqli_erro($query));
      while($temp = mysqli_fetch_array($query)){
        $id           = $temp['ID'];
        $num_nota     = $temp['NUM_NOTA'];
        $data_nota    = $temp['DATA_NOTA'];
        $destinatario = $temp['DESTINATARIO'];
        $valor_nota   = $temp['VALOR_NOTA'];
        $xml          = $temp['XML'];

        $array  = array("id"           =>$id,
                        "num_nota"     =>$num_nota,
                        "data_nota"    =>data_pt_hora($data_nota),
                        "destinatario" =>$destinatario,
                        "valor_nota"   =>$valor_nota,
                        "xml"          =>$xml);
       array_push($ArrayNotas,$array);
      }
      return json_encode($ArrayNotas);
    }

  }


 ?>
