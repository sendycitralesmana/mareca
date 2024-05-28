<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BackOffice\BlogCategoryController;
use App\Http\Controllers\BackOffice\BOBlogController;
use App\Http\Controllers\BackOffice\ClientController;
use App\Http\Controllers\BackOffice\DashboardController;
use App\Http\Controllers\BackOffice\MessageController;
use App\Http\Controllers\BackOffice\PortfolioController;
use App\Http\Controllers\BackOffice\ReplyMessageController;
use App\Http\Controllers\BackOffice\RoleController;
use App\Http\Controllers\BackOffice\ServiceController;
use App\Http\Controllers\BackOffice\UserController;
use App\Http\Controllers\FrontOffice\AboutController;
use App\Http\Controllers\FrontOffice\BlogController;
use App\Http\Controllers\FrontOffice\ContactController;
use App\Http\Controllers\FrontOffice\FOMessageController;
use App\Http\Controllers\FrontOffice\HomeController;
use App\Http\Controllers\FrontOffice\ProjectController;
use App\Http\Controllers\FrontOffice\ServiceController as FrontOfficeServiceController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('front-office.layout.main');
// });

// grup auth
Route::get('/verify/{token}', [AuthController::class, 'verify']);

// middleware guest
Route::group(['middleware' => 'guest'], function () {
    
    // front office
    Route::get('/', [HomeController::class, 'index']);

    // group about
    Route::group(['prefix' => 'about'], function () {
        Route::get('/', [AboutController::class, 'index']);
    });

    // group service
    Route::group(['prefix' => 'service'], function () {
        Route::get('/', [FrontOfficeServiceController::class, 'index']);
    });

    // group project
    Route::group(['prefix' => 'project'], function () {
        Route::get('/', [ProjectController::class, 'index']);
    });

    // group blog
    Route::group(['prefix' => 'blog'], function () {
        Route::get('/', [BlogController::class, 'index']);
        // group blog_id
        Route::group(['prefix' => '/{blog_id}'], function () {
            Route::get('/detail', [BlogController::class, 'detail']);
        });
    });

    // group contact
    Route::group(['prefix' => 'contact'], function () {
        Route::get('/', [ContactController::class, 'index']);
    });

    // group message
    Route::group(['prefix' => 'message'], function () {
        Route::post('/store', [FOMessageController::class, 'store']);
    });
    
    // grup auth
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginAction']);
    Route::get('forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('forgot-password', [AuthController::class, 'forgotPasswordAction']);
    Route::get('reset-password/{token}', [AuthController::class, 'resetPassword']);
    Route::put('reset-password/{token}/action', [AuthController::class, 'resetPasswordAction']);
    
});

// middleware auth
Route::group(['middleware' => 'auth'], function () {
    
    // grup auth
    Route::get('/logout', [AuthController::class, 'logout']);
    
    // grup backoffice
    Route::group(['prefix' => 'back-office'], function () {

        // grup dashboard
        Route::group(['prefix' => 'dashboard'], function () {
            Route::get('/', [DashboardController::class, 'index']);
        });

        // grup user data
        Route::group(['prefix' => 'user-data'], function () {
            
            // grup role
            Route::group(['prefix' => 'role'], function () {
                Route::get('/', [RoleController::class, 'index']);
                Route::post('/create', [RoleController::class, 'create']);

                // grup role_id
                Route::group(['prefix' => '{role_id}'], function () {
                    Route::put('/update', [RoleController::class, 'update']);
                    Route::get('/delete', [RoleController::class, 'delete']);
                });

            });

            // grup user
            Route::group(['prefix' => 'user'], function () {
                Route::get('/', [UserController::class, 'index']);
                Route::get('/create', [UserController::class, 'create']);
                Route::post('/create', [UserController::class, 'createAction']);
    
                // grup user_id
                Route::group(['prefix' => '{user_id}'], function () {
                    Route::put('/update', [UserController::class, 'update']);
                    Route::get('/profile', [UserController::class, 'profile']);
                    Route::get('/edit-data', [UserController::class, 'editData']);
                    Route::get('/edit-password', [UserController::class, 'editPassword']);
                    Route::post('/update-data', [UserController::class, 'updateData']);
                    Route::post('/update-password', [UserController::class, 'updatePassword']);
                    Route::get('/delete', [UserController::class, 'delete']);
                });
    
            });

        });
    

        // grup service
        Route::group(['prefix' => 'service'], function () {
            Route::get('/', [ServiceController::class, 'index']);
            Route::post('/create', [ServiceController::class, 'create']);

            // grup service_id
            Route::group(['prefix' => '{service_id}'], function () {
                Route::post('/update', [ServiceController::class, 'update']);
                Route::get('/delete', [ServiceController::class, 'delete']);
            });

        });
        
        // grup portfolio / project
        Route::group(['prefix' => 'portfolio'], function () {
            Route::get('/', [PortfolioController::class, 'index']);
            Route::post('/create', [PortfolioController::class, 'create']);

            // grup portfolio_id
            Route::group(['prefix' => '{portfolio_id}'], function () {
                Route::post('/update', [PortfolioController::class, 'update']);
                Route::get('/delete', [PortfolioController::class, 'delete']);
            });
        });

        // grup client
        Route::group(['prefix' => 'client'], function () {
            Route::get('/', [ClientController::class, 'index']);
            Route::post('/create', [ClientController::class, 'create']);

            // grup client_id
            Route::group(['prefix' => '{client_id}'], function () {
                Route::post('/update', [ClientController::class, 'update']);
                Route::get('/delete', [ClientController::class, 'delete']);
            });
        });

        // grup blog data
        Route::group(['prefix' => 'blog-data'], function () {
            
            // grup category
            Route::group(['prefix' => 'category'], function () {
                Route::get('/', [BlogCategoryController::class, 'index']);
                Route::post('/create', [BlogCategoryController::class, 'create']);

                // grup category_id
                Route::group(['prefix' => '{category_id}'], function () {
                    Route::get('/detail', [BlogCategoryController::class, 'detail']);
                    Route::put('/update', [BlogCategoryController::class, 'update']);
                    Route::get('/delete', [BlogCategoryController::class, 'delete']);
                });

            });

            // grup blog
            Route::group(['prefix' => 'blog'], function () {
                Route::get('/', [BOBlogController::class, 'index']);
                Route::post('/create', [BOBlogController::class, 'create']);

                // grup blog_id
                Route::group(['prefix' => '{blog_id}'], function () {
                    Route::get('/detail', [BOBlogController::class, 'detail']);
                    Route::put('/update', [BOBlogController::class, 'update']);
                    Route::get('/delete', [BOBlogController::class, 'delete']);
                });

            });

        });

        // grup message
        Route::group(['prefix' => 'message'], function () {
            Route::get('/', [MessageController::class, 'index']);

            // grup message_id
            Route::group(['prefix' => '{message_id}'], function () {
                Route::get('/delete', [MessageController::class, 'delete']);
                
                // grup reply message
                Route::group(['prefix' => 'reply-message'], function () {
                    Route::post('/store', [ReplyMessageController::class, 'store']);
                });
            
            });

        });

    
    });

});

