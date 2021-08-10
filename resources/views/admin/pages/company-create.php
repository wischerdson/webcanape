{% extends "layout.php" %}

{% block title %}
	Новая компания
{% endblock %}

{% block content %}
	<div class="mx-auto py-20 max-w-5xl">
		<div class="flex items-center mb-7">
			<a class="text-blue-600 text-sm" href="/admin.php">Главная</a>
			<span class="block mx-2 text-gray-400"> - </span>
			<a class="text-blue-600 text-sm underline">Новая компания</a>
		</div>
		
		<form class="mt-7 space-y-5" action="admin.php?p=company" method="POST" enctype="multipart/form-data">
			<div>
				<h1 class="font-medium text-2xl">Новая компания</h1>
			</div>
			<div>
				<label for="form_name">Название</label>
				<input class="mt-1 border border-gray-200 rounded-lg px-4 py-3 block w-full" type="text" id="form_name" name="name">
			</div>
			<div>
				<label for="form_description">Описание</label>
				<textarea class="mt-1 border border-gray-200 rounded-lg px-4 py-3 block w-full resize-y min-h-[300px]" name="description" id="form_description"></textarea>
			</div>
			<div class="flex items-center mt-7">
				<div>
					<label for="form_logo">Выберите логотип</label>
					<input type="file" name="logo" id="form_logo">
				</div>
				<button class="ml-auto bg-blue-600 text-white flex items-center justify-center px-6 h-12 rounded-lg font-light" type="submit">Создать</button>
			</div>
		</form>
	</div>
{% endblock %}