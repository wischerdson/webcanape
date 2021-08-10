{% extends "layout.php" %}

{% block title %}
	Авторизация
{% endblock %}

{% block content %}
	<div class="mx-auto mt-20 max-w-sm h-2">
		<h1 class="text-center text-3xl font-medium text-gray-800">Авторизация</h1>
		<form class="mt-10 space-y-6" action="" method="POST">
			<div>
				<input class="border border-gray-200 rounded-lg px-4 py-3 block w-full" type="text" name="login" placeholder="Логин">
			</div>
			<div>
				<input class="border border-gray-200 rounded-lg px-4 py-3 block w-full" type="password" name="password" placeholder="Пароль">
			</div>
			<button class="w-full bg-blue-600 text-white flex items-center justify-center px-6 h-12 rounded-lg font-light" type="submit">Войти</button>
		</form>
	</div>
{% endblock %}