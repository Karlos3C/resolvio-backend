<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Catalog\AreaController;
use App\Http\Controllers\Catalog\IssueController;
use App\Http\Controllers\Ticket\TicketController;
use App\Http\Controllers\Ticket\CommentController;
use App\Http\Controllers\Catalog\PriorityController;
use App\Http\Controllers\Ticket\AttachmentController;
use App\Http\Controllers\Authorization\RoleController;
use App\Http\Controllers\Catalog\UserStatusController;
use App\Http\Controllers\Ticket\ReplyCommentController;
use App\Http\Controllers\Ticket\TicketStatusController;
use App\Http\Controllers\Authorization\UserRoleController;
use App\Http\Controllers\Authorization\PermissionController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);

    Route::put('update-user-status/{user}', [UserController::class, 'updateUserStatus']);
    Route::apiResource('users', UserController::class)->except(['store']);
    Route::get('permissions', [PermissionController::class, 'index']);
    Route::apiResource('roles', RoleController::class)->except(['show', 'destroy']);
    Route::post('assign-role/{user}', [UserRoleController::class, 'assignRole']);
    Route::post('sync-roles/{user}', [UserRoleController::class, 'syncRoles']);
    Route::apiResource('areas', AreaController::class);
    Route::apiResource('issues', IssueController::class);

    Route::get('filter-tickets', [TicketController::class, 'filterTickets']);
    Route::apiResource('tickets', TicketController::class);
    Route::apiResource('attachments', AttachmentController::class)->except(['update']);
    Route::apiResource('comments', CommentController::class)->except(['update']);
    Route::apiResource('reply-comments', ReplyCommentController::class)->except(['show', 'update']);

    Route::get('priorities', [PriorityController::class, 'index']);
    Route::get('user-status', [UserStatusController::class, 'index']);
    Route::get('ticket-status', [TicketStatusController::class, 'index']);
});

Route::get('sign-up-areas', [AreaController::class, 'index']);
Route::post('sign-up', [AuthController::class, 'signUp']);
Route::post('sign-in', [AuthController::class, 'signIn']);
Route::post('verify-email', [AuthController::class, 'verifyEmail']);
