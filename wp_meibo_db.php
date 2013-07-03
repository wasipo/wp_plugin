<?php


class wp_meibo_regit_database
{


    function cmt_activate() 
    {
        global $wpdb;
        //DBのバージョン
        $cmt_db_version = '1.0';
        //現在のDBバージョン取得
        $installed_ver = get_option( 'cmt_meta_version' );
            // DBバージョンが違ったら作成
            if( $installed_ver != $cmt_db_version ) 
            {
                $sql = "CREATE TABLE " . $this->in_form_db . " (
                  meta_id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
                  post_id bigint(20) UNSIGNED DEFAULT '0' NOT NULL,
                  item_name text,
                  item_name1 text,
                  item_name2 text,
                  item_name3 text,
                  item_name4 text,
                  item_name5 text,
                  UNIQUE KEY meta_id (meta_id)
                )
                CHARACTER SET 'utf8';";
                require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
                dbDelta($sql);
                //オプションにDBバージョン保存
                update_option('cmt_meta_version', $cmt_db_version);
            }
    }


}