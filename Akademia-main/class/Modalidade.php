<?php
    class Modalidade
    {
        
        private $nome;
        private $descricao;
        private $imagem;

        public function __construct(){
            try {
                $this->conn = new PDO("mysql:host=localhost;dbname=akademia", "root", "");
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Erro de conexão: " . $e->getMessage();
                $this->conn = null;
            }
        }
    
        // Método para cadastrar modalidades
        public function cadastroModalidades($nome, $descricao, $imagem) {
            if ($this->conn === null) {
                echo "Erro: Conexão com o banco de dados não foi estabelecida.";
                return false;
            }
    
            try {
                $sql = "CALL piModalidade(:nome, :descricao, :imagem)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':descricao', $descricao);
                $stmt->bindParam(':imagem', $imagem);
                return $stmt->execute(); // Retorna true se a query foi bem-sucedida
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
                return false;
            }
        }

        

        public function create($_nome, $_descricao, $_imagem)
        {
            $this->nome = $_nome;
            $this->descricao = $_descricao;
            $this->imagem = $_imagem;
        }

        public function listarModalidade()
        {
            try 
            {
                include("./db/conn.php");

                $sql = "CALL psModalidade()";
                $data = $conn->query($sql)->fetchAll();

                return $data;
            } 
            catch (Exception $e) 
            {
                return false;
            }
        }

        private $conn;

        // Construtor para inicializar a conexão com o banco de dados
        
        
    }

?>