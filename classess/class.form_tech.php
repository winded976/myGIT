<?php
class form_tech
{
	var $form;
	var $fieldset;
	var $items;
	var $html;
	function setAttr($form) // установка атрибутов формы
	{
		$this->form = $form;
		if(isset($this->form['fieldset']) and $this->form['fieldset'] != '') $this->fieldset = $this->form['fieldset'];
		if(isset($this->form['items']) and $this->form['items'] != '') $this->items = $this->form['items'];
		$this->html = '';
	}
	function showBR() // вывод переноса строки
	{
		$this->html .= '<br clear=all>';
	}
	function showHead() // вывод начала формы
	{
		$this->html .= '<div id='.$this->form['id'].'>';
		if(isset($this->form['naimen']) and $this->form['naimen'] != '')
		{
			$this->html .= '<div style="float:left; text-transform:uppercase; font-weight:bold; padding: 0px 0px;">'.$this->form['naimen'].'</div>';
		}
	}
	function showBottom() // вывод кнопки
	{
		$this->html .= '</div>';
	}
	function showFieldset($action) // вывод рамки fieldset
	{
		if(isset($this->fieldset['id']))
		{
			switch ($action)
			{
				case "open":
				$this->html .= '<fieldset id = "'.$this->fieldset['id'].'" class = "'.$this->fieldset['class'].'"><legend>'.$this->fieldset['legend'].'</legend>';
				break;
				case "close":
				$this->html .= '</fieldset>';
				break;
			}
		}
	}
	function showItems() // вывод содержимого формы
	{
		if(isset($this->items))
		{
			$items = $this->items;
			$nums = array_keys($items);
			foreach ($nums as $num)
			{
				$this->html .= '<div style="float:left; padding: 0px 0px;">';
					if (isset($items[$num]['naimen']) and $items[$num]['naimen'] != '')
					{
						$this->html .= '<label style="padding: 5px 10px;">'.$items[$num]['naimen'].'</label>';
						$this->html .= $this->showBR();
					}
				switch($items[$num]['tag'])
				{
					case "input":
					$this->html .= '<'.$items[$num]['tag'].' ';
					$keys = array_keys($items[$num][$items[$num]['tag']]);
					foreach ($keys as $key)
					{
						if($key != 'checked')
						{
							$this->html .= $key.' = "'.$items[$num][$items[$num]['tag']][$key].'" ';
						}
						else if ($key == 'checked' and $items[$num][$items[$num]['tag']][$key] != 0)
						{
							$this->html .= $key.' ';
						}
					}
					$this->html .= '>';
					if (isset($items[$num]['label']) and $items[$num]['label'] != '')
					{
						$this->html .= '<label for="'.$items[$num][$items[$num]['tag']]['id'].'" style="padding: 5px 10px;">'.$items[$num]['label'].'</label>';
					}
					break;
					case "select":
					$this->html .= '<'.$items[$num]['tag'].' ';
					$keys = array_keys($items[$num]);
					foreach ($keys as $key)
					{
						if($key != 'options' and $key != 'selected' and $key != 'tag' and $key != 'naimen' and $key != 'label')
						{
							$this->html .= $key.' = "'.$items[$num][$key].'" ';
						}
					}
					$this->html .= '>';
					$options = $items[$num]['options'];
					$kkeys = array_keys($options);
					foreach ($kkeys as $kkey)
					{
						if ($items[$num]['selected'] == $options[$kkey]['id'])
						{
							$this->html .= '<option id = "'.$options[$kkey]['id'].'" value = "'.$options[$kkey]['value'].'" selected>';
							$this->html .= $options[$kkey]['text'].'</option>';
						}
						else
						{
							$this->html .= '<option id = "'.$options[$kkey]['id'].'" value = "'.$options[$kkey]['value'].'">';
							$this->html .= $options[$kkey]['text'].'</option>';
						}
					}
					$this->html .= '</select>';
					if (isset($items[$num]['label']) and $items[$num]['label'] != '')
					{
						$this->html .= '<label for="'.$items[$num]['id'].'" style="padding: 5px 10px;">'.$items[$num]['label'].'</label>';
					}
					break;
					case "textarea":
					$this->html .= '<'.$items[$num]['tag'].' ';
					$keys = array_keys($items[$num][$items[$num]['tag']]);
					foreach ($keys as $key)
					{
						if($key != 'text')
						{
							$this->html .= $key.' = "'.$items[$num][$items[$num]['tag']][$key].'" ';
						}
					}
					$this->html .= '>'.$items[$num][$items[$num]['tag']]['text'].'</'.$items[$num]['tag'].'>';
					if (isset($items[$num]['label']) and $items[$num]['label'] != '')
					{
						$this->html .= '<label for="'.$items[$num][$items[$num]['tag']]['id'].'" style="padding: 5px 10px;">'.$items[$num]['label'].'</label>';
					}
					break;
				}
				$this->html .= '</div>';
				if(isset($items[$num]['br']) and $items[$num]['br'])$this->html .= $this->showBR();
			}
		}
	}
	function showForm() // вывод формы
	{
		$this->html .= $this->showHead();
		$this->html .= $this->showBR();
		$this->html .= $this->showFieldset('open');
		$this->html .= $this->showItems();
		$this->html .= $this->showFieldset('close');
		$this->html .= $this->showBottom();
		return $this->html;
	}
}
?>