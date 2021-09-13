<?php 
    date_default_timezone_set('America/Sao_Paulo');

   

    define('BD_SERVIDOR','localhost');
    define('BD_USUARIO','root');
    define('BD_SENHA','');
    define('BD_BANCO','projetoweb');

    class Banco{
        protected $mysql;

        public function __construct(){
            $this->conexao();
        }
        private function conexao(){
            $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);
        }
        public function setAgendamentos($nome,$telefone,$origem,$data_contato,$observacao){
            $stmt = $this->mysqli->prepare("INSERT INTO agendamentos (`Nome`, `Telefone`,`Origem`,`Data_Contato`,`Observacao`) VALUES
            (?,?,?,?,?)");
            $stmt->bind_param("sssss",$nome,$telefone,$origem,$data_contato,$observacao);
            if($stmt->execute() == TRUE){
                return true;
            }else{
                return false;
            }
        }
        public function getAgendamentos() {
            try {
                $stmt = $this->mysqli->query("SELECT * FROM agendamentos;");
                $lista = $stmt->fetch_all(MYSQLI_ASSOC);
                $f_lista = array();
                $i = 0;
                foreach ($lista as $l) {
                    $f_lista[$i]['Nome'] = $l['Nome'];
                    $f_lista[$i]['Telefone'] = $l['Telefone'];
                    $f_lista[$i]['Origem'] = $l['Origem'];
                    $f_lista[$i]['Data_Contato'] = $l['Data_Contato'];
                    $f_lista[$i]['Observacao'] = $l['Observacao'];
                    $i++;
                }
                return $f_lista;
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar Buscar Todos." . $e;
            }
        }
    }
?>