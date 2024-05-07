<?php
namespace App\Services;

class Notify
{
    // NOtification of Create
    static function createdNotification()
    {
        return notify()->success('Data created successfully', 'Success!');
    }

    // NOtification of Update
    static function updatedNotification()
    {
        return notify()->success('Data updated successfully', 'Success!');
    }

    // NOtification of Delete
    static function deletedNotification()
    {
        return notify()->success('Data deleted successfully', 'Success!');
    }
}
