<?php
function dijkstra($graphs,$source,$target){
    $vertices=array();
    $neighbours=array();
    $path=array();
    foreach($graphs as $edge){
        array_push($vertices,$edge[0],$edge[1]);
        $neighbours[$edge[0]][]=array('endEdge'=>$edge[1],'cost'=>$edge[2]);
    }
    $vertices=array_unique($vertices);
    
    foreach($vertices as $vertex){
        $dist[$vertex]=INF;
        $previous[$vertex]=NULL;
        
    }
    $dist[$source]=0;
    $g=$vertices;
    while(count($g)>0){
        $min=INF;
        foreach($g as $vertex){
            if($dist[$vertex]<$min){
                $min=$dist[$vertex];
                $u=$vertex;
            }
        }
        $g=array_diff($g,array($u));
        if($dist[$u]==INF or $u==$target){
            break;
        }
        if(isset($neighbours[$u])){
            foreach ($neighbours[$u] as $arr){
                $alt=$dist[$u]+$arr["cost"];
                if($alt<$dist[$arr["endEdge"]]){
                    $dist[$arr["endEdge"]]=$alt;
                    $previous[$arr["endEdge"]]=$u;
                }
            }
        }
    }
    $u = $target;
	while (isset($previous[$u])) {
		array_unshift($path, $u);
		$u = $previous[$u];
	}
	array_unshift($path, $u);
	return $path;
}
$graphs = array(array("a","b",6),
				array("a","c",9),
				array("a","f",13),
				array("b","c",10),
				array("b","d",5),
				array("c","d",11),
				array("c","f",20),
				array("d","e",23),
				array("e","f",9)
			);
$path = dijkstra($graphs,"a","e");
echo "The path is[".implode(", ",$path)."]\n";

?>