<?php
function task1()
{
	echo "<b>Задание № 3.1</b><br>";

		for ($i = 0; $i <= 49; $i++)
		{
			$names = ['user_1' => 'Роман', 'user_2' => 'Никита', 'user_3' => 'Данил', 'user_4' => 'Тимофей', 'user_5' => 'Юлия'];
			$randUserName = $names[array_rand($names)];		// вывод в переменную одного из 5 имён

			$age = rand(18,45);
			$users = [
				$user = [
				'id' => $i,
				'name' => $randUserName,
				'age' => $age
				]
			];

			$randomUser = array_shift($users); // Извлекает первый элемент массива из массива user
			$usera[] = $randomUser;
		};

$jsonFile = json_encode($usera);
file_put_contents('users.json', $jsonFile);

$dataFile = json_decode(file_get_contents('users.json'), true);

//	var_dump($dataFile);
	$countName = array_count_values(array_map(function($value){
		return $value['name'];
		}, $dataFile));
//	$countsName = array_map(function($valueNames){ // попытка автоматически вывводить имена вместо $countName['Роман'] - $countName[$result[0]]
//		return $valueNames['name'];
//	}, $dataFile);
//var_dump($countsName);
//$result = array_unique($countsName);
//var_dump($result);
	echo "Количство пользователей с именем Роман: " . $countName['Роман'] . "<br>";
	echo "Количство пользователей с именем Никита: " . $countName['Никита'] . "<br>";
	echo "Количство пользователей с именем Данил: " . $countName['Данил'] . "<br>";
	echo "Количство пользователей с именем Тимофей: " . $countName['Тимофей'] . "<br>";
	echo "Количство пользователей с именем Юлия: " . $countName['Юлия'] . "<br>";

	$countAge = array_map(function($valueAge){
		return $valueAge['age'];
	}, $dataFile);
	echo "Средний возраст: " . array_sum($countAge) / 50;
	echo "<br><br><br>";
}

