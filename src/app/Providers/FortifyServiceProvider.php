<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ユーザー作成処理
        Fortify::createUsersUsing(CreateNewUser::class);

        // 新規登録画面のビュー設定
        Fortify::registerView(function () {
            return view('register'); // 使用するビュー: resources/views/register.blade.php
        });

        // ログイン画面のビュー設定
        Fortify::loginView(function () {
            return view('login'); // 使用するビュー: resources/views/login.blade.php
        });

        // ログインリクエストのRate Limiter設定（1分間に最大10回）
        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(10)->by($email . $request->ip());
        });

        // 二要素認証のRate Limiter設定（必要であれば使用）
        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
