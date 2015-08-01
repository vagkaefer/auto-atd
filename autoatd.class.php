<?php

class autoadt{

	private $query;

	function does_the_magic($query){

		$this->query = $query;
		$this->clean();

		//echo $this->query;

	}//does_the_magic end

	function clean(){

		//filters
		$this->query = strtolower($this->query); //leaves everything tiny
		$this->query = strip_tags($this->query); //remove html
		$this->query = preg_replace("/[^a-zA-Z\s]/", null, $this->query); //remove symbols and numbers
		$this->query = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $this->query ) ); //remove acentos

		//words to remove
		$artigos = array('o','a','os','as','um','uma','uns','umas');
		$pronomes = array('eu','tu','ele','ela','nos','vos','eles','elas','me','te','lhe','lhes','mim','comigo','ti','contigo','conosco','convosco');
		$geral = array('ou','esta','quero','preciso','necessito','no','na','com','sou','estou','esta','e','sei','nao');
		$remover = array_merge($artigos,$pronomes,$geral);

		$termosbusca = array();		
		$termos = explode(' ',$this->query);
		$qtd_termos = count($termos);
		for($x=0; $x<$qtd_termos; $x++){

			if(!in_array($termos[$x],$remover) && $termos[$x] != NULL){
				$termosbusca[] = $termos[$x];
			}
		}
		var_dump($termosbusca);

	}//clean end
	
}//class end

?>