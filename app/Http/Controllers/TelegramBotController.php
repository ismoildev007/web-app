<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Keyboard\Keyboard;

class TelegramBotController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $update = Telegram::getWebhookUpdate();

        // Agar yangi xabar bo'lsa
        if (isset($update['message'])) {
            $message = $update['message'];
            $chatId = $message['chat']['id'];
            $user = $message['from'];
            $firstName = $user['first_name'] ?? '';
            $lastName = $user['last_name'] ?? '';
            $fullName = trim($firstName . ' ' . $lastName);

            // /start buyrug'i har safar ishlaydi
            if (isset($message['text']) && $message['text'] === '/start') {
                $this->sendWelcomeMessage($chatId, $fullName);
            }

            // Kontakt ulashilganini tekshirish
            if (isset($message['contact'])) {
                $this->handleContactReceived($chatId);
            }

            // Mahsulotlar tugmasi bosilganda
            if (isset($message['text']) && $message['text'] === 'Mahsulotlar') {
                $this->sendWebApp($chatId);
            }
        }

        return response('OK', 200);
    }

    private function sendWelcomeMessage($chatId, $fullName)
    {
        $text = "Assalomu alekum {$fullName}! Cheffcatering diet taomlari restaurantimizga xush kelibsiz!";

        // Kontaktni ulashish tugmasi
        $keyboard = Keyboard::make()
            ->setResizeKeyboard(true)
            ->setOneTimeKeyboard(true)
            ->row([
                Keyboard::button([
                    'text' => 'Kontaktni ulashish',
                    'request_contact' => true,
                ]),
            ]);

        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => $text,
            'reply_markup' => $keyboard,
        ]);
    }

    private function handleContactReceived($chatId)
    {
        $text = "Siz muvaffaqiyatli ro'yxatdan o'tdingiz!";

        // Mahsulotlar tugmasi
        $keyboard = Keyboard::make()
            ->setResizeKeyboard(true)
            ->row([
                Keyboard::button([
                    'text' => 'Mahsulotlar',
                ]),
            ]);

        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => $text,
            'reply_markup' => $keyboard,
        ]);
    }

    private function sendWebApp($chatId)
    {
        $keyboard = Keyboard::make()
            ->inline()
            ->row([
                Keyboard::inlineButton([
                    'text' => 'Mahsulotlarni ko\'rish',
                    'web_app' => ['url' => 'https://rentmax.uz/api/telegram/webhook'], // Web App URL ni to'g'ri ko'rsating
                ]),
            ]);

        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => 'Mahsulotlarni ko\'rish uchun quyidagi tugmani bosing:',
            'reply_markup' => $keyboard,
        ]);
    }

    public function setWebhook()
    {
        $webhookUrl = env('TELEGRAM_WEBHOOK_URL');
        $response = Telegram::setWebhook(['url' => $webhookUrl]);

        return response()->json($response);
    }
}
