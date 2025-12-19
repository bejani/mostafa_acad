<?php

namespace App\Action\Teacher;

use App\Core\Auth;
use App\Core\View;
use App\Domain\UserSubjectRepository;
use App\Domain\SubjectRepository;
use App\Domain\UserRepository;

class TeacherStudentsAction
{
    public function __invoke()
    {
        if (!Auth::isTeacher()) View::redirect("/login");

        $teacherId = Auth::id();

        $userSubjectRepo = new UserSubjectRepository();
        $subjectRepo = new SubjectRepository();
        $userRepo = new UserRepository();

        // درس‌های teacher
        $subjectIds = $userSubjectRepo->subjectsForUser($teacherId);
        $subjects = $subjectRepo->findByIds($subjectIds);

        $studentsBySubject = [];
        foreach ($subjects as $subject) {
            // دانش آموزانی که این درس را دارند
            $studentIds = $userSubjectRepo->usersForSubject($subject['id']);
            $students = $userRepo->findByIds($studentIds);
            // فقط دانش آموزان واقعی، نه معلم خودش
            $students = array_filter($students, function ($student) use ($teacherId) {
                return $student['id'] != $teacherId && $student['role'] === 'student';
            });
            $studentsBySubject[$subject['title']] = array_values($students);
        }

        return View::render("teacher/students/index.php", [
            "studentsBySubject" => $studentsBySubject
        ], 'teacher');
    }
}
