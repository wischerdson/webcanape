{% extends "layout.php" %}

{% block title %}
	Отзывы на компанию {{ company.name }}
{% endblock %}

{% block content %}
	<div class="mx-auto py-20 max-w-5xl">
		<div class="flex items-center mb-7">
			<a class="text-blue-600 text-sm" href="/admin.php">Главная</a>
			<span class="block mx-2 text-gray-400"> - </span>
			<a class="text-blue-600 text-sm underline">Отзывы о {{ company.name }}</a>
		</div>
		<div class="flex items-center">
			<h1 class="font-medium text-2xl">Отзывы о компании
				{% if reviews.total > 0 %}
					<span>({{ reviews.total }})</span>
				{% endif %}
			</h1>
			<div class="ml-auto">
				<a class="px-8 block w-full bg-blue-600 text-white flex items-center justify-center h-12 rounded-lg font-light" href="/admin.php?p=company/{{ company.id }}/reviews/create">Добавить отзыв</a>
			</div>
		</div>
		<div>
			<div class="mt-4">
				{% if reviews.total == 0 %}
					<p class="text-gray-400">Отзывов еще нет</p>
				{% else %}
					<ul class="w-full grid grid-cols-2 gap-6">
						{% for review in reviews.data %}
							<li class="w-full border border-gray-200 rounded-xl py-4 px-6">
								<div class="flex items-start">
									<div class="w-40 relative after:pt-full after:block">
										<div class="absolute z-10 inset-0 rounded-full overflow-hidden bg-gray-100">
											<img class="relative z-20 w-full h-full object-center object-cover" src="{{ review.photo }}" alt="">
										</div>
									</div>
									<div class="w-full ml-6">
										<h3 class="font-medium text-xl">{{ review.author }}</h3>
										<p class="text-sm text-gray-700 mt-2.5">
											{{ review.text[:100]|replace({ '<br>': ' ' }) }}{% if review.text|length > 100 %}<span>...</span>{% endif %}
										</p>
									</div>
								</div>
								<div class="flex justify-end mt-3 space-x-6">
									<a class="text-blue-600 text-sm font-light underline  hover:no-underline" href="/admin.php?p=company/{{ company.id }}/reviews/{{ review.id }}/edit">Редактировать</a>
									<a class="text-red-600 text-sm font-light underline  hover:no-underline" href="/admin.php?p=company/{{ company.id }}/reviews/{{ review.id }}/delete">Удалить</a>
									{% if review.published == 0 %}
										<a class="text-green-600 text-sm font-light underline  hover:no-underline" href="/admin.php?p=company/{{ company.id }}/reviews/{{ review.id }}/publish">Опубликовать</a>
									{% endif %}
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
					<a class="block bg-gray-100 flex items-center justify-center h-12 rounded-lg text-sm px-6" href="/admin.php?p=company/{{ company.id }}/reviews&page={{ reviews.current_page - 1 }}">Предыдущие отзывы</a>
				{% endif %}

				{% if (reviews.current_page < reviews.last_page) %}
					<a class="block bg-blue-600 text-white flex items-center justify-center h-12 rounded-lg text-sm px-6" href="/admin.php?p=company/{{ company.id }}/reviews&page={{ reviews.current_page + 1 }}">Следующие отзывы</a>
				{% endif %}
			</div>
		{% endif %}
	</div>
{% endblock %}