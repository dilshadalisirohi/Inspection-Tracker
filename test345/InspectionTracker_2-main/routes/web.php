<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\FloorPlanController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\SettingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'index']);
Route::get('/login', function () {
    return view('auth/login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::get('/dashboard', [HomeController::class, 'index']);

        Route::get('/company', [CompanyController::class, 'index']);
        Route::get('/company-staffs/{id}', [CompanyController::class, 'companyStaffs']);
        Route::get('/add-company', [CompanyController::class, 'addCompanyView']);
        Route::get('/edit-company/{id}', [CompanyController::class, 'editCompanyView']);
        Route::get('/add-company-user', [CompanyController::class, 'addCompanyUserView']);
        Route::get('/edit-company-user/{id}', [CompanyController::class, 'updateCompanyUserView']);

        Route::get('/application', [ApplicationController::class, 'index']);
        Route::get('/add-application', [ApplicationController::class, 'addApplicationView']);
        Route::get('/edit-application/{id}', [ApplicationController::class, 'editApplicationView']);
        Route::get('view-application/{id}', [ApplicationController::class, 'viewApplicationView']);

        Route::get('/floorplan', [FloorPlanController::class, 'index']);
        Route::get('/add-floorplan', [FloorPlanController::class, 'addFloorPlanView']);
        Route::get('/edit-floorplan/{id}', [FloorPlanController::class, 'editFloorPlanView']);

        Route::get('staff', [StaffController::class, 'index']);
        Route::get('add-staff', [StaffController::class, 'addStaffView']);
        Route::get('edit-staff/{id}', [StaffController::class, 'editStaffView']);
        Route::get('contractor-staff', [StaffController::class, 'contractorStaff']);

        Route::get('document', [DocumentController::class, 'index']);
        Route::get('add-document', [DocumentController::class, 'addDocumentView']);
        Route::get('edit-document/{id}', [DocumentController::class, 'editDocumentView']);

        Route::get('email-templates', [EmailController::class, 'emailTemplates']);
        Route::get('add-email-template', [EmailController::class, 'addEmailTemplateView']);

        Route::get('settings', [SettingsController::class, 'index']);
        Route::get('audit', [SettingsController::class, 'auditor']);
        Route::get('email-settings', [SettingsController::class, 'emailSettings']);
    });

    Route::group(['middleware' => 'role:inspector', 'prefix' => 'inspector', 'as' => 'inspector.'], function() {
        Route::get('/dashboard', [HomeController::class, 'index']);

        Route::get('document', [DocumentController::class, 'index']);

        Route::get('application', [ApplicationController::class, 'index']);
        Route::get('edit-application/{id}', [ApplicationController::class, 'editApplicationView']);
        Route::get('view-application/{id}', [ApplicationController::class, 'viewApplicationView']);
        Route::get('generatepdf/{id}', [ApplicationController::class, 'generatepdf']);   //PDF For Status50%
        Route::get('generatepdfs/{id}', [ApplicationController::class, 'generatepdfs']); //PDF For Status100%

        Route::get('/floorplan', [FloorPlanController::class, 'index']);

        Route::get('contractor-staff', [StaffController::class, 'contractorStaff']);
    });

    Route::group(['middleware' => 'role:company', 'prefix' => 'contractor', 'as' => 'contractor.'], function() {
        Route::get('/dashboard', [HomeController::class, 'index']);

        Route::get('application', [ApplicationController::class, 'index']);
        Route::get('add-application', [ApplicationController::class, 'addApplicationView']);
        Route::get('edit-application/{id}', [ApplicationController::class, 'editApplicationView']);
        Route::get('view-application/{id}', [ApplicationController::class, 'viewApplicationView']);

        Route::get('document', [DocumentController::class, 'index']);

        Route::get('/floorplan', [FloorPlanController::class, 'index']);

        Route::get('contractor-staff', [StaffController::class, 'contractorStaff']);
    });

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/create-company', [CompanyController::class, 'createCompany']);
    Route::post('/update-company', [CompanyController::class, 'updateCompany']);
    Route::post('/create-company-user', [CompanyController::class, 'createCompanyUser']);
    Route::post('/update-company-user', [CompanyController::class, 'updateCompanyUser']);
    Route::get('/delete-company-user/{id}', [CompanyController::class, 'deleteCompanyUser']);
    Route::get('/get-companies', [CompanyController::class, 'getCompanies'])->name('getCompanies');
    Route::get('/get-company-staffs', [CompanyController::class, 'getCompanyStaffs'])->name('getCompanyStaffs');

    Route::post('create-staff', [StaffController::class, 'createStaff']);
    Route::post('update-staff', [StaffController::class, 'updateStaff']);
    Route::get('/delete-staff/{id}', [StaffController::class, 'deleteStaff']);
    Route::get('checkEmail/{email}', [StaffController::class, 'checkEmail']);
    Route::get('checkUserEmail/{email}/{id}', [StaffController::class, 'checkUserEmail']);
    Route::get('/get-staffs', [StaffController::class, 'getStaffs'])->name('getStaffs');
    Route::get('profile', [StaffController::class, 'viewProfile']);
    Route::post('update-profile', [StaffController::class, 'updateProfile']);
    Route::get('contractor-staffs', [StaffController::class, 'contractorStaffs'])->name('getContractorStaffs');

    Route::post('create-floorplan', [FloorPlanController::class, 'createFloorPlan']);
    Route::post('update-floorplan', [FloorPlanController::class, 'updateFloorPlan']);
    Route::get('getFloorPlans', [FloorPlanController::class, 'getFloorPlans'])->name('getFloorPlans');
    Route::get('delete-floorplan/{id}', [FloorPlanController::class, 'deleteFloorPlan']);

    Route::get('getDocuments', [DocumentController::class, 'getDocuments'])->name('getDocuments');
    Route::post('create-document', [DocumentController::class, 'createDocument']);
    Route::post('update-document', [DocumentController::class, 'updateDocument']);
    Route::post('delete-document/{id}', [DocumentController::class, 'deleteDocument']);

    Route::get('getApplications', [ApplicationController::class, 'getApplications'])->name('getApplications');
    Route::post('create-application', [ApplicationController::class, 'createApplication']);
    Route::post('update-application', [ApplicationController::class, 'updateApplication']);
    Route::post('uploadSign', [ApplicationController::class, 'uploadSign']);
    Route::post('removeSign', [ApplicationController::class, 'removeSign']);

    Route::post('updateEmailTemplate', [EmailController::class, 'updateEmailTemplate']);
    Route::get('getEmailTemplateById/{id}', [EmailController::class, 'getEmailTemplateById']);

    Route::post('update-settings', [SettingsController::class, 'updateSettings']);
    Route::get('getAudits', [SettingsController::class, 'getAudits'])->name('getAudits');
    Route::post('updateEmailSettings', [SettingsController::class, 'updateEmailSettings']);
    Route::post('updateReportSettings', [SettingsController::class, 'updateReportSettings']);

    Route::get('callQueue', [SettingsController::class, 'callQueue']);
    Route::get('contractorData/{id}', [HomeController::class, 'contractorData']);

    Route::get('test', [SettingsController::class, 'test']);
});
