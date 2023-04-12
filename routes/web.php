<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CuatrimestreController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\DomicilioController;
use App\Http\Controllers\TipoAsistenciaController;
use App\Http\Controllers\PlantelController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\CalificacionesController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GrupoMateriaController;
use App\Http\Controllers\ReferenciaAlumnoController;
use App\Http\Controllers\ControllerEvent;
use App\Http\Controllers\CodigosController;


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

//Route::get('/downloadPDF/{id}','AlumnoController@downloadPDF');
Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']])->middleware('auth');
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit'])->middleware('auth');
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update'])->middleware('auth');
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
//Alumno
Route::get('/downloadPDF/{id}', [AlumnoController::class, 'downloadPDF'])->name('downloadPDF')->middleware('auth');
Route::get('/qr_generate/{id}', [AlumnoController::class, 'qr_generate'])->name('qr_generate')->middleware('auth');
Route::get('/qr_download/{id}', [AlumnoController::class, 'qr_download'])->name('qr_download')->middleware('auth');
Route::post('/personalAlumno', [AlumnoController::class, 'personal'])->name('personal')->middleware('auth');
Route::post('/contactosAlumno', [AlumnoController::class, 'contactos'])->name('contactos')->middleware('auth');
Route::post('/domiciliosAlumno', [AlumnoController::class, 'domicilios'])->name('domicilios')->middleware('auth');
Route::post('/materiasAlumno', [AlumnoController::class, 'mismaterias'])->name('mismaterias')->middleware('auth');
Route::post('/miqr', [AlumnoController::class, 'miqr'])->name('miqr')->middleware('auth');
Route::get('/dashe', [AlumnoController::class, 'dashe'])->name('dashe')->middleware('auth');

//ASISTENCIA - REPORTE
//Route::get('/viewReport', [AsistenciaController::class, 'viewReport'])->name('viewReport');
Route::get('/view_report/{id}', [AsistenciaController::class, 'view_report'])->name('view_report')->middleware('auth');
Route::post('/create', [AsistenciaController::class, 'create'])->name('create')->middleware('auth');
Route::post('/save_ass', [AsistenciaController::class, 'save_ass'])->name('save_ass')->middleware('auth');
Route::post('/downloadAsistencia', [AsistenciaController::class, 'downloadAsistencia'])->name('downloadAsistencia')->middleware('auth');
Route::post('/downloadFormatoAsistencia', [AsistenciaController::class, 'downloadFormatoAsistencia'])->name('downloadFormatoAsistencia')->middleware('auth');

//CALIFICACIONES
Route::post('/createcal', [CalificacionesController::class, 'createcal'])->name('createcal')->middleware('auth');
Route::post('/send_partial', [CalificacionesController::class, 'send_partial'])->name('send_partial')->middleware('auth');
Route::post('/index_calificacion', [CalificacionesController::class, 'index_calificacion'])->name('index_calificacion')->middleware('auth');
Route::post('/save_all', [CalificacionesController::class, 'save_all'])->name('save_all')->middleware('auth');
Route::post('/downloadCalificaciones', [CalificacionesController::class, 'downloadCalificaciones'])->name('downloadCalificaciones')->middleware('auth');
Route::post('/downloadFormatoCalificaciones', [CalificacionesController::class, 'downloadFormatoCalificaciones'])->name('downloadFormatoCalificaciones')->middleware('auth');
//Empleado
Route::post('/personalEmpleado', [EmpleadoController::class, 'personal'])->name('personal')->middleware('auth');
Route::post('/contactosEmpleado', [EmpleadoController::class, 'contactos'])->name('contactos')->middleware('auth');
Route::post('/domiciliosEmpleado', [EmpleadoController::class, 'domicilios'])->name('domicilios')->middleware('auth');
Route::post('/gruposEmpleado', [EmpleadoController::class, 'misgrupos'])->name('misgrupos')->middleware('auth');
Route::post('/lista', [EmpleadoController::class, 'misalumnos'])->name('misalumnos')->middleware('auth');
Route::get('/dash', [EmpleadoController::class, 'dash'])->name('dash')->middleware('auth');

Route::resource('empleado', EmpleadoController::class)->middleware('auth');
Route::resource('contacto', ContactoController::class)->middleware('auth');
Route::resource('cuatrimestre', CuatrimestreController::class)->middleware('auth');
Route::resource('puesto', PuestoController::class)->middleware('auth');
Route::resource('domicilio', DomicilioController::class)->middleware('auth');
Route::resource('tipo_asistencia', TipoAsistenciaController::class)->middleware('auth');
Route::resource('plantel', PlantelController::class)->middleware('auth');
Route::resource('carrera', CarreraController::class)->middleware('auth');
Route::resource('grupo', GrupoController::class)->middleware('auth');
Route::resource('asistencia', AsistenciaController::class)->middleware('auth');
Route::resource('alumno', AlumnoController::class)->middleware('auth');
Route::resource('materia', MateriaController::class)->middleware('auth');
Route::resource('grupo_materia', GrupoMateriaController::class)->middleware('auth');
Route::resource('home', HomeController::class)->middleware('auth');
Route::resource('calificacion', CalificacionesController::class)->middleware('auth');
Route::resource('referencia_alumno', ReferenciaAlumnoController::class)->middleware('auth');


Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [ContactoController::class, 'index'])->name('contacto');
    Route::get('/', [EmpleadoController::class, 'index'])->name('empleado');
    Route::get('/', [CuatrimestreController::class, 'index'])->name('cuatrimestre');
    Route::get('/', [PuestoController::class, 'index'])->name('puesto');
    Route::get('/', [DomicilioController::class, 'index'])->name('domicilio');
    Route::get('/', [TipoAsistenciaController::class, 'index'])->name('tipóAsistencia');
    Route::get('/', [PlantelController::class, 'index'])->name('plantel');
    Route::get('/', [CarreraController::class, 'index'])->name('carrera');
    Route::get('/', [GrupoController::class, 'index'])->name('grupo');
    Route::get('/', [AlumnoController::class, 'index'])->name('alumno');
    Route::get('/', [AsistenciaController::class, 'index'])->name('home');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
    Route::get('/', [MateriaController::class, 'index'])->name('home');
    Route::get('/', [CalificacionesController::class, 'index'])->name('home');

});



