<?php

namespace App\classes;


class UploadFile{

	public $_filename, $_maxFileSize=5000000, $_fileExt, $_newFilePath, $_validExt=['jpg', 'png', 'jpeg'];

	// get filename
	public function getFileName(){
		return $this->_filename;
	}


	//get the file extention eg jpeg
	public function getFileExt($filename){
		return $this->_fileExt = pathinfo($filename, PATHINFO_EXTENSION);
	}


	//get the file size statically
	public static function getFileSize($filesize){
		$obj = new static;
		$maxSize = $obj->_maxFileSize; 
		// $maxSize = self::_maxFileSize;
		
		return $filesize > $maxSize ?  true: false;
	}


	//check if the file is really an image
	public static function isImage($filename){
		$obj = new static;
		$ext = $obj->getFileExt($filename);
		// $ext = self::getFileExt($filename);

		return in_array(strtolower($ext), $obj->_validExt)? true : false;
	}


	//get new file path for storage location
	// public function getNewFilePath(){
	// 	pnd($this->_newFilePath);
	// 	return $this->_newFilePath;
	// }


	public static function setFileName($filename, $name=''){
		$obj  = new static;
		if ($name == ''){
			$name = pathinfo($filename, PATHINFO_FILENAME);
			
			$name = strtolower(str_replace([' ', '_'], ['-'], $name));
			$hash = md5(microtime()); 
			// $ext = (new UploadFile)->getFileExt($filename);
			$ext = $obj->getFileExt($filename);

			$obj->_filename = "{$name}-{$hash}.{$ext}";
			return $obj->_filename;
			
		}else{
	
			$name = strtolower(str_replace([' ', '_'], ['-'], $name));
			$hash = md5(microtime()); 
			// $ext = (new UploadFile)->getFileExt($filename);
			$ext = $obj->getFileExt($filename);

			$obj->_filename = "{$name}-{$hash}.{$ext}";
			
			return $obj->_filename;
		}
	}


	public static function move($tmpLocation, $toFolder, $filename, $newFileName=''){
		$obj = new static;
		//set and get new filename
		
		$newFileName = self::setFileName($filename, $newFileName);
		
		(!is_dir($toFolder))? mkdir($toFolder, 0777, true) : false;

		//file path for storing in database
		$obj->_newFilePath = $toFolder.DS.$newFileName;
		$destination = $toFolder.DS.$newFileName; 

		move_uploaded_file($tmpLocation, $destination);

		return $obj->_newFilePath;

	
	}















}





























?>