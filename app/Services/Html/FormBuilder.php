<?php 

namespace SSD\Services\Html;

class FormBuilder extends \Collective\Html\FormBuilder {
	
	public function inputWithIcon($icon_class, $col, $name, $errors, $label = null, $value = null, $placeholder = '', $pop = null)
	{
		$attributes = ['class' => 'form-control ', 'placeholder' => $placeholder];
		return sprintf('
				<div class="form-group %s %s">
					%s
					%s
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa '. $icon_class .'"></i>
						</div>
						%s
					</div>
					%s
				</div>',
				($col == 0)? '': 'col-md-' . $col,
				$errors->has($name) ? 'has-error' : '',
				$label ? '<label for="' . $name . '">' . $label  . '</label>' : '',
				$pop? '<a href="#" tabindex="0" class="badge pull-right" data-toggle="popover" data-trigger="focus" data-placement="left" title="' . $pop[0] .'" data-content="' . $pop[1] . '"><span>?</span></a>' : '',
				parent::text($name, $value, $attributes),
				$errors->first($name, '<small class="help-block">:message</small>')
			);
	}
	
	public function inputWithAddon($addon, $col, $name, $errors, $label = null, $value = null, $placeholder = '', $pop = null)
	{
		$attributes = ['class' => 'form-control ', 'placeholder' => $placeholder];
		return sprintf('
				<div class="form-group %s %s">
					%s
					%s
					<div class="input-group">
							<span class="input-group-addon">'. $addon .'</span>
						%s
					</div>
					%s
				</div>',
				($col == 0)? '': 'col-md-' . $col,
				$errors->has($name) ? 'has-error' : '',
				$label ? '<label for="' . $name . '">' . $label  . '</label>' : '',
				$pop? '<a href="#" tabindex="0" class="badge pull-right" data-toggle="popover" data-trigger="focus" data-placement="left" title="' . $pop[0] .'" data-content="' . $pop[1] . '"><span>?</span></a>' : '',
				parent::text($name, $value, $attributes),
				$errors->first($name, '<small class="help-block">:message</small>')
			);
	}
	
	public function inputWithButton($icon_class, $col, $name, $errors, $label = null, $value = null, $placeholder = '', $pop = null)
	{
		$attributes = ['class' => 'form-control ', 'placeholder' => $placeholder];
		return sprintf('
				<div class="form-group %s %s">
					%s
					%s
					<div class="input-group">
						%s
						<span class="input-group-btn">
							<button class="btn btn-info btn-flat" type="button">
								<i class="fa '. $icon_class .'"></i>
							</button>
						</span>
					</div>
					%s
				</div>',
				($col == 0)? '': 'col-md-' . $col,
				$errors->has($name) ? 'has-error' : '',
				$label ? '<label for="' . $name . '">' . $label  . '</label>' : '',
				$pop? '<a href="#" tabindex="0" class="badge pull-right" data-toggle="popover" data-trigger="focus" data-placement="left" title="' . $pop[0] .'" data-content="' . $pop[1] . '"><span>?</span></a>' : '',
				parent::text($name, $value, $attributes),
				$errors->first($name, '<small class="help-block">:message</small>')
				);
	}
	
	public function inputPassword($icon_class, $col, $name, $errors, $label = null, $placeholder = '', $pop = null)
	{
		$attributes = ['class' => 'form-control ', 'placeholder' => $placeholder];
		return sprintf('
				<div class="form-group %s %s">
					%s
					%s
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa '. $icon_class .'"></i>
						</div>
						%s
					</div>
					%s
				</div>',
				($col == 0)? '': 'col-md-' . $col,
				$errors->has($name) ? 'has-error' : '',
				$label ? '<label for="' . $name . '">' . $label  . '</label>' : '',
				$pop? '<a href="#" tabindex="0" class="badge pull-right" data-toggle="popover" data-trigger="focus" data-placement="left" title="' . $pop[0] .'" data-content="' . $pop[1] . '"><span>?</span></a>' : '',
				parent::password($name, $attributes),
				$errors->first($name, '<small class="help-block">:message</small>')
				);
	}
	
	public function dateWithIcon($col, $name, $errors, $label = null, $value = null, $pop = null)
	{
		$attributes = ['class' => 'form-control'];
		return sprintf('
				<div class="form-group %s %s">
					%s
					%s
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						%s
					</div>
					%s
				</div>',
				($col == 0)? '': 'col-md-' . $col,
				$errors->has($name) ? 'has-error' : '',
				$label ? '<label for="' . $name . '">' . $label  . '</label>' : '',
				$pop? '<a href="#" tabindex="0" class="badge pull-right" data-toggle="popover" data-trigger="focus" data-placement="left" title="' . $pop[0] .'" data-content="' . $pop[1] . '"><span>?</span></a>' : '',
				parent::text($name, $value, $attributes),
				$errors->first($name, '<small class="help-block">:message</small>')
			);
	}
	