//Auth::routes();
//Auth::routes(['register'=>false, 'reset'=>false]);
Auth::routes(['reset'=>false]);

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');
Route::get('/home', [ContactoController::class, 'index'])->name('home');
Route::get('/home', [CuatrimestreController::class, 'index'])->name('cuatrimestre');
Route::get('/home', [PuestoController::class, 'index'])->name('home');
Route::get('/home', [DomicilioController::class, 'index'])->name('home');
Route::get('/home', [TipoAsistenciaController::class, 'index'])->name('home');
Route::get('/home', [PlantelController::class, 'index'])->name('home');
Route::get('/home', [CarreraController::class, 'index'])->name('home');
Route::get('/home', [GrupoController::class, 'index'])->name('home');
Route::get('/home', [AlumnoController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', [MateriaController::class, 'index'])->name('home');
Route::get('/home', [CalificacionesController::class, 'index'])->name('home');



//CALENDARIO
Route::get('Evento/form',[ControllerEvent::class, 'form']);
Route::post('Evento/create',[ControllerEvent::class, 'create']);
Route::get('Evento/details/{id}',[ControllerEvent::class, 'details']);
Route::get('Evento/index', [ControllerEvent::class, 'index']);
Route::get('dashboard/{month}',[ControllerEvent::class, 'index_month']);
Route::post('Evento/calendario',[ControllerEvent::class, 'calendario']);
Route::get('Calendar/event/{mes}',[HomeController::class, 'index_month']);
Route::get('Calendar/event',[HomeController::class, 'index']);


//REGISTRAR Y ACTUALIZAR
Route::post('Cuatri/create',[CuatrimestreController::class, 'store'])->middleware('auth');
Route::post('Cuatri/update/{id}',[CuatrimestreController::class, 'update'])->middleware('auth');

Route::post('Puesto/create',[PuestoController::class, 'store'])->middleware('auth');
Route::post('Puesto/update/{id}',[PuestoController::class, 'update'])->middleware('auth');

Route::post('Contacto/create',[ContactoController::class, 'store'])->middleware('auth');
Route::post('Contacto/update/{id}',[ContactoController::class, 'update'])->middleware('auth');

Route::post('Domicilio/create',[DomicilioController::class, 'store'])->middleware('auth');
Route::post('Domicilio/update/{id}',[DomicilioController::class, 'update'])->middleware('auth');

Route::post('Empleado/create',[EmpleadoController::class, 'store'])->middleware('auth');
Route::post('Empleado/update/{id}',[EmpleadoController::class, 'update'])->middleware('auth');

Route::post('Tipasis/create',[TipoAsistenciaController::class, 'store'])->middleware('auth');
Route::post('Tipasis/update/{id}',[TipoAsistenciaController::class, 'update'])->middleware('auth');

Route::post('Plantel/create',[PlantelController::class, 'store'])->middleware('auth');
Route::post('Plantel/update/{id}',[PlantelController::class, 'update'])->middleware('auth');

Route::post('Carrera/create',[CarreraController::class, 'store'])->middleware('auth');
Route::post('Carrera/update/{id}',[CarreraController::class, 'update'])->middleware('auth');

Route::post('Grupo/create',[GrupoController::class, 'store'])->middleware('auth');
Route::post('Grupo/update/{id}',[GrupoController::class, 'update'])->middleware('auth');

Route::post('Materia/create',[MateriaController::class, 'store'])->middleware('auth');
Route::post('Materia/update/{id}',[MateriaController::class, 'update'])->middleware('auth');

Route::post('Asigmat/create',[GrupoMateriaController::class, 'store'])->middleware('auth');
Route::post('Asigmat/update/{id}',[GrupoMateriaController::class, 'update'])->middleware('auth');

Route::post('Alumno/create',[AlumnoController::class, 'store'])->middleware('auth');
Route::post('Alumno/update/{id}',[AlumnoController::class, 'update'])->middleware('auth');

Route::post('Refer/create',[ReferenciaAlumnoController::class, 'store'])->middleware('auth');





//CODIGOS POSTALES

Route::get('Codigos/lista/{cp}', [CodigosController::class, 'lista_cps']);
Route::get('Codigos/lista_col/{cp}', [CodigosController::class, 'lista_colonias']);