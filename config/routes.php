<?php

use App\Controllers\CompanyController;
use App\Controllers\ReviewController;


$router->add('/', [ CompanyController::class, 'index' ]);
$router->add('company/{company_id}', [ CompanyController::class, 'show' ]);
$router->add('company/{company_id}/review/create', [ ReviewController::class, 'create' ]);
$router->add('company/{company_id}/review/{review_id}', [ ReviewController::class, 'show' ]);
$router->add('company/{company_id}/review', [ ReviewController::class, 'store', 'POST' ]);