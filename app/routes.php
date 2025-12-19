<?php

use App\Core\Auth;
use App\Core\Router;
use App\Core\View;

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
use App\Action\Admin\User\UserListAction;
use App\Action\Admin\User\UserCreateFormAction;
use App\Action\Admin\User\UserCreateAction;
use App\Action\Admin\User\UserEditFormAction;
use App\Action\Admin\User\UserEditAction;
use App\Action\Admin\User\UserDeleteAction;
use App\Action\Admin\Subject\SubjectListAction;
use App\Action\Admin\Subject\SubjectCreateFormAction;
use App\Action\Admin\Subject\SubjectCreateAction;
use App\Action\Admin\Subject\SubjectEditFormAction;
use App\Action\Admin\Subject\SubjectEditAction;
use App\Action\Admin\Subject\SubjectDeleteAction;
use App\Action\Admin\Quiz\QuizListAction as AdminQuizListAction;
use App\Action\Admin\Quiz\QuizCreateFormAction as AdminQuizCreateFormAction;
use App\Action\Admin\Quiz\QuizCreateAction as AdminQuizCreateAction;
use App\Action\Admin\Quiz\QuizEditFormAction as AdminQuizEditFormAction;
use App\Action\Admin\Quiz\QuizEditAction as AdminQuizEditAction;
use App\Action\Admin\Quiz\QuizDeleteAction as AdminQuizDeleteAction;
use App\Action\Admin\Questions\QuestionListAction as AdminQuestionListAction;
use App\Action\Admin\Questions\QuestionCreateFormAction as AdminQuestionCreateFormAction;
use App\Action\Admin\Questions\QuestionCreateAction as AdminQuestionCreateAction;
use App\Action\Admin\Questions\QuestionEditFormAction as AdminQuestionEditFormAction;
use App\Action\Admin\Questions\QuestionEditAction as AdminQuestionEditAction;
use App\Action\Admin\Questions\QuestionDeleteAction as AdminQuestionDeleteAction;
use App\Action\Admin\Questions\QuestionImportDocxFormAction as AdminQuestionImportDocxFormAction;
use App\Action\Admin\Questions\QuestionImportDocxAction as AdminQuestionImportDocxAction;
use App\Action\Admin\Questions\ImportFromTextFormAction as AdminQuestionImportFromTextFormAction;
use App\Action\Admin\Questions\ImportFromTextStoreAction as AdminQuestionImportFromTextStoreAction;
use App\Action\Admin\Results\ResultListAction as AdminResultListAction;

/* =====================
 * Teacher
 * ===================== */
use App\Action\Teacher\TeacherDashboardAction;
use App\Action\Teacher\TeacherStudentsAction;

// Teacher Quizzes
use App\Action\Teacher\Quizzes\QuizListAction;
use App\Action\Teacher\Quizzes\QuizCreateFormAction;
use App\Action\Teacher\Quizzes\QuizCreateAction;
use App\Action\Teacher\Quizzes\QuizEditFormAction;
use App\Action\Teacher\Quizzes\QuizEditAction;
use App\Action\Teacher\Quizzes\QuizDeleteAction;
use App\Action\Teacher\Quizzes\QuizToggleRetakeAction;

// Teacher Questions
use App\Action\Teacher\Questions\QuestionListAction;
use App\Action\Teacher\Questions\QuestionCreateFormAction;
use App\Action\Teacher\Questions\QuestionCreateAction;
use App\Action\Teacher\Questions\QuestionEditFormAction;
use App\Action\Teacher\Questions\QuestionEditAction;
use App\Action\Teacher\Questions\QuestionDeleteAction;
use App\Action\Teacher\Questions\QuestionImportDocxFormAction;
use App\Action\Teacher\Questions\QuestionImportDocxAction;
use App\Action\Teacher\Questions\ImportFromTextFormAction as TeacherQuestionImportFromTextFormAction;
use App\Action\Teacher\Questions\ImportFromTextStoreAction as TeacherQuestionImportFromTextStoreAction;
use App\Action\Teacher\Results\TeacherResultListAction;
use App\Action\Teacher\Results\TeacherResultAttemptsAction;
use App\Action\Teacher\Results\TeacherEnableRetakeAction;
use App\Action\Teacher\Results\TeacherResultExportCsvAction;

/* =====================
 * Student
 * ===================== */
use App\Action\Student\DashboardAction as StudentDashboardAction;
use App\Action\Student\StudentPanelAction;
use App\Action\Student\QuizListAction as StudentQuizListAction;
use App\Action\Student\QuizTakeAction as StudentQuizTakeAction;
use App\Action\Student\QuizSubmitAction as StudentQuizSubmitAction;
use App\Action\Student\ResultListAction as StudentResultListAction;
use App\Action\Student\ResultQuizListAction as StudentResultQuizListAction;
use App\Action\Student\ResultAttemptsAction as StudentResultAttemptsAction;
use App\Action\Student\ResultSingleAction as StudentResultSingleAction;
use App\Action\Student\AttemptDeleteAction as StudentAttemptDeleteAction;



/* =====================
 * Auth
 * ===================== */

$router->get('/login',  new LoginAction());
$router->post('/login', new DoLoginAction());
$router->get('/logout', new LogoutAction());

