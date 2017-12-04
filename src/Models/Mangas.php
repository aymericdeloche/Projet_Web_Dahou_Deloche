<?php 
//namespace App;
use Illuminate\Database\Eloquent\Model as Eloquent;
class Mangas extends Eloquent {
	protected $title = ['title'];
	protected $episodesnb = ['episodesnb'];
	protected $genre = ['genre'];
	public $timestamps = false;
}