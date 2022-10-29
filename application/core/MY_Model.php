<?php



class MY_Model extends CI_Model
{

    private $table;

    private $return_type = 'object';
    
    protected $db;
    

    public function  __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('sakila', true);
    }

    public function table_exists( $table = false )
    {
        $ret = $this->db->table_exists( ($table) ? $this->table : $table );

        return $ret;
    }

    public function set_table( $table )
    {
        $this->table = $table;
    }

    public function set_return( $type )
    {
        switch( $type ):

            case 'array':
                $this->return_type = $type;
            break;

            case 'row':
                $this->return_type = $type;
            break;

            default:
                $this->return_type = 'object';

        endswitch;
    }

    public function update( $data, $where )
    {
        $this->db->where( $where );
        $ret = $this->db->update( $this->table, $data );

        return $ret;
    }

    public function insert( $data, $return_id = false )
    {
        $ret = false;

        if( !$return_id )
            $ret = $this->db->insert( $this->table, $data );
        else
        {
            $this->db->insert( $this->table, $data );
            $ret = $this->db->insert_id();
        }

        return $ret;
    }

    public function get( $fields = array(), $where = NULL, $orderby = NULL, $ini = NULL, $off = NULL, $like = NULL )
    {
        $this->db->from( $this->table );

        $qtd_fields = is_array($fields) ? count($fields) : 0;
        if( $qtd_fields > 0 )
            $this->db->select( implode(', ', array_values($fields)) );

        ( ! is_null($where) && is_array($where) ) ? $this->db->where( $where ) : NULL;
        ( ! is_null($off) && ! is_null($ini) ) ? $this->db->limit( $ini, $off ) : NULL;
        ( ! is_null($orderby) ) ? $this->db->order_by( $orderby ) : NULL;
        ( ! is_null($like) ) ? $this->db->like( $like ) : NULL;

        $query = $this->db->get();

        if( $this->return_type == 'row' )
            $res = $query->row_array();
        else
            $res = $query->result_array();

        $qtd = ($res) ? count($res) : 0;
        if( $qtd == 0 )
            return false;

        return $res;
    }

    public function delete( $where )
    {
        $this->db->where( $where );
        $ret = $this->db->delete( $this->table );

        return $ret;
    }

    public function count_results( $where, $like = false )
    {
        $this->db->where($where);

        if( $like )
            $this->db->like( $like );

        return $this->db->count_all_results( $this->table );
    }

}
