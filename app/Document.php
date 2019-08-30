<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Document extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
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
        'reference_of',
        'dealing_officer'
    ];

    public function dealingOfficer() {
        return $this->belongsTo('App\User', 'dealing_officer');
    }
}
