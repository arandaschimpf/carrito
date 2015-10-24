<?php 
	/**
	* 
	*/
	class Model_User extends RedBean_SimpleModel
	{
		public function update(){
			$this->bean->password = hash("sha256", $this->bean->password);
		}		
	}
?>