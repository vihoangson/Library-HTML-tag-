<?php
	/**
	*	This is library quick form write for Codeigniter framework
	*	Library writer for MVC Model
	*	It support tag: input_text, input_radio, input_checkbox, textarea, select
	*	Function in button submit have Confirm||Back||Done
	*		-Confirm: Customer can re-view input that they wrote.
	*		-Back: Back from page confirm to page index and refill input by old data base.
	*		-Done: This page to finish from, in this page customer can do everything with data, insert, update
	*	Can catch validate require
	*	Can develope many rule.
	*		-Right now have 2 rule: is_numberic, is_email...
	*		-if I have time I can build many useful rule
	*
	*	__If continue develop this library, I'll finish support input_file, catch validate more careful.
	*	@version [HtmlTag_1.0]
	*	@author Santo <santo@cybridge.jp>
	*	Thank you for review !
	*/
	class HtmlTag {
		public $_element=array();
		public $status;
		public $error_message = array();

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
			if($this->status == "confirm"){
				$html_string = "
				<p>".$attr["value"]."</p>
				<input type='hidden' value='".$attr["value"]."' name='".$attr["name"]."'>
				";
			}
			$input["type"]	=$attr["type"];
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
			if($this->status == "confirm"){
				$html_string = "
				<p>".$attr["value"]."</p>
				<input type='hidden' value='".$attr["value"]."' name='".$attr["name"]."'>
				";
			}
			$input["type"]	=$attr["type"];
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
					$option_html .= "<option value='".$key."' ".($attr["value"]==$key? "selected" : "").">".$value."</option>";
				}
			}else{
				foreach ($attr["options"] as $key => $value) {
					$option_html .= "<option ".($attr["value"]==$key? "selected" : "").">".$value."</option>";
				}
			}
			$html_string	='<select '.$attr_string.' >'.$option_html.'</select>';
			if($this->status == "confirm"){
				$html_string = "
				<p>".$attr["value"]."</p>
				<input type='hidden' value='".$attr["value"]."' name='".$attr["name"]."'>
				";
			}
			$input["type"]	=$attr["type"];
			$input["html"]	= $html_string;
			$input["lable"]	= $attr["label"];
			return $input;
		}//END: element_select()

	//----------------------------------------------------------------------------------

		function element_checkbox($attr=array()){
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
				$checked = "";
				if(is_array($attr["value"])){
					if($attr["value"] != array() && in_array($key, $attr["value"])){
						$checked = " checked='checked' ";
					}
				}
				
				$html_string	.= '
				<input id="'.$rand.'_'.$i.'" '.$checked.' type="'.$attr["type"].'" '.$attr_string.' value="'.$key.'" />
				<label for="'.$rand.'_'.$i.'">'.$value.'</label> &nbsp;&nbsp;';
				$i++;
			}
			if($this->status == "confirm"){
				$html_string ="";
				foreach ($attr["value"] as $key => $value) {
					$html_string .= "
					<p>".$value."</p>
					<input type='hidden' value='".$value."' name='".$attr["name"]."[]'>
					";
				}
			}
			$input["type"]	=$attr["type"];
			$input["html"]	=$html_string;
			$input["lable"]	=$attr["label"];
			return $input;
		}//END: element_select()

	//----------------------------------------------------------------------------------

		function element_file($attr=array()){
			return ;// Will develop later
			$attr_string = "";
			foreach ($attr as $key => $value) {
				if($key == "type"){
					continue;
				}
				$attr_string .= ' '.$key.'="'.$value.'"';
			}
			$html_string	='<input type="'.$attr["type"].'" '.$attr_string.' />';
			$input["type"]	=$attr["type"];
			$input["html"]	=$html_string;
			$input["lable"]	=$attr["label"];
			return $input;
		}//END: element_select()

	//----------------------------------------------------------------------------------

		function element_radio($attr=array()){
			$attr["name"] = $attr["name"]."";
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
				$html_string	.= '
				<input id="'.$rand.'_'.$i.'" '.($attr["value"]==$key? "checked" : "").' type="'.$attr["type"].'" '.$attr_string.' value="'.$key.'" />
				<label for="'.$rand.'_'.$i.'">'.$value.'</label> &nbsp;&nbsp;';
				$i++;
			}
			if($this->status == "confirm"){
				$html_string = "
				<p>".$attr["value"]."</p>
				<input type='hidden' value='".$attr["value"]."' name='".$attr["name"]."'>
				";
			}
			$input["type"]	=$attr["type"];
			$input["html"]	=$html_string;
			$input["lable"]	=$attr["label"];
			return $input;
		}//END: element_select()

	//----------------------------------------------------------------------------------

		/**
			*
			* @todo Get random string
			* @author Santo <santo@cybridge.jp>
			*
		**/
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

		/**
			*
			* @todo classify type to use 
			* @author Santo <santo@cybridge.jp>
			*
		**/
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
				case "checkbox":
					return $this->element_checkbox($attr);
				break;
			}

		}

	//----------------------------------------------------------------------------------

	/**
		*
		* @todo set default variable to form
		* @author Santo <santo@cybridge.jp>
		*
	**/
	public function _default($data){
		foreach ($this->_element as $key => $value) {
			if(isset($data[$key])){
				$this->_element[$key]["value"] = $data[$key];
			}
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


	/**
		* Rule catch validate
		* rule_is_numberic
		* @return boolean
		* @author Santo <santo@cybridge.jp>
	**/
	public function rule_is_numberic($value){
		if(is_numeric($value)){
			return array("allow"=>true);
		}
		return array("allow"=>false, "message"=> "don't follow numberic rule");
	}

	/**
		* Rule catch validate
		* rule_is_numberic
		* @return boolean
		* @author Santo <santo@cybridge.jp>
	**/
	public function rule_is_email($value){
		if(filter_var($value, FILTER_VALIDATE_EMAIL)){
			return array("allow"=>true);
		}
		return array("allow"=>false, "message"=> "not is_email");
	}
}
 ?>
