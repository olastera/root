<?php
class cDo_dump {

  function ini_dump($var) {
    echo '<div style="background:#323436; color: #fff; padding: 10px;margin: 10px; border-radius: 10px; font-family: monospace, monospace; font-size: 12px;overflow-y: scroll;height: 300px;">';
    echo $this->do_dump($var);
    echo '</div>';
  }

  function do_dump(&$var, $var_name = NULL, $indent = NULL, $reference = NULL) {
		$do_dump_indent = "<span style='padding-left:10px'></span>";
		$reference = $reference.$var_name;
		$keyvar = 'the_do_dump_recursion_protection_scheme'; $keyname = 'referenced_object_name';
		if (is_array($var) && isset($var[$keyvar])) {
			$real_var = &$var[$keyvar];
			$real_name = &$var[$keyname];
			$type = ucfirst(gettype($real_var));
			echo "$indent$var_name <span style='color:#fff;'>$type</span> <span style='color:#d642d6;'>=></span> <span style='color:#e87800;'>&amp;$real_name</span><br>";
		} else {
			$var = array($keyvar => $var, $keyname => $reference);
			$avar = &$var[$keyvar];
			$type = ucfirst(gettype($avar));
			if ($type == "String"){ $type_color = "<span style='color:#7bce5a;'>"; }
			elseif($type == "Integer"){ $type_color = "<span style='color:#cca749;'>"; }
			elseif($type == "Double"){ $type_color = "<span style='color:#cca749;'>"; $type = "Float "; }
			elseif($type == "Boolean"){ $type_color = "<span style='color:#cca749;'>"; }
			elseif($type == "NULL"){ $type_color = "<span style='color:#cca749;'>"; }
			if (is_array($avar)) {
        $type = "array";
				$count = count($avar);
				echo "$indent" . ($var_name ? "$var_name <span style='color:#d642d6;'>=></span> ":"") . "<span style='color:#fff;'>$type</span> ( <span style='color:#636568;'>// $type ($count)</span><br>";
				$keys = array_keys($avar);
				foreach($keys as $name) {
					$value = &$avar[$name];
					$this->do_dump($value, "<span style='color:#7bce5a;'>'$name'</span>", $indent.$do_dump_indent, $reference);
				}
				echo "$indent)<br>";
			} elseif(is_object($avar)) {
				echo "$indent$var_name <span style='color:#fff;'>$type</span><br>$indent(<br>";
				foreach($avar as $name=>$value) do_dump($value, "$name", $indent.$do_dump_indent, $reference);
				echo "$indent)<br>";
			}
			elseif(is_int($avar)) echo "$indent$var_name <span style='color:#d642d6;'>=></span> <span style='color:#636568;'> $type_color$avar</span> // $type(".strlen($avar).")</span><br>";
			elseif(is_string($avar)) echo "$indent$var_name <span style='color:#d642d6;'>=></span> <span style='color:#636568;'> $type_color'$avar'</span> // $type(".strlen($avar).")</span><br>";
			elseif(is_float($avar)) echo "$indent$var_name <span style='color:#d642d6;'>=></span> <span style='color:#636568;'> $type_color$avar</span> // $type(".strlen($avar).")</span><br>";
			elseif(is_bool($avar)) echo "$indent$var_name <span style='color:#d642d6;'>=></span> <span style='color:#636568;'> $type_color".($avar == 1 ? "TRUE":"FALSE")."</span> // $type(".strlen($avar).")</span><br>";
			elseif(is_null($avar)) echo "$indent$var_name <span style='color:#d642d6;'>=></span> <span style='color:#636568;'> $type_color NULL</span> // $type(".strlen($avar).")</span><br>";
			else echo "$indent$var_name = <span style='color:#636568;'>$avar // $type(".strlen($avar).")</span><br>";
			$var = $var[$keyvar];
		}

	}

}

function var_dump2($array) {
  $cDo_dump = new cDo_dump;
  $cDo_dump->ini_dump($array);
}

?>
