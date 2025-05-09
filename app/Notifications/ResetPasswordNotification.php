namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends ResetPasswordNotification
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Şifre Sıfırlama Talebi')
            ->line('Merhaba!')
            ->line('Hesabınız için bir şifre sıfırlama talebi aldık.')
            ->action('Şifreyi Sıfırla', url(route('password.reset', $this->token, false)))
            ->line('Bu şifre sıfırlama bağlantısı 60 dakika içinde sona erecek.')
            ->line('Eğer şifre sıfırlama talebinde bulunmadıysanız, bu e-postayı dikkate almayınız.')
            ->line('Saygılarımızla,')
            ->line(config('app.name'))
            ->salutation('© 2024 Laravel. Tüm hakları saklıdır.');
    }
}
