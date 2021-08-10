<?php

use App\Controllers\Admin\CompanyController;
use App\Controllers\Admin\ReviewController;
use App\Controllers\Admin\AuthController;

$router->add('sign-in', [ AuthController::class, 'index' ]);
$router->add('sign-in', [ AuthController::class, 'signIn', 'POST' ]);

$router->add('/', [ CompanyController::class, 'index' ]);
$router->add('company/create', [ CompanyController::class, 'create' ]);
$router->add('company', [ CompanyController::class, 'store', 'POST' ]);
$router->add('company/{company_id}/edit', [ CompanyController::class, 'edit' ]);
$router->add('company/{company_id}', [ CompanyController::class, 'update', 'POST' ]);

$router->add('company/{company_id}/reviews', [ ReviewController::class, 'index' ]);
$router->add('company/{company_id}/reviews/create', [ ReviewController::class, 'create' ]);
$router->add('company/{company_id}/reviews', [ ReviewController::class, 'store', 'POST' ]);
$router->add('company/{company_id}/reviews/{review_id}/edit', [ ReviewController::class, 'edit' ]);
$router->add('company/{company_id}/reviews/{review_id}', [ ReviewController::class, 'update', 'POST' ]);
$router->add('company/{company_id}/reviews/{review_id}/publish', [ ReviewController::class, 'publish', 'POST' ]);
