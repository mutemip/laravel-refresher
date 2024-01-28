<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
class Task
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description,
        public bool $completed,
        public string $created_at,
        public string $updated_at
    ) {
    }
}

$tasks = [
    new Task(
        1,
        'Buy groceries',
        'Task 1 description',
        'Task 1 long description',
        false,
        '2023-03-01 12:00:00',
        '2023-03-01 12:00:00'
    ),
    new Task(
        2,
        'Sell old stuff',
        'Task 2 description',
        null,
        false,
        '2023-03-02 12:00:00',
        '2023-03-02 12:00:00'
    ),
    new Task(
        3,
        'Learn programming',
        'Task 3 description',
        'Task 3 long description',
        true,
        '2023-03-03 12:00:00',
        '2023-03-03 12:00:00'
    ),
    new Task(
        4,
        'Take dogs for a walk',
        'Task 4 description',
        null,
        false,
        '2023-03-04 12:00:00',
        '2023-03-04 12:00:00'
    ),
];

Route::get('/', function(){
    return redirect()->route('tasks.index');
});

// Route::get('/tasks', function () use($tasks){
//     return View("index", 
//     // ["name"=>"Mutemi"]
//     ["tasks"=>$tasks]);
// })->name("tasks.index");

// read  data from tasks models/db
Route::get('/tasks', function(){
    // $tasks = \App\Models\Task::all();
    return View('index', ['tasks'=>\App\Models\Task::latest()->get()]);
})->name("tasks.index");


// Route::get("tasks/{id}", function($id) use($tasks){
//     $task = collect($tasks)->firstWhere('id', $id);
//     if (!$task){
//         abort(Response::HTTP_NOT_FOUND);
//     }
//     return  view("show", ["task"=>$task]);
// })->name("tasks.show");


# retrieve specific  task by id using route model binding (implicit binding)
Route::get("tasks/{id}", function($id) {
    // $task=\App\Models\Task ::find($id);
    // if (!$task){
    //     abort(Response::HTTP_NOT_FOUND);
    // }
    return View("show",['task'=>\App\Models\Task ::findorFail($id)]);
})->name("tasks.show");


// fallback route
Route::fallback(function(){
    return "This is fallback url-you are LOST!!";
})->name("fallback");


// Route::get("/hello", function () {
//     return "This is hello page.";
// })->name("hello-route"); //naming routes

// // retiring a url
// Route::get("/helo", function () {
//     return redirect()->route("hello-route"); //redirecting to named route
// });

// Route::get("/greet/{name}/", function ($name) {
//     return "Hello " . $name . "!";
// });

// Route::get("/private", function () {
//     return "Made repo Private!!";
// });