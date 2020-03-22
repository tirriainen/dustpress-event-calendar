<?php
/**
 * Template Name: Events
 *
 * This template needs a page to function!
 */

/**
 * Class Archive
 */
class PageEvents extends \DustPress\Model {

    /**
     * Binds submodules for all extending classes.
     */
    public function Submodules() {
        $this->bind_sub( 'Header' );
        $this->bind_sub( 'Footer' );
    }
    
    /**
     * Enable DustPress.js usage
     *
     * @var array
     */
    protected $api = [
        'get_future_events',
        'get_events'
    
    ];
    
    /* 
     *	Tulevat tapahtumat. Näihin kuuluu tapahtumat 
     *	jotka eivät ole vielä alkaneet sekä jo alkaneet tapahtumat, 
     *	jotka eivät ole vielä päättyneet. 
     *	Järjestä tapahtumat alkamisajankohtansa mukaan siten, 
     *	että ensimmäisenä alkanut näytetään ensimmäisenä.
    */
    
    public function get_future_events() {

        $args = [
            'post_type'			=> 'event',
            'posts_per_page'	=> -1,
            'order'				=> 'ASC',
            'orderby'			=> 'meta_value_num',
            'meta_key'			=> 'event_start_date',
            'meta_query' => [
                'relation' => 'OR',
                [
                    'key'     => 'event_start_date',
                    'value'   => date('Ymd'),
                    'compare' => '>=',
                ],
                [
                    'key'     => 'event_end_date',
                    'value'   => date('Ymd'),
                    'compare' => '>=',
                ],
            ],
        ];

        return \DustPress\Query::get_acf_posts( $args );
    }
    
    /* 
     *	Kaikki tapahtumat. 
     *	Järjestä kaikki tapahtumat alkamisajankohtansa mukaan siten, 
     *	että ensimmäisenä näytetään tapahtuma, 
     *	jonka alkamisajankohta on pisimmällä tulevaisuudessa.
    */
	
    public function get_events() {

        $args = [
            'post_type'			=> 'event',
            'posts_per_page'	=> -1,
            'orderby'			=> 'meta_value_num',
            'meta_key'			=> 'event_start_date',
        ];

        return \DustPress\Query::get_acf_posts( $args );
    }
}
