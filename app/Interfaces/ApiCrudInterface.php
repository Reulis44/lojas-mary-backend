<?php

namespace App\Interfaces;
 interface ApiCrudInterface {

    /**
     * Get all data
     *  @return array Return all data
     */
    public function all();

    /**
     * Create a new item
     * @param array $data
     * @return object Created Item
     */
    public function create (array $data);

    /**
     * Delete Item
     * @param int $id
     * @return object|array Deleted Product
     */
    public function delete($id);

    /**
     * Find a Item
     * @param int $id
     * @return object Return Item
     */
    public function find($id);

    /**
     * Update a item by id
     * @param int $id
     * @param array $data
     * @return object|array Updated Item|array
     */
    public function update($id, array $data);
 }
