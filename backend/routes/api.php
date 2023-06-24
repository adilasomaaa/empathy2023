<?php
use App\Http\Controllers\AcademicAdvisorsController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\ActivityParticipantsController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AlumniTraceController;
use App\Http\Controllers\AnnotationController;
use App\Http\Controllers\AnnotationListController;
use App\Http\Controllers\AnnotationTemplateController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BachelorDegreeController;
use App\Http\Controllers\BachelorDegreeDecreeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookPersonnelController;
use App\Http\Controllers\BuktiKegiatanController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\CommitteeMembersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepartmentOfficerController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentItemController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\ExaminerController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\FacultyOfficerController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\RegFileListController;
use App\Http\Controllers\RegFileTemplateController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudyProgramsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GradingListController;
use App\Http\Controllers\GradingTemplateController;
use App\Http\Controllers\LastStageRegistrationController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\RegistrationPeriodController;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\SeminarDecreeController;
use App\Http\Controllers\StudentHistorieController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PemilikBuktiController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\ResearchAndServiceController;
use App\Http\Controllers\RunningTextController;
use App\Http\Controllers\ScientificSeminarController;
use App\Http\Controllers\ScientificSeminarPersonnelController;
use App\Http\Controllers\ScientificWorkController;
use App\Http\Controllers\ThesisController;
use App\Http\Controllers\ThesisTopicController;
use App\Http\Controllers\StudentRegFileController;
use App\Http\Controllers\ThesisConsultingChatController;
use App\Http\Controllers\ThesisConsultingController;
use App\Http\Controllers\ThesisGuideController;
use App\Http\Controllers\ThesisGuideDecreeController;
use App\Http\Controllers\TimelineController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     // return $request->user()->with('permissions');
//     // return User::with(['roles','permissions'])->find($request->user()->id);
// });

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/auth', [AuthController::class, 'getUser']);
    Route::get('/auth-ability', [AuthController::class, 'getAbility']);
    Route::get('/auth-role', [AuthController::class, 'getRole']);
    Route::get('/permissions', [AuthController::class, 'getAllPermissions']);
});
Route::prefix('/dashboard')->group(function () {
    Route::get('/coba', [DashboardController::class, 'coba']);
    Route::get('/personnel', [DashboardController::class, 'personnel']);
    Route::get('/student', [DashboardController::class, 'student']);
    Route::get('/alumni', [DashboardController::class, 'alumni']);
    Route::get('/dokumen', [DashboardController::class, 'dokumen']);
});

Route::prefix('/faculty')->group(function () {
    Route::get('', [FacultyController::class, 'index'])->name('faculty.index');
    Route::post('/create', [FacultyController::class, 'store'])->name('faculty.store');
    Route::delete('/multi-delete', [FacultyController::class, 'multiDestroy'])->name('faculty.multiDestroy');
    Route::get('/{faculty}', [FacultyController::class, 'show'])->name('faculty.show');
    Route::put('/edit/{faculty}', [FacultyController::class, 'update'])->name('faculty.update');
    Route::delete('/delete/{faculty}', [FacultyController::class, 'destroy'])->name('faculty.delete');
});

Route::prefix('/department')->group(function () {
    Route::get('', [DepartmentController::class, 'index'])->name('department.index');
    Route::post('/create', [DepartmentController::class, 'store'])->name('department.store');
    Route::delete('/multi-delete', [DepartmentController::class, 'multiDestroy'])->name('department.multiDestroy');
    Route::get('/{department}', [DepartmentController::class, 'show'])->name('department.show');
    Route::patch('/edit/{department}', [DepartmentController::class, 'update'])->name('department.update');
    Route::delete('/delete/{department}', [DepartmentController::class, 'destroy'])->name('department.delete');
});

Route::prefix('/personnel')->group(function () {
    Route::get('', [PersonnelController::class, 'index'])->name('personnel.index');
    Route::get('testing', [PersonnelController::class, 'testing']);
    Route::get('/byStatus', [PersonnelController::class, 'byStatus']);
    Route::post('/import', [PersonnelController::class, 'importExcel'])->name('personnel.importExcel');
    Route::get('/get-user/{user}', [PersonnelController::class, 'getUser'])->name('personnel.getUser');
    Route::get('/personnelCount', [PersonnelController::class, 'personnelCount'])->name('personnel.personnelCount');
    Route::post('/create', [PersonnelController::class, 'store'])->name('personnel.store');
    Route::delete('/multi-delete', [PersonnelController::class, 'multiDestroy'])->name('personnel.multiDestroy');
    Route::get('/{personnel}', [PersonnelController::class, 'show'])->name('personnel.show');
    Route::patch('/edit/{personnel}', [PersonnelController::class, 'update'])->name('personnel.update');
    Route::get('/byDepartment/{department}', [PersonnelController::class, 'byDepartment'])->name('personnel.byDepartment');
    Route::post('/edit-access/{personnel}', [PersonnelController::class, 'updateAccess'])->name('personnel.update.access');
    Route::delete('/delete/{personnel}', [PersonnelController::class, 'destroy'])->name('personnel.delete');
});

Route::prefix('/department_officer')->group(function () {
    Route::get('', [DepartmentOfficerController::class, 'index'])->name('department_officer.index');
    Route::post('/create', [DepartmentOfficerController::class, 'store'])->name('department_officer.store');
    Route::delete('/multi-delete', [DepartmentOfficerController::class, 'multiDestroy'])->name('department_officer.multiDestroy');
    Route::get('/{department_officer}', [DepartmentOfficerController::class, 'show'])->name('department_officer.show');
    Route::patch('/edit/{department_officer}', [DepartmentOfficerController::class, 'update'])->name('department_officer.update');
    Route::delete('/delete/{department_officer}', [DepartmentOfficerController::class, 'destroy'])->name('department_officer.delete');
});

Route::prefix('/reg_file_template')->group(function () {
    Route::get('', [RegFileTemplateController::class, 'index'])->name('reg_file_template.index');
    Route::get('/byDepartment/{department}', [RegFileTemplateController::class, 'byDepartment'])->name('reg_file_template.byDepartment');
    Route::post('/create', [RegFileTemplateController::class, 'store'])->name('reg_file_template.store');
    Route::delete('/multi-delete', [RegFileTemplateController::class, 'multiDestroy'])->name('reg_file_template.multiDestroy');
    Route::get('/{reg_file_template}', [RegFileTemplateController::class, 'show'])->name('reg_file_template.show');
    Route::patch('/edit/{reg_file_template}', [RegFileTemplateController::class, 'update'])->name('reg_file_template.update');
    Route::delete('/delete/{reg_file_template}', [RegFileTemplateController::class, 'destroy'])->name('reg_file_template.delete');
});

