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
    ExaminationController
    
};

#AUTHENTICATION
Route::controller(AdminController::class)->group(function () {
    #STAFFS
    Route::get('/', 'get_login')->name('getLogin');
    Route::post('/', 'post_login')->name('postLogin');
    #STUDENTS
    Route::get('/student', 'student_get_login')->name('studentGetLogin');
    Route::post('/student', 'student_post_login')->name('postPostLogin');
});
Route::group(['middleware' => ['admin_auth']], function () {
    #DASHBOARD
    Route::get('/auth/dashboard',[UserController::class, 'dashboard'])->name('dashboard');
    #PROFILE
    Route::get('/auth/profile/{staff_id}',[UserController::class, 'profile']);
    Route::put('/auth/profile/{staff_id}', [UserController::class,'profile_update']);
    #LECTURERS
    Route::controller(UserController::class)->group(function () {
        Route::get('auth/staffs', 'index')->name('staffs');
        Route::get('auth/staffs/add-staff', 'create')->name('addStaff');
        Route::post('auth/staffs/add-staff', 'save')->name('saveStaff');
        Route::get('auth/staffs/{staff_id}', 'edit');
        Route::put('auth/staffs/{staff_id}', 'update');
        Route::get('auth/staffs/delete/{staff_id}', 'destroy');
    });
    #STUDENTS
    Route::controller(StudentController::class)->group(function () {
        Route::get('auth/students', 'index')->name('students');
        Route::post('auth/students', 'filter_students_by_class')->name('filterStudentsByClass');
        Route::get('auth/students/add-student', 'create')->name('addStudent');
        Route::post('auth/students/add-student', 'save')->name('saveStudent');
        Route::get('auth/students/{student_id}', 'edit');
        Route::put('auth/students/{student_id}', 'update');
        Route::get('auth/students/delete/{student_id}', 'destroy');
    });
    #ACADEMIC-YEARS
    Route::controller(AcademicYearController::class)->group(function () {
        Route::get('auth/years', 'index')->name('academicYears');
        Route::get('auth/years/add-academic-year', 'create')->name('addAcademicYear');
        Route::post('auth/years/add-academic-year', 'save')->name('saveAcademicYear');
        Route::get('auth/years/{year_id}', 'edit');
        Route::put('auth/years/{year_id}', 'update');
        Route::get('auth/years/delete/{year_id}', 'destroy');
    });
    #SEMESTERS
    Route::controller(SemesterController::class)->group(function () {
        Route::get('auth/semesters', 'index')->name('semesters');
        Route::get('auth/semesters/add-semester', 'create')->name('addSemester');
        Route::post('auth/semesters/add-semester', 'save')->name('saveSemester');
        Route::get('auth/semesters/{semester_id}', 'edit');
        Route::put('auth/semesters/{semester_id}', 'update');
        Route::get('auth/semesters/delete/{semester_id}', 'destroy');
    });
    #DEPARTMENTS
    Route::controller(DepartmentController::class)->group(function () {
        Route::get('auth/departments', 'index')->name('departments');
        Route::get('auth/departments/add-department', 'create')->name('addDepartment');
        Route::post('auth/departments/add-department', 'save')->name('saveDepartment');
        Route::get('auth/departments/{dept_id}', 'edit');
        Route::put('auth/departments/{dept_id}', 'update');
        Route::get('auth/departments/delete/{dept_id}', 'destroy');
    });
    #PROGRAMMES
    Route::controller(ProgrammeController::class)->group(function () {
        Route::get('auth/programmes', 'index')->name('programmes');
        Route::get('auth/programmes/add-programme', 'create')->name('addProgramme');
        Route::post('auth/programmes/add-programme', 'save')->name('saveProgramme');
        Route::get('auth/programmes/{programme_id}', 'edit');
        Route::put('auth/programmes/{programme_id}', 'update');
        Route::get('auth/programmes/delete/{programme_id}', 'destroy');
    });
    #COLLAGES
    Route::controller(CollageController::class)->group(function () {
        Route::get('auth/collages', 'index')->name('collages');
        Route::get('auth/collages/add-collage', 'create')->name('addCollage');
        Route::post('auth/collages/add-collage', 'save')->name('saveCollage');
        Route::get('auth/collages/{collage_id}', 'edit');
        Route::put('auth/collages/{collage_id}', 'update');
        Route::get('auth/collages/delete/{collage_id}', 'destroy');
        });
    #CLASSES
    Route::controller(ClassController::class)->group(function () {
        Route::get('auth/classes', 'index')->name('classes');
        Route::get('auth/classes/view/{class_id}', 'view_class_students');
        Route::get('auth/classes/add-class', 'create')->name('addClass');
        Route::post('auth/classes/add-class', 'save')->name('saveClass');
        Route::get('auth/classes/{class_id}', 'edit');
        Route::put('auth/classes/{class_id}', 'update');
        Route::get('auth/classes/delete/{class_id}', 'destroy');
        });
    #COURSES
    Route::controller(CourseController::class)->group(function () {
        Route::get('auth/courses', 'index')->name('courses');
        Route::get('auth/courses/add-course', 'create')->name('addCourse');
        Route::post('auth/courses/add-course', 'save')->name('saveCourse');
        Route::get('auth/courses/{course_id}', 'edit');
        Route::put('auth/courses/{course_id}', 'update');
        Route::get('auth/courses/delete/{course_id}', 'destroy');
        });
    #CLASS-COURSES
    Route::controller(ClassCourseController::class)->group(function () {
        Route::get('auth/class-courses', 'index')->name('classCourses');
        Route::get('auth/add-class-courses', 'create')->name('addClassCourses');
        Route::post('auth/add-class-courses', 'save')->name('saveClassCourses');
        // Route::get('auth/courses/{course_id}', 'edit');
        // Route::put('auth/courses/{course_id}', 'update');
        // Route::get('auth/courses/delete/{course_id}', 'destroy');
        });
    #LECTURER_COURSES
    Route::controller(LecturerCourseController::class)->group(function () {
        Route::get('auth/lecturer-courses', 'index')->name('lecturerCourses');
        Route::get('auth/add-lecturer-courses', 'create')->name('addLecturerCourses');
        Route::post('auth/add-lecturer-courses', 'save')->name('saveLecturerCourses');
        });
    #GRADES
    Route::controller(GradeController::class)->group(function () {
        Route::get('auth/grades', 'index')->name('grades');
        Route::get('auth/grades/add-grade', 'create')->name('addGrade');
        Route::post('auth/grades/add-grade', 'save')->name('saveGrade');
        Route::get('auth/grades/{grade_id}', 'edit');
        Route::put('auth/grades/{grade_id}', 'update');
        Route::get('auth/grades/delete/{grade_id}', 'destroy');
        });
    #EXAM-TYPES
    Route::controller(ExamTypeController::class)->group(function () {
        Route::get('auth/exam-types', 'index')->name('examTypes');
        Route::get('auth/exam-types/add-exam-type', 'create')->name('addExamType');
        Route::post('auth/exam-types/add-exam-type', 'save')->name('saveExamType');
        Route::get('auth/exam-type/{exam_type_id}', 'edit');
        Route::put('auth/exam-type/{exam_type_id}', 'update');
        Route::get('auth/exam-type/delete/{exam_type_id}', 'destroy');
        });
    #EXAMINATION-DEFINITIONS + MARKS
    Route::controller(ExaminationController::class)->group(function () {
        Route::get('auth/examinations', 'index')->name('examinations');
        Route::get('auth/examinations/add-examination', 'create')->name('addExamination');
        Route::post('auth/examinations/add-examination', 'save')->name('saveExamination');

        
        Route::get('auth/examinations/{exam_id}', 'classes_list');
        Route::get('auth/examinations/classes/marks/{class_id}', 'class_students_marks');
        Route::put('auth/examinations/classes/marks/{class_id}', 'save_class_students_marks');
        
        });
    #LOGOUT
    Route::get('auth/logout',[AdminController::class, 'logout'])->name('logout');
});

