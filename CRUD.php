<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** CRUD Model Template
 * 
 * A CodeIgniter model template provided for the developers
 * when they want to interact with database and perform data manipulation 
 * such as Insert, Select, Update, and Delete.
 * 
 * @author Ichwanul Fadhli
 * @copyright Copyright (c) 2020 Ichwanul Fadhli
 */
class CRUD extends CI_Model{
    /** Add Data Function
     * 
     * This is an Insert function to MySQL. This function is
     * provided to do an insert operation on your program.
     * 
     * @param string $table
     * The table name on your database.
     * 
     * @param array $data
     * The value and the field name of the table.
     * 
     * @return $query
     * 
     */
    function AddData($table, $data = array()){
        // If the table name is empty, then it will throw an error.
        if(empty($table)){
            throw new Error('The table name cannot be empty!');
        }
        // If the data is not an array, then it will throw an error.
        elseif(!is_array($data)){
            throw new Error('The data you enter is not an array data type!');
        }
        // Else, just do a normal process.
        else{
            // Inserting the data to the table.
            $query = $this->db->insert_batch($table, $data);
            # insert_batch() allows you to insert data with more than 1 values without cycle.

            // Fetching the affected rows.
            $query = $this->db->affected_rows();

            // Returning $query
            return $query;
        }
    }

    /** Read Data Function
     * 
     * This is a Select function to MySQL. This function is provided to
     * do a select operation on your program.
     * 
     * @param string $table
     * The table name on your database.
     * 
     * @return $query
     * 
     */
    function ReadData($table){
        // If the table name is empty, then it will throw an error.
        if(empty($table)){
            throw new Error('The table name cannot be empty!');
        }
        else{
            // Set the table destination.
            $query = $this->db->from($table);
            // Retrieving data from the table.
            $query = $this->db->get();

            // Returning the data result as an object.
            return $query->result();
    
        }
    }

    /** Read Data Where Function
     * 
     * This is a Select Where function to MySQL. This function is provided to
     * do a select where operation on your program.
     * 
     * @param string $table
     * The table name on your database.
     * 
     * @param array $where
     * The condition and the value of itself for the operation.
     * 
     * @return $query
     * 
     */
    function ReadDataWhere($table, $where = array()){
        // If the table name is empty, then it will throw an error.
        if(empty($table)){
            throw new Error('The table name cannot be empty!');
        }
        // If where condition is empty, then it will throw an error.
        elseif(empty($where)){
            throw new Error('Where condition cannot be empty!');
        }
        // Else, just do normal process.
        else{
            // Set the where condition.
            $query = $this->db->where($where);
            // Retrieving data from the table.
            $query = $this->db->get($table);
    
            // Returning the data result as an object.
            return $query->result();
        }
    }

    /** Update Data Function
     * 
     * This is an Update function to MySQL. This function is provided to
     * do an update operation on your program.
     * 
     * @param string $table
     * The table name on your database.
     * 
     * @param array $data
     * The value and the field name of the table.
     * 
     * @param array $where
     * The condition and the value of itself for the operation.
     * 
     * @return $query
     * 
     */
    function UpdateData($table, $data = array(), $where = array()){
        // If the table name is empty, then it will throw an error.
        if(empty($table)){
            throw new Error('The table name cannot be empty!');
        }
        // If set value is empty, then it will throw an error.
        elseif(empty($data)){
            throw new Error('You must set an update value!');
        }
        // If the data is not an array, then it will throw an error.
        elseif(!is_array($data)){
            throw new Error('The data you enter is not an array data type!');
        }
        // If where condition is empty, then it will throw an error.
        elseif(empty($where)){
            throw new Error('Where condition cannot be empty!');
        }
        // Else, just do normal process.
        else{
            // Set the table destination along with the condition, and then
            // updating the specified data.
            $query = $this->db->where($where)->update($table, $data);
            // Fetching the affected rows.
            $query = $this->db->affected_rows();

            // Returning $query
            return $query;
        }
    }

    /** Delete Data Function
     * 
     * This is an Delete function to MySQL. This function is provided to
     * do a delete operation on your program.
     * 
     * @param string $table
     * The table name on your database.
     * 
     * @param array $where
     * The condition and the value of itself for the operation.
     * 
     * @return $query
     * 
     */
    function DeleteData($table, $where = array()){
        // If the table name is empty, then it will throw an error.
        if(empty($table)){
            throw new Error('The table name cannot be empty!');
        }
        // If where condition is empty, then it will throw an error.
        elseif(empty($where) || empty($id)){
            throw new Error('Where condition cannot be empty!');
        }
        // Else, just do normal process.
        else{
            // Set the table destination along with the condition, and then
            // deleting the specified data.
            $query = $this->db->where($where)->delete($table);

            // Fetching the affected rows.
            $query = $this->db->affected_rows();

            // Returning $query
            return $query;
        }
    }
}
