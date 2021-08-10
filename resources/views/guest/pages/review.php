{% extends "layout.php" %}

{% block title %}
	Отзыв о компании {{ company.name }}
{% endblock %}

{% block content %}
	<div class="mx-auto py-20 max-w-5xl">
		<div class="flex items-center mb-7">
			<a class="text-blue-600 text-sm" href="/">Главная</a>
			<span class="block mx-2 text-gray-400"> - </span>
			<a class="text-blue-600 text-sm" href="?p=/company/{{ company.id }}">{{ company.name }}</a>
			<span class="block mx-2 text-gray-400"> - </span>
			<a class="text-blue-600 text-sm underline">{{ review.author }}</a>
		</div>
		<div>
			<h1 class="font-medium text-2xl">Весь отзыв</h1>
		</div>
		<div class="mt-10">
			<div class="w-1/5 relative after:block after:pt-full float-left mr-6 mb-2">
				<div class="absolute inset-0 rounded-2xl bg-gray-100 overflow-hidden">
					<img class="w-full h-full object-center object-cover" src="{{ review.photo }}" alt="">
				</div>
			</div>
			<div class="w-full">
				<h2 class="text-4xl">{{ review.author }}</h2>
				<p class="mt-6">{{ review.text }}</p>
			</div>
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