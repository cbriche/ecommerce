<?php
//on crée une focntion qui permet de créer un formulaire
function form_create($action,$inputs=[])
{
	$formulaire=form_open($action);
	foreach ($inputs as $key => $value) 
	{
		switch ($value) 
		{
			case 'text':
			$formulaire.="<div class='form-group'>";
			$data=[
			"class"=>"form-control",
			"name"=>$key,
			"placeholder"=>$key,
			];
			$formulaire.=form_input($data);
			$formulaire.="</div>";
			break;

			case 'textarea':
			$formulaire.="<div class='form-group'>";
			$data=[
			"class"=>"form-control",
			"name"=>$key,
			"placeholder"=>$key,
			];
			$formulaire.=form_textarea($data);
			$formulaire.="</div>";
			break;

			case 'submit':
			$formulaire.="<div class='form-group'>";
			$formulaire.=form_submit($key,$key, "class='btn btn-primary'");
			$formulaire.="</div>";
			break;
				# code...
			break;
		}		
	}	

	$formulaire.=form_close();
	return $formulaire;
}

?>