	public function selection($col, $name, $errors, $list = [], $selected = null, $label = null, $placeholder = '', $pop = null)
	{
		$attributes = ['class' => 'form-control select2', 'style' => 'width: 100%'];
		if($placeholder != '') $attributes['placeholder'] = $placeholder;
		
		return sprintf('
			<div class="form-group %s %s">
				%s
				%s
				%s
				%s
			</div>',
			($col == 0)? '': 'col-md-' . $col,
			$errors->has($name) ? 'has-error' : '',
			$label ? '<label for="' . $name . '">' . $label  . '</label>' : '',
			$pop? '<a href="#" tabindex="0" class="badge pull-right" data-toggle="popover" data-trigger="focus" data-placement="left" title="' . $pop[0] .'" data-content="' . $pop[1] . '"><span>?</span></a>' : '',
			parent::select($name, $list, $selected, $attributes),
			$errors->first($name, '<small class="help-block">:message</small>')	
		);
	}
	
	public function radioGroup($col, $name, $errors, $list = [], $label, $selected = null, $pop = null)
	{
		$radios = "";
		foreach ($list as $option){
			$radios .= sprintf('
				<div class="radio">
					<label>
						%s %s
					</label>
				</div>',
				parent::radio($name, $option, $selected == $option, ['class' => 'minimal']),
				$option
			);
		}
		
		return sprintf('
			<div class="form-group %s %s">
				%s
				%s
				%s
				%s
			</div>',
			($col == 0)? '': 'col-md-' . $col,
			$errors->has($name) ? 'has-error' : '',
			$label ? '<label for="' . $name . '">' . $label  . '</label>' : '',
			$pop? '<a href="#" tabindex="0" class="badge pull-right" data-toggle="popover" data-trigger="focus" data-placement="left" title="' . $pop[0] .'" data-content="' . $pop[1] . '"><span>?</span></a>' : '',
			$radios,
			$errors->first($name, '<small class="help-block">:message</small>')
		);
	}
	
	public  function inputTextArea($col, $name, $errors, $label = null, $value = null, $placeholder = '', $rows = 3, $pop = null) {
		$attributes = ['class' => 'form-control ', 'placeholder' => $placeholder, 'rows' => $rows];
		return sprintf('
				<div class="form-group %s %s">
					%s
					%s
					%s
					%s
				</div>',
				($col == 0)? '': 'col-md-' . $col,
				$errors->has($name) ? 'has-error' : '',
				$label ? '<label for="' . $name . '">' . $label  . '</label>' : '',
				$pop? '<a href="#" tabindex="0" class="badge pull-right" data-toggle="popover" data-trigger="focus" data-placement="left" title="' . $pop[0] .'" data-content="' . $pop[1] . '"><span>?</span></a>' : '',
				parent::textarea($name, $value, $attributes),
				$errors->first($name, '<small class="help-block">:message</small>')
			);
	}	
	
	public  function singleFileUpload($col, $name, $errors, $label = null, $pop = null) {
		$attributes = ['class' => 'bootstrap-file-upload', 'data-browse-icon' => '<i class="fa fa-folder-open-o"></i>',
				'data-language' => 'es', 'data-show-remove' => 'false', 'data-show-upload' => 'false'
		];
	
		return sprintf('
			<div class="form-group %s %s">
				%s
				%s
				%s
				%s
			</div>',
			($col == 0)? '': 'col-md-' . $col,
			$errors->has($name) ? 'has-error' : '',
			$label ? '<label for="' . $name . '">' . $label  . '</label>' : '',
			$pop? '<a href="#" tabindex="0" class="badge pull-right" data-toggle="popover" data-trigger="focus" data-placement="left" title="' . $pop[0] .'" data-content="' . $pop[1] . '"><span>?</span></a>' : '',
			parent::file($name, $attributes),
			$errors->first($name, '<small class="help-block">:message</small>')
		);
	}
	
	public  function multiFileUpload($col, $name, $errors, $label = null, $pop = null) {
		$attributes = ['class' => 'bootstrap-file-upload', 'multiple' => 'multiple', 'data-browse-icon' => '<i class="fa fa-folder-open-o"></i>',
				'data-language' => 'es', 'data-show-remove' => 'false', 'data-show-upload' => 'false'				
		];
		
		$error_message = '';
		foreach ($errors->keys() as $key) {
			if(substr($key, 0, strlen($name)) == $name) {
			    $error_message .= $errors->first($key, ':message<br/>');
			}
		}
		
		return sprintf('
			<div class="form-group %s %s">
				%s
				%s
				%s
				%s
			</div>',
			($col == 0)? '': 'col-md-' . $col,
			$error_message ? 'has-error' : '',
			$label ? '<label for="' . $name . '">' . $label  . '</label>' : '',
			$pop? '<a href="#" tabindex="0" class="badge pull-right" data-toggle="popover" data-trigger="focus" data-placement="left" title="' . $pop[0] .'" data-content="' . $pop[1] . '"><span>?</span></a>' : '',
			parent::file($name.'[]', $attributes),
			'<small class="help-block">' . $error_message . '</small>'
		);
	}
	
	public  function modal($title, $body, $btn_close, $class = 'modal-danger', $id = 'modal-error') {
		return sprintf('
				<div id="%s" class="modal fade %s">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						    <h4 class="modal-title">%s</h4>
						    </div>
						    <div class="modal-body">
						    	<p>%s</p>
						    </div>
							<div class="modal-footer">
				            	<button type="button" class="btn btn-outline center-block" data-dismiss="modal">%s</button>
						    </div>
						</div>
					</div>
				</div>
				', 
				$id, $class, $title, $body, $btn_close 
			);
	}
}
