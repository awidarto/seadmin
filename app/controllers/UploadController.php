<?php

class UploadController extends Controller {

	public function __construct()
	{

	}

	public function postIndex()
	{
        $files = Input::file('files');

        $file = $files[0];

        //print_r($file);

        //exit();

        $rstring = str_random(15);

        $destinationPath = realpath('storage/products').'/'.$rstring;

        $filename = $file->getClientOriginalName();
        $filemime = $file->getMimeType();
        $filesize = $file->getSize();
        $extension =$file->getClientOriginalExtension(); //if you need extension of the file

        $filename = str_replace(Config::get('kickstart.invalidchars'), '-', $filename);

        $uploadSuccess = $file->move($destinationPath, $filename);

        $thumbnail = Image::make($destinationPath.'/'.$filename)
            ->grab(160,120)
            ->save($destinationPath.'/th_'.$filename);

        $fileitems = array();

        if($uploadSuccess){
            $fileitems[] = array(
                    'url'=> URL::to('storage/products/'.$rstring.'/'.$filename),
                    'thumbnail_url'=> URL::to('storage/products/'.$rstring.'/th_'.$filename),
                    'temp_dir'=> $destinationPath,
                    'name'=> $filename,
                    'type'=> $filemime,
                    'size'=> $filesize,
                    'delete_url'=> URL::to('storage/products/'.$rstring.'/'.$filename),
                    'delete_type'=> 'DELETE'
                );

        }

        return Response::JSON(array('files'=>$fileitems) );
	}

    public function postAdd()
    {
        $files = Input::file('files');

        $file = $files[0];

        //print_r($file);

        //exit();

        $rstring = str_random(8);

        $destinationPath = realpath('storage/temp').'/'.$rstring;

        $filename = $file->getClientOriginalName();
        $filemime = $file->getMimeType();
        $filesize = $file->getSize();
        $extension =$file->getClientOriginalExtension(); //if you need extension of the file

        $filename = str_replace(Config::get('kickstart.invalidchars'), '-', $filename);

        $uploadSuccess = $file->move($destinationPath, $filename);

        $thumbnail = Image::make($destinationPath.'/'.$filename)
            ->grab(320,240)
            ->save($destinationPath.'/th_'.$filename);

        $fileitems = array();

        if($uploadSuccess){
            $fileitems[] = array(
                    'url'=> URL::to('storage/temp/'.$rstring.'/'.$filename),
                    'thumbnail_url'=> URL::to('storage/temp/'.$rstring.'/th_'.$filename),
                    'temp_dir'=> $destinationPath,
                    'name'=> $filename,
                    'type'=> $filemime,
                    'size'=> $filesize,
                    'delete_url'=> 'http://url.to/delete /file/',
                    'delete_type'=> 'DELETE'
                );

        }

        return Response::JSON(array('files'=>$fileitems) );
    }


    public function postEdit()
    {
        $files = Input::file('files');

        $file = $files[0];

        //print_r($file);

        //exit();

        $rstring = str_random(8);

        $destinationPath = realpath('storage/temp').'/'.$rstring;

        $filename = $file->getClientOriginalName();
        $filemime = $file->getMimeType();
        $filesize = $file->getSize();
        $extension =$file->getClientOriginalExtension(); //if you need extension of the file

        $filename = str_replace(Config::get('kickstart.invalidchars'), '-', $filename);

        $uploadSuccess = $file->move($destinationPath, $filename);

        $thumbnail = Image::make($destinationPath.'/'.$filename)
            ->grab(320,240)
            ->save($destinationPath.'/th_'.$filename);

        $fileitems = array();

        if($uploadSuccess){
            $fileitems[] = array(
                    'url'=> URL::to('storage/temp/'.$rstring.'/'.$filename),
                    'thumbnail_url'=> URL::to('storage/temp/'.$rstring.'/th_'.$filename),
                    'temp_dir'=> $destinationPath,
                    'name'=> $filename,
                    'type'=> $filemime,
                    'size'=> $filesize,
                    'delete_url'=> 'http://url.to/delete /file/',
                    'delete_type'=> 'DELETE'
                );

        }

        return Response::JSON(array('files'=>$fileitems) );
    }

    public function postDelete($file)
    {

    }

    public function postUp(){

        $file = Input::file('file');

        $destinationPath = Config::get('kickstart.storage').'/uploads/'.str_random(8);
        $filename = $file->getClientOriginalName();
        //$extension =$file->getClientOriginalExtension();
        $upload_success = Input::file('file')->move($destinationPath, $filename);

        if( $upload_success ) {
           return Response::json('success', 200);
        } else {
           return Response::json('error', 400);
        }

    }


}
