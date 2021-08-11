{% extends "layout.php" %}

{% block title %}
	Все компании
{% endblock %}

{% block content %}
	<div class="mx-auto mt-20 max-w-5xl">
		<div class="flex mb-5">
			<a class="text-blue-600 text-sm underline">Главная</a>
		</div>
		<div class="flex items-center">
			<h1 class="font-medium text-2xl">Все компании</h1>
			<a class="ml-auto block bg-blue-600 text-white flex items-center justify-center h-12 rounded-lg text-sm px-8" href="/admin.php?p=company/create">Создать</a>
		</div>
		<ul class="grid grid-cols-3 gap-5 mt-5">
			{% for company in companies.data %}
				<li>
					<div class="relative px-5 py-4 border border-gray-200 rounded-xl hover:border-gray-500 transition-colors">
						<h2 class="absolute top-2.5 left-4 text-gray-400">{{ company.name }}</h2>
						<div class="w-20 h-20 rounded-md mx-auto">
							<img class="object-center object-contain w-full h-full" src="{{ company.logo }}" alt="">
						</div>
						
						<div class="flex justify-center space-x-4 mt-6">
							<a class="text-blue-600 text-sm hover:underline" href="/admin.php?p=company/{{ company.id }}/reviews">Отзывы</a>
							<a class="text-blue-600 text-sm hover:underline" href="/admin.php?p=company/{{ company.id }}/edit">Редактировать</a>
							<a class="text-red-600 text-sm hover:underline" href="/admin.php?p=company/{{ company.id }}/delete">Удалить</a>
						</div>
					</div>

				</li>
			{% endfor %}
		</ul>

		{% if companies.last_page > 1 %}
			<div class="flex justify-start space-x-4 mt-10">
				{% if (companies.current_page > 1) %}
					<a class="block bg-gray-100 flex items-center justify-center h-12 rounded-lg text-sm px-6" href="?page={{ companies.current_page - 1 }}">Назад</a>
				{% endif %}

				{% if (companies.current_page < companies.last_page) %}
					<a class="block bg-blue-600 text-white flex items-center justify-center h-12 rounded-lg text-sm px-6" href="?page={{ companies.current_page + 1 }}">Далее</a>
				{% endif %}
			</div>
		{% endif %}
	</div>
{% endblock %}