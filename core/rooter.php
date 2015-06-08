<?php

class Rooter{
	static $routes=array();
	static $prefixes = array();



	static function prefixe($url,$prefix){
		self::$prefixes[$url] =$prefix;
	}
	/**
	 *  Permet de parser  une url
	 @param $url Url a parser
	 @return tableau contenant les paramètres
	 */
	static function parse($url,$request){
		$url = trim($url,'/');
		foreach (Rooter::$routes as $v) {
			if(preg_match($v['catcher'], $url,$match)){
				$request->controller = $v['controller'];
				$request->action = $v['action'];
				$request->params = array();
				foreach($v['params'] as $k=>$v){
					$request->params[$k] = $match[$k];
				}
				return $request;
			}
		}
		$params = explode('/',$url);
		if(in_array($params[0], array_keys(self::$prefixes))){
			$request->prefix = self::$prefixes[$params[0]];
			array_shift($params);
			// debug($params);
		}
		// var_dump($params);
		$request->controller = $params[0];
		$request->action =  isset($params[1])?$params[1]:'index';
		foreach (self::$prefixes as $k => $v) {
			if(strpos($request->action,$v.'_') === 0){
				$request->prefix = $v;
				$request->action = str_replace($v.'_','',$request->action);
			}
			# code...
		}
		$request->params = array_slice($params,2);
		return true;

	}
	/**
	 * 
	 */
	static function connect($redir, $url){
		$r = array();
		$r['params'] = array();
		$r['redir'] =$redir;
		$r['origin'] = preg_replace('/([a-z0-9]+):([^\/]+)/', '${1}:(?P<${1}>${2})', $url);
		$r['origin'] = '/' . str_replace('/', '\/', $r['origin']).'/';
		$params = explode('/',$url);
		foreach ($params as $k => $v) {
			if(strpos($v, ':')){ 
				$p = explode(':', $v); 
				$r['params'][$p[0]] =$p[1];
			}else{ 
				if($k==0){
					$r['controller'] = $v;
				}elseif($k==1){
					$r['action'] =$v;
				}
			}
		}
		$r['catcher'] = $r['redir'];

		foreach ($r['params'] as $k => $v) {
			echo $k . ' ' . $v ."\n";
			$r['catcher'] = str_replace(":$k", "(?P<$k>$v)", $r['catcher']);
			# code...
		}
		$r['catcher'] = '/' . str_replace('/', '\/', $r['catcher']).'/';

		self::$routes[] =$r;
		// debug($r);
	}
	
	static function url(){
		foreach ($variable as $k => $v) {
			if(preg_match($v['origin'], $url, $snatch)){
				foreach ($variable as $k => $w) {
					if(!is_numeric($k)){
						$v['redir'] = str_replace(":k", $w, $v['redir']);
					}
				}
				return $v['redir'];
			}
		}
		return $url;
	}
}