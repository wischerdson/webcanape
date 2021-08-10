{% extends "layout.php" %}

{% block title %}
	Редактировать компанию {{ company.name }}
{% endblock %}

{% block content %}
	<div class="mx-auto py-20 max-w-5xl">
		<div class="flex items-center mb-7">
			<a class="text-blue-600 text-sm" href="/admin.php">Главная</a>
			<span class="block mx-2 text-gray-400"> - </span>
			<a class="text-blue-600 text-sm underline">{{ company.name }}</a>
		</div>
		
		<form class="mt-7 space-y-5" action="admin.php?p=company/{company_id}" method="POST" enctype="multipart/form-data">
			<div>
				<h1 class="font-medium text-2xl">Редактировать компанию {{ company.name }}</h1>
			</div>
			<div>
				<label for="form_name">Название</label>
				<input class="mt-1 border border-gray-200 rounded-lg px-4 py-3 block w-full" type="text" id="form_name" name="name" value="{{ company.name }}">
			</div>
			<div>
				<label for="form_description">Описание</label>
				<textarea class="mt-1 border border-gray-200 rounded-lg px-4 py-3 block w-full resize-y min-h-[300px]" name="description" id="form_description">{{ company.description }}</textarea>
			</div>
			<div class="flex items-center mt-7">
				<div class="w-10 h-10 logo">
					<img src="{{ company.logo }}" alt="">
				</div>
				<div>
					<label for="form_logo">Изменить логотип</label>
					<input type="file" name="logo" id="form_logo">
				</div>
				<button class="ml-auto bg-blue-600 text-white flex items-center justify-center px-6 h-12 rounded-lg font-light" type="submit">Сохранить</button>
			</div>
		</form>
	</div>

	<script type="text/javascript">
		document.getElementById('form_logo').addEventListener('change', () => {
			document.querySelector('.logo').remove()
		})
	</script>

{% endblock %}