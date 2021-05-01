<?php
/**
 * Facebook Get share both http and https
 */
class crestaShareSocialCount {
	function get_facebook() {
		global $wp_query; 
		$post = $wp_query->post;
		$oldurl = preg_replace("/^https:/i", "http:", get_permalink( $post->ID ));
		$fbappid = get_option('cresta_social_shares_facebook_appid');
		$fbappsecret = get_option('cresta_social_shares_facebook_appsecret');
		$fbcacheperiod = get_option('cresta_social_shares_cache_period') ? get_option('cresta_social_shares_cache_period') : 24;
		$storeInMeta = get_option('cresta_social_shares_store_meta');
		$theToken = $fbappid.'|'.$fbappsecret;
		$cache_key = 'cresta_facebook_share_' . $post->ID;
		$count_total = get_transient( $cache_key );
		if ($storeInMeta == 1) {
			$getPost = get_post_meta( $post->ID, 'cresta_facebook_share_count', true ) ? get_post_meta( $post->ID, 'cresta_facebook_share_count', true ) : 0;
			if ( $count_total === false ) {
				$response = wp_remote_get( add_query_arg( array( 
					'id' => rawurlencode(get_permalink( $post->ID )),
					'access_token' => esc_attr($theToken),
					'fields' => 'engagement'
				), 'https://graph.facebook.com/' ) );
				$body = json_decode( $response['body'],true );
				$reaction = intval($body['engagement']['reaction_count']);
				$comment = intval($body['engagement']['comment_count']);
				$share = intval($body['engagement']['share_count']);
				$count = $reaction + $comment + $share; 
				
				$response_old = wp_remote_get( add_query_arg( array( 
					'id' => rawurlencode($oldurl),
					'access_token' => esc_attr($theToken),
					'fields' => 'engagement'
				), 'https://graph.facebook.com/' ) );
				$body_old = json_decode( $response_old['body'],true );
				$reaction_old = intval($body_old['engagement']['reaction_count']);
				$comment_old = intval($body_old['engagement']['comment_count']);
				$share_old = intval($body_old['engagement']['share_count']);
				$count_old = $reaction_old + $comment_old + $share_old; 
				
				$total = $count + $count_old;
				if ($total > $getPost) {
					update_post_meta( $post->ID, 'cresta_facebook_share_count', $total );
				}
				set_transient( $cache_key, $total, $fbcacheperiod * HOUR_IN_SECONDS );
			}
			return $getPost;
		} else {
			if ( $count_total === false ) {
				$response = wp_remote_get( add_query_arg( array( 
					'id' => rawurlencode(get_permalink( $post->ID )),
					'access_token' => esc_attr($theToken),
					'fields' => 'engagement'
				), 'https://graph.facebook.com/' ) );
				$body = json_decode( $response['body'],true );
				$reaction = intval($body['engagement']['reaction_count']);
				$comment = intval($body['engagement']['comment_count']);
				$share = intval($body['engagement']['share_count']);
				$count = $reaction + $comment + $share; 
				
				$response_old = wp_remote_get( add_query_arg( array( 
					'id' => rawurlencode($oldurl),
					'access_token' => esc_attr($theToken),
					'fields' => 'engagement'
				), 'https://graph.facebook.com/' ) );
				$body_old = json_decode( $response_old['body'],true );
				$reaction_old = intval($body_old['engagement']['reaction_count']);
				$comment_old = intval($body_old['engagement']['comment_count']);
				$share_old = intval($body_old['engagement']['share_count']);
				$count_old = $reaction_old + $comment_old + $share_old; 
				
				$total = $count + $count_old;
				set_transient( $cache_key, $total, $fbcacheperiod * HOUR_IN_SECONDS );
				return $total;
			} else {
				return $count_total ? $count_total : '0';
			}
		}
	}
}

?>