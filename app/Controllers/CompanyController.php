<?php

namespace App\Controllers;

use App\Kernel\Controller;
use App\Kernel\Database\Db;

class CompanyController extends Controller
{
	public function index()
	{
		$pagination = [
			'limit' => 5,
			'current' => $this->request->input('page', 1)
		];

		$pagination['total'] = ceil(Db::table('companies')->count() / $pagination['limit']);

		$this->companies = Db::table('companies')->skip($pagination['limit']*($pagination['current'] - 1))->take($pagination['limit'])->get();
		$this->pagination = $pagination;

		$this->output('guest/pages/companies');
	}

	public function show($companyId)
	{
		$this->pagination = [
			'current' => $this->request->input('page', 1),
			'total' => 5
		];

		$this->company = [
			'id' => $companyId,
			'name' => 'Apple',
			'logo' => 'https://mobnovelty.ru/wp-content/uploads/2017/07/Apple_logo_black.svg_.png',
			'description' => 'Описание компании: Американская корпорация, производитель персональных и планшетных компьютеров, аудиоплееров, смартфонов, программного обеспечения. Один из пионеров в области персональных компьютеров и современных многозадачных операционных систем с графическим интерфейсом. Штаб-квартира - в Купертино, штат Калифорния. Благодаря инновационным технологиям и эстетичному дизайну, корпорация Apple создала в индустрии потребительской электроники уникальную репутацию, сравнимую с культом. 
 Дата основания: 1 апреля 1976 г.
 Ключевые фигуры: Тим Кук, Артур Левинсон, Джефф Уильямс
 Количество сотрудников: 147 000 (сентябрь 2020 г.)
 Сайт: apple.ru, apple.com/ru',
			'reviews' => [
				'total' => 20,
				'list' => [
					[
						'id' => 1,
						'author' => 'Tim Cook',
						'shortened_text' => 'American corporation, manufacturer of personal and tablet computers, audio players, smartphones, sof...',
						'author_photo' => 'https://cdn.arstechnica.net/wp-content/uploads/2019/07/GettyImages-1154966852.jpg'
					],
					[
						'id' => 2,
						'author' => 'Tim Cook',
						'shortened_text' => 'American corporation, manufacturer of personal and tablet computers, audio players, smartphones, sof...',
						'author_photo' => 'https://cdn.arstechnica.net/wp-content/uploads/2019/07/GettyImages-1154966852.jpg'
					],
					[
						'id' => 3,
						'author' => 'Tim Cook',
						'shortened_text' => 'American corporation, manufacturer of personal and tablet computers, audio players, smartphones, sof...',
						'author_photo' => 'https://cdn.arstechnica.net/wp-content/uploads/2019/07/GettyImages-1154966852.jpg'
					]
				]
			]
		];

		$this->output('guest/pages/company-details');
	}
}