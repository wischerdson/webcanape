<?php

use App\Controllers\CompanyController;
use App\Controllers\ReviewController;

return [
	'/' => [CompanyController::class, 'index'],
	'company/{company_id}' => [CompanyController::class, 'show'],
	'company/{company_id}/review/{review_id}' => [ReviewController::class, 'show'],
	'company/{company_id}/review/create' => [ReviewController::class, 'create'],
	'company/{company_id}/review' => [ReviewController::class, 'store', 'POST']
];