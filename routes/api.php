<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Timetable\TimetableController;
use App\Http\Controllers\Timetable\LessonController;
use App\Http\Controllers\Timetable\ClassController;
use App\Http\Controllers\Timetable\SubjectController;
use App\Http\Controllers\Timetable\TeacherController;
use App\Http\Controllers\Timetable\ClassroomController;
use App\Http\Controllers\Timetable\StudentJournalController;
use App\Http\Controllers\Timetable\ClassJournalController;
use App\Http\Controllers\Timetable\HomeworkController;
use App\Http\Controllers\Timetable\MaterialController;
use App\Http\Controllers\Timetable\MarkController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Subjects URL/classrooms
Route::prefix('{classrooms}')->group(function () {
    Route::get('/', [ClassroomController::class, 'index']);                                          //Вывести все аудитории
    //Route::post('/', [ClassroomController::class, 'store']);                                         //Создать аудиторию
    Route::get('{classroom_id}', [ClassroomController::class, 'show']);                              //Вывести определенную аудиторию
    //Route::put('/{classroom_id}', [ClassroomController::class, 'update']);                           //Редактировать аудиторию
    //Route::delete('/{classroom_id}', [ClassroomController::class, 'destroy']);                       //Удалить аудиторию
});

//Subjects URL/subjects
Route::prefix('{subjects}')->group(function () {
    Route::get('/', [SubjectController::class, 'index']);                                        //Вывести все предметы
    Route::post('/', [SubjectController::class, 'store']);                                       //Создать предмет
    Route::get('{subject_id}', [SubjectController::class, 'show']);                              //Вывести определенный предмет
    Route::put('/{subject_id}', [SubjectController::class, 'update']);                           //Редактировать предмет
    Route::delete('/{subject_id}', [SubjectController::class, 'destroy']);                       //Удалить предмет

    //Teachers Subjects URL/subjects/subject_id/teachers
    Route::prefix('{teachers}')->group(function () {
        Route::get('/', [TeacherController::class, 'index']);                                        //Вывести всех учителей
        Route::post('/', [TeacherController::class, 'store']);                                       //Создать учителя
        Route::get('{teacher_id}', [TeacherController::class, 'show']);                              //Вывести определенного учителя
        Route::put('/{teacher_id}', [TeacherController::class, 'update']);                           //Редактировать учителя
        Route::delete('/{teacher_id}', [TeacherController::class, 'destroy']);                       //Удалить учителя
    });
});

