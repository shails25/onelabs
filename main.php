<?php

	if(isset($_POST['image-api'])){
		$url = $_POST['image-url'];
		
		// array for storing image base64 code
		$images = [];
		
		// array for storing any error message
		$error = [];
		
		// get json response from url 
		$json_data = file_get_contents($url);
		
		if($json_data === false){
			array_push($error, "Incorrect Url Provided!!");			
		}else{
		
			// decode json into php array
			$json_data = json_decode($json_data, true);
			
			if(!$json_data){
				array_push($error, "Images not found on this Url!!");	
			}else{
				// get image urls from response
				$img_urls = $json_data['previews'];
				
				// get key to access the image 
				$key = $json_data['key'];

				// loop each image url, fetch and store base64 code of each image in array
				foreach($img_urls as $img){
					
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $img);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						'Authorization: secret_key '.$key
					));
					
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

					// if no error occurs store image base64 code in array for later use
					$response = curl_exec($ch);
					
					if($err = curl_error($ch)){
						array_push($error, $err);
						break;
					}else{
						array_push($images, base64_encode($response));
					}
					
					curl_close($ch);		
					
				}
			}
			
			
		}
		
	}
	
