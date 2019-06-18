<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'category',
        'subcategory',
        'diary_no', 
        'date_in', 
        'file_date', 
        'file_no',
        'received_from',
        'sender_diary_no',
        'subject',
        'marked_to',
        'copy-to',
        'date_out',
        'marked_by',
        'remarks',
        'file_url',
        'is_reference'
    ];
}
