<?php
	if (isset($_POST['text-markdown'])&&$_POST['text-markdown']!=="") {
		render($_POST['text-markdown']);	
	}
	function render($text)
	{
		// удаляем теги для зашиты данных
		$text = strip_tags($text);
		//Преобразуем с помощью регулярного выражения Заголовок
		$pattern = '/^# (.+)$/m';
		$replacement = '<h1>${1}</h1>'; 
		$text = preg_replace($pattern, $replacement, $text);
		//Преобразуем с помощью регулярного выражения Жирный текст
		$pattern = '/\*\*(.+)\*\*/mU'; 
		$replacement = '<b>${1}</b>'; 
		$text = preg_replace($pattern, $replacement, $text);
		//Преобразуем с помощью регулярного выражения Курсив
		$pattern = '/\*(.+)\*/mU'; 
		$replacement = '<i>${1}</i>'; 
		$text = preg_replace($pattern, $replacement, $text);
		//Выводим и преобразуем перенос строк в <br>
		echo nl2br($text);  
	}