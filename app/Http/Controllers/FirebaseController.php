<?php

namespace App\Http\Controllers;

use Kreait\Firebase\Factory;
use Illuminate\Http\Request;

class FirebaseController extends Controller
{
    public function index()
    {
        $firebase = (new Factory())
            ->withServiceAccount(__DIR__.'/laravel-firebase-demo-8b4b1-firebase-adminsdk-pki1t-9b49e1c4bf.json')
            ->withDatabaseUri('https://laravel-firebase-demo-8b4b1-default-rtdb.firebaseio.com');
 
        $database = $firebase->createDatabase();
 
        $blog = $database
        ->getReference('blog');
 
        echo '<pre>';
        print_r($blog->getvalue());
        echo '</pre>';
    }
}