Route::prefix('/study_programs')->group(function () {
    Route::get('', [StudyProgramsController::class, 'index'])->name('study_programs.index');
    Route::get('/byDepartment/{department}', [StudyProgramsController::class, 'byDepartment'])->name('study_programs.byDepartment');
    Route::post('/create', [StudyProgramsController::class, 'store'])->name('study_programs.store');
    Route::delete('/multi-delete', [StudyProgramsController::class, 'multiDestroy'])->name('study_programs.multiDestroy');
    Route::get('/{study_programs}', [StudyProgramsController::class, 'show'])->name('study_programs.show');
    Route::patch('/edit/{study_programs}', [StudyProgramsController::class, 'update'])->name('study_programs.update');
    Route::delete('/delete/{study_programs}', [StudyProgramsController::class, 'destroy'])->name('study_programs.delete');
});


Route::prefix('/student')->group(function () {
    Route::get('', [StudentController::class, 'index']);
    Route::get('/studentCount', [StudentController::class, 'studentCount']);
    Route::post('/import', [StudentController::class, 'importExcel']);
    Route::post('/create', [StudentController::class, 'store']);
    Route::get('/studentCountbyDepaertment/{department}', [StudentController::class, 'studentCountbyDepaertment']);
    Route::get('/byDepartment/{department}', [StudentController::class, 'byDepartment']);
    Route::get('/get-user/{user}', [StudentController::class, 'getUser']);
    Route::delete('/multi-delete', [StudentController::class, 'multiDestroy']);
    Route::get('/{student}', [StudentController::class, 'show']);
    Route::patch('/edit/{student}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/delete/{student}', [StudentController::class, 'destroy'])->name('student.delete');
});


Route::prefix('/document_type')->group(function () {
    Route::get('', [DocumentTypeController::class, 'index'])->name('document_type.index');
    Route::post('/create', [DocumentTypeController::class, 'store'])->name('document_type.store');
    Route::post('/multi-destroy', [DocumentTypeController::class, 'multiDestroy'])->name('document_type.multiDestroy');
    Route::get('/{document_type}', [DocumentTypeController::class, 'show'])->name('document_type.show');
    Route::patch('/edit/{document_type}', [DocumentTypeController::class, 'update'])->name('document_type.update');
    Route::delete('/delete/{document_type}', [DocumentTypeController::class, 'destroy'])->name('document_type.delete');
});


Route::prefix('/reg_file_list')->group(function () {
    Route::get('', [RegFileListController::class, 'index'])->name('reg_file_list.index');
    Route::post('/create', [RegFileListController::class, 'store'])->name('reg_file_list.store');
    Route::delete('/multi-delete', [RegFileListController::class, 'multiDestroy'])->name('reg_file_list.multiDestroy');
    Route::get('/{reg_file_list}', [RegFileListController::class, 'show'])->name('reg_file_list.show');
    Route::patch('/edit/{reg_file_list}', [RegFileListController::class, 'update'])->name('reg_file_list.update');
    Route::delete('/delete/{reg_file_list}', [RegFileListController::class, 'destroy'])->name('reg_file_list.delete');
});


Route::prefix('/document_item')->group(function () {
    Route::get('', [DocumentItemController::class, 'index'])->name('document_item.index');
    Route::get('/byType/{document_type}', [DocumentItemController::class, 'byType'])->name('document_item.byType');
    Route::post('/create', [DocumentItemController::class, 'store'])->name('document_item.store');
    Route::delete('/multi-delete', [DocumentItemController::class, 'multiDestroy'])->name('document_item.multiDestroy');
    Route::get('/{document_item}', [DocumentItemController::class, 'show'])->name('document_item.show');
    Route::patch('/edit/{document_item}', [DocumentItemController::class, 'update'])->name('document_item.update');
    Route::delete('/delete/{document_item}', [DocumentItemController::class, 'destroy'])->name('document_item.delete');
});

Route::prefix('/faculty_officer')->group(function () {
    Route::get('', [FacultyOfficerController::class, 'index'])->name('faculty_officer.index');
    Route::post('/create', [FacultyOfficerController::class, 'store'])->name('faculty_officer.store');
    Route::delete('/multi-delete', [FacultyOfficerController::class, 'multiDestroy'])->name('faculty_officer.multiDestroy');
    Route::get('/{faculty_officer}', [FacultyOfficerController::class, 'show'])->name('faculty_officer.show');
    Route::patch('/edit/{faculty_officer}', [FacultyOfficerController::class, 'update'])->name('faculty_officer.update');
    Route::delete('/delete/{faculty_officer}', [FacultyOfficerController::class, 'destroy'])->name('faculty_officer.delete');
});

Route::prefix('/academic_advisor')->group(function () {
    Route::post('/create', [AcademicAdvisorsController::class, 'store'])->name('academic_advisor.store');
    Route::get('/{academic_advisor}', [AcademicAdvisorsController::class, 'show'])->name('academic_advisor.show');
    Route::patch('/edit/{academic_advisor}', [AcademicAdvisorsController::class, 'update'])->name('academic_advisor.update');
    Route::get('/by-department/{department:id}', [AcademicAdvisorsController::class, 'byDepartment'])->name('academic_advisor.byDepartment');
    Route::delete('/delete/{academic_advisor}', [AcademicAdvisorsController::class, 'destroy'])->name('academic_advisor.delete');
});

Route::prefix('/user')->group(function () {
    Route::get('', [UserController::class, 'index'])->name('user.index');
    Route::post('/create', [UserController::class, 'store'])->name('user.store');
    Route::delete('/multi-delete', [UserController::class, 'multiDestroy'])->name('user.multiDestroy');
    Route::get('/{user}', [UserController::class, 'show'])->name('user.show');
    Route::patch('/edit/{user}', [UserController::class, 'update'])->name('user.update');
    Route::put('/updateFoto/{user}', [UserController::class, 'updateFoto'])->name('user.updateFoto');

    Route::delete('/delete/{user}', [UserController::class, 'destroy'])->name('user.delete');
});

Route::prefix('/grading_list')->group(function () {
    Route::get('', [GradingListController::class, 'index'])->name('grading_list.index');
    Route::post('/create', [GradingListController::class, 'store'])->name('grading_list.store');
    Route::delete('/multi-delete', [GradingListController::class, 'multiDestroy'])->name('grading_list.multiDestroy');
    Route::get('/{grading_list}', [GradingListController::class, 'show'])->name('grading_list.show');
    Route::patch('/edit/{grading_list}', [GradingListController::class, 'update'])->name('grading_list.update');
    Route::delete('/delete/{grading_list}', [GradingListController::class, 'destroy'])->name('grading_list.delete');
});

