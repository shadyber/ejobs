<?php

namespace App;
use App\Job;
use App\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    public function projects()
     {
         return $this->hasMany(Job::class);
     }
   public function transactions()
     {
         return $this->hasMany(Transaction::class);
     }
       public function addNew($input)
    {
        $check = static::where('facebook_id',$input['facebook_id'])->first();


        if(is_null($check)){
            return static::create($input);
        }


        return $check;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
 protected $fillable = [

        'name', 'email', 'password', 'google_id' ,'facebook_id'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
