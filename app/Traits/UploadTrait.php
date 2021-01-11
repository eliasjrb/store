<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait UploadTrait 
{
    public function imageUpload($images, $imageColunm = null)
    {
        // $images = $request->file('photos');
        $uploadedImages = [];
        if(is_array($images)){

            foreach($images as $image){
            $uploadedImages[] = [$imageColunm => $image->store('product', 'public')];
            }
                
        }else{
                $uploadedImages = $images->store('logo', 'public');
        }

        return $uploadedImages;
    }


}