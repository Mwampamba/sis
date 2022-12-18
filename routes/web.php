<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{
    AdminController,
    UserController,
    StudentController,
    AcademicYearController,
    DepartmentController,
    ProgrammeController,
    CollageController,
    SemesterController,
    CourseController,
    GradeController,
    ClassController,
    ClassCourseController,
    LecturerCourseController,
    ExamTypeController,
    ExaminationController,
    MarkController
};

#AUTHENTICATION
Route::controller(AdminController::class)->group(function () {
    #STAFFS
    Route::get('/', 'get_login')->name('getLogin');
    Route::post('/', 'post_login')->name('postLogin');
    Route::get('/forgot-password', 'get_forgot_password')->name('getForgotPassword');
    Route::post('/forgot-password', 'post_forgot_password')->name('postForgotPassword');
    Route::get('/reset-password/{token}', 'reset_password')->name('resetPassword');
    Route::put('/update-password', 'update_password')->name('updatePassword');

    #STUDENTS
    Route::get('/student', 'student_get_login')->name('studentGetLogin');
    Route::post('/student', 'student_post_login')->name('studentLogin');

    #STUDENT DASHBOARD
    Route::get('/student/dashboard', [StudentController::class, 'student_dashboard'])->name('studentDashboard');
});

Route::group(['middleware' => ['admin_auth']], function () {
    #DASHBOARD
    Route::get('/auth/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    #PROFILE
    Route::get('/auth/profile/{staff_id}', [UserController::class, 'profile']);
    Route::put('/auth/profile/{staff_id}', [UserController::class, 'profile_update']);
    #LECTURERS
    Route::controller(UserController::class)->group(function () {
        Route::get('auth/staffs', 'index')->name('staffs')->middleware('can:isAdmin');
        Route::get('auth/staffs/add-staff', 'create')->name('addStaff')->middleware('can:isAdmin');
        Route::post('auth/staffs/add-staff', 'save')->name('saveStaff')->middleware('can:isAdmin');
        Route::get('auth/staffs/bulk-add-staffs', 'bulk_add_staffs')->name('bulkAddStaffs')->middleware('can:isAdmin');
        Route::post('auth/staffs/bulk-add-staffs', 'bulk_save_staffs')->name('bulkSaveStaffs')->middleware('can:isAdmin');
        Route::get('auth/staffs/{staff_id}', 'edit')->middleware('can:isAdmin');
        Route::put('auth/staffs/{staff_id}', 'update')->middleware('can:isAdmin');
        Route::get('auth/staffs/delete/{staff_id}', 'destroy')->middleware('can:isAdmin');
    });
    #STUDENTS
    Route::controller(StudentController::class)->group(function () {
        Route::get('auth/students', 'index')->name('students');
        Route::post('auth/students', 'filter_students_by_class')->name('filterStudentsByClass')->middleware('can:isAdmin');
        Route::get('auth/students/add-student', 'create')->name('addStudent')->middleware('can:isAdmin');
        Route::post('auth/students/add-student', 'save')->name('saveStudent')->middleware('can:isAdmin');
        Route::get('auth/students/bulk-add-students', 'bulk_add_students')->name('bulkAddstudents')->middleware('can:isAdmin');
        Route::post('auth/students/bulk-add-students', 'bulk_save_students')->name('bulkSaveStudents')->middleware('can:isAdmin');
        Route::get('auth/students/{student_id}', 'edit')->middleware('can:isAdmin');
        Route::put('auth/students/{student_id}', 'update')->middleware('can:isAdmin');
        Route::get('auth/students/delete/{student_id}', 'destroy')->middleware('can:isAdmin');
    });
    #ACADEMIC-YEARS
    Route::controller(AcademicYearController::class)->group(function () {
        Route::get('auth/years', 'index')->name('academicYears')->middleware('can:isAdmin');
        Route::get('auth/years/add-academic-year', 'create')->name('addAcademicYear')->middleware('can:isAdmin');
        Route::post('auth/years/add-academic-year', 'save')->name('saveAcademicYear')->middleware('can:isAdmin');
        Route::get('auth/years/{year_id}', 'edit')->middleware('can:isAdmin');
        Route::put('auth/years/{year_id}', 'update')->middleware('can:isAdmin');
        Route::get('auth/years/delete/{year_id}', 'destroy')->middleware('can:isAdmin');
    });
    #SEMESTERS
    Route::controller(SemesterController::class)->group(function () {
        Route::get('auth/semesters', 'index')->name('semesters')->middleware('can:isAdmin');
        Route::get('auth/semesters/add-semester', 'create')->name('addSemester')->middleware('can:isAdmin');
        Route::post('auth/semesters/add-semester', 'save')->name('saveSemester')->middleware('can:isAdmin');
        Route::get('auth/semesters/{semester_id}', 'edit')->middleware('can:isAdmin');
        Route::put('auth/semesters/{semester_id}', 'update')->middleware('can:isAdmin');
        Route::get('auth/semesters/delete/{semester_id}', 'destroy')->middleware('can:isAdmin');
    });
    #DEPARTMENTS
    Route::controller(DepartmentController::class)->group(function () {
        Route::get('auth/departments', 'index')->name('departments')->middleware('can:isAdmin');
        Route::get('auth/departments/add-department', 'create')->name('addDepartment')->middleware('can:isAdmin');
        Route::post('auth/departments/add-department', 'save')->name('saveDepartment')->middleware('can:isAdmin');
        Route::get('auth/departments/{dept_id}', 'edit')->middleware('can:isAdmin');
        Route::put('auth/departments/{dept_id}', 'update')->middleware('can:isAdmin');
        Route::get('auth/departments/delete/{dept_id}', 'destroy')->middleware('can:isAdmin');
    });
    #PROGRAMMES
    Route::controller(ProgrammeController::class)->group(function () {
        Route::get('auth/programmes', 'index')->name('programmes')->middleware('can:isAdmin');
        Route::get('auth/programmes/add-programme', 'create')->name('addProgramme')->middleware('can:isAdmin');
        Route::post('auth/programmes/add-programme', 'save')->name('saveProgramme')->middleware('can:isAdmin');
        Route::get('auth/programmes/{programme_id}', 'edit')->middleware('can:isAdmin');
        Route::put('auth/programmes/{programme_id}', 'update')->middleware('can:isAdmin');
        Route::get('auth/programmes/delete/{programme_id}', 'destroy')->middleware('can:isAdmin');
    });
    #COLLAGES
    Route::controller(CollageController::class)->group(function () {
        Route::get('auth/collages', 'index')->name('collages')->middleware('can:isAdmin');
        Route::get('auth/collages/add-collage', 'create')->name('addCollage')->middleware('can:isAdmin');
        Route::post('auth/collages/add-collage', 'save')->name('saveCollage')->middleware('can:isAdmin');
        Route::get('auth/collages/{collage_id}', 'edit')->middleware('can:isAdmin');
        Route::put('auth/collages/{collage_id}', 'update')->middleware('can:isAdmin');
        Route::get('auth/collages/delete/{collage_id}', 'destroy')->middleware('can:isAdmin');
    });
    #CLASSES
    Route::controller(ClassController::class)->group(function () {
        Route::get('auth/classes', 'index')->name('classes');
        Route::get('auth/classes/view/{class_id}', 'view_class_students')->middleware('can:isAdmin');
        Route::get('auth/classes/add-class', 'create')->name('addClass')->middleware('can:isAdmin');
        Route::post('auth/classes/add-class', 'save')->name('saveClass')->middleware('can:isAdmin');
        Route::get('auth/classes/{class_id}', 'edit')->middleware('can:isAdmin');
        Route::put('auth/classes/{class_id}', 'update')->middleware('can:isAdmin');
        Route::get('auth/classes/delete/{class_id}', 'destroy')->middleware('can:isAdmin');
    });
    #COURSES
    Route::controller(CourseController::class)->group(function () {
        Route::get('auth/courses', 'index')->name('courses');
        Route::get('auth/courses/add-course', 'create')->name('addCourse')->middleware('can:isAdmin');
        Route::get('auth/courses/bulk-add-courses', 'bulk_add_courses')->name('bulkAddCourses')->middleware('can:isAdmin');
        Route::post('auth/courses/bulk-add-courses', 'bulk_save_courses')->name('bulkSaveCourses')->middleware('can:isAdmin');
        Route::post('auth/courses/add-course', 'save')->name('saveCourse')->middleware('can:isAdmin');
        Route::get('auth/courses/{course_id}', 'edit')->middleware('can:isAdmin');
        Route::put('auth/courses/{course_id}', 'update')->middleware('can:isAdmin');
        Route::get('auth/courses/delete/{course_id}', 'destroy')->middleware('can:isAdmin');
    });
    #CLASS-COURSES
    Route::controller(ClassCourseController::class)->group(function () {
        Route::get('auth/class-courses', 'index')->name('classCourses')->middleware('can:isAdmin');
        Route::get('auth/add-class-courses', 'create')->name('addClassCourses')->middleware('can:isAdmin');
        Route::post('auth/add-class-courses', 'save')->name('saveClassCourses')->middleware('can:isAdmin');
        Route::get('auth/bulk-add-class-courses', 'bulk_add_class_courses')->name('bulkAddClassCourses')->middleware('can:isAdmin');
        Route::post('auth/bulk-add-class-courses', 'bulk_save_class_courses')->name('bulkSaveClassCourses')->middleware('can:isAdmin');
        Route::get('auth/class-courses/remove/{course}/{class}', 'destroy');
    });
    #LECTURER_COURSES
    Route::controller(LecturerCourseController::class)->group(function () {
        Route::get('auth/lecturer-courses', 'index')->name('lecturerCourses');
        Route::get('auth/add-lecturer-courses', 'create')->name('addLecturerCourses')->middleware('can:isAdmin');
        Route::post('auth/add-lecturer-courses', 'save')->name('saveLecturerCourses')->middleware('can:isAdmin');
        Route::get('auth/lecturer-courses/remove/{course}/{lecturer}', 'destroy');
    });
    #GRADES
    Route::controller(GradeController::class)->group(function () {
        Route::get('auth/grades', 'index')->name('grades')->middleware('can:isAdmin');
        Route::get('auth/grades/add-grade', 'create')->name('addGrade')->middleware('can:isAdmin');
        Route::post('auth/grades/add-grade', 'save')->name('saveGrade')->middleware('can:isAdmin');
        Route::get('auth/grades/{grade_id}', 'edit')->middleware('can:isAdmin');
        Route::put('auth/grades/{grade_id}', 'update')->middleware('can:isAdmin');
        Route::get('auth/grades/delete/{grade_id}', 'destroy')->middleware('can:isAdmin');
    });
    #EXAM-TYPES
    Route::controller(ExamTypeController::class)->group(function () {
        Route::get('auth/exam-types', 'index')->name('examTypes')->middleware('can:isAdmin');
        Route::get('auth/exam-types/add-exam-type', 'create')->name('addExamType')->middleware('can:isAdmin');
        Route::post('auth/exam-types/add-exam-type', 'save')->name('saveExamType')->middleware('can:isAdmin');
        Route::get('auth/exam-type/{exam_type_id}', 'edit')->middleware('can:isAdmin');
        Route::put('auth/exam-type/{exam_type_id}', 'update')->middleware('can:isAdmin');
        Route::get('auth/exam-type/delete/{exam_type_id}', 'destroy')->middleware('can:isAdmin');
    });
    #EXAMINATION-DEFINITIONS
    Route::controller(ExaminationController::class)->group(function () {
        Route::get('auth/examinations', 'index')->name('examinations');
        Route::get('auth/examinations/add-examination', 'create')->name('addExamination');
        Route::post('auth/examinations/add-examination', 'save')->name('saveExamination');
        Route::get('auth/examinations/class-exam/{exam_id}', 'exam_classes_list');
    });
    #EXAMINATION-MARKS
    Route::controller(MarkController::class)->group(function () {
        Route::get('auth/examinations/classes-exam/{exam_id}', 'exam_classes_list');
        Route::get('auth/examinations/classes/marks-exam/{class_id}', 'class_students_marks');
        Route::put('auth/examinations/classes/marks/{class_id}', 'save_class_students_marks');
    });
    #LOGOUT
    Route::get('auth/logout', [AdminController::class, 'logout'])->name('logout');
});