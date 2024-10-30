<?php 
 /**
  * 
  * @package    BizReview - Business and google Place Review WordPress Plugin
  * @version    1.1
  * @author     ThemeAelier
  * @Websites: http://themeatelier.net
  *
  */
 

class BizReview_Google_API {

	private $APIUrl;
	private $apikey;
	public $placeId;


	function __construct( array $args ) {

		$this->apikey = $args['apikey'];
		$this->placeId = $args['placeid'];

		$this->api_url();
	}


	public function api_url() {

		$Url = 'https://maps.googleapis.com/maps/api/place/details/json';

		$peram =array(
			'placeid' 	=> $this->placeId,
			'fields'	=> 'name,rating,review,url,icon,formatted_address,formatted_phone_number,user_ratings_total',
			'key' 		=> $this->apikey
		);

		$APIUrl = add_query_arg(
			$peram,
			$Url 
		);

		$this->APIUrl = esc_url_raw( $APIUrl );

	}

	public function get_place_data() {

		$data = wp_remote_get( $this->APIUrl  );

		$data = json_decode( $data['body'], true );

		return $data['result'];
	}

}
