<?php
/**
 * Facebook Get share
 */
class crestaShareSocialCount {
	function get_facebook() {
		global $wp_query; 
		$post = $wp_query->post;
		$fbappid = get_option('cresta_social_shares_facebook_appid');
		$fbappsecret = get_option('cresta_social_shares_facebook_appsecret');
		$fbcacheperiod = get_option('cresta_social_shares_cache_period') ? get_option('cresta_social_shares_cache_period') : 24;
		$storeInMeta = get_option('cresta_social_shares_store_meta');
		$theToken = $fbappid.'|'.$fbappsecret;
		$cache_key = 'cresta_facebook_share_' . $post->ID;
		$count = get_transient( $cache_key );
		if ($storeInMeta == 1) {
			$getPost = get_post_meta( $post->ID, 'cresta_facebook_share_count', true ) ? get_post_meta( $post->ID, 'cresta_facebook_share_count', true ) : 0;
			if ( $count === false ) {
				$response = wp_remote_get( add_query_arg( array( 
					'id' => rawurlencode(get_permalink( $post->ID )),
					'access_token' => esc_attr($theToken),
					'fields' => 'engagement'
				), 'https://graph.facebook.com/' ) );
				$body = json_decode( $response['body'],true );
				$reaction = intval($body['engagement']['reaction_count']);
				$comment = intval($body['engagement']['comment_count']);
				$share = intval($body['engagement']['share_count']);
				$total = $reaction + $comment + $share; 
				if ($total > $getPost) {
					update_post_meta( $post->ID, 'cresta_facebook_share_count', $total );
				}
				set_transient( $cache_key, $total, $fbcacheperiod * HOUR_IN_SECONDS );
			}
			return $getPost;
		} else {
			if ( $count === false ) {
				$response = wp_remote_get( add_query_arg( array( 
					'id' => rawurlencode(get_permalink( $post->ID )),
					'access_token' => esc_attr($theToken),
					'fields' => 'engagement'
				), 'https://graph.facebook.com/' ) );
				$body = json_decode( $response['body'],true );
				$reaction = intval($body['engagement']['reaction_count']);
				$comment = intval($body['engagement']['comment_count']);
				$share = intval($body['engagement']['share_count']);
				$total = $reaction + $comment + $share; 
				set_transient( $cache_key, $total, $fbcacheperiod * HOUR_IN_SECONDS );
				return $total;
			} else {
				return $count ? $count : 0;
			}
		}
	}
}

?>