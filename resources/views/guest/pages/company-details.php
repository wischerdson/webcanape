{% extends "guest/layout.php" %}

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
				{% if company.reviews.list|length > 0 %}
					<span>({{ company.reviews.list|length }})</span>
				{% endif %}
			</h2>
			<div class="mt-4">
				{% if company.reviews.list|length == 0 %}
					<p class="text-gray-400">Отзывов еще нет</p>
				{% else %}
					<ul class="w-full grid grid-cols-2 gap-6">
						{% for review in company.reviews.list %}
							<li class="w-full border border-gray-200 rounded-xl py-4 px-6">
								<div class="flex items-start">
									<div class="w-32 relative after:pt-full after:block">
										<div class="absolute z-10 inset-0 rounded-full overflow-hidden bg-gray-100">
											<img class="relative z-20 w-full h-full object-center object-cover" src="{{ review.author_photo }}" alt="">
										</div>
									</div>
									<div class="w-full ml-6">
										<h3 class="font-medium text-xl">{{ review.author }}</h3>
										<p class="text-sm text-gray-700 mt-2.5">{{ review.shortened_text }}</p>
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

		{% if pagination.total > 1 %}
			<div class="flex justify-start space-x-4 mt-10">
				{% if (pagination.current > 1) %}
					<a class="block bg-gray-100 flex items-center justify-center h-12 rounded-lg text-sm px-6" href="?p=company/{{ company.id }}&page={{ pagination.current - 1 }}">Предыдущие отзывы</a>
				{% endif %}

				{% if (pagination.current < pagination.total) %}
					<a class="block bg-blue-600 text-white flex items-center justify-center h-12 rounded-lg text-sm px-6" href="?p=company/{{ company.id }}&page={{ pagination.current + 1 }}">Следующие отзывы</a>
				{% endif %}
			</div>
		{% endif %}
	</div>
{% endblock %}