// Root route: send users to their panel/dashboard or login if not authenticated.
$router->get('/', function () {
    if (Auth::isAdmin()) {
        return View::redirect('/admin/dashboard');
    }
    if (Auth::isTeacher()) {
        return View::redirect('/teacher/dashboard');
    }
    if (Auth::isStudent()) {
        return View::redirect('/student/panel');
    }
    return View::redirect('/login');
});

/* =====================
 * Admin Panel
 * ===================== */
$router->get('/admin/dashboard', new AdminDashboardAction());

// Users
$router->get('/admin/users',         new UserListAction());
$router->get('/admin/users/create',  new UserCreateFormAction());
$router->post('/admin/users/create', new UserCreateAction());
$router->get('/admin/users/edit',    new UserEditFormAction());
$router->post('/admin/users/edit',   new UserEditAction());
$router->get('/admin/users/delete',  new UserDeleteAction());

// Subjects
$router->get('/admin/subjects',         new SubjectListAction());
$router->get('/admin/subjects/create',  new SubjectCreateFormAction());
$router->post('/admin/subjects/create', new SubjectCreateAction());
$router->get('/admin/subjects/edit',    new SubjectEditFormAction());
$router->post('/admin/subjects/edit',   new SubjectEditAction());
$router->get('/admin/subjects/delete',  new SubjectDeleteAction());

// Quizzes
$router->get('/admin/quizzes',         new AdminQuizListAction());
$router->get('/admin/quizzes/create',  new AdminQuizCreateFormAction());
$router->post('/admin/quizzes/create', new AdminQuizCreateAction());
$router->get('/admin/quizzes/edit',    new AdminQuizEditFormAction());
$router->post('/admin/quizzes/edit',   new AdminQuizEditAction());
$router->get('/admin/quizzes/delete',  new AdminQuizDeleteAction());

// Questions (admin)
$router->get('/admin/questions',         new AdminQuestionListAction());
$router->get('/admin/questions/create',  new AdminQuestionCreateFormAction());
$router->post('/admin/questions/create', new AdminQuestionCreateAction());
$router->get('/admin/questions/edit',    new AdminQuestionEditFormAction());
$router->post('/admin/questions/edit',   new AdminQuestionEditAction());
$router->get('/admin/questions/delete',  new AdminQuestionDeleteAction());
$router->get('/admin/questions/import-docx',  new AdminQuestionImportDocxFormAction());
$router->post('/admin/questions/import-docx', new AdminQuestionImportDocxAction());
$router->get('/admin/questions/import-text',  new AdminQuestionImportFromTextFormAction());
$router->post('/admin/questions/import-text', new AdminQuestionImportFromTextStoreAction());
$router->get('/admin/results', new AdminResultListAction());

/* =====================
 * Teacher Panel
 * ===================== */
$router->get('/teacher/dashboard', new TeacherDashboardAction());
$router->get('/teacher/students', new TeacherStudentsAction());

// Quizzes CRUD
$router->get('/teacher/quizzes',         new QuizListAction());
$router->get('/teacher/quizzes/create',  new QuizCreateFormAction());
$router->post('/teacher/quizzes/create', new QuizCreateAction());
$router->get('/teacher/quizzes/edit',    new QuizEditFormAction());
$router->post('/teacher/quizzes/edit',   new QuizEditAction());
$router->get('/teacher/quizzes/delete',  new QuizDeleteAction());
$router->get('/teacher/quizzes/toggle-retake', new QuizToggleRetakeAction());

// Questions CRUD (وابسته به quiz_id)
$router->get('/teacher/questions',         new QuestionListAction());
$router->get('/teacher/questions/create',  new QuestionCreateFormAction());
$router->post('/teacher/questions/create', new QuestionCreateAction());
$router->get('/teacher/questions/edit',    new QuestionEditFormAction());
$router->post('/teacher/questions/edit',   new QuestionEditAction());
$router->get('/teacher/questions/delete',  new QuestionDeleteAction());
$router->get('/teacher/questions/import-docx',  new QuestionImportDocxFormAction());
$router->post('/teacher/questions/import-docx', new QuestionImportDocxAction());
$router->get('/teacher/questions/import-text',  new TeacherQuestionImportFromTextFormAction());
$router->post('/teacher/questions/import-text', new TeacherQuestionImportFromTextStoreAction());

// Results
$router->get('/teacher/results',               new TeacherResultListAction());
$router->get('/teacher/results/attempts',      new TeacherResultAttemptsAction());
$router->get('/teacher/results/enable-retake', new TeacherEnableRetakeAction());
$router->get('/teacher/results/export-csv',    new TeacherResultExportCsvAction());

/* =====================
 * Student Panel
 * ===================== */
$router->get('/student/panel', new StudentPanelAction());
$router->get('/student/dashboard', new StudentDashboardAction());
$router->get('/student/quizzes', new StudentQuizListAction());
$router->get('/student/take', new StudentQuizTakeAction());
$router->post('/student/submit', new StudentQuizSubmitAction());
$router->get('/student/results', new StudentResultListAction());
$router->get('/student/results/quiz', new StudentResultAttemptsAction()); // list attempts for a quiz (quiz_id)
$router->get('/student/results/attempt', new StudentResultSingleAction()); // view a single attempt (attempt_id)
$router->get('/student/results/single', new StudentResultSingleAction()); // alias
$router->get('/student/attempt/delete', new StudentAttemptDeleteAction());

return $router;
