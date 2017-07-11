<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Account extends Model
{
    protected $table = 'accounts';

    protected $fillable = [
        'name',
        'address',
        'city',
        'postal_code',
        'country',
        'about',
        'website',
        'facebook_page',
        'twitter_page',
        'phone',
        'profile_image'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function ticketTypes()
    {
        return $this->hasMany(TicketType::class);
    }

    public static function updateAccount(Request $request, $id)
    {
        $account = Account::find($id);
        $account->name = $request->name;
        $account->address = $request->address;
        $account->city = $request->city;
        $account->postal_code = $request->postalCode;
        $account->country = $request->country;
        $account->about = $request->about;
        $account->website = $request->website;
        $account->facebook_page = $request->facebook;
        $account->twitter_page = $request->twitter;
        $account->phone = $request->phone;
        $account->profile_image = Helpers::uploadImage($request, 'profile-images', 'profileImage');
        $account->updated_at = Carbon::now('Europe/Istanbul');
        $account->save();
    }
}
