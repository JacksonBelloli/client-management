<?php

namespace App\Repositories;


use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Client Repository.
 */
class ClientRepository
{

    /**
     * return all clients
     *  
     * @return collection
     */
    public static function getAll() :Collection
    {
        return Client::all();
    }

    /**
     * Store a new client
     * 
     * @param array $data
     * @return Client
     */
    public static function store(array $data) :Client
    {
        return Client::create($data);
    }

    /**
     * Find a client by id
     * 
     * @param string $id
     * @return Client
     */
    public static function findById(string $id) :Client
    {
        return Client::findOrFail($id);
    }

    /**
     * Update a client
     * 
     * @param array $data
     * @param string $id
     * @return Client
     */
    public static function update(array $data, string $id) :Client
    {
        $client = Client::findOrFail($id);
        $client->update($data);
        return $client;
    }

    /**
     * Delete a client
     * 
     * @param string $id
     */
    public static function delete(string $id) :void
    {
        $client = Client::findOrFail($id);
        $client->delete();
    }
}