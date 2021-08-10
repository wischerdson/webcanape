{% extends "layout.php" %}

{% block title %}
	Компания {{ company.name }}
{% endblock %}

{% block content %}
	<div class="mx-auto py-20 max-w-5xl">
		<div class="flex items-center mb-7">
			<a class="text-blue-600 text-sm" href="/">Главная</a>
			<span class="block mx-2 text-gray-400"> - </span>
			<a class="text-blue-600 text-sm underline">{{ company.name }}</a>
		</div>
		<div class="flex">
			<div class="w-2/6">
				<div class="w-full relative after:pt-full after:block">
					<div class="absolute inset-0 rounded-xl border border-gray-200 p-10">
						<img class="w-full h-full object-center object-contain" src="{{ company.logo }}" alt="">
					</div>
				</div>
				<div class="mt-6">
					<a class="block w-full bg-blue-600 text-white flex items-center justify-center h-12 rounded-lg font-light" href="?p=company/{{ company.id }}/review/create">Написать отзыв</a>
				</div>
			</div>
			<div class="ml-16 w-full">
				<h1 class="text-4xl">{{ company.name }}</h1>
				<p class="mt-6">{{ company.description }}</p>
			</div>
		</div>
		<div class="mt-16">
			<h2 class="text-lg font-medium">Отзывы о компании
				{% if reviews.total > 0 %}
					<span>({{ reviews.total }})</span>
				{% endif %}
			</h2>
			<div class="mt-4">
				{% if reviews.total == 0 %}
					<p class="text-gray-400">Отзывов еще нет</p>
				{% else %}
					<ul class="w-full grid grid-cols-2 gap-6">
						{% for review in reviews.data %}
							<li class="w-full border border-gray-200 rounded-xl py-4 px-6">
								<div class="flex items-start">
									<div class="w-32 relative after:pt-full after:block">
										<div class="absolute z-10 inset-0 rounded-full overflow-hidden bg-gray-100">
											<img class="relative z-20 w-full h-full object-center object-cover" src="{{ review.photo }}" alt="">
										</div>
									</div>
									<div class="w-full ml-6">
										<h3 class="font-medium text-xl">{{ review.author }}</h3>
										<p class="text-sm text-gray-700 mt-2.5">
											{{ review.text[:100] }}{% if review.text|length > 100 %}<span>...</span>{% endif %}
										</p>
										<div class="text-right mt-3">
											<a class="text-blue-600 text-sm font-light underline  hover:no-underline" href="?p=company/{{ company.id }}/review/{{ review.id }}">Читать весь отзыв</a>
										</div>
									</div>
								</div>
							</li>
						{% endfor %}
					</ul>
				{% endif %}
			</div>
		</div>

		{% if reviews.last_page > 1 %}
			<div class="flex justify-start space-x-4 mt-10">
				{% if (reviews.current_page > 1) %}
					<a class="block bg-gray-100 flex items-center justify-center h-12 rounded-lg text-sm px-6" href="?p=company/{{ company.id }}&page={{ reviews.current_page - 1 }}">Предыдущие отзывы</a>
				{% endif %}

				{% if (reviews.current_page < reviews.last_page) %}
					<a class="block bg-blue-600 text-white flex items-center justify-center h-12 rounded-lg text-sm px-6" href="?p=company/{{ company.id }}&page={{ reviews.current_page + 1 }}">Следующие отзывы</a>
				{% endif %}
			</div>
		{% endif %}
	</div>
{% endblock %}