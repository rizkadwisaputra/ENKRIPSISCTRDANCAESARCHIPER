<?php  
	class Sctr{
		public function Enkripsi($plain,$k){
			$str =str_replace(" ", "", $plain);
			$en2 = str_split($str,1);
			
			$bagi = count($en2)/$k;
			if (!is_int($bagi)) {
				for ($i=0; $i < count($en2); $i++) { 
					if (!is_int($bagi)) {
						array_push($en2, "x");
						$bagi = count($en2)/$k;
					}
				}
			}
			$str2 = implode("", $en2);
			$aStr2 = str_split($str2,$k);
			$ar2 = array();
			foreach ($aStr2 as $key => $dt) {
				array_push($ar2, str_split($dt,1));
			}
			$fixStr = array();
			foreach ($ar2 as $key => $value) {
				for ($i=0; $i <= $k-1; $i++) { 
					if (count($fixStr) != count($en2)) {
						for ($j=0; $j <= count($ar2)-1; $j++) { 
							array_push($fixStr, $ar2[$j][$i]);
						}
								
					}
				}
			}
			return implode("", $fixStr);
		}

		public function Dekripsi($plain,$key){
			$str =str_replace(" ", "", $plain);
			$en2 = str_split($str,1);
			$jum = count($en2);
			$k = $jum/$key;
			$bagi = count($en2)/$k;
			// if (!is_int($bagi)) {
			// 	for ($i=0; $i < count($en2); $i++) { 
			// 		if (!is_int($bagi)) {
			// 			array_push($en2, "x");
			// 			$bagi = count($en2)/$k;
			// 		}
			// 	}
			// }
			$str2 = implode("", $en2);
			$aStr2 = str_split($str2,$k);
			$ar2 = array();
			foreach ($aStr2 as $key => $dt) {
				array_push($ar2, str_split($dt,1));
			}
			$fixStr = array();
			foreach ($ar2 as $key => $value) {
				for ($i=0; $i <= $k-1; $i++) { 
					if (count($fixStr) != count($en2)) {
						for ($j=0; $j <= count($ar2)-1; $j++) { 
							array_push($fixStr, $ar2[$j][$i]);
						}
								
					}
				}
			}
			return implode("", $fixStr);
		}
	}

	class Chaesar{
		public function Enkripsi($plain,$k){
			$abs = array('0'=>'a','1'=>'b','2'=>'c','3'=>'d','4'=>'e','5'=>'f','6'=>'g',
					'7'=>'h','8'=>'i','9'=>'j','10'=>'k','11'=>'l','12'=>'m','13'=>'n','14'=>'o',
					'15'=>'p','16'=>'q','17'=>'r','18'=>'s','19'=>'t','20'=>'u',
					'21'=>'v','22'=>'w','23'=>'x','24'=>'y','25'=>'z');
	
			$str = str_replace(" ", "", $plain);
			$stre = str_split($str,1);
			$hasil = array();
			$a;
			foreach ($stre as $key => $data) {
				foreach ($abs as $nil => $dt) {
					if ($dt==$data) {
						$a =$nil + $k;
						if ($a > 25) {
							$a = $a - 26;
							array_push($hasil, $a);
						}else{
							array_push($hasil, $a);
						}
					}
				}
			}
			$hasilStr = array();
			foreach ($hasil as $key => $dt) {
				array_push($hasilStr, $abs[$dt]);
			}
			return implode("", $hasilStr);
		}

		public function Dekripsi($plain,$k){
			$abs = array('0'=>'a','1'=>'b','2'=>'c','3'=>'d','4'=>'e','5'=>'f','6'=>'g',
					'7'=>'h','8'=>'i','9'=>'j','10'=>'k','11'=>'l','12'=>'m','13'=>'n','14'=>'o',
					'15'=>'p','16'=>'q','17'=>'r','18'=>'s','19'=>'t','20'=>'u',
					'21'=>'v','22'=>'w','23'=>'x','24'=>'y','25'=>'z');
	
			$str = str_replace(" ", "", $plain);
			$stre = str_split($str,1);
			$hasil = array();
			$a;
			foreach ($stre as $key => $data) {
				foreach ($abs as $nil => $dt) {
					if ($dt==$data) {
						$a =$nil - $k;
						if ($a > 25) {
							$a = $a - 26;
							array_push($hasil, $a);
						}else{
							array_push($hasil, $a);
						}
					}
				}
			}
			$hasilStr = array();
			foreach ($hasil as $key => $dt) {
				array_push($hasilStr, $abs[$dt]);
			}
			return implode("", $hasilStr);

		}
	}
?>