Route::prefix('/grading_template')->group(function () {
    Route::get('', [GradingTemplateController::class, 'index'])->name('grading_template.index');
    Route::post('/create', [GradingTemplateController::class, 'store'])->name('grading_template.store');
    Route::delete('/multi-delete', [GradingTemplateController::class, 'multiDestroy'])->name('grading_template.multiDestroy');
    Route::get('/{grading_template}', [GradingTemplateController::class, 'show'])->name('grading_template.show');
    Route::get('/byDepartment/{department}', [GradingTemplateController::class, 'byDepartment'])->name('grading_template.byDepartment');
    Route::patch('/edit/{grading_template}', [GradingTemplateController::class, 'update'])->name('grading_template.update');
    Route::delete('/delete/{grading_template}', [GradingTemplateController::class, 'destroy'])->name('grading_template.delete');
});

Route::prefix('/annotation_list')->group(function () {
    Route::get('', [AnnotationListController::class, 'index'])->name('annotation_list.index');
    Route::post('/create', [AnnotationListController::class, 'store'])->name('annotation_list.store');
    Route::delete('/multi-delete', [AnnotationListController::class, 'multiDestroy'])->name('annotation_list.multiDestroy');
    Route::get('/{annotation_list}', [AnnotationListController::class, 'show'])->name('annotation_list.show');
    Route::patch('/edit/{annotation_list}', [AnnotationListController::class, 'update'])->name('annotation_list.update');
    Route::delete('/delete/{annotation_list}', [AnnotationListController::class, 'destroy'])->name('annotation_list.delete');
});

Route::prefix('/annotation_template')->group(function () {
    Route::get('', [AnnotationTemplateController::class, 'index'])->name('annotation_template.index');
    Route::post('/create', [AnnotationTemplateController::class, 'store'])->name('annotation_template.store');
    Route::delete('/multi-delete', [AnnotationTemplateController::class, 'multiDestroy'])->name('annotation_template.multiDestroy');
    Route::get('/{annotation_template}', [AnnotationTemplateController::class, 'show'])->name('annotation_template.show');
    Route::patch('/edit/{annotation_template}', [AnnotationTemplateController::class, 'update'])->name('annotation_template.update');
    Route::get('/byDepartment/{department}', [AnnotationTemplateController::class, 'byDepartment'])->name('annotation_template.byDepartment');
    Route::delete('/delete/{annotation_template}', [AnnotationTemplateController::class, 'destroy'])->name('annotation_template.delete');
});

Route::prefix('/registration_periode')->group(function () {
    Route::get('', [RegistrationPeriodController::class, 'index'])->name('registration_periode.index');
    Route::get('/landing/show', [RegistrationPeriodController::class, 'landingPage'])->name('registration_periode.landingPage');
    Route::post('/create', [RegistrationPeriodController::class, 'store'])->name('registration_periode.store');
    Route::delete('/multi-delete', [RegistrationPeriodController::class, 'multiDestroy'])->name('registration_periode.multiDestroy');
    Route::get('/{registration_periode}', [RegistrationPeriodController::class, 'show'])->name('registration_periode.show');
    Route::patch('/edit/{registration_periode}', [RegistrationPeriodController::class, 'update'])->name('registration_periode.update');
    Route::get('/byCommittee/{committee}', [RegistrationPeriodController::class, 'byCommittee'])->name('registration_periode.byCommittee');
    Route::get('/registration_open/{department}', [RegistrationPeriodController::class, 'registration_open'])->name('registration_periode.registration_open');
    Route::get('/byDepartment/{department}', [RegistrationPeriodController::class, 'byDepartment'])->name('registration_periode.byDepartment');
    Route::delete('/delete/{registration_periode}', [RegistrationPeriodController::class, 'destroy'])->name('registration_periode.delete');
});

Route::prefix('/thesis_topic')->group(function () {
    Route::get('', [ThesisTopicController::class, 'index'])->name('thesis_topic.index');
    Route::get('cekKesamaan', [ThesisTopicController::class, 'cekKesamaan'])->name('thesis_topic.cekKesamaan');
    Route::post('/create', [ThesisTopicController::class, 'store'])->name('thesis_topic.store');
    Route::post('/testing', [ThesisTopicController::class, 'testing'])->name('thesis_topic.store');
    Route::delete('/multi-delete', [ThesisTopicController::class, 'multiDestroy'])->name('thesis_topic.multiDestroy');
    Route::get('/{thesis_topic}', [ThesisTopicController::class, 'show'])->name('thesis_topic.show');
    Route::patch('/edit/{thesis_topic}', [ThesisTopicController::class, 'update'])->name('thesis_topic.update');

    // var[1,0] 1=approve 0=reject
    Route::patch('/tindakan/{thesis_topic}/{var}', [ThesisTopicController::class, 'tindakan'])->name('thesis_topic.tindakan');
    Route::delete('/delete/{thesis_topic}', [ThesisTopicController::class, 'destroy'])->name('thesis_topic.delete');
});

Route::prefix('/thesis')->group(function () {
    Route::get('', [ThesisController::class, 'index']);
    Route::get('/testing', [ThesisController::class, 'testing']);
    Route::get('/byRegistrationApproved', [ThesisController::class, 'registrationapproved']);
    Route::get('/seminarExist', [ThesisController::class, 'seminarExist']);
    Route::get('/byStudent/{student}', [ThesisController::class, 'thesisByStudent']);
    Route::get('/buku_bimbingan/{thesis}', [ThesisController::class, 'buku_bimbingan']);
    Route::get('/ByDepartmen/{department}', [ThesisController::class, 'ByDepartmen']);
    Route::get('/ByDepartmenTrackStageApproved/{department}', [ThesisController::class, 'ByDepartmenTrackStage']);
    Route::get('/ByDepartmenTrackStudent/{department}', [ThesisController::class, 'ByDepartmenTrackStudent']);
    Route::get('/byThesis_guide_decree/{thesis_guide_decree}', [ThesisController::class, 'byThesis_guide_decree']);
    // Route::post('/create', [ThesisController::class, 'store']);
    Route::delete('/multi-delete', [ThesisController::class, 'multiDestroy']);
    Route::patch('/multiUpdate', [ThesisController::class, 'multiUpdate']);
    Route::get('/{thesis}', [ThesisController::class, 'show']);
    Route::patch('/edit/{thesis}', [ThesisController::class, 'update']);
    Route::patch('/updateByRegister/{registration}', [ThesisController::class, 'updateByRegister']);
    Route::get('/getByRegister/{registration}', [ThesisController::class, 'getByRegister']);
    Route::delete('/delete/{thesis}', [ThesisController::class, 'destroy']);
});

