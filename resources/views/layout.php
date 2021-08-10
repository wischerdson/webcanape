<!DOCTYPE html>
<html lang="en">
<head>
	{% block head %}
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>{% block title %}{% endblock %}</title>
		<link rel="stylesheet" href="/css/app.css" />
	{% endblock %}
</head>
<body>
	<main>
		{% block content %}{% endblock %}
	</main>
</body>
</html>