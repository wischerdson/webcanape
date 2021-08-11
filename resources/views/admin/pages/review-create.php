{% extends "layout.php" %}

{% block title %}
	Добавить отзыв о компании {{ company.name }}
{% endblock %}

{% block content %}
	<div class="mx-auto py-20 max-w-5xl">
		<div class="flex items-center mb-7">
			<a class="text-blue-600 text-sm" href="/admin.php">Главная</a>
			<span class="block mx-2 text-gray-400"> - </span>
			<a class="text-blue-600 text-sm" href="/admin.php?p=company/{{ company.id }}/reviews">Отзывы о {{ company.name }}</a>
			<span class="block mx-2 text-gray-400"> - </span>
			<a class="text-blue-600 text-sm underline">Добавить отзыв</a>
		</div>
		
		<form class="mt-7 space-y-5" action="/admin.php?p=company/{{ company.id }}/reviews" method="POST" enctype="multipart/form-data">
			<div>
				<h1 class="font-medium text-2xl">Добавить отзыв</h1>
			</div>
			<div>
				<label for="form_name">Имя</label>
				<input class="mt-1 border border-gray-200 rounded-lg px-4 py-3 block w-full" type="text" id="form_name" name="author">
			</div>
			<div>
				<label for="form_text">Отзыв</label>
				<textarea class="mt-1 border border-gray-200 rounded-lg px-4 py-3 block w-full resize-y min-h-[300px]" name="text" id="form_text"></textarea>
			</div>
			<div class="flex items-center mt-7">
				<div>
					<label for="form_author_photo">Выберите фото</label>
					<input type="file" name="author_photo" id="form_author_photo">
				</div>
				<button class="ml-auto bg-blue-600 text-white flex items-center justify-center px-6 h-12 rounded-lg font-light" type="submit">Добавить отзыв</button>
			</div>
		</form>
	</div>
{% endblock %}