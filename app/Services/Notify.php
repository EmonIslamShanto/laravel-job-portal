<?php
namespace App\Services;

class Notify
{
    // NOtification of Create
    static function createdNotification()
    {
        return notyf()->addSuccess('Data created successfully', 'Success!');
    }

    // NOtification of Update
    static function updatedNotification()
    {
        return notyf()->addSuccess('Data updated successfully', 'Success!');
    }

    // NOtification of Delete
    static function deletedNotification()
    {
        return notyf()->addSuccess('Data deleted successfully', 'Success!');
    }
}