Route::prefix('/student_historie')->group(function () {
    Route::get('', [StudentHistorieController::class, 'index'])->name('student_historie.index');
    Route::post('/create', [StudentHistorieController::class, 'store'])->name('student_historie.store');
    Route::delete('/multi-delete', [StudentHistorieController::class, 'multiDestroy'])->name('student_historie.multiDestroy');
    Route::post('/multiCreate', [StudentHistorieController::class, 'multiCreate']);
    Route::get('/byStudent/{student}', [StudentHistorieController::class, 'byStudent'])->name('student_historie.byStudent');
    Route::get('/byDepartment/{department}', [StudentHistorieController::class, 'byDepartment'])->name('student_historie.byDepartment');
    Route::patch('/edit/{student_historie}', [StudentHistorieController::class, 'update'])->name('student_historie.update');
    Route::patch('/submit/{student_historie}', [StudentHistorieController::class, 'submit'])->name('student_historie.submit');
    Route::delete('/delete/{student_historie}', [StudentHistorieController::class, 'destroy'])->name('student_historie.delete');
    Route::get('show/{student_historie}', [StudentHistorieController::class, 'show'])->name('student_historie.show');
});

Route::prefix('/stage')->group(function () {
    Route::get('', [StageController::class, 'index'])->name('stage.index');
    Route::get('/byDepartment/{department}', [StageController::class, 'byDepartment'])->name('stage.byDepartment');
    Route::post('/create', [StageController::class, 'store'])->name('stage.store');
    Route::delete('/multi-delete', [StageController::class, 'multiDestroy'])->name('stage.multiDestroy');
    Route::get('/{stage}', [StageController::class, 'show'])->name('stage.show');
    Route::patch('/tukar_posisi/{stage}', [StageController::class, 'tukar_posisi'])->name('stage.tukar_posisi');
    Route::patch('/edit/{stage}', [StageController::class, 'update'])->name('stage.update');
    Route::delete('/delete/{stage}', [StageController::class, 'destroy'])->name('stage.delete');
});

Route::prefix('/registration')->group(function () {
    Route::get('', [RegistrationController::class, 'index'])->name('registration.index');
    Route::post('/testing', [RegistrationController::class, 'testing']);
    Route::get('/get-approved', [RegistrationController::class, 'getApproved'])->name('registration.getApproved');
    Route::get('/by-periode/{registration_period}', [RegistrationController::class, 'registrationByPeriode'])->name('registration.registrationByPeriode');
    Route::get('/byStudent/{student}', [RegistrationController::class, 'ByStudent']);
    Route::get('/LastRegistration/{thesis}', [RegistrationController::class, 'LastRegistration']);
    Route::get('/ByStudentStage/{student}', [RegistrationController::class, 'ByStudentStage']);
    Route::get('/ByStudentByStage/{student}/{stage}', [RegistrationController::class, 'ByStudentByStage']);
    Route::get('/ByDepartmenTrackStage/{department}', [RegistrationController::class, 'ByDepartmenTrackStage']);
    Route::get('grouped-file/{registration}', [RegistrationController::class, 'fileByRegistration'])->name('registration.fileByRegistration');
    Route::post('/create', [RegistrationController::class, 'store']);
    Route::delete('/multi-delete', [RegistrationController::class, 'multiDestroy'])->name('registration.multiDestroy');
    Route::get('/{registration}', [RegistrationController::class, 'show'])->name('registration.show');
    Route::patch('/edit/{registration}', [RegistrationController::class, 'update'])->name('registration.update');
    Route::delete('/delete/{registration}', [RegistrationController::class, 'destroy'])->name('registration.delete');
});

Route::prefix('/student_reg_files')->group(function () {
    Route::get('/show-pdf/{studentfile}', [StudentRegFileController::class, 'showPDF'])->name('student_reg_file.showPDF');
});

Route::prefix('/examiner')->group(function () {
    Route::get('', [ExaminerController::class, 'index'])->name('examiner.index');
    Route::get('/examinerWhrRegistration/{registration}', [ExaminerController::class, 'examinerWhrRegistration']);
    Route::post('/create', [ExaminerController::class, 'store'])->name('examiner.store');
    Route::post('/multistore', [ExaminerController::class, 'MultiInsert'])->name('examiner.MultiInsert');
    Route::delete('/multi-delete', [ExaminerController::class, 'multiDestroy'])->name('examiner.multiDestroy');

    Route::get('/byPersonnel/{personnel}', [ExaminerController::class, 'byPersonnel']);
    Route::get('/bySeminar/{seminar}', [ExaminerController::class, 'bySeminar']);

    Route::patch('/edit/{examiner}', [ExaminerController::class, 'update'])->name('examiner.update');
    Route::patch('/tukar_posisi/{examiner}', [ExaminerController::class, 'tukar_posisi'])->name('examiner.tukar_posisi');
    Route::patch('/add_signature/{examiner}', [ExaminerController::class, 'add_signature'])->name('examiner.add_signature');
    Route::delete('/delete/{examiner}', [ExaminerController::class, 'destroy'])->name('examiner.delete');
    Route::get('/{examiner}', [ExaminerController::class, 'show'])->name('examiner.show');
});


Route::prefix('/committee')->group(function () {
    Route::get('', [CommitteeController::class, 'index'])->name('committee.index');

    Route::get('/byDepartment/{department}', [CommitteeController::class, 'committee_byDepartment'])->name('committee.committee_byDepartment');

    Route::post('/create', [CommitteeController::class, 'store'])->name('committee.store');
    Route::delete('/multi-delete', [CommitteeController::class, 'multiDestroy'])->name('committee.multiDestroy');
    Route::get('/{committee}', [CommitteeController::class, 'show'])->name('committee.show');
    Route::patch('/edit/{committee}', [CommitteeController::class, 'update'])->name('committee.update');
    Route::delete('/delete/{committee}', [CommitteeController::class, 'destroy'])->name('committee.delete');
    Route::get('/skPersonnel-preview/{committee}/{stage}', [CommitteeController::class, 'skPersonel_pdf'])->name('committee.skPersonnel');
    Route::get('/skKomrensif-preview/{committee}/{stage}', [CommitteeController::class, 'skKomprensif_pdf'])->name('committee.skPersonnel');

    Route::get('/jadwalUjian-preview/{committee}/{stage}', [CommitteeController::class, 'jadwalUjian_pdf'])->name('committee.jadwalUjian');
});

Route::prefix('/committee_member')->group(function () {
    Route::get('', [CommitteeMembersController::class, 'index'])->name('committee_member.index');

    Route::get('/byCommitteeid/{committee}', [CommitteeMembersController::class, 'committee_member_byCommittee'])->name('committee_member.committee_member_byCommittee');
    Route::get('/byPersonnelid/{personnel}', [CommitteeMembersController::class, 'committee_member_byPersonnel'])->name('committee_member.committee_member_byPersonnel');

    Route::post('/create', [CommitteeMembersController::class, 'store']);
    Route::delete('/multi-delete', [CommitteeMembersController::class, 'multiDestroy']);
    Route::get('/{committee_member}', [CommitteeMembersController::class, 'show']);
    Route::patch('/edit/{committee_member}', [CommitteeMembersController::class, 'update'])->name('committee_member.update');
    Route::delete('/delete/{committee_member}', [CommitteeMembersController::class, 'destroy'])->name('committee_member.delete');
});


