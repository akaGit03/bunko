<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Validation\Rules\Password;

use function Laravel\Prompts\form;

class MakeAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // 入力：name, email, password
        list($name, $email, $password) = form()
            ->text(
                label: 'ユーザー名を入力してください。',
                placeholder: '赤木　侑基',
                validate: ['name' => 'required|max:255,'],
            )
            ->text(
                label: 'メールアドレスを入力してください。',
                placeholder: 'hoge@example.com',
                validate: ['email' => 'required|email:rfc|unique:users,email'],
            )
            ->password(
                label: 'パスワードを入力してください。',
                placeholder: 'Pass_w0rd',
                hint: '8～16文字、大文字、小文字、数字。',
                validate: ['password' => [
                    'required',
                    Password::min(8)
                        ->max(16)
                        ->mixedCase()
                        ->numbers()
                ]],
            )
            ->submit();

        // ユーザー作成
        $exitCode = Artisan::call(
            "make:filament-user",
            [
                '--name' => $name,
                '--email' => $email,
                '--password' => $password,
            ]
        );

        // 結果確認
        if ($exitCode) {
            echo "❌ユーザー作成に失敗しました。" . PHP_EOL;
            exit(1);
        }

        // 管理権限付与
        $user = User::where('email', $email)->first();
        if (!$user) {
            echo "❌ユーザー情報の取得に失敗しました。" . PHP_EOL;
            exit(1);
        }
        $user->admin = 1;
        $updated = $user->save();
        if (!$updated) {
            echo "❌ユーザー {$name} への管理者権限付与に失敗しました。" . PHP_EOL;
            exit(1);
        }
        echo "管理者ユーザーの作成が完了しました。" . PHP_EOL;
        $adminUrl = env('APP_URL') . '/' . config('filament.id');
        echo $user->email . ' は ' . $adminUrl . ' からログインできます。' . PHP_EOL;
    }
}