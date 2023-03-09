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
    ClassPromotionController,
    LecturerCourseController,
    ExamTypeController,
    ExaminationController,
    ExaminationMarkController,
    StudentAuthController,
    TranscriptController,
    StudentTranscriptController,
    NotesFolderController,
    FileController
};

Route::group(['middleware' => ['admin_auth']], function () {
    #DASHBOARD
    Route::get('auth/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    #PROFILE
    Route::get('auth/profile/{staff_id}', [UserController::class, 'profile']);
    Route::put('auth/profile/{staff_id}', [UserController::class, 'profile_update']);
    #LOGOUT
    Route::get('auth/logout', [AdminController::class, 'logout'])->name('staffLogout');
    #LECTURERS
    Route::controller(UserController::class)->group(function () {
        Route::get('auth/staffs', 'index')->name('staffs')->middleware('can:isAdmin');
        Route::get('auth/staffs/profile/{staff_id}', 'staff_profile')->name('staffProfile')->middleware('can:isAdmin');
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
        Route::get('auth/students/add-student', 'create')->name('addStudent')->middleware('can:isAdmin');
        Route::post('auth/students/add-student', 'save')->name('saveStudent')->middleware('can:isAdmin');
        Route::get('auth/students/bulk-add-students', 'bulk_add_students')->name('bulkAddstudents')->middleware('can:isAdmin');
        Route::post('auth/students/bulk-add-students', 'bulk_save_students')->name('bulkSaveStudents')->middleware('can:isAdmin');
        Route::get('auth/students/{student_id}', 'edit')->middleware('can:isAdmin');
        Route::put('auth/students/{student_id}', 'update')->middleware('can:isAdmin');
        Route::get('auth/students/delete/{student_id}', 'destroy')->middleware('can:isAdmin');
        Route::get('auth/students/restore-password/{student_id}', 'reset_password')->name('restorePassword')->middleware('can:isAdmin');

        
    });
    #ACADEMIC-YEARS
    Route::controller(AcademicYearController::class)->group(function () {
        Route::get('auth/years', 'index')->name('academicYears')->middleware('can:isAdmin');
        Route::get('auth/years/add-academic-year', 'create')->name('addAcademicYear')->middleware('can:isAdmin');
        Route::post('auth/years/add-academic-year', 'save')->name('saveAcademicYear')->middleware('can:isAdmin');
        Route::get('auth/years/{year_id}', 'edit')->name('editAcademicYear')->middleware('can:isAdmin');
        Route::put('auth/years/{year_id}', 'update')->name('updateAcademicYear')->middleware('can:isAdmin');
        Route::get('auth/years/deactivate/{year_id}', 'deactivate')->name('deactivateAcademicYear');
        Route::get('auth/archives/years', 'deactivated_academic_years')->name('getDeactivatedAcademicYears')->middleware('can:isAdmin');
        Route::get('auth/archives/years/{year_id}', 'restore_academic_year')->name('restoreAcademicYear')->middleware('can:isAdmin');
        Route::get('auth/archives/years/delete/{year_id}', 'destory')->name('deleteAcademicYear');

    });
    #SEMESTERS
    Route::controller(SemesterController::class)->group(function () {
        Route::get('auth/semesters', 'index')->name('semesters')->middleware('can:isAdmin');
        Route::get('auth/semesters/add-semester', 'create')->name('addSemester')->middleware('can:isAdmin');
        Route::post('auth/semesters/add-semester', 'save')->name('saveSemester')->middleware('can:isAdmin');
        Route::get('auth/semesters/{semester_id}', 'edit')->name('editSemester')->middleware('can:isAdmin');
        Route::put('auth/semesters/{semester_id}', 'update')->name('updateSemester')->middleware('can:isAdmin');
        Route::get('auth/semesters/deactivate/{semester_id}', 'deactivate')->name('deactivateSemester')->middleware('can:isAdmin');
        Route::get('auth/archives/semesters', 'deactivated_semesters')->name('getDeactivatedSemesters')->middleware('can:isAdmin');
        Route::get('auth/archives/semesters/{semester_id}', 'restore_semesters')->name('restoreSemesters')->middleware('can:isAdmin');
        Route::get('auth/archives/semesters/delete/{year_id}', 'destroy')->name('deleteSemester');
    
    });
    #DEPARTMENTS
    Route::controller(DepartmentController::class)->group(function () {
        Route::get('auth/departments', 'index')->name('departments')->middleware('can:isAdmin');
        Route::get('auth/departments/add-department', 'create')->name('addDepartment')->middleware('can:isAdmin');
        Route::post('auth/departments/add-department', 'save')->name('saveDepartment')->middleware('can:isAdmin');
        Route::get('auth/departments/{dept_id}', 'edit')->name('editDepartment')->middleware('can:isAdmin');
        Route::put('auth/departments/{dept_id}', 'update')->name('updateDepartment')->middleware('can:isAdmin');
        Route::get('auth/departments/delete/{dept_id}', 'destroy')->name('deleteDepartment')->middleware('can:isAdmin');
    });
    #PROGRAMMES
    Route::controller(ProgrammeController::class)->group(function () {
        Route::get('auth/programmes', 'index')->name('programmes')->middleware('can:isAdmin');
        Route::get('auth/programmes/add-programme', 'create')->name('addProgramme')->middleware('can:isAdmin');
        Route::post('auth/programmes/add-programme', 'save')->name('saveProgramme')->middleware('can:isAdmin');
        Route::get('auth/programmes/{programme_id}', 'edit')->name('editProgramme')->middleware('can:isAdmin');
        Route::put('auth/programmes/{programme_id}', 'update')->name('updateProgramme')->middleware('can:isAdmin');
        Route::get('auth/programmes/delete/{programme_id}', 'destroy')->name('deleteProgramme')->middleware('can:isAdmin');
    });
    #COLLAGES
    Route::controller(CollageController::class)->group(function () {
        Route::get('auth/collages', 'index')->name('collages')->middleware('can:isAdmin');
        Route::get('auth/collages/add-collage', 'create')->name('addCollage')->middleware('can:isAdmin');
        Route::post('auth/collages/add-collage', 'save')->name('saveCollage')->middleware('can:isAdmin');
        Route::get('auth/collages/{collage_id}', 'edit')->name('editCollage')->middleware('can:isAdmin');
        Route::put('auth/collages/{collage_id}', 'update')->name('updateCollage')->middleware('can:isAdmin');
        Route::get('auth/collages/delete/{collage_id}', 'destroy')->name('deleteCollage')->middleware('can:isAdmin');
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
     #CLASS-PROMOTION
     Route::controller(ClassPromotionController::class)->group(function () {
        Route::get('auth/promotion', 'create')->name('classPromotion');
        Route::post('auth/promotion', 'save')->name('saveClassPromotion');
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
    #LECTURER-COURSES
    Route::controller(LecturerCourseController::class)->group(function () {
        Route::get('auth/lecturer-courses', 'index')->name('lecturerCourses');
        Route::get('auth/add-lecturer-courses', 'create')->name('addLecturerCourses')->middleware('can:isAdmin');
        Route::post('auth/add-lecturer-courses', 'save')->name('saveLecturerCourses')->middleware('can:isAdmin');
        Route::get('auth/lecturer-courses/remove/{course}/{lecturer}', 'destroy');
    });
    #GRADES
    Route::controller(GradeController::class)->group(function () {
        Route::get('auth/grades', 'index')->name('grades')->middleware('can:isAdmin');
        Route::get('auth/grades/add-new-grade', 'create')->name('addGrade')->middleware('can:isAdmin');
        Route::post('auth/grades/add-new-grade', 'save')->name('saveGrade')->middleware('can:isAdmin');
        Route::get('auth/grades/{grade_id}', 'edit')->name('editGrade')->middleware('can:isAdmin');
        Route::put('auth/grades/{grade_id}', 'update')->name('updateGrade')->middleware('can:isAdmin');
        Route::get('auth/grades/delete/{grade_id}', 'destroy')->name('deleteGrade')->middleware('can:isAdmin');
    });
    #EXAM-TYPES
    Route::controller(ExamTypeController::class)->group(function () {
        Route::get('auth/exam-types', 'index')->name('examTypes')->middleware('can:isAdmin');
        Route::get('auth/exam-types/add-exam-type', 'create')->name('addExamType')->middleware('can:isAdmin');
        Route::post('auth/exam-types/add-exam-type', 'save')->name('saveExamType')->middleware('can:isAdmin');
        Route::get('auth/exam-type/{exam_type_id}', 'edit')->middleware('can:isAdmin');
        Route::put('auth/exam-type/{exam_type_id}', 'update')->middleware('can:isAdmin');
        Route::get('auth/exam-type/deactivate/{exam_type_id}', 'deactivate')->middleware('can:isAdmin');
    });
    #EXAMINATION-DEFINITIONS 
    Route::controller(ExaminationController::class)->group(function () {
        Route::get('auth/examinations', 'index')->name('examinations');
        Route::get('auth/examinations/add-examination', 'create')->name('addExamination')->middleware('can:isAdmin');
        Route::post('auth/examinations/add-examination', 'save')->name('saveExamination')->middleware('can:isAdmin');
        Route::get('auth/examinations/{exam_type_id}', 'edit')->name('editExamination')->middleware('can:isAdmin');
        Route::put('auth/examinations/{exam_type_id}', 'update')->name('updateExamination')->middleware('can:isAdmin');
        Route::get('auth/examinations/class-exam/{exam_id}', 'exam_classes_list')->middleware('can:isAdmin');
        Route::get('auth/archives/examinations', 'deactivated_examinations')->name('deactivatedExaminations');
        Route::get('auth/archives/examinations/{exam_id}', 'deactivate_examination')->name('deactivateExamination')->middleware('can:isAdmin');
        Route::get('auth/archives/examinations/activate/{exam_id}', 'restore_examination')->name('restoreExamination')->middleware('can:isAdmin');
        Route::get('auth/archives/examinations/delete/{exam_id}', 'destroy')->name('deleteExamination')->middleware('can:isAdmin');
    });
    #EXAMINATION-MARKS
    Route::controller(ExaminationMarkController::class)->group(function () {
        Route::get('auth/examinations/mark/examination/', 'select_academic_year')->name('markExamination');
        Route::post('auth/examinations/fetch-examination/{year_id}', 'fetch_examinations');
        Route::post('auth/examinations/post_exam_mark', 'post_exam_mark');
        Route::post('auth/examinations/fetch-classes', 'fetch_classes')->name('fetchClasses');
        Route::get('auth/examinations/classes/marks-exam/{class_id}/{exam_id}', 'scores_based_on_student_class');
        Route::get('auth/examinations/class/{exam_id}/{student_id}', 'preview_student_scores_base_on_exam')->name('previewResults')->middleware('can:isAdmin'); # based on current marking exam
        Route::get('auth/examinations/classes/marks', 'bulk_add_students_scores')->name('bulkStudentsScores');
        Route::post('auth/examinations/classes/marks', 'bulk_save_students_scores')->name('bulkSaveStudentsScores');
        Route::get('auth/examinations/publish/{exam_id}', 'publish_examination_results')->name('publishExaminationResults')->middleware('can:isAdmin');
        Route::get('auth/examinations/publish/generate-pdf{exam_id}', 'publish_examination_results_pdf')->name('sendResultsPDF')->middleware('can:isAdmin');

    });
    #TRANSCRIPT
    Route::controller(TranscriptController::class)->group(function () {
        Route::get('auth/transcripts/classes', 'index')->name('transcripts');
        Route::get('auth/transcripts/classes/{class_id}', 'select_class_to_view_transcripts')->middleware('can:isAdmin');
        Route::get('auth/transcripts/class/{student_id}', 'student_transcript')->name('studentTranscript'); 
        // Route::get('auth/provisional-results/{student_id}', 'generate_pdf_results')->name('studentPDFResults');
    });
     #FOLDERS
     Route::controller(NotesFolderController::class)->group(function () {
        Route::get('auth/folders', 'index')->name('notesFolders');
        Route::get('auth/folders/add-folder', 'create')->name('addFolder')->middleware('can:isAdmin'); 
        Route::get('auth/folders/add-file', 'createFolderFiles')->name('addFolderFile'); 
    });
    #FILES
    Route::controller(FileController::class)->group(function () {
        Route::get('auth/notes/files', 'index')->name('files');
    });
});
#STAFFS-AUTHENTICATION
Route::controller(AdminController::class)->group(function () {
    Route::get('/', 'get_login')->name('getLogin');
    Route::post('/', 'post_login')->name('postLogin');
    Route::get('/forgot-password', 'get_forgot_password')->name('getForgotPassword');
    Route::post('/forgot-password', 'post_forgot_password')->name('postForgotPassword');
    Route::get('/reset-password/{token}', 'reset_password')->name('resetPassword');
    Route::put('/update-password', 'update_password')->name('updatePassword');
});
#STUDENT
Route::group(['middleware' => ['student_auth']], function () {
    Route::controller(StudentAuthController::class)->group(function () {
        #DASHBOARD
        Route::get('/student/dashboard', 'dashboard')->name('studentDashboard');
        #PROFILE
        Route::get('/student/profile/{staff_id}', 'student_profile');
        Route::put('/student/profile/{student_id}', 'profile_update');

    #TRANSCRIPT
    Route::controller(StudentTranscriptController::class)->group(function () {
        Route::get('student/provisional-results', 'provisional_results')->name('studentProvisionalResults');

    });
});
});
#STUDENTS-AUTHENTICATION
Route::controller(StudentAuthController::class)->group(function () {
    Route::get('/student', 'get_login')->name('studentGetLogin');
    Route::post('/student', 'post_login')->name('studentPostLogin');
    Route::get('/student/forgot-password', 'get_forgot_password')->name('studentGetForgotPassword');
    Route::post('/student/forgot-password', 'post_forgot_password')->name('studentPostForgotPassword');
    Route::get('/student/reset-password/{token}', 'reset_password')->name('studentResetPassword');
    Route::put('/student/update-password', 'update_password')->name('studentUpdatePassword');
    Route::get('/student/logout', 'logout')->name('studentLogout');

    Route::get('student/evaluations', 'evaluations')->name('evaluations');
});
