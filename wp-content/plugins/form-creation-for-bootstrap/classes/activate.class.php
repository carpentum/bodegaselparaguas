<?php


class BS_Forms_Activate {

    public static function activate() {
        global $wpdb;
        
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        $formData = "CREATE TABLE " . $wpdb->prefix . "bs_formdata (
              data_id INT(11) NOT NULL AUTO_INCREMENT,
              data_type VARCHAR(255) NOT NULL,
              data_name VARCHAR(255) NOT NULL,
              data_placeholder VARCHAR(255) NOT NULL,
              data_class VARCHAR(255) NOT NULL,
              data_label VARCHAR(255) NOT NULL,
              data_column_xs INT(11) NOT NULL,
              data_column_sm INT(11) NOT NULL,
              data_column_md INT(11) NOT NULL,
              data_column_lg INT(11) NOT NULL,
              data_req INT(11) NOT NULL,
              form_id INT(11) NOT NULL,
              sort_id INT(11) NOT NULL,
              PRIMARY KEY (data_id)
            );";
        dbDelta( $formData );


        $formData = "CREATE TABLE " . $wpdb->prefix . "bs_forms (
                form_id int(11) NOT NULL AUTO_INCREMENT,
                form_name varchar(255) NOT NULL,
                form_data TEXT NOT NULL,
                form_added timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                form_email varchar(255) NOT NULL,
                form_emailCC varchar(255) NOT NULL,
                PRIMARY KEY (form_id)
            );";
        dbDelta( $formData );


        $formData = "CREATE TABLE " . $wpdb->prefix . "bs_options (
                option_id int(11) NOT NULL AUTO_INCREMENT,
                option_text varchar(255) DEFAULT NULL,
                option_value varchar(255) DEFAULT NULL,
                data_id varchar(255) DEFAULT NULL,
                PRIMARY KEY (option_id)
            );";
        dbDelta( $formData );


        $formData = "CREATE TABLE " . $wpdb->prefix . "bs_postdata (
                post_id int(11) NOT NULL AUTO_INCREMENT,
                post_data text NOT NULL,
                post_added timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                form_id int(11) NOT NULL,
                PRIMARY KEY (post_id)
            );";
        dbDelta( $formData );

        // Add the DB Version
        add_option( 'bsf_db_version', WPS_VERSION);

        $dbVersion = get_option( "bsf_db_version" );
        if ( $dbVersion != WPS_VERSION ) {

            $formData = "CREATE TABLE " . $wpdb->prefix . "bs_formdata (
                  data_id INT(11) NOT NULL AUTO_INCREMENT,
                  data_type VARCHAR(255) NOT NULL,
                  data_name VARCHAR(255) NOT NULL,
                  data_placeholder VARCHAR(255) NOT NULL,
                  data_class VARCHAR(255) NOT NULL,
                  data_label VARCHAR(255) NOT NULL,
                  data_column_xs INT(11) NOT NULL,
                  data_column_sm INT(11) NOT NULL,
                  data_column_md INT(11) NOT NULL,
                  data_column_lg INT(11) NOT NULL,
                  data_req INT(11) NOT NULL,
                  form_id INT(11) NOT NULL,
                  sort_id INT(11) NOT NULL,
                  PRIMARY KEY (data_id)
                );";
            dbDelta( $formData );

            $formData = "CREATE TABLE " . $wpdb->prefix . "bs_forms (
                form_id int(11) NOT NULL AUTO_INCREMENT,
                form_name varchar(255) NOT NULL,
                form_data TEXT NOT NULL,
                form_added timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                form_email varchar(255) NOT NULL,
                form_emailCC varchar(255) NOT NULL,
                PRIMARY KEY (form_id)
            );";
            dbDelta( $formData );

            $formData = "CREATE TABLE " . $wpdb->prefix . "bs_postdata (
                post_id int(11) NOT NULL AUTO_INCREMENT,
                post_data text NOT NULL,
                post_added timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                form_id int(11) NOT NULL,
                PRIMARY KEY (post_id)
            );";
            dbDelta( $formData );

            update_option( "bsf_db_version", WPS_VERSION);
        }

    }

}