<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index()
    {
        return view('products.contact');
    }

    public function store(ContactRequest $request)
    {
        try {
            // Lưu vào database
            $contact = Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ]);

            // Gửi email (tùy chọn - cấu hình mail sau)
            // $this->sendEmail($contact);

            return response()->json([
                'success' => true,
                'message' => 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất có thể.'
            ]);

        } catch (\Exception $e) {
            Log::error('Contact form error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra. Vui lòng thử lại sau.'
            ], 500);
        }
    }

    // Hàm gửi email (sử dụng sau khi cấu hình mail)
    private function sendEmail($contact)
    {
        try {
            Mail::send('emails.contact', ['contact' => $contact], function ($message) use ($contact) {
                $message->to('admin@healthbooker.com')
                    ->subject('Liên hệ mới từ ' . $contact->name);
                $message->from($contact->email, $contact->name);
            });
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
        }
    }
}