Route::prefix('/thesis_guide')->group(function () {
    Route::get('', [ThesisGuideController::class, 'index']);
    Route::get('/dokumen_bimbingan', [ThesisGuideController::class, 'dokumen_umum_bimbingan']);
    Route::get('/filter/{personnel}', [ThesisGuideController::class, 'filter']);
    Route::get('/byPersonnel/{personnel}', [ThesisGuideController::class, 'byPersonnel']);
    Route::get('/byThesis/{thesis}', [ThesisGuideController::class, 'byThesis']);
    Route::post('/create', [ThesisGuideController::class, 'store']);
    Route::post('/multistore', [ThesisGuideController::class, 'multiStore']);
    Route::delete('/multi-delete', [ThesisGuideController::class, 'multiDestroy']);
    Route::patch('/edit/{thesis_guide}', [ThesisGuideController::class, 'update'])->name('thesis_guide.update');

    Route::patch('/tukar_posisi/{thesis_guide}', [ThesisGuideController::class, 'tukar_posisi']);

    Route::delete('/delete/{thesis_guide}', [ThesisGuideController::class, 'destroy'])->name('thesis_guide.delete');
    Route::get('/{thesis_guide}', [ThesisGuideController::class, 'show'])->name('examiner.show');
});

Route::prefix('/seminar')->group(function () {
    Route::get('', [SeminarController::class, 'index']);
    Route::get('/nextDay', [SeminarController::class, 'nextDay']);
    Route::get('/invitation-seminar', [SeminarController::class, 'cetakUndangan']);
    // Route::get('/dokumen_penguji', [SeminarController::class, 'dokumen_umum_pengujian']);
    // Route::get('/dokumen_penguji_show', [SeminarController::class, 'dokumen_umum_pengujian_show']);
    Route::get('/show/invitation-seminar', [SeminarController::class, 'lihatUndangan']);
    Route::get('/byRegistration/{registration}', [SeminarController::class, 'byRegistration']);
    Route::get('/dokumen_penguji', [SeminarController::class, 'dokumen_umum_pengujian']);
    Route::get('/dokumen_pengujian_show', [SeminarController::class, 'dokumen_umum_pengujian_show']);
    Route::get('/bySeminarDecree/{seminar_decree}', [SeminarController::class, 'bySeminarDecree']);
    Route::get('/SeminarLastStageByPersonnel/{personnel}', [SeminarController::class, 'SeminarLastStageByPersonnel']);
    Route::get('/SeminarLastStageByDepartment/{department}', [SeminarController::class, 'SeminarLastStageByDepartment']);
    Route::get('/ByDepartmenTrackStage/{department}', [SeminarController::class, 'ByDepartmenTrackStage']);
    Route::get('/ByDepartmenHasRekomendasi/{department}', [SeminarController::class, 'ByDepartmenHasRekomendasi']);
    Route::post('/create', [SeminarController::class, 'store']);
    Route::post('/multi_store', [SeminarController::class, 'multi_store']);
    Route::patch('/multiUpdate', [SeminarController::class, 'multiUpdate']);
    Route::delete('/multi-delete', [SeminarController::class, 'multiDestroy']);
    Route::patch('/edit/{seminar}', [SeminarController::class, 'update']);
    Route::get('/byjadwal-terdekat/{personnel}', [SeminarController::class, 'byJadwalTerdekat']);
    Route::get('/byjadwal-terdekat-all/{personnel}', [SeminarController::class, 'byJadwalTerdekat_All']);
    Route::get('/jadwalUjian/{seminar}', [SeminarController::class, 'jadwalPreview']);
    Route::patch('/tukar_posisi/{seminar}', [SeminarController::class, 'tukar_posisi']);
    Route::patch('/hapus_decree/{seminar}', [SeminarController::class, 'hapusDecree']);
    Route::get('/daftar_hadir_kompre/{seminar}', [SeminarController::class, 'daftar_hadir_kompre'])->name('seminar.daftar_hadir');
    Route::delete('/delete/{seminar}', [SeminarController::class, 'destroy']);
    Route::get('/penilaian_pdf/{seminar}/{personnel}', [SeminarController::class, 'penilaian_pdf']);
    Route::get('/beritaAcara/{seminar}/{status}', [SeminarController::class, 'beritaAcara']);
    Route::get('/{seminar}', [SeminarController::class, 'show']);
});
Route::prefix('/seminar_decree')->group(function () {
    Route::get('', [SeminarDecreeController::class, 'index']);
    Route::get('/show-pdf/{decreefileid}', [SeminarDecreeController::class, 'showPDF'])->name('seminarFile.showPDF');
    Route::post('/create', [SeminarDecreeController::class, 'store']);
    Route::post('/multistore', [SeminarDecreeController::class, 'multiStore']);
    Route::delete('/multi-delete', [SeminarDecreeController::class, 'multiDestroy']);
    Route::get('/ByDepartmenTrackStage/{department}', [SeminarDecreeController::class, 'ByDepartmenTrackStage']);
    Route::put('/edit/{seminar_decree}', [SeminarDecreeController::class, 'update'])->name('seminar_decree.update');
    Route::get('/SkPdf/{seminar_decree}/{stage}', [SeminarDecreeController::class, 'SkPdf'])->name('seminar_decree.SkPdf');
    Route::delete('/delete/{seminar_decree}', [SeminarDecreeController::class, 'destroy'])->name('seminar_decree.delete');
    Route::get('/{seminar_decree}', [SeminarDecreeController::class, 'show'])->name('examiner.show');
});

Route::prefix('/thesis_guide_decree')->group(function () {
    Route::get('', [ThesisGuideDecreeController::class, 'index']);
    Route::post('/create', [ThesisGuideDecreeController::class, 'store']);
    Route::post('/multistore', [ThesisGuideDecreeController::class, 'multiStore']);
    Route::delete('/multi-delete', [ThesisGuideDecreeController::class, 'multiDestroy']);
    Route::get('/show-pdf/{decreefileid}', [ThesisGuideDecreeController::class, 'showPDF'])->name('reg_file1.showPDF');
    Route::get('/skPembimbing-preview/{thesis_guide_decree}', [ThesisGuideDecreeController::class, 'skPembimbing_pdf'])->name('reg_file.showPDF');
    Route::get('/ByDepartmenTrackStage/{department}', [ThesisGuideDecreeController::class, 'ByDepartmenTrackStage']);
    Route::put('/edit/{thesis_guide_decree}', [ThesisGuideDecreeController::class, 'update'])->name('thesis_guide_decree.update');
    Route::delete('/delete/{thesis_guide_decree}', [ThesisGuideDecreeController::class, 'destroy'])->name('thesis_guide_decree.delete');
    Route::get('/{thesis_guide_decree}', [ThesisGuideDecreeController::class, 'show'])->name('examiner.show');
});

