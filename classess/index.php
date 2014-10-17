<html>

<head>
  <title></title>
</head>

<body>
<style>
BODY
{
font-family: Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
height: 100%;
cursor: default;
}
.fieldset /*класс рамка формы*/
{
padding: 2px;
border:1px solid #000;
width: 300px;
}
.form_item
{

}
</style>
<?php
require_once('class.form_tech.php');
require_once('class.form_descript.php');
$html = '';
// создание объекта - форма
$forma = new form_tech();
// создание объекта - описание формы
$descript = new form_descript();
// установка параметров формы (id*, naimen*) * - обязательный параметр
$descript->setForm('123', 'forma');
// установка параметров (id*, class*, legend*)
$descript->setFieldsetElement('321', 'fieldset', 'Легенда');
// массив прочих параметров
$action = array('onclick' => 'params = \'action=\'+document.width');
// установка параметров для text (id*, class*, naimen*, label*, value*, br*, action[array])
$descript->setInputTextElement('99','form_item','text_item_naimen','text_item_label','999', 1, $action);
// установка параметров для checkbox (id*, class*, naimen*, label*, checked*, br*, action[array])
$descript->setInputCheckBoxElement('771','form_item','checkbox_item_naimen','checkbox_item_label',0,1,$action);
$descript->setInputCheckBoxElement('772','form_item','','checkbox_item_label',1,1,$action);
$descript->setInputCheckBoxElement('773','form_item','','checkbox_item_label',0,1,$action);
// установка параметров для radio (id*, class*, name*, naimen*, label*, checked*, br*, action[array])
$descript->setInputRadioElement('871','form_item','test','radio_item_naimen','radio_item_label',1,1,$action);
$descript->setInputRadioElement('872','form_item','test','','radio_item_label',0,1,$action);
$descript->setInputRadioElement('873','form_item','test','','radio_item_label',0,1,$action);
/* установка параметров для select
(id*, class*, naimen*, selected*(id выбранного по умолчанию элемента), br*, options[array], action[array])
	options[array]
	options[0][id]
	options[0][value]
	options[0][text]
*/
$options[0]['id'] = 'a';
$options[1]['id'] = 'b';
$options[2]['id'] = 'c';
$options[0]['value'] = 'a1';
$options[1]['value'] = 'b2';
$options[2]['value'] = 'c3';
$options[0]['text'] = 'the first option';
$options[1]['text'] = 'the second option';
$options[2]['text'] = 'the third option';
$descript->setSelectElement('999','form_item','select_naimen', 'select_label', 'b', 1,$options,$action);
// установка параметров для textarea (id*, class*, naimen*, cols*, rows*, wrap*, text*, br*, action[array])
/*
WRAP - определяет способ переноса слов в заполняемой данной заполняемой форме. Возможные значения:
off - перенос слов не происходит (значение по умолчанию)
virtual - перенос слов только отображается, на сервер же поступает неделимая строка.
physical - перенос слов будет происходить во всех точках переноса
*/
$descript->setTextAreaElement('777','form_item','textarea_item_naimen',30,5,'virtual','textarea', 1, $action);
// установка параметров для button (id*, class*, value*, br*, action[array])
$descript->setInputButtonElement('ok','form_item','Сохранить',0,$action);
$descript->setInputButtonElement('cancel','form_item','Отмена',1,$action);
$form = $descript->getDescript();
$forma->setAttr($form);
$html .= $forma->showForm();
echo $html;
?>

</body>

</html>