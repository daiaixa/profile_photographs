<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessege extends Model
{
    protected $table = 'contact_messages';

    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'subject',
        'message',
        'is_read',
    ];

    //Permite que el mensaje sea marcado como leído
    public function markAsRead(): void
    {
        $this->update(['is_read' => true]);
    }
}