Route::prefix('/annotation')->group(function () {
    Route::get('', [AnnotationController::class, 'index']);
    Route::post('/create', [AnnotationController::class, 'store']);
    Route::post('/multistore', [AnnotationController::class, 'multiStore']);
    Route::delete('/multi-delete', [AnnotationController::class, 'multiDestroy']);
    Route::get('/byExaminer/{examiner}', [AnnotationController::class, 'byExaminer']);
    Route::get('/byAnnotation_list/{annotation_list}', [AnnotationController::class, 'byAnnotation_list']);
    Route::patch('/edit/{annotation}', [AnnotationController::class, 'update'])->name('annotation.update');
    Route::delete('/delete/{annotation}', [AnnotationController::class, 'destroy'])->name('annotation.delete');
    Route::get('/{annotation}', [AnnotationController::class, 'show'])->name('annotation.show');
});

Route::prefix('/grade')->group(function () {
    Route::get('', [GradeController::class, 'index']);
    Route::post('/create', [GradeController::class, 'store']);
    Route::post('/multistore', [GradeController::class, 'multiStore']);
    Route::delete('/multi-delete', [GradeController::class, 'multiDestroy']);
    Route::get('/byExaminer/{examiner}', [GradeController::class, 'byExaminer']);
    Route::get('/byGrading_list/{grading_list}', [GradeController::class, 'byGrading_list']);
    Route::patch('/edit/{grade}', [GradeController::class, 'update'])->name('grade.update');
    Route::delete('/delete/{grade}', [GradeController::class, 'destroy'])->name('grade.delete');
    Route::get('/{grade}', [GradeController::class, 'show'])->name('grade.show');
});

Route::prefix('/thesis_consulting')->group(function () {
    Route::get('', [ThesisConsultingController::class, 'index']);
    Route::get('/bystatus/get', [ThesisConsultingController::class, 'indexStatus']);
    Route::get('/byToken', [ThesisConsultingController::class, 'byToken']);
    Route::post('/create', [ThesisConsultingController::class, 'store']);
    Route::patch('/add_signature/{thesis_consulting}', [ThesisConsultingController::class, 'add_signature'])->name('examiner.add_signature');
    Route::get('/mail/{test}', [ThesisConsultingController::class, 'mail']);
    Route::post('/createBimbingan', [ThesisConsultingController::class, 'storeBimbingan']);
    Route::post('/createRevisi', [ThesisConsultingController::class, 'storeRevisi']);
    Route::delete('/multi-delete', [ThesisConsultingController::class, 'multiDestroy']);
    Route::get('/byThesis/{thesis}', [ThesisConsultingController::class, 'byThesis']);
    Route::get('/byPersonnel/{personnel}', [ThesisConsultingController::class, 'byPersonnel']);
    Route::get('/byPersonnel_thesis/{personnel}/{thesis}', [ThesisConsultingController::class, 'byPersonnel_thesis'])->name('thesis_consulting.byPersonnel_thesis');
    Route::get('/byThesisStatus/{thesis}/{status}', [ThesisConsultingController::class, 'byThesisStatus']);
    Route::get('/byDepartment/{department}/{status}', [ThesisConsultingController::class, 'byDepartment']);
    Route::get('/byStudent/{student}', [ThesisConsultingController::class, 'byStudent']);
    Route::get('/byPersonnelStatus/{personnel}/{status}', [ThesisConsultingController::class, 'byPersonnelStatus']);
    Route::patch('/edit/{thesis_consulting}', [ThesisConsultingController::class, 'update'])->name('thesis_consulting.update');
    Route::patch('/finish/{thesis_consulting}', [ThesisConsultingController::class, 'finished_at'])->name('thesis_consulting.finish');
    Route::delete('/delete/{thesis_consulting}', [ThesisConsultingController::class, 'destroy'])->name('thesis_consulting.delete');
    Route::get('/{thesis_consulting}', [ThesisConsultingController::class, 'show'])->name('thesis_consulting.show');
});


Route::prefix('/thesis_consulting_chat')->group(function () {
    Route::get('', [ThesisConsultingChatController::class, 'index']);
    Route::post('/create', [ThesisConsultingChatController::class, 'store']);
    Route::delete('/multi-delete', [ThesisConsultingChatController::class, 'multiDestroy']);
    Route::get('/byThesis_consulting/{thesis_consulting}', [ThesisConsultingChatController::class, 'byThesis']);
    Route::patch('/edit/{thesis_consulting_chat}', [ThesisConsultingChatController::class, 'update'])->name('thesis_consulting_chat.update');
    Route::patch('/read_at/{thesis_consulting_chat}', [ThesisConsultingChatController::class, 'read_at'])->name('thesis_consulting_chat.read_at');
    Route::delete('/delete/{thesis_consulting_chat}', [ThesisConsultingChatController::class, 'destroy'])->name('thesis_consulting_chat.delete');
    Route::get('/{thesis_consulting_chat}', [ThesisConsultingChatController::class, 'show'])->name('thesis_consulting_chat.show');
});

Route::prefix('/action')->group(function () {
    Route::get('', [ActionController::class, 'index'])->name('action.index');
    Route::get('/docPublish', [ActionController::class, 'docPublish'])->name('action.docPublish');
    Route::post('/create', [ActionController::class, 'store'])->name('action.store');
    Route::get('/actionCount', [ActionController::class, 'actionCount']);
    Route::get('/byPersonnel/{personnel}', [ActionController::class, 'byPersonnel']);
    Route::get('/byDocument_item/{document_item}', [ActionController::class, 'byDocument_item']);
    Route::get('/byDocument_type/{document_type}/{department}', [ActionController::class, 'byDocument_type']);
    Route::get('/byPersonnel_Document_type/{document_type}/{personnel}', [ActionController::class, 'byPersonnel_Document_type']);
    Route::delete('/multi-delete', [ActionController::class, 'multiDestroy'])->name('action.multiDestroy');
    Route::get('/{action}', [ActionController::class, 'show'])->name('action.show');
    Route::put('/edit/{action}', [ActionController::class, 'update'])->name('action.update');
    Route::delete('/delete/{action}', [ActionController::class, 'destroy'])->name('action.delete');
});

