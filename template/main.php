<?php 
	echo '<div class="container">
		<div class="task">
			<div class="task__title">Task list</div>
			<div class="task__main">
				<div class="task__form">
					<form action="?method=AddTask" method=\'POST\'>
						<div class="form__block">
							<input class=\'form__input\' name=\'task__text\' type="text" placeholder=\'Enter text...\'>
							<button type="submit" name=\'AddTask\' class="form__btn form__btn-black">Add task</button>
						</div>
					</form>
					<div class="form__block">
						<form action="?method=DeleteAllTask" method=\'POST\'>
							<button type="submit" name=\'DeleteAll\' class="form__btn btn ">Remove all</button>
						</form>
						<form action="?method=ReadyAllTask" method=\'POST\'>
							<button type="submit" name=\'ReadyAll\' class="form__btn btn ">Ready all</button>
					</form>
					</div>
				</div>
				<ul class="task__list">';
		
	if ($content) {
		foreach($content as $task) {
			addTask(htmlspecialchars($task['description']), htmlspecialchars($task['status']), htmlspecialchars($task['id']));
		}
	}
	function addTask($desc, $status, $id) {
		//Замена текста для кнопки
		$status == 'Ready' ? $statusForText = 'Unready' :  $statusForText = 'Ready';

		//Вывод текста
		$task = "<li class=\"task__item\">
					<div class=\"task__item-main\">
						<div class=\"task__item-info\">
							<div class=\"task__item-info-text\">{$desc}</div>
							<form style='display: inline-block;' action=\"?method={$statusForText}Task&task_id={$id}\" method='POST'>
								<button name='{$statusForText}{$id}' class=\"form__btn\">{$statusForText}</button>
							</form>
							<form style='display: inline-block;' action=\"?method=DeleteTask&task_id={$id}\" method='POST'>
								<button name='Delete{$id}' class=\"form__btn\">Delete</inp>
							</form>
						</div>
						<div class=\"task__item-circle {$status}\"></div>
					</div>
				</li>";
		echo $task;
	}
?>