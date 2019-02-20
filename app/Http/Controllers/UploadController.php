<?php

namespace App\Http\Controllers;

use App\Place;
use App\Picturesplace; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
 
class UploadController extends Controller
 
{
 	//view form to upload pictures
	public function uploadForm(){
	 
		return view('lieu.show');
 
	}

 	//upload pictures from the form
	public function uploadSubmit(Request $request){
	 
		$this->validate($request, [
			 
			'place_id' => 'required',
			'photos'=>'required',
		 
		]);
	 	
	 	//request file
		if($request->hasFile('photos')){
		
		//extensions accepted
		$allowedfileExtension=['jpg','jpeg','png'];
		 
		$files = $request->file('photos');

			//loop to get all pictures
			foreach($files as $file){
			 
			 	//keep first name and extensions
				$filename = $file->getClientOriginalName();
				 
				$extension = $file->getClientOriginalExtension();
				 
				$check=in_array($extension,$allowedfileExtension);
				 
				//dd($check);
			}
				 
				if($check){
				 
					foreach ($request->photos as $photo) {
					 	
					 	//storage
						$filename = $photo->store('places', 'public');
						 
						//create in database
						Picturesplace::create([
						 
							'place_id' => $request->place_id,
							'picture_url' => $filename
						 
						]);
					}
				 
				echo "téléchargement réussi.";
				 
				}else{
				 
				echo '<div class="alert alert-warning"><strong>Warning!</strong> Désolé! Les formats d\'images doivent être en png ou jpg/jpeg </div>';
				 
				}
			
		}
	 
	return redirect()->back();
	}
}