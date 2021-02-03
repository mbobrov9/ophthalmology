<?php
  function can_upload($file){
	// если имя пустое, значит файл не выбран
    if($file['name'] == '')
		return 'Вы не выбрали файл.';
	
	/* если размер файла 0, значит его не пропустили настройки 
	сервера из-за того, что он слишком большой */
	if($file['size'] == 0)
		return 'Файл слишком большой.';
	
	// разбиваем имя файла по точке и получаем массив
	$getMime = explode('.', $file['name']);
	// нас интересует последний элемент массива - расширение
	$mime = strtolower(end($getMime));
	// объявим массив допустимых расширений
	$types = array('jpg');
	
	// если расширение не входит в список допустимых - return
	if(!in_array($mime, $types))
		return 'Недопустимый тип файла.';
	
	return true;
  }
  
  function make_upload($file,$T,$id){	
	// формируем уникальное имя картинки: случайное число и name
	
	if ($T==1)
	{
	  $name = "p" . $id . ".jpg";	  
    }
	elseif ($T==2) 
	{
	  $name = "d" . $id . ".jpg";
    }
	else
	{
	  $name = "a" . $id . ".jpg";
	}
	$filepath='images/' . $name;
	clearstatcache($filepath);
    unlink($filepath);
	
	copy($file['tmp_name'], 'images/' . $name); 
  }
?>