<?php
//timezone
date_default_timezone_set('America/Sao_Paulo');

// conexão com o banco de dados
define('BD_SERVIDOR','localhost');
define('BD_USUARIO','root');
define('BD_SENHA','');
define('BD_BANCO','projetoweb');
    
class Banco{

    protected $mysqli;
	private $cadastro;
	
    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
    }

    public function setAgendamentos($nome,$telefone,$origem,$data_contato,$observacao){
        $stmt = $this->mysqli->prepare("INSERT INTO agendamentos (`Nome`, `Telefone`, `Origem`, `Data_Contato`, `Observacao`) VALUES (?,?,?,?,?);");
        $stmt -> bind_param("sssss",$nome,$telefone,$origem,$data_contato,$observacao);
        if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }
    }
	
	public function getAgendamentos($id){
		try{
			if(isset($id) && $id > 0){
				$stmt = $this->mysqli->query("SELECT * FROM agendamentos WHERE ID_Agendamento='".$id."';");
			}else{
				$stmt = $this->mysqli->query("SELECT * FROM agendamentos;");
			}
			
			$lista = $stmt->fetch_all(MYSQLI_ASSOC);
			$f_lista = array();
			$i = 0;
			foreach($lista as $l){
				$f_lista[$i]['ID_Agendamento'] = $l['ID_Agendamento'];
				$f_lista[$i]['Nome'] = $l['Nome'];
				$f_lista[$i]['Telefone'] = $l['Telefone'];
				$f_lista[$i]['Origem'] = $l['Origem'];
				$f_lista[$i]['Data_Contato'] = $l['Data_Contato'];
				$f_lista[$i]['Observacao'] = $l['Observacao'];
				$i++;
			}
			return $f_lista;
		}catch(Exception $e){
			echo "Ocorreu um erro ao tentar Buscar Todos. " . $e;
		}
	}
	
	public function updateAgendamentos($id,$nome,$telefone,$origem,$data_contato,$observacao){
       $stmt = $this->mysqli->query("UPDATE agendamentos SET `Nome` = '" . $nome . "', `Telefone` =  '" . $telefone . "', `Origem` =  '" . $origem . "', `Data_Contato` =  '" . $data_contato . "', `Observacao` =   '" . $observacao . "' WHERE `ID_Agendamento` =  '" . $id . "';");
        if( $stmt > 0){
            return true ;
        }else{
            return false;
        }
    }
	
	public function deleteAgendamentos($id){
		$stmt = $this->mysqli->query("DELETE from agendamentos WHERE ID_Agendamento = ". $id .";");
		if( $stmt > 0){
            return true ;
        }else{
            return false;
        }
	}
}    
?>