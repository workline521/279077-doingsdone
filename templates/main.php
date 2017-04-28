<?php
$projects = ['Все', 'Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто'];
$interview = [
    'task' => 'Собеседование в IT компании',
    'deadline' => '01.06.2017',
    'category' => 'Работа',
    'completed' => false
];
$test = [
    'task' => 'Выполнить тестовое задание',
    'deadline' => '25.05.2017',
    'category' => 'Работа',
    'completed' => false
];
$finished_task = [
    'task' => 'Сделать задание первого раздела',
    'deadline' => '21.04.2017',
    'category' => 'Учеба',
    'completed' => true
];
$meeting = [
    'task' => 'Встреча с другом',
    'deadline' => '22.04.2017',
    'category' => 'Входящие',
    'completed' => false
];
$catfood = [
    'task' => 'Купить корм для кота',
    'deadline' => null,
    'category' => 'Домашние дела',
    'completed' => false
];
$pizza = [
    'task' => 'Заказать пиццу',
    'deadline' => null,
    'category' => 'Домашние дела',
    'completed' => false
];
$task_list = [$interview, $test, $finished_task, $meeting, $catfood, $pizza];
function calculateTasks(array $task_list, string $project): int
{
    if ($project == 'Все') {
        return count($task_list);
    }

    $count = 0;
    foreach ($task_list as $task_value) {
        if ($task_value['category'] == $project) {
            $count++;
        }
    }

    return $count;
}
?>
<div class="content">
    <section class="content__side">
        <h2 class="content__side-heading">Проекты</h2>

        <nav class="main-navigation">
            <ul class="main-navigation__list">
                <?php foreach ($projects as $value => $project): ?>
                    <li class="main-navigation__list-item <?= ($value == 0) ? 'main-navigation__list-item--active' : ''?> ">
                        <a class="main-navigation__list-item-link" href="#"><?= htmlspecialchars($project) ?></a>
                        <span class="main-navigation__list-item-count"><?= calculateTasks($task_list, $project); ?></span>
                    </li>
                <?php endforeach ?>
            </ul>
        </nav>

        <a class="button button--transparent button--plus content__side-button" href="#">Добавить проект</a>
    </section>
<main class="content__main">
    <h2 class="content__main-heading">Список задач</h2>

    <form class="search-form" action="index.php" method="post">
        <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

        <input class="search-form__submit" type="submit" name="" value="Искать">
    </form>

    <div class="tasks-controls">
        <div class="radio-button-group">
            <label class="radio-button">
                <input class="radio-button__input visually-hidden" type="radio" name="radio" checked="">
                <span class="radio-button__text">Все задачи</span>
            </label>

            <label class="radio-button">
                <input class="radio-button__input visually-hidden" type="radio" name="radio">
                <span class="radio-button__text">Повестка дня</span>
            </label>

            <label class="radio-button">
                <input class="radio-button__input visually-hidden" type="radio" name="radio">
                <span class="radio-button__text">Завтра</span>
            </label>

            <label class="radio-button">
                <input class="radio-button__input visually-hidden" type="radio" name="radio">
                <span class="radio-button__text">Просроченные</span>
            </label>
        </div>

        <label class="checkbox">
            <input id="show-complete-tasks" class="checkbox__input visually-hidden" type="checkbox" checked>
            <span class="checkbox__text">Показывать выполненные</span>
        </label>
    </div>

    <table class="tasks">
        <?php foreach ($task_list as $task_value): ?>
            <tr  class="tasks__item task <?= ($task_value['completed'] == true) ? 'task--completed' : '' ?> ">
                <td class="task__select">
                    <label class="checkbox task__checkbox">
                        <input class="checkbox__input visually-hidden" type="checkbox">
                        <span class="checkbox__text"><?= htmlspecialchars($task_value['task']) ?></span>
                    </label>
                </td>

                <td class="task__date">
                    <?= htmlspecialchars($task_value['deadline']) ?>
                </td>

                <td class="task__controls">
                    <button class="expand-control" type="button" name="button">Выполнить первое задание</button>

                    <ul class="expand-list hidden">
                        <li class="expand-list__item">
                            <a href="#">Выполнить</a>
                        </li>

                        <li class="expand-list__item">
                            <a href="#">Удалить</a>
                        </li>

                        <li class="expand-list__item">
                            <a href="#">Дублировать</a>
                        </li>
                    </ul>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</main>
</div>