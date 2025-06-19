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

        // Foydalanuvchi ma'lumotlari
        $chatId = $update->getMessage()->getChat()->getId();
        $message = $update->getMessage();
        $user = $update->getMessage()->getFrom();
        $firstName = $user->getFirstName();
        $lastName = $user->getLastName() ?? '';
        $fullName = trim($firstName . ' ' . $lastName);

        // /start buyrug'i har safar ishlaydi
        if ($message && $message->getText() === '/start') {
            $this->sendWelcomeMessage($chatId, $fullName);
        }

        // Kontakt ulashilganini tekshirish
        if ($message && $message->getContact()) {
            $this->handleContactReceived($chatId);
        }

        // Mahsulotlar tugmasi bosilganda
        if ($message && $message->getText() === 'Mahsulotlar') {
            $this->sendWebApp($chatId);
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
                    'web_app' => ['url' => 'https://t.me/cheffcatering_bot/Cheffcatering'],
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
