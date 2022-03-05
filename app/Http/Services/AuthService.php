<?php declare(strict_types=1);

namespace App\Http\Services;

use App\Http\Repositories\AuthRepository;
use Illuminate\Http\Request;

class AuthService
{
    public function __construct(
        private AuthRepository $authRepository,
    ) {
    }

    public function registerUser(Request $request)
    {

    }

}
