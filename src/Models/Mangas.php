<?php 
//namespace App;
use Illuminate\Database\Eloquent\Model as Eloquent;
class Mangas extends Eloquent {
	protected $title = ['title'];
	protected $episodesnb = ['episodesnb'];
	protected $genre = ['genre'];
	protected $description = ['description'];
	public $timestamps = false;
}