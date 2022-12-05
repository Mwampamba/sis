<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{
    AdminController,
    UserController,
    AcademicYearController,
    DepartmentController,
    ProgrammeController,
    CollageController,
    SemesterController,
    CourseController,
    GradeController,
    ClassController,
    ClassCourseController
    
};

#AUTHENTICATION
Route::get('/', [AdminController::class, 'get_login'])->name('getLogin');
Route::post('/', [AdminController::class, 'post_login'])->name('postLogin');

Route::group(['middleware' => ['admin_auth']], function () {
    #DASHBOARD
    Route::get('/auth/dashboard',[UserController::class, 'dashboard'])->name('dashboard');
    #LECTURERS
    Route::controller(UserController::class)->group(function () {
        Route::get('auth/staffs', 'index')->name('staffs');
        Route::get('auth/staffs/add-staff', 'create')->name('addStaff');
        Route::post('auth/staffs/add-staff', 'save')->name('saveStaff');
        Route::get('auth/staffs/{staff_id}', 'edit');
        Route::put('auth/staffs/{staff_id}', 'update');
        Route::get('auth/staffs/delete/{staff_id}', 'destroy');
    });
    #ACADEMICYEARS
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
    #CLASS_COURSES
    Route::controller(ClassCourseController::class)->group(function () {
        Route::get('auth/class-courses', 'index')->name('classCourses');
        Route::get('auth/add-class-courses', 'create')->name('addClassCourses');
        Route::post('auth/add-class-courses', 'save')->name('saveClassCourses');
        // Route::get('auth/courses/{course_id}', 'edit');
        // Route::put('auth/courses/{course_id}', 'update');
        // Route::get('auth/courses/delete/{course_id}', 'destroy');
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
    #LOGOUT
    Route::get('auth/logout',[AdminController::class, 'logout'])->name('logout');
});

