<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/show', function (Request $request, Response $response, array $args) {
	
$this->db;
$mangas = NULL; 
$mangas = Mangas::all();

    return $this->renderer->render($response, 'show.phtml',['mangas' => $mangas]);
	
});



$app->get('/createtable', function (Request $request, Response $response, array $args) {
	$this->db;
   
   $capsule = new \Illuminate\Database\Capsule\Manager;

    $capsule::schema()->dropIfExists('mangas');

    $capsule::schema()->create('mangas', function (\Illuminate\Database\Schema\Blueprint $table) {
        $table->increments('id');
        $table->string('title')->default('');
		$table->string('episodesnb')->default('');
		$table->string('genre')->default('');
        
    });	
	
    // Render index view
    return $this->renderer->render($response, 'menu.phtml', $args);
	
	
});


$app->get('/add', function (Request $request, Response $response, array $args) {
	$this->db;
   
   $capsule = new \Illuminate\Database\Capsule\Manager;
	
    // Render index view
    return $this->renderer->render($response, 'add.phtml', $args);
	
	
});


$app->post('/added', function (Request $request, Response $response, array $args) {
    $this->db;
    
    $manga = new Mangas;

    $manga->title = $request->getParam('title');
    $manga->episodesnb = $request->getParam('episodesnb');
    $manga->genre = $request->getParam('genre');
    /*$manga = Mangas::firstOrCreate(
        ['title' => $manga->title]
    );*/
    $manga->save();
    // Render index view
    return $this->renderer->render($response, 'added.phtml', $args);
	
	
});


$app->get('/delete', function (Request $request, Response $response, array $args) {
    $this->db;
    $mangas = Mangas::all();
    
        return $this->renderer->render($response, 'delete.phtml',['mangas' => $mangas]);
});

$app->post('/deleted', function (Request $request, Response $response, array $args) {
    $this->db;
    Mangas::destroy($request->getParam('id'));
    //$manga = Mangas::find($request->getParam('id'));
    
    //$flight->delete();
    // Render index view
    return $this->renderer->render($response, 'deleted.phtml', $args);
	
	
});

$app->get('/update', function (Request $request, Response $response, array $args) {
    $this->db;
    $mangas = Mangas::all();
    
        return $this->renderer->render($response, 'update.phtml',['mangas' => $mangas]);
});


$app->post('/updated', function (Request $request, Response $response, array $args) {
    $this->db;
    $manga = new Mangas;
    Mangas::destroy($request->getParam('id'));
    //$manga = Mangas::find($request->getParam('id'));
   // if($request->getParam('title')!=''){
        $manga->title = $request->getParam('title');
 //   }
    //if($request->getParam('episodesnb')!=''){
        $manga->episodesnb = $request->getParam('episodesnb');
   // }
   // if($request->getParam('genre')!=''){
        $manga->genre = $request->getParam('genre');
   // }
    
    
    $manga->save();


    return $this->renderer->render($response, 'updated.phtml', $args);
	
	
});






$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
   $this->db;
$mangas = NULL; 
$mangas = Mangas::all();
    
    return $this->renderer->render($response, 'menu.phtml', ['mangas' => $mangas]);
});




