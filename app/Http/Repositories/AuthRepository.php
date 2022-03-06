<?php declare(strict_types=1);

namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class AuthRepository
{
    public function createUser(array $data): Builder|Model
    {
        return User::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function getUserByEmail(string $email): Model|null
    {
        return User::query()->where('email', '=', $email)->first();
    }
}
