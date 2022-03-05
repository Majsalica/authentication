<?php declare(strict_types=1);

namespace App\Http\Services;

use App\Http\Repositories\AuthRepository;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function __construct(
        private AuthRepository $authRepository,
    ) {
    }

    public function registerUser(Request $request): RedirectResponse
    {
        /** @var User $user */
        $user = $this->authRepository->createUser($request->all());
        Auth::login($user);
        return redirect()->route('dashboard');
    }
}
