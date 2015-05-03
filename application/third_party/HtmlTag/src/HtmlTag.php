<?php
	/**
	*	HtmlTag
	*	@author Santo <santo@cybridge.jp>
	*/
	class HtmlTag {
		public $_element=array();
	//----------------------------------------------------------------------------------

		function __construct(){
		}

	//----------------------------------------------------------------------------------

		function element_input($attr=array()){
			$attr_string = "";
			foreach ($attr as $key => $value) {
				if($key == "type"){
					continue;
				}
				$attr_string .= ' '.$key.'="'.$value.'"';
			}
			$html_string	='<input type="'.$attr["type"].'" '.$attr_string.' />';
			$input["html"]	=$html_string;
			$input["lable"]	=$attr["label"];
			return $input;
		}//END: element_input()

	//----------------------------------------------------------------------------------

		function element_textarea($attr=array()){
			$attr_string = "";
			foreach ($attr as $key => $value) {
				if($key == "type" || $key=="value"){
					continue;
				}
				$attr_string .= ' '.$key.'="'.$value.'"';
			}
			$html_string	='<textarea '.$attr_string.' >'.$attr["value"].'</textarea>';
			$input["html"]	=$html_string;
			$input["lable"]	=$attr["label"];
			return $input;
		}//END: element_textarea()

	//----------------------------------------------------------------------------------

		function element_select($attr=array()){
			$attr_string = "";
			foreach ($attr as $key => $value) {
				if($key == "type" || $key=="value" || $key=="options"){
					continue;
				}
				$attr_string .= ' '.$key.'="'.$value.'"';
			}
			$option_html = "";
			if($this->isAssoc($attr["options"])){
				foreach ($attr["options"] as $key => $value) {
					$option_html .= "<option value='".$key."'>".$value."</option>";
				}
			}else{
				foreach ($attr["options"] as $key => $value) {
					$option_html .= "<option>".$value."</option>";
				}
			}
			$html_string	='<select '.$attr_string.' >'.$option_html.'</select>';
			$input["html"]	=$html_string;
			$input["lable"]	=$attr["label"];
			return $input;
		}//END: element_select()

	//----------------------------------------------------------------------------------

		function element_file($attr=array()){
			$attr_string = "";
			foreach ($attr as $key => $value) {
				if($key == "type"){
					continue;
				}
				$attr_string .= ' '.$key.'="'.$value.'"';
			}
			$html_string	='<input type="'.$attr["type"].'" '.$attr_string.' />';
			$input["html"]	=$html_string;
			$input["lable"]	=$attr["label"];
			return $input;
		}//END: element_select()

	//----------------------------------------------------------------------------------

		function element_radio($attr=array()){
			$attr["name"] = $attr["name"]."[]";
			$attr_string = "";
			foreach ($attr as $key => $value) {
				if($key == "type" || $key == "value"){
					continue;
				}
				if(!is_array($value)){
					$attr_string .= ' '.$key.'="'.$value.'"';
				}
			}
			$html_string="";
			$i = 0;
			$rand = $this->generateRandomString(4);
			foreach ($attr["options"] as $key => $value) {
				$html_string	.= '<input id="'.$rand.'_'.$i.'" type="'.$attr["type"].'" '.$attr_string.' value="'.$attr["value"].'" /><label for="'.$rand.'_'.$i.'">'.$key.'</label> &nbsp;&nbsp;';
				$i++;
			}
			
			$input["html"]	=$html_string;
			$input["lable"]	=$attr["label"];
			return $input;
		}//END: element_select()

	//----------------------------------------------------------------------------------

		function generateRandomString($length = 10) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}

	//----------------------------------------------------------------------------------

		function get_element($attr){
			switch ($attr["type"]){
				case "text":
					return $this->element_input($attr);
				break;
				case "file":
					return $this->element_file($attr);
				break;
				case "radio":
					return $this->element_radio($attr);
				break;
				case "textarea":
					return $this->element_textarea($attr);
				break;
				case "select":
					return $this->element_select($attr);
				break;
			}

		}

	//----------------------------------------------------------------------------------

	private function isAssoc($array)
	{
		return $array;
		return ($array !== array_values($array));
	}

	//----------------------------------------------------------------------------------

		public function get_variable(){
			$input_array=array();
			foreach($this->_element as $key => $value){
				$value["name"]		= $key;
				$input_array[$key]	= $this->get_element($value);
			}
			return $input_array;
		}


	}
 ?>
