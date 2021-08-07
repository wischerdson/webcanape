<?php

use App\Controllers\Admin\CompanyController;
use App\Controllers\Admin\ReviewController;

return [
	'/' => [CompanyController::class, 'index'],
	'company/create' => [CompanyController::class, 'create'],
	'company/{company_id}/edit' => [CompanyController::class, 'edit'],
	'company/{company_id}' => [CompanyController::class, 'update', 'POST'],
	
	'company/{company_id}/reviews' => [ReviewController::class, 'index'],
	'company/{company_id}/reviews/create' => [ReviewController::class, 'create'],
	'company/{company_id}/reviews' => [ReviewController::class, 'store', 'POST'],
	'company/{company_id}/reviews/{review_id}/edit' => [ReviewController::class, 'edit'],
	'company/{company_id}/reviews/{review_id}' => [ReviewController::class, 'update', 'POST'],
];