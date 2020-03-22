<?php

/**
 * This is the default model class for our theme.
 */
class SingleEvent extends \DustPress\Model {

    /**
     * This returns the event set for page
     *
     * @return array|null|WP_Post
     */
    public function Page() {
        return get_post( get_the_ID() );
    }
    
}