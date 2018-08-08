<?php

class DB{
	protected $db_name = __DIR__.'/../db/converter.db';
	protected $db_drvr ='sqlite';
	protected $pdo;
	public function __construct (){
		try
		{
			$this->pdo = new PDO("$this->db_drvr:$this->db_name");
			/* Create a prepared statement */
			$stmt = $this->pdo ->exec("CREATE TABLE IF NOT EXISTS converter (id INTEGER PRIMARY KEY,Start TEXT, End TEXT, Start_unit INTEGER, End_unit INTEGER );");
			
			
		}
		catch(Exception $e)
		{
			echo $e->getMessage();

		}
	}

	public function insert(string $start, string $end, float $start_unit, float $end_unit){
		try {
		    $this->pdo->prepare("INSERT INTO converter (Start, End, Start_unit, End_unit) VALUES (?,?,?,?)")->execute([$start, $end, $start_unit, $end_unit]);
		    echo json_encode('insert successful');
		} catch (PDOException $e) {

			echo $e->getMessage();
		}

	}

	public function select_all(){
		$result = $this->pdo->query('SELECT * FROM converter')->fetchAll((PDO::FETCH_OBJ));
		//var_dump($result);
		echo json_encode($result);
	}

	public function select($id){
		$stmt = $this->pdo-> prepare("SELECT * from converter where id = :id");
		
		/* bind param */
		$stmt -> bindParam(':id', $id, PDO::PARAM_INT);
		
		/* execute the query */
		$stmt -> execute();		
		
		/* fetch all results */		
		$result = $stmt->fetch(PDO::FETCH_OBJ);

		//var_dump($result);
		echo json_encode($result);
	}

	public function update($name, $value, $id){
		$sql = "UPDATE converter SET ${name} = ? WHERE id = ?";
		$this->pdo->prepare($sql)->execute([$value ,$id]);
		echo json_encode('update successful');
	}

	public function delete($id){
		$sql = "DELETE FROM converter WHERE id = ?";
		$this->pdo->prepare($sql)->execute([$id]);
		echo json_encode('delete successful');
	}

}
