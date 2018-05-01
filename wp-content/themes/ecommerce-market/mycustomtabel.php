<?php
if (!class_exists('WP_List_Table')) {
    require_once (ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
 
}
 
/** * Create a new table class that will extend the WP_List_Table */
class CodingbinCustom_tabel extends WP_List_Table 
{
    public function __construct()
    {
        parent::__construct(array(
            'singular' => 'order',
            'plural' => 'orders',
            //'ajax' => true
        ));
    }



/** * Prepare the items for the table to process 
* * @return Void 
*/
public function prepare_items()
{
        // $this->_column_headers = $this->get_column_info();
    $columns = $this->get_columns();
    $hidden = $this->get_hidden_columns();
    $sortable = $this->get_sortable_columns();
    $this->_column_headers = array(
        $columns,
        $hidden,
        $sortable
    );
    /** Process bulk action */
    $this->process_bulk_action();
    $per_page = $this->get_items_per_page('records_per_page', 10);
    $current_page = $this->get_pagenum();
    $total_items = self::record_count();
    $data = self::get_records($per_page, $current_page);
    $this->set_pagination_args(
                      ['total_items' => $total_items, //WE have to calculate the total number of items
                   'per_page' => $per_page // WE have to determine how many items to show on a page
                  ]); 
    $this->items = $data;
}

/** * 
Retrieve records data from the database
 * * @param int $per_page
 * @param int $page_number
 * * @return mixed
*/
public static function get_records($per_page = 10, $page_number = 1)
{
    global $wpdb;
    $sql = "select * from woo_enquiry_master";
    if (isset($_REQUEST['s'])) {
    $sql.= ' where column1 LIKE "%' . $_REQUEST['s'] . '%" or column2 LIKE "%' . $_REQUEST['s'] . '%"';
    }
    if (!empty($_REQUEST['orderby'])) {
            $sql.= ' ORDER BY ' . esc_sql($_REQUEST['orderby']);
        $sql.= !empty($_REQUEST['order']) ? ' ' . esc_sql($_REQUEST['order']) : ' ASC';
    }
    $sql.= " LIMIT $per_page";
    $sql.= ' OFFSET ' . ($page_number - 1) * $per_page;
    $result = $wpdb->get_results($sql, 'ARRAY_A');
    return $result;
}

/** 
* Override the parent columns method. Defines the columns to use in your listing table 
* * @return Array 
*/
function get_columns()
{
    $columns = [
        'cb' => '<input type="checkbox" />', 
        'id' => __('ID', 'ux') , 
        'woo_user_name' => __('Name', 'ux') , 
        'woo_user_email' => __('Email', 'ux') , 
        'woo_user_subject' => __('Subject', 'ux') , 
        'woo_user_phone' => __('Phone', 'ux') , 
        'woo_user_address' => __('Address', 'ux') , 
        'woo_user_comment' => __('Comment', 'ux') , 
        'created_at' => __('Date', 'ux')  
    ];
    return $columns;
}

public function get_hidden_columns()
{
        // Setup Hidden columns and return them
        return array();
}

/** 
* Columns to make sortable. 
* * @return array 
*/
public function get_sortable_columns()
{
    $sortable_columns = array(
        'woo_user_name' => array('woo_user_name',true) ,
        'woo_user_email' => array('woo_user_email',false) ,
        'woo_user_phone' => array('woo_user_phone',false) ,
        'woo_user_subject' => array('woo_user_subject',false) ,
        'created_at' => array('created_at',true) 
    );
    return $sortable_columns;
    
}

/** 
* Render the bulk edit checkbox 
* * @param array $item 
* * @return string 
*/
function column_cb($item)
{
    return sprintf('<input type="checkbox" name="bulk-delete[]" value="%s" />', $item['id']);
}
 
/** 
* Render the bulk edit checkbox 
* * @param array $item 
* * @return string 
*/
function column_first_column_name($item)
{
    return sprintf('<a href="%s" class="btn btn-primary"/>Link Title</a>', $item['first_column_name']);
}

  /* $columns = [
        'id', 
        'woo_user_name', 
        'woo_user_email', 
        'woo_user_subject' , 
        'woo_user_phone', 
        'woo_user_address', 
        'woo_user_comment', 
        'created_at'  
    ];
	
	*/
	
function column_id($item){
	return sprintf('%s',$item['id']);
}
	
function column_woo_user_name($item){
	return sprintf('%s',$item['woo_user_name']);
}
function column_woo_user_email($item){
	return sprintf('%s',$item['woo_user_email']);
}
function column_woo_user_subject($item){
	return sprintf('%s',$item['woo_user_subject']);
}
function column_woo_user_phone($item){
	return sprintf('%s',$item['woo_user_phone']);
}
function column_woo_user_address($item){
	return sprintf('%s',$item['woo_user_address']);
}

function column_woo_user_comment($item){
	return sprintf('%s',$item['woo_user_comment']);
}

function column_created_at($item){
	return sprintf('%s',date('F j, Y, g:i a',strtotime($item['created_at'])));
}

/** 
* Returns an associative array containing the bulk action 
* * @return array */
public function get_bulk_actions()
{
    $actions = ['bulk-delete' => 'Delete'];
    return $actions;
}
public function process_bulk_action()
{
    // Detect when a bulk action is being triggered...
    if ('delete' === $this->current_action()) {
    // In our file that handles the request, verify the nonce.
            $nonce = esc_attr($_REQUEST['_wpnonce']);
        if (!wp_verify_nonce($nonce, 'bx_delete_records')) {
            die('Go get a life script kiddies');
            }
        else {
            self::delete_records(absint($_GET['record']));
            $redirect = admin_url('admin.php?page=enquiry');
            wp_redirect($redirect);
            exit;
        }
    }
 
    // If the delete bulk action is triggered
    if ((isset($_POST['action']) && $_POST['action'] == 'bulk-delete') ||
	(isset($_POST['action2']) && $_POST['action2'] == 'bulk-delete')) {
        $delete_ids = esc_sql($_POST['bulk-delete']);
        // loop over the array of record IDs and delete them
        foreach($delete_ids as $id) {
            self::delete_records($id);
        }
 
        $redirect = admin_url('admin.php?page=enquiry');
        wp_redirect($redirect);
        exit;
        exit;
    }

}
/** 
* Delete a record record. 
* * @param int $id customer ID 
*/
public static function delete_records($id)
{
    global $wpdb;
    $wpdb->delete("woo_enquiry_master", ['id' => $id], ['%d']);
}
/** 
*Text displayed when no record data is available 
*/
public function no_items()
{
    _e('No record found in the database.', 'bx');
}

/** 
* Returns the count of records in the database. 
* * @return null|string 
*/
public static function record_count()
{
    global $wpdb;
    $sql = "SELECT COUNT(*) FROM woo_enquiry_master";
    return $wpdb->get_var($sql);
}

	/**
	 * Whether the table has items to display or not
	 *
	 * @since 3.1.0
	 *
	 * @return bool
	 */
	/*public function has_items() {
		return count(self::record_count()) > 0;
	}*/

	
}
?>
