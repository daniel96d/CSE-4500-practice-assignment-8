<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\NoteController;
use App\Models\Equipment;
use App\Models\Note;

//);
/*
[
    {
        "title": "CSE4500 Class",
        "start": "2022-02-23T17:30:00",
        "end": "2022-02-23T18:45:00"
    },
    {
        "title": "CSE4500 Class",
        "start": "2022-02-28T17:30:00",
        "end": "2022-02-28T18:45:00"
    }
]
*/
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
    return view('welcome');
});
Route::get('/maninfo', function () {
    return view('manufacturerInfo');
});
Route::get('/equipment', function () {
    $equipments = Equipment::sortable()->paginate(5);
    return view('equipment', compact('equipments'));
});

// Route::get('/note/create',function(){
//   $equipment_id = Equipment::find($id);
//   return view('note.create', ['equipement_id'=> $equipment_id]);
// });

Route::get('/note/create/{id}', function($id){
  $id = request('id');
  return view('note.create', compact('id'));
})->name('note.create');

Route::delete('/note/create/{id}', 'NoteController@destroy')->name('note.destroy');
// Route::get('/note/create/{id}', function($id){}, [NoteController::class, 'create'])->name('note.create');

Route::fallback(function () {
    return view('emergency');
});

//Database routes\\
Route::get('/db-test',function () {
  try{
    \DB::connection()->getPDO();
    $db_name = \DB::connection()->getDatabaseName();
    echo 'Database Connected: '.$db_name;
  } catch (\Exception $e){
    echo 'None';
  }
});
Route::get('/db-migrate', function(){
  Artisan::call('migrate');
  echo Artisan::output();
});
Route::post('/edit','EquipmentController@edit');

Route::resource('/equipment', EquipmentController::class);
Route::resource('/note', NoteController::class);
