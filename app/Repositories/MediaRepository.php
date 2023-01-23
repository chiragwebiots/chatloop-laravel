<?php

namespace App\Repositories;

use App\Models\Media;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Repositories\Contracts\MediaInterface;

class MediaRepository implements MediaInterface 
{
	
	private $_request;
    private $_media;

	public function __construct(Media $media) 
    {
        $this->_media = $media;

		$this->_request = app('request');
	}

    public function all() 
    {
        $media = $this->_media;

        if($this->_request->sort == 'newest') {
            $media = $media->latest('updated_at');
        }
        else if($this->_request->sort == 'oldest') {
            $media = $media->oldest('updated_at');
        }
        else if($this->_request->sort == 'smallest') {
            $media = $media->orderBy('size','asc');
        }
        else if($this->_request->sort == 'largest') {
            $media = $media->orderBy('size','desc');
        }

        $term = $this->_request->term;

        if($term) {
            $media = $media->where('original_file_name', 'LIKE', "%$term%");
        }

		return $media->orderBy('created_at', 'desc')->get();
	} 
	
	public function store() 
    {
        
		if($this->_request->hasFile('file')) {

            // Get file original name
            $original_name = $this->_request->file('file')->getClientOriginalName();

            // Get file extension
            $extension = $this->_request->file('file')->getClientOriginalExtension();

            // Get file size
            $size = $this->_request->file('file')->getSize();

            // Get file Mime type
            $mime_type = $this->_request->file('file')->getMimeType();
     
            // Valid extensions
            $validextensions = array("jpeg","jpg","png");
     
            // Check extension
            if(in_array(strtolower($extension), $validextensions)){

                $destinationPath = $this->_request->file('file')->store('upload');

                // Uploading file to given path
                $image = Image::make(public_path('/').$destinationPath)->encode();
                $image->save(public_path('/').$destinationPath);

                $this->_media->url = $destinationPath;
                $this->_media->original_file_name = $original_name;
                $this->_media->mime_type = $mime_type;
                $this->_media->size = $size;
                $this->_media->created_by = Auth::user()->id;
                $this->_media->save();

                return response()->json(['location' => '/'.$this->_media->url]);
            }
        }

	}

    public function destroy($id)
    {
        unlink(public_path($this->_media->find($id)->url));
        
		return $this->_media->destroy($id);
	}
    
}