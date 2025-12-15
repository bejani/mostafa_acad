<?php

use App\Core\Router;

/* =====================
 * Auth
 * ===================== */
use App\Action\Auth\DoLoginAction;
use App\Action\Auth\LoginAction;
use App\Action\Auth\LogoutAction;

/* =====================
 * Admin
 * ===================== */
use App\Action\Admin\AdminDashboardAction;
use App\Action\Admin\Users\UserListAction;
use App\Action\Admin\Users\AdminUserCreateFormAction;
use App\Action\Admin\Users\AdminUserCreateAction;
use App\Action\Admin\Users\AdminUserEditFormAction;
use App\Action\Admin\Users\AdminUserUpdateAction;
use App\Action\Admin\Users\AdminUserDeleteAction;

/* =====================
 * Teacher
 * ===================== */
use App\Action\Teacher\TeacherDashboardAction;

// Teacher Quizzes
use App\Action\Teacher\Quizzes\ListAction as TeacherQuizListAction;
use App\Action\Teacher\Quizzes\CreateFormAction as TeacherQuizCreateFormAction;
use App\Action\Teacher\Quizzes\CreateAction as TeacherQuizCreateAction;
use App\Action\Teacher\Quizzes\EditFormAction as TeacherQuizEditFormAction;
use App\Action\Teacher\Quizzes\UpdateAction as TeacherQuizUpdateAction;
use App\Action\Teacher\Quizzes\DeleteAction as TeacherQuizDeleteAction;

// Teacher Questions
use App\Action\Teacher\Questions\ListAction as TeacherQuestionListAction;
use App\Action\Teacher\Questions\CreateFormAction as TeacherQuestionCreateFormAction;
use App\Action\Teacher\Questions\CreateAction as TeacherQuestionCreateAction;
use App\Action\Teacher\Questions\EditFormAction as TeacherQuestionEditFormAction;
use App\Action\Teacher\Questions\UpdateAction as TeacherQuestionUpdateAction;
use App\Action\Teacher\Questions\DeleteAction as TeacherQuestionDeleteAction;

/* =====================
 * Student
 * ===================== */
use App\Action\Student\DashboardAction as StudentDashboardAction;

// Router instance is created in public/index.php and injected here when this file is required.

/* =====================
 * Auth
 * ===================== */
$router->get('/login',  new DoLoginAction());
$router->post('/login', new LoginAction());
$router->get('/logout', new LogoutAction());

/* =====================
 * Admin Panel
 * ===================== */
$router->get('/admin/dashboard', new AdminDashboardAction());

// Users
$router->get('/admin/users',         new UserListAction());
$router->get('/admin/users/create',  new AdminUserCreateFormAction());
$router->post('/admin/users/create', new AdminUserCreateAction());
$router->get('/admin/users/edit',    new AdminUserEditFormAction());
$router->post('/admin/users/edit',   new AdminUserUpdateAction());
$router->get('/admin/users/delete',  new AdminUserDeleteAction());

/* =====================
 * Teacher Panel
 * ===================== */
$router->get('/teacher/dashboard', new TeacherDashboardAction());

// Quizzes CRUD
$router->get('/teacher/quizzes',         new TeacherQuizListAction());
$router->get('/teacher/quizzes/create',  new TeacherQuizCreateFormAction());
$router->post('/teacher/quizzes/create', new TeacherQuizCreateAction());
$router->get('/teacher/quizzes/edit',    new TeacherQuizEditFormAction());
$router->post('/teacher/quizzes/edit',   new TeacherQuizUpdateAction());
$router->get('/teacher/quizzes/delete',  new TeacherQuizDeleteAction());

// Questions CRUD (وابسته به quiz_id)
$router->get('/teacher/questions',         new TeacherQuestionListAction());
$router->get('/teacher/questions/create',  new TeacherQuestionCreateFormAction());
$router->post('/teacher/questions/create', new TeacherQuestionCreateAction());
$router->get('/teacher/questions/edit',    new TeacherQuestionEditFormAction());
$router->post('/teacher/questions/edit',   new TeacherQuestionUpdateAction());
$router->get('/teacher/questions/delete',  new TeacherQuestionDeleteAction());

/* =====================
 * Student Panel
 * ===================== */
$router->get('/student/dashboard', new StudentDashboardAction());

return $router;
