{% extends "guest/layout.php" %}

{% block title %}
	Все компании
{% endblock %}

{% block content %}
	<div class="mx-auto mt-20 max-w-5xl">
		<div class="flex mb-5">
			<a class="text-blue-600 text-sm underline">Главная</a>
		</div>
		<div>
			<h1 class="font-medium text-2xl">Все компании</h1>
		</div>
		<ul class="grid grid-cols-3 gap-5 mt-5">
			{% for company in companies %}
				<li>
					<a class="flex items-center px-5 py-4 border border-gray-200 rounded-xl hover:border-gray-500 transition-colors" href="?p=company/{{ company.id }}">
						<div class="w-10 h-10 rounded-md">
							<img class="object-center object-contain w-full h-full" src="{{ company.logo }}" alt="">
						</div>
						
						<span class="block text-xl ml-3">{{ company.name }}</span>
						<span class="block ml-auto text-blue-600 text-sm">Подробнее</span>
					</a>
				</li>
			{% endfor %}
		</ul>
	</div>
{% endblock %}