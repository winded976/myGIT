<?php
class form_descript
{
	var $i = 0;
	var $form = array(); // массив описания формы
	var $items = array(); // массив описания объектов формы
	var $options = array(); // массив описания пунктов выпадающих списков
	function getDescript() // получить описание формы
	{
		$this->form['items'] = $this->items;
		return $this->form;
	}
	function setForm() //(id*, naimen*)
	{
		if(func_num_args() != 0)
		{
			$args = func_get_args();
			$nums = array_keys($args);
			foreach ($nums as $num)
			{
				switch ($num)
				{
					case 0:
					$this->form['id'] = $args[$num];
					break;
					case 1:
					$this->form['naimen'] = $args[$num];
					break;
				}
			}
		}
	}
	function setFieldsetElement($id, $class, $legend) // (id*, class*, legend*)
	{
		$this->form['fieldset']['id'] = $id;
		$this->form['fieldset']['class'] = $class;
		$this->form['fieldset']['legend'] = $legend;
	}
	function setInputTextElement() // (id*, class*, naimen*, label*, value*, br*, action[array])
	{
		if(func_num_args() != 0)
		{
			$i = $this->i;
			$args = func_get_args();
			$nums = array_keys($args);
			$this->items[$i]['tag'] = 'input';
			$this->items[$i][$this->items[$i]['tag']]['type'] = 'text';
			foreach ($nums as $num)
			{
				switch ($num)
				{
					case 0:
					$this->items[$i][$this->items[$i]['tag']]['id'] =  $args[$num];
					break;
					case 1:
					$this->items[$i][$this->items[$i]['tag']]['class'] =  $args[$num];
					break;
					case 2:
					$this->items[$i]['naimen'] =  $args[$num];
					break;
					case 3:
					$this->items[$i]['label'] =  $args[$num];
					break;
					case 4:
					$this->items[$i][$this->items[$i]['tag']]['value'] =  $args[$num];
					break;
					case 5:
						$this->items[$i]['br'] = $args[$num];
					break;
					case 6:
					$keys = array_keys($args[$num]);
					foreach ($keys as $key)
					{
						$this->items[$i][$this->items[$i]['tag']][$key] =  $args[$num][$key];
					}
					break;
				}
			}
			$this->i++;
		}
	}
	function setInputPasswordElement() // (id*, class*, naimen*, label*, value*, br*, action[array], )
	{
		if(func_num_args() != 0)
		{
			$i = $this->i;
			$args = func_get_args();
			$nums = array_keys($args);
			$this->items[$i]['tag'] = 'input';
			$this->items[$i][$this->items[$i]['tag']]['type'] = 'password';
			foreach ($nums as $num)
			{
				switch ($num)
				{
					case 0:
					$this->items[$i][$this->items[$i]['tag']]['id'] =  $args[$num];
					break;
					case 1:
					$this->items[$i][$this->items[$i]['tag']]['class'] =  $args[$num];
					break;
					case 2:
					$this->items[$i]['naimen'] =  $args[$num];
					break;
					case 3:
					$this->items[$i]['label'] =  $args[$num];
					break;
					case 4:
					$this->items[$i][$this->items[$i]['tag']]['value'] =  $args[$num];
					break;
					case 5:
						$this->items[$i]['br'] = $args[$num];
					break;
					case 6:
					$keys = array_keys($args[$num]);
					foreach ($keys as $key)
					{
						$this->items[$i][$this->items[$i]['tag']][$key] =  $args[$num][$key];
					}
					break;
				}
			}
			$this->i++;
		}
	}
	function setTextAreaElement() // (id*, class*, naimen*, cols*, rows*, wrap*, text*, br*, action[array])
	{
		if(func_num_args() != 0)
		{
			$i = $this->i;
			$args = func_get_args();
			$nums = array_keys($args);
			$this->items[$i]['tag'] = 'textarea';
			foreach ($nums as $num)
			{
				switch ($num)
				{
					case 0:
					$this->items[$i][$this->items[$i]['tag']]['id'] =  $args[$num];
					break;
					case 1:
					$this->items[$i][$this->items[$i]['tag']]['class'] =  $args[$num];
					break;
					case 2:
					$this->items[$i]['naimen'] =  $args[$num];
					break;
					case 3:
					$this->items[$i][$this->items[$i]['tag']]['cols'] =  $args[$num];
					break;
					case 4:
					$this->items[$i][$this->items[$i]['tag']]['rows'] =  $args[$num];
					break;
					case 5:
					$this->items[$i][$this->items[$i]['tag']]['wrap'] =  $args[$num];
					break;
					case 6:
					$this->items[$i][$this->items[$i]['tag']]['text'] =  $args[$num];
					break;
					case 7:
						$this->items[$i]['br'] = $args[$num];
					break;
					case 8:
					$keys = array_keys($args[$num]);
					foreach ($keys as $key)
					{
						$this->items[$i][$this->items[$i]['tag']][$key] =  $args[$num][$key];
					}
					break;
				}
			}
			$this->i++;
		}
	}
	function setInputCheckBoxElement() // (id*, class*, naimen*, label*, checked*, br*, action[array])
	{
		if(func_num_args() != 0)
		{
			$i = $this->i;
			$args = func_get_args();
			$nums = array_keys($args);
			$this->items[$i]['tag'] = 'input';
			$this->items[$i][$this->items[$i]['tag']]['type'] = 'checkbox';
			foreach ($nums as $num)
			{
				switch ($num)
				{
					case 0:
					$this->items[$i][$this->items[$i]['tag']]['id'] =  $args[$num];
					break;
					case 1:
					$this->items[$i][$this->items[$i]['tag']]['class'] =  $args[$num];
					break;
					case 2:
					$this->items[$i]['naimen'] =  $args[$num];
					break;
					case 3:
					$this->items[$i]['label'] =  $args[$num];
					break;
					case 4:
					$this->items[$i][$this->items[$i]['tag']]['checked'] =  $args[$num];
					break;
					case 5:
						$this->items[$i]['br'] = $args[$num];
					break;
					case 6:
					$keys = array_keys($args[$num]);
					foreach ($keys as $key)
					{
						$this->items[$i][$this->items[$i]['tag']][$key] =  $args[$num][$key];
					}
					break;
				}
			}
			$this->i++;
		}
	}
	function setInputRadioElement() // (id*, class*, name* naimen*, label*, checked*, value*, br*, action[array])
	{
		if(func_num_args() != 0)
		{
			$i = $this->i;
			$args = func_get_args();
			$nums = array_keys($args);
			$this->items[$i]['tag'] = 'input';
			$this->items[$i][$this->items[$i]['tag']]['type'] = 'radio';
			foreach ($nums as $num)
			{
				switch ($num)
				{
					case 0:
					$this->items[$i][$this->items[$i]['tag']]['id'] =  $args[$num];
					break;
					case 1:
					$this->items[$i][$this->items[$i]['tag']]['class'] =  $args[$num];
					break;
					case 2:
					$this->items[$i][$this->items[$i]['tag']]['name'] =  $args[$num];
					break;
					case 3:
					$this->items[$i]['naimen'] =  $args[$num];
					break;
					case 4:
					$this->items[$i]['label'] =  $args[$num];
					break;
					case 5:
					$this->items[$i][$this->items[$i]['tag']]['checked'] =  $args[$num];
					break;
					case 6:
					$this->items[$i][$this->items[$i]['tag']]['value'] =  $args[$num];
					break;
					case 7:
						$this->items[$i]['br'] = $args[$num];
					break;
					case 8:
					$keys = array_keys($args[$num]);
					foreach ($keys as $key)
					{
						$this->items[$i][$this->items[$i]['tag']][$key] =  $args[$num][$key];
					}
					break;
				}
			}
			$this->i++;
		}
	}
	function setInputButtonElement() // (id*, class*, value*, br*, action[array])
	{
		if(func_num_args() != 0)
		{
			$i = $this->i;
			$args = func_get_args();
			$nums = array_keys($args);
			$this->items[$i]['tag'] = 'input';
			$this->items[$i][$this->items[$i]['tag']]['type'] = 'button';
			foreach ($nums as $num)
			{
				switch ($num)
				{
					case 0:
					$this->items[$i][$this->items[$i]['tag']]['id'] =  $args[$num];
					break;
					case 1:
					$this->items[$i][$this->items[$i]['tag']]['class'] =  $args[$num];
					break;
					case 2:
					$this->items[$i][$this->items[$i]['tag']]['value'] =  $args[$num];
					break;
					case 3:
						$this->items[$i]['br'] = $args[$num];
					break;
					case 4:
					$keys = array_keys($args[$num]);
					foreach ($keys as $key)
					{
						$this->items[$i][$this->items[$i]['tag']][$key] =  $args[$num][$key];
					}
					break;
				}
			}
			$this->i++;
		}
	}
	function setInputSubmitElement() // (id*, class*, value*, br*, action[array])
	{
		if(func_num_args() != 0)
		{
			$i = $this->i;
			$args = func_get_args();
			$nums = array_keys($args);
			$this->items[$i]['tag'] = 'input';
			$this->items[$i][$this->items[$i]['tag']]['type'] = 'submit';
			foreach ($nums as $num)
			{
				switch ($num)
				{
					case 0:
					$this->items[$i][$this->items[$i]['tag']]['id'] =  $args[$num];
					break;
					case 1:
					$this->items[$i][$this->items[$i]['tag']]['class'] =  $args[$num];
					break;
					case 2:
					$this->items[$i][$this->items[$i]['tag']]['value'] =  $args[$num];
					break;
					case 3:
						$this->items[$i]['br'] = $args[$num];
					break;
					case 4:
					$keys = array_keys($args[$num]);
					foreach ($keys as $key)
					{
						$this->items[$i][$this->items[$i]['tag']][$key] =  $args[$num][$key];
					}
					break;
				}
			}
			$this->i++;
		}
	}
	/* (id*, class*, naimen*, label*, selected*(id выбранного по умолчанию элемента), br*, options[array], action[array])
	options[array]
	options[0][id]
	options[0][value]
	options[0][text]
	*/
	function setSelectElement()
	{
		if(func_num_args() != 0)
		{
			$i = $this->i;
			$args = func_get_args();
			$nums = array_keys($args);
			$this->items[$i]['tag'] = 'select';
			foreach ($nums as $num)
			{
				switch ($num)
				{
					case 0:
					$this->items[$i]['id'] =  $args[$num];
					break;
					case 1:
					$this->items[$i]['class'] =  $args[$num];
					break;
					case 2:
					$this->items[$i]['naimen'] =  $args[$num];
					break;
					case 3:
					$this->items[$i]['label'] =  $args[$num];
					break;
					case 4:
					$this->items[$i]['selected'] =  $args[$num];
					break;
					case 5:
						$this->items[$i]['br'] = $args[$num];
					break;
					case 6:
					$keys = array_keys($args[$num]);
					foreach ($keys as $key)
					{
						$kkeys = array_keys($args[$num][$key]);
						foreach ($kkeys as $kkey)
						{
							$this->options[$this->i][$key][$kkey] = $args[$num][$key][$kkey];
						}
					}
					$this->items[$i]['options'] = $this->options[$this->i];
					break;
					case 7:
					$keys = array_keys($args[$num]);
					foreach ($keys as $key)
					{
						$this->items[$i][$key] =  $args[$num][$key];
					}
					break;
				}
			}
			$this->i++;
		}
	}
}
?>