Route::prefix('/document')->group(function () {
    Route::get('', [DocumentController::class, 'index'])->name('document.index');
    Route::post('/create', [DocumentController::class, 'store'])->name('document.store');
    Route::get('/byAction/{action}', [DocumentController::class, 'byAction']);
    Route::delete('/multi-delete', [DocumentController::class, 'multiDestroy'])->name('document.multiDestroy');
    Route::patch('/edit/{document}', [DocumentController::class, 'update'])->name('document.update');
    Route::delete('/delete/{document}', [DocumentController::class, 'destroy'])->name('document.delete');
    Route::get('/{document}', [DocumentController::class, 'show'])->name('document.show');
});

Route::prefix('/article')->group(function () {
    Route::get('', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/landing', [ArticleController::class, 'landing'])->name('article.landing');
    Route::get('/updateSllug', [ArticleController::class, 'updateSllug']);
    Route::post('/create', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/byPersonnel/{personnel}', [ArticleController::class, 'byPersonnel']);
    Route::get('/bySlug/{article:slug}', [ArticleController::class, 'bySlug']);
    Route::delete('/multi-delete', [ArticleController::class, 'multiDestroy'])->name('article.multiDestroy');
    Route::get('/{article}', [ArticleController::class, 'show'])->name('article.show');
    Route::put('/edit/{article}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/delete/{article}', [ArticleController::class, 'destroy'])->name('article.delete');
});

Route::prefix('/notification')->group(function () {
    Route::get('', [NotificationController::class, 'index'])->name('notification.index');
    Route::get('/byPersonnel/{personnel}', [NotificationController::class, 'byPersonnel'])->name('notification.byPersonnel');
    Route::post('/personnelRead/{personnel}', [NotificationController::class, 'personnelRead'])->name('notification.personnelRead');
    Route::get('/byStudent/{student}', [NotificationController::class, 'byStudent'])->name('notification.byStudent');
    Route::delete('/delete-student/{student}', [NotificationController::class, 'destroyByStudent'])->name('notification.destroyByStudent');
    Route::delete('/delete-personnel/{personnel}', [NotificationController::class, 'destroyByPersonnel'])->name('notification.destroyByPersonnel');
    Route::delete('/delete-user/{user}', [NotificationController::class, 'destroyByUser'])->name('notification.destroyByUser');
    Route::delete('/delete-notifikasi/{notification}', [NotificationController::class, 'destroyByPersonnel'])->name('notification.destroyByPersonnel');
    Route::post('/studentRead/{student}', [NotificationController::class, 'studentRead'])->name('notification.studentRead');
    Route::get('/byUser/{user}', [NotificationController::class, 'byUser'])->name('notification.byUser');
    Route::post('/userRead/{user}', [NotificationController::class, 'userRead'])->name('notification.userRead');
});

Route::prefix('/bachelor_degree_decree')->group(function () {

    Route::get('', [BachelorDegreeDecreeController::class, 'index'])->name('bachelor_degree_decree.index');
    Route::get('/byDepartment/{department}', [BachelorDegreeDecreeController::class, 'byDepartment'])->name('bachelor_degree_decree.byDepartment');
    Route::post('/create', [BachelorDegreeDecreeController::class, 'store'])->name('bachelor_degree_decree.store');
    Route::delete('/multi-delete', [BachelorDegreeDecreeController::class, 'multiDestroy'])->name('bachelor_degree_decree.multiDestroy');
    Route::get('/{bachelor_degree_decree}', [BachelorDegreeDecreeController::class, 'show'])->name('bachelor_degree_decree.show');
    Route::patch('/edit/{bachelor_degree_decree}', [BachelorDegreeDecreeController::class, 'update'])->name('bachelor_degree_decree.update');
    Route::delete('/delete/{bachelor_degree_decree}', [BachelorDegreeDecreeController::class, 'destroy'])->name('bachelor_degree_decree.delete');
    Route::get('/skYudisium/{bachelor_degree_decree}/{status}', [BachelorDegreeDecreeController::class, 'sk_yudisium']);
});

Route::prefix('/bachelor_degree')->group(function () {
    Route::get('', [BachelorDegreeController::class, 'index']);
    Route::get('/byDepartment/{department}', [BachelorDegreeController::class, 'byDepartment']);
    Route::get('/byStudent/{student}', [BachelorDegreeController::class, 'byStudent']);
    // Route::get('/showCreate/{student}', [BachelorDegreeController::class, 'showCreate']);
    Route::post('/showCreate/{seminar}', [BachelorDegreeController::class, 'showCreate']);
    Route::get('/showOnly/{seminar}', [BachelorDegreeController::class, 'showOnly']);
    Route::post('/create', [BachelorDegreeController::class, 'store']);
    Route::delete('/multi-delete', [BachelorDegreeController::class, 'multiDestroy']);
    Route::patch('/multiUpdate', [BachelorDegreeController::class, 'multiUpdate']);
    Route::get('/{bachelor_degree}', [BachelorDegreeController::class, 'show']);
    Route::put('/upload_lembar_pengesahan/{bachelor_degree}', [BachelorDegreeController::class, 'upload_lembar_pengesahan']);
    Route::patch('/edit/{bachelor_degree}', [BachelorDegreeController::class, 'update']);
    Route::get('/show_lembar_pengesahan/{bachelor_degree}', [BachelorDegreeController::class, 'show_lembar_pengesahan'])->name('bachelor_degree.show_lembar_pengesahan');
    Route::delete('/delete/{bachelor_degree}', [BachelorDegreeController::class, 'destroy']);
});

Route::prefix('/alumni')->group(function () {
    Route::get('', [AlumniController::class, 'index']);
    Route::post('/create', [AlumniController::class, 'store']);
    Route::delete('/multi-delete', [AlumniController::class, 'multiDestroy']);
    Route::post('/multiCreate', [AlumniController::class, 'multiCreate']);
    Route::put('/edit/{alumni}', [AlumniController::class, 'update']);
    Route::put('/updateFoto/{alumni}', [AlumniController::class, 'updateFoto']);
    Route::post('/import', [AlumniController::class, 'importExcel']);
    Route::get('/byDepartment/{department}', [AlumniController::class, 'byDepartment']);
    Route::get('/alumni_pdf/{department}', [AlumniController::class, 'alumni_pdf']);
    Route::get('/getTrace/{nim}/{birthdate}', [AlumniController::class, 'getTrace']);
    Route::patch('/edit/{alumni}', [AlumniController::class, 'update']);
    Route::delete('/delete/{alumni}', [AlumniController::class, 'destroy']);
    Route::get('/{alumni}', [AlumniController::class, 'show']);
});

Route::prefix('/alumni_trace')->group(function () {
    Route::get('', [AlumniTraceController::class, 'index'])->name('alumni_trace.index');
    Route::get('/byAlumni/{alumni}', [AlumniTraceController::class, 'byAlumni'])->name('alumni_trace.byAlumni');
    Route::post('/create', [AlumniTraceController::class, 'store'])->name('alumni_trace.store');
    Route::delete('/multi-delete', [AlumniTraceController::class, 'multiDestroy'])->name('alumni_trace.multiDestroy');
    Route::get('/{alumni_trace}', [AlumniTraceController::class, 'show'])->name('alumni_trace.show');
    Route::patch('/edit/{alumni_trace}', [AlumniTraceController::class, 'update'])->name('alumni_trace.update');
    Route::delete('/delete/{alumni_trace}', [AlumniTraceController::class, 'destroy'])->name('alumni_trace.delete');
});

Route::prefix('/last_stage_registration')->group(function () {
    Route::post('/create', [LastStageRegistrationController::class, 'store'])->name('last_stage_registration.store');
    Route::patch('/edit/{last_stage_registration}', [LastStageRegistrationController::class, 'update'])->name('last_stage_registration.update');
});

Route::prefix('/recommendation')->group(function () {
    Route::get('', [RecommendationController::class, 'index']);
    Route::post('/create', [RecommendationController::class, 'store']);
    Route::post('/multistore', [RecommendationController::class, 'multiStore']);
    Route::delete('/multi-delete', [RecommendationController::class, 'multiDestroy']);
    Route::get('/byExaminer/{examiner}', [RecommendationController::class, 'byExaminer']);
    Route::get('/bySeminar/{seminar}', [RecommendationController::class, 'bySeminar']);
    Route::patch('/edit/{annotation}', [RecommendationController::class, 'update'])->name('annotation.update');
    Route::delete('/delete/{annotation}', [RecommendationController::class, 'destroy'])->name('annotation.delete');
    Route::get('/bySeminarPersonell/{seminar}/{examiner}', [RecommendationController::class, 'bySeminarPersonell']);
    Route::get('/{annotation}', [RecommendationController::class, 'show'])->name('annotation.show');
});

Route::prefix('/activity_participants')->group(function () {
    Route::get('', [ActivityParticipantsController::class, 'index']);
    Route::post('/create', [ActivityParticipantsController::class, 'store']);
    Route::get('/byPersonnel/{personnel}', [ActivityParticipantsController::class, 'byPersonnel']);
    Route::get('/byAction/{action}', [ActivityParticipantsController::class, 'byAction']);
    Route::delete('/multi-delete', [ActivityParticipantsController::class, 'multiDestroy']);
    Route::get('/{activity_participants}', [ActivityParticipantsController::class, 'show']);
    Route::patch('/edit/{activity_participants}', [ActivityParticipantsController::class, 'update']);
    Route::delete('/delete/{activity_participants}', [ActivityParticipantsController::class, 'destroy']);
});

Route::prefix('/bukti_kegiatan')->group(function () {
    Route::get('', [BuktiKegiatanController::class, 'index']);
    Route::post('/create', [BuktiKegiatanController::class, 'store']);
    Route::get('/document_filter', [BuktiKegiatanController::class, 'document_filter']);
    Route::get('/is_published/{document_type}', [BuktiKegiatanController::class, 'is_published']);
    Route::get('/byAction/{action}', [BuktiKegiatanController::class, 'byAction']);
    Route::get('/byDepartment/{department}', [BuktiKegiatanController::class, 'byDepartment']);
    Route::get('/showPDF/{bukti_kegiatan}', [BuktiKegiatanController::class, 'showPDF']);
    Route::get('/buktiByPemilik_bukti/{participant_id}', [BuktiKegiatanController::class, 'buktiByPemilik_bukti']);
    Route::get('/buktiByPemilik_bukti/{action}/{participant_id}', [BuktiKegiatanController::class, 'buktiByPemilik_bukti']);
    Route::get('/byAction_Department/{action}/{department}', [BuktiKegiatanController::class, 'byAction_Department']);
    Route::delete('/multi-delete', [BuktiKegiatanController::class, 'multiDestroy']);
    Route::get('/{bukti_kegiatan}', [BuktiKegiatanController::class, 'show']);
    Route::put('/edit/{bukti_kegiatan}', [BuktiKegiatanController::class, 'update']);
    Route::delete('/delete/{bukti_kegiatan}', [BuktiKegiatanController::class, 'destroy']);
});

Route::prefix('/pemilik_bukti')->group(function () {
    Route::get('', [PemilikBuktiController::class, 'index']);
    Route::post('/create', [PemilikBuktiController::class, 'store']);
    Route::get('/byParticipant/{participant}', [PemilikBuktiController::class, 'byParticipant']);
    Route::get('/byBukti_kegiatan/{bukti_kegiatan}', [PemilikBuktiController::class, 'byBukti_kegiatan']);
    Route::delete('/multi-delete', [PemilikBuktiController::class, 'multiDestroy']);
    Route::get('/{pemilik_bukti}', [PemilikBuktiController::class, 'show']);
    Route::patch('/edit/{pemilik_bukti}', [PemilikBuktiController::class, 'update']);
    Route::delete('/delete/{pemilik_bukti}', [PemilikBuktiController::class, 'destroy']);
});

// !timeline
Route::prefix('/timeline')->group(function () {
    Route::get('', [TimelineController::class, 'index'])->name('study_programs.index');
    Route::get('/byDepartment/{department}', [TimelineController::class, 'byDepartment'])->name('study_programs.byDepartment');
    Route::post('/create', [TimelineController::class, 'store'])->name('study_programs.store');
    Route::delete('/multi-delete', [TimelineController::class, 'multiDestroy'])->name('study_programs.multiDestroy');
    Route::get('/{study_programs}', [TimelineController::class, 'show'])->name('study_programs.show');
    Route::patch('/edit/{study_programs}', [TimelineController::class, 'update'])->name('study_programs.update');
    Route::delete('/delete/{study_programs}', [TimelineController::class, 'destroy'])->name('study_programs.delete');
});

Route::prefix('/running_text')->group(function () {
    Route::get('', [RunningTextController::class, 'index'])->name('running_text.index');
    Route::post('/create', [RunningTextController::class, 'store'])->name('running_text.store');
    Route::get('/status_aktiv', [RunningTextController::class, 'status_aktiv'])->name('running_text.status_aktiv');
    Route::delete('/multi-delete', [RunningTextController::class, 'multiDestroy'])->name('running_text.multiDestroy');
    Route::get('/{running_text}', [RunningTextController::class, 'show'])->name('running_text.show');
    Route::put('/edit/{running_text}', [RunningTextController::class, 'update'])->name('running_text.update');
    Route::delete('/delete/{running_text}', [RunningTextController::class, 'destroy'])->name('running_text.delete');
});