//Timetable URL/timetables/
Route::prefix('classes')->group(function () {
    Route::get('/', [ClassController::class, 'index']);                                  //Вывести все классы
    Route::post('/', [ClassController::class, 'store']);                                 //Создать класс
    Route::get('/{class_id}', [ClassController::class, 'show']);                         //Вывести определенный класс
    Route::put('/{class_id}', [ClassController::class, 'update']);                       //Редактировать класс
    Route::delete('/{class_id}', [ClassController::class, 'destroy']);                   //Удалить класс

    //Class&Lesson URL/timetables/timetable_id
    Route::prefix('{timetables}')->group(function () {
        Route::get('/', [TimetableController::class, 'index']);                                    //Вывести все расписание
        Route::post('/', [TimetableController::class, 'store']);                                   //Создать расписание
        Route::get('/{timetable_id}', [TimetableController::class, 'show']);                       //Вывести определенное расписание
        Route::put('/{timetable_id}', [TimetableController::class, 'update']);                     //Редактировать расписание
        Route::delete('/{timetable_id}', [TimetableController::class, 'destroy']);                 //Удалить расписание

        //Lesson URL/timetables/timetable_id/lessons
        Route::prefix('{lessons}')->group(function () {
            Route::get('/', [LessonController::class, 'index']);                                 //Вывести все уроки
            Route::post('/', [LessonController::class, 'store']);                                //Создать урок
            Route::put('/{lesson_id}', [LessonController::class, 'update']);                     //Редактировать урок
            Route::delete('/{lesson_id}', [LessonController::class, 'destroy']);                 //Удалить урок
        });
//                      //StudentJournal Lesson URL/V1/timetables/timetable_id/lessons/lesson_id/studentJournals
//                      Route::prefix('{studentJournals}')->group(function ()
//                      {
//                          Route::get('/', [StudentJournalController::class, 'index']);                                         //Вывести все дневники
//                          Route::post('/', [StudentJournalController::class, 'store']);                                        //Создать дневник
//                          Route::get('/{studentJournal_id}', [StudentJournalController::class, 'show']);                       //Вывести определенный дневник
//                          Route::put('/{studentJournal_id}', [StudentJournalController::class, 'update']);                     //Редактировать дневник
//                          Route::delete('/{studentJournal_id}', [StudentJournalController::class, 'destroy']);                 //Удалить дневник
//                      });
//
//                      //ClassJournal URL/V1/timetables/timetable_id/lessons/lesson_id/classJournals
//                      Route::prefix('{classJournals}')->group(function ()
//                      {
//                          Route::get('/', [ClassJournalController::class, 'index']);                                       //Вывести все журналы
//                          Route::post('/', [ClassJournalController::class, 'store']);                                      //Создать журнал
//                          Route::get('/{classJournal_id}', [ClassJournalController::class, 'show']);                       //Вывести определенный журнал
//                          Route::put('/{classJournal_id}', [ClassJournalController::class, 'update']);                     //Редактировать журнал
//                          Route::delete('/{classJournal_id}', [ClassJournalController::class, 'destroy']);                 //Удалить журнал
//                      });
//
//
//
//                      //Homework URL/V1/timetables/timetable_id/lessons/lesson_id/homeworks
//                      Route::prefix('{homeworks}')->group(function ()
//                      {
//                          Route::get('/', [HomeworkController::class, 'index']);                                         //Вывести все домашние задания
//                          Route::post('/', [HomeworkController::class, 'store']);                                        //Создать домашнее задание
//                          Route::get('/{homework_id}', [HomeworkController::class, 'show']);                             //Вывести определенное домашнее задание
//                          Route::put('/{homework_id}', [HomeworkController::class, 'update']);                           //Редактировать домашнее задание
//                          Route::delete('/{homework_id}', [HomeworkController::class, 'destroy']);                       //Удалить домашнее задание
//                      });
//
//                      //Materials URL/V1/timetables/timetable_id/lessons/lesson_id/materials
//                      Route::prefix('{materials}')->group(function ()
//                      {
//                          Route::get('/', [MaterialController::class, 'index']);                                         //Вывести все материалы
//                          Route::post('/', [MaterialController::class, 'store']);                                        //Создать материал
//                          Route::get('/{material_id}', [MaterialController::class, 'show']);                             //Вывести определенный материал
//                          Route::put('/{material_id}', [MaterialController::class, 'update']);                           //Редактировать материал
//                          Route::delete('/{material_id}', [MaterialController::class, 'destroy']);                       //Удалить материал
//                      });
//
//                      //Marks URL/V1/timetables/timetable_id/lessons/lesson_id/marks
//                      Route::prefix('{marks}')->group(function ()
//                      {
//                          Route::get('/', [MarkController::class, 'index']);                                         //Вывести все оценки
//                          Route::post('/', [MarkController::class, 'store']);                                        //Создать оценку
//                          Route::get('/{mark_id}', [MarkController::class, 'show']);                                 //Вывести определенную оценку
//                          Route::put('/{mark_id}', [MarkController::class, 'update']);                               //Редактировать оценку
//                          Route::delete('/{mark_id}', [MarkController::class, 'destroy']);                           //Удалить оценку
//                      });

                  //Marks URL/V1/timetables/timetable_id/lessons/lesson_id/classrooms
//                      Route::prefix('{classrooms}')->group(function ()
//                      {
//                          Route::get('/', [MarkController::class, 'index']);                                              //Вывести все
//                          Route::post('/', [MarkController::class, 'store']);                                             //Создать
//                          Route::get('/{classroom_id}', [MarkController::class, 'show']);                                 //Вывести определенн
//                          Route::put('/{classroom_id}', [MarkController::class, 'update']);                               //Редактировать
//                          Route::delete('/{classroom_id}', [MarkController::class, 'destroy']);                           //Удалить

//                          //Marks URL/V1/timetables/timetable_id/lessons/lesson_id/classrooms/classroom_id
//                          Route::prefix('{classroomOccupations}')->group(function ()
//                          {
//                              Route::get('/', [MarkController::class, 'index']);                                                        //Вывести все
//                              Route::post('/', [MarkController::class, 'store']);                                                       //Создать
//                              Route::get('/{classroomOccupation_id}', [MarkController::class, 'show']);                                 //Вывести определенн
//                              Route::put('/{classroomOccupation_id}', [MarkController::class, 'update']);                               //Редактировать
//                              Route::delete('/{classroomOccupation_id}', [MarkController::class, 'destroy']);                           //Удалить

//                              //Marks URL/V1/timetables/timetable_id/lessons/lesson_id/classrooms/classroom_id/classroomOccupation/classroomOccupation_id
//                              Route::prefix('{weekDays}')->group(function ()
//                              {
//                                  Route::get('/', [MarkController::class, 'index']);                                                        //Вывести все
//                                  Route::post('/', [MarkController::class, 'store']);                                                       //Создать
//                                  Route::get('/{weekDay_id}', [MarkController::class, 'show']);                                             //Вывести определенн
//                                  Route::put('/{weekDay_id}', [MarkController::class, 'update']);                                           //Редактировать
//                                  Route::delete('/{weekDay_id}', [MarkController::class, 'destroy']);                                       //Удалить
//                              });
//
//                              //Marks URL/V1/timetables/timetable_id/lessons/lesson_id/classrooms/classroom_id/classroomOccupation/classroomOccupation_id
//                              Route::prefix('{lessonPeriods}')->group(function ()
//                              {
//                                  Route::get('/', [MarkController::class, 'index']);                                                         //Вывести все
//                                  Route::post('/', [MarkController::class, 'store']);                                                        //Создать
//                                  Route::get('/{lessonPeriod_id}', [MarkController::class, 'show']);                                         //Вывести определенн
//                                  Route::put('/{lessonPeriod_id}', [MarkController::class, 'update']);                                       //Редактировать
//                                  Route::delete('/{lessonPeriod_id}', [MarkController::class, 'destroy']);                                   //Удалить
//                              });

//                          });

//                      });


    });
});

