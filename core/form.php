<?php 
	class Form{

		private $data;
		public $controller;
 		private $display = 'none'; // show or none to display/hide errors fields
		public function __construct($controller){

			$this->controller = $controller;

		}
		private function input($name, $label , $type, $options=array()){
			
			$error = (isset($this->controller->errors[$name]))? 'has-error':"";
			$messageError = (isset($this->controller->errors[$name]))? $this->controller->errors[$name]:"";
			$class = (isset($options['class']))?$options['class']:'';
			$placeholder = (isset($options['placeholder']))?'placeholder='.$options['placeholder']:'';
			$taille = ((isset($options['taille']) && intval($options['taille']) != 0))?intval($options['taille']):'';
			if(!empty($taille)){
				$taille2 = 'col-sm-'.(12-$taille);
				$taille = 'col-sm-'.$taille;
			}else{
				$taille2= '';
			}
			
			$sronly = (isset($options['sronly']))?$options['sronly']:'';
			//var_dump($options);
			$attr ="";
			foreach ($options as $key => $v) {
				if($key != 'class' || $key != 'sronly' || $key != 'placeholder'){
					$attr .= "$key=\"$v\" ";
				}
			}


			$value = (isset($this->controller->request->data[$name]))? $this->controller->request->data[$name]:"";
			// var_dump($value);
			if($type == 'hidden'){
				return "<input class=\"form-control\" type=\"$type\" name=\"$name\" value=\"$value\">";
			}elseif($type == 'textarea'){
					//$html.= "<textarea>".$value."</textarea>";
					$html =" <label for=\"$name\" class=\"$sronly $taille control-label $error\">$label: </label><div class=\"$taille2\"><textarea type=\"text\" name=\"$name\" class=\"$class form-control $error\" id=\"$name\"  $placeholder $attr >$value</textarea>";
			}elseif($type == 'checkbox') {
				$attr = ($value == 1)? 'checked' : '';
				return $html= "<div class=\"checkbox $class\">
  						<label class=\n$sronly\n><input id=\"$name\" name=\"$name\" type=\"checkbox\" value=\"$value\" $attr >$name</label></div>"
						;

			}else{
				$html = "<label for=\"$name\" class=\"$sronly $error col-md-$taille control-label\">$label: </label><div class=\"col-md-$taille2\"><input id=\"$name\" name=\"$name\" type=\"$type\" class=\"$class form-control $error\" $placeholder value=\"$value\">";
			}
			
			//$error = "";
			//var_dump($this->controller->errors);			
			// $diverror ="<div id=\"alert$name\" class=\"alert alert-block alert-danger\" style=\"display:show\">$messageError</div>"
			$html.= "<div id=\"alert$name\" class=\"alert alert-block alert-danger\" style=\"display:$this->display\">$messageError</div></div>";
			return $html;
						// .
					// "<script type=\"text/javascript\">\$(function(){
					// 		if ( \$( \"#div$name\" ).is( \".has-error\" ) ){
					// 				\$(\"#alert$name\").show(\"slow\");
					// 		};
					// 	});
					// </script>\n"
		}

		public function text($name, $label, $options=array()){
			return $this->input($name, $label,"text",$options);
		}

		public function email($name, $label, $options=array()){
			return $this->input($name, $label,"email",$options);
		}

		public function password($name, $label, $options=array()) {
			return $this->input($name, $label,"password",$options );
		}

		public function textarea($name, $label, $options=array()){
			return $this->input($name, $label,"textarea",$options);
		}

		public function checkbox($name, $label, $options=array()){
			return $this->input($name, $label,"checkbox",$options);
		}

		public function hidden($name, $label, $options=array()){
			return $this->input($name, $label,"hidden",$options);
		}
		
	}
