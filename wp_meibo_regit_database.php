<?php


/*　かんぺ。
  'ID' => [ <投稿 ID> ] // 既存の投稿を更新する場合。
  'menu_order' => [ <順序値> ] // 追加する投稿が固定ページの場合、ページの並び順を番号で指定できます。
  'comment_status' => [ 'closed' | 'open' ] // 'closed' はコメントを閉じます。
  'ping_status' => [ 'closed' | 'open' ] // 'closed' はピンバック／トラックバックをオフにします。
  'pinged' => [ ? ] // ピンバック済。
  'post_author' => [ <user ID> ] // 作成者のユーザー ID。
  'post_category' => [ array(<カテゴリー ID>, <...>) ] // カテゴリーを追加。
  'post_content' => [ <投稿の本文> ] // 投稿の全文。
  'post_date' => [ Y-m-d H:i:s ] // 投稿の作成日時。
  'post_date_gmt' => [ Y-m-d H:i:s ] // 投稿の作成日時（GMT）。
  'post_excerpt' => [ <抜粋> ] // 投稿の抜粋。
  'post_name' => [ <スラッグ名> ] // 投稿スラッグ。
  'post_parent' => [ <投稿 ID> ] // 親投稿の ID。
  'post_password' => [ <投稿パスワード> ] // 投稿の閲覧時にパスワードが必要になります。
  'post_status' => [ 'draft' | 'publish' | 'pending'| 'future' ] // 公開ステータス。 
  'post_title' => [ <タイトル> ] // 投稿のタイトル。
  'post_type' => [ 'post' | 'page' ] // 投稿タイプ名。
  'tags_input' => [ '<タグ>, <タグ>, <...>' ] // 投稿タグ。
  'to_ping' => [ ? ] //?
*/


class wp_meibo_regit_database
{


    private $db_serch;


    function wp_meibo_add($midasi = "") 
    {

       //wp_insert_post();

 
    }


}