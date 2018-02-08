<?php

namespace Zendvn\File;

use PHPImageWorkshop\ImageWorkshop;

class Image {
	
	public function upload($fileInput, $options = null){
		
		if($options['task'] == 'user-avatar'){
			$uploadObj 			= new Upload();
			$uploadDirectory	= PATH_FILES . '/users/';
			$fileName			= $uploadObj->uploadFile($fileInput, $uploadDirectory, array('task' => 'rename'), 'user_');
				
			$layer = ImageWorkshop::initFromPath(PATH_FILES . '/users/' . $fileName);
			$layer->cropMaximumInPixel(0, 0, "MM");
			$layer->resizeInPixel(215, 215, true);
			$layer->save(PATH_FILES . '/users/thumb', $fileName, true);
			
			return $fileName;
		}
		
		if($options['task'] == 'book-picture'){
			$uploadObj 			= new Upload();
			$uploadDirectory	= PATH_FILES . '/books/';
			$fileName			= $uploadObj->uploadFile($fileInput, $uploadDirectory, array('task' => 'rename'), 'book_');
		
			$layer = ImageWorkshop::initFromPath(PATH_FILES . '/books/' . $fileName);
			
			// 270x360
			$layer->resizeInPixel(210, 280, false);
			$layer->save(PATH_FILES . '/books/thumb/270x360', $fileName, true);
			
			// 140x190
			$layer->resizeInPixel(140, 190, true);
			$layer->save(PATH_FILES . '/books/thumb/140x190', $fileName, true);
			
			// 80x120
			$layer->resizeInPixel(80, 120, true);
			$layer->save(PATH_FILES . '/books/thumb/80x120', $fileName, true);
				
			return $fileName;
		}
		
		if($options['task'] == 'slider'){
			$uploadObj 			= new Upload();
			$uploadDirectory	= PATH_FILES . '/sliders/';
			$fileName			= $uploadObj->uploadFile($fileInput, $uploadDirectory, array('task' => 'rename'), 'slider_');
		
			return $fileName;
		}
	}
	
	public function removeImage($fileName, $options = null){
		
		if($options['task'] == 'user-avatar'){
			$fileMain	= PATH_FILES . '/users/' . $fileName;
			@unlink($fileMain);
			
			$fileThumb	= PATH_FILES . '/users/thumb/' . $fileName;
			@unlink($fileThumb);
		}
		
		if($options['task'] == 'book-picture'){
			$fileMain	= PATH_FILES . '/books/' . $fileName;
			@unlink($fileMain);
				
			$fileThumb	= PATH_FILES . '/books/thumb/270x360/' . $fileName;
			@unlink($fileThumb);
			
			$fileThumb	= PATH_FILES . '/books/thumb/140x190/' . $fileName;
			@unlink($fileThumb);
			
			$fileThumb	= PATH_FILES . '/books/thumb/80x120/' . $fileName;
			@unlink($fileThumb);
		}
		
		if($options['task'] == 'slider'){
			$fileMain	= PATH_FILES . '/sliders/' . $fileName;
			@unlink($fileMain);
		}
	}
}