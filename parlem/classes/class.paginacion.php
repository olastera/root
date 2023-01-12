<?php
class cPaginar extends configuracion {

	private $conexion;
	var $URL="";
	var $query="";
	// Registro de inicio del la pagina
	var $pinicio="";
	// Numero de filas o registros por pagina
	var $numeromaxderegistros="";
	var $numerodepaginas=10;
	var $totalregistros="";
	var $total_paginas=10;
	// cad_ limit $pinicio,$numeromaxderegistros
	var $cad_limite="";

	function __construct () {
		$this->conexion = parent::conectar(); //creo una variable con la conexión
		$this->URL	        = parent::get_URL();
		$this->URL_admin	= parent::get_URL_admin();
		return $this->conexion;
	}

	public function setquery($query){
		$this->query = $query;
	}

	public function setpinicio($inicio) {
		$this->pinicio=$inicio;
	}

	public function setnumeromaxderegistros($numeromaxderegistros) {
		$this->numeromaxderegistros=$numeromaxderegistros;
	}

	public function settotalregistros($totalregistros) {
		$this->totalregistros=$totalregistros;
	}

	public function getcadlimit() {
		return $this->query.$this->cad_limite;
	}

	public function runpaginar() {
		$this->paginacion();
	}

	public function totalregistros() {
		//creamos el objeto $con a partir de la clase DBManager
		$oConectar = new cConsultas; //instanciamos conector
		//usamos el metodo conectar para realizar la conexion
		$valores = NULL;
		$result = $oConectar->consultarBD($this->query,$valores);
		$this->totalregistros = count($result);
	}

	private function paginacion() {
		if (($this->pinicio=="") and ($this->numeromaxderegistros=="")) {
			$this->cadpaginacion="";
		} else {
			$pagina = $this->pinicio * $this->numeromaxderegistros ;
			$this->cad_limite=" limit  $pagina ,  $this->numeromaxderegistros ";
			//calculo el total de páginas
			$this->total_paginas = ceil($this->totalregistros / $this->numeromaxderegistros);
		}
	}

	public function	 hrefpaginas($pagina,$id,$slug,$div="lista_contenido") {
		$j=0;
		$class =" ";
		/*<ul class="pagination">
		<li><a href="#">&laquo;</a></li>
		<li><a href="#">1</a></li>

		<li><a href="#">&raquo;</a></li>
		</ul> */

		// if ($this->total_paginas>1) {
		$ul='<nav aria-label="navigation 5">
		<ul class="pagination justify-content-center">';

		if (isset($_GET["p"])) {
			$p = filter_input(INPUT_GET,"p");
		} else {
			$p=0;
		}
		//  echo "($p/".($this->total_paginas-1).")" ;
		$nivel=$this->nivel($p);
		// var_dump($nivel);
		if ($nivel>0) {
			$ul=$ul. "<li class='page-item'";
			$ul=$ul. ">
			<a class='page-link' href='$pagina' onclick='cargar_contenido(\"$pagina?id=".$id."&p=".(($nivel-$this->numerodepaginas))."&slug=".$slug."\",\"$div\")' aria-label='Anterior'>
				<span aria-hidden='true'>&laquo;</span>
				<span class='sr-only'>Anterior</span>
			</a>
		</li>
		";
		}
		//for ($i = 1; $i <= $this->total_paginas; $i++) {$numerodepaginas
		// evito que se muestren mas paginas de las que hay.
		if (($nivel+($this->numerodepaginas-1))<($this->total_paginas-1)) {
			$npaginas=$nivel+($this->numerodepaginas-1);
		} else {
			$npaginas=$this->total_paginas-1;
		}
		// var_dump($p);
		//var_dump($_SESSION['session']['paginacion']['p']);
		for ($i = $nivel; $i <= $npaginas; $i++) {
			if ($j+$nivel==$_SESSION['session']['paginacion']['p']){
				$li='<li class="page-item active" aria-current="page">' ;
				$li_='<span class="sr-only"></span></li>';
			} else {
				$li='<li class="page-item">' ;
				$li_='</li>';
			}
			$ul=$ul.$li."<a class='page-link' href='index.php?id=0&p=".($j+$nivel)."&slug=".$slug."' onclick='cargar_contenido(\"$pagina?id=".$id."&p=".($j+$nivel)."&slug=".$slug."\",\"$div\")'> ".($j+$nivel)."</a>".$li_;
			$j=$j+1;
		}
		if (($j+$nivel) < $this->total_paginas-1) {
			$ul=$ul. "
				<li class='page-item'>
					<a class='page-link' href='javascript:void(0)' aria-label='Siguiente' onclick='cargar_contenido(\"$pagina?id=".$id."&p=".($j+$nivel)."&slug=".$slug."\",\"$div\")' >
						<span class='sr-only'>Siguiente</span>
						<span aria-hidden='true'>&raquo;</span>
					</a>
				</li>
			";
		}
		$ul=$ul.' </ul> </nav>';
		return $ul;
	}

	public function URL () {
	}

	public function nivel($p) {
		$n_string = strlen($p);
		if ($n_string==1) {
			return 0;
		} else {
			$nivel = intval($p/$this->numerodepaginas)*10;
			return $nivel ;
		}
	}

	public function	 estadovariables() {
		echo "<br>query=$this->query<br>";
		echo "<br>cad_limite=$this->cad_limite<br>";
		echo "<br>pinicio=$this->pinicio<br>";
		echo "<br>Nivel=".$this->nivel($this->pinicio)."<br>";
		echo "<br>numeromax = $this->numeromaxderegistros<br>";
		echo "<br>totalregistros = $this->totalregistros<br>";
		echo "<br>total_paginas=$this->total_paginas<br>";
	}
